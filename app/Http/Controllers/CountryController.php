<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCountriesRequest;

use Yajra\DataTables\DataTables;
use App\Country; 

class CountryController extends Controller
{
    private $messages = [
                        'create' => 'Pais guardado exitosamente',
                        'update' => 'Pais actualizado',
                        'delete' => 'Pais eliminado con exito'
                    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.countries.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCountriesRequest $request)
    {
        $args = [
            'name' => $request->input('name'),
            'iso'  => $request->input('iso'),
            'utc'  => $request->input('utc')
        ];

        Country::create($args);
        $ultimoRegistro = Country::all()->last();

        return redirect('/admin/paises/'.$ultimoRegistro->id.'/edit')
                ->with('mensaje', $this->messages['create'])
                ->withInput($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = Country::findorfail($id);
        return view('admin.countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $args = [
            'name' => $request->input('name'),
            'iso' => $request->input('iso'),
            'utc' => $request->input('utc'),
        ];

        Country::where('id', $id)->update($args);

        return back()
                ->with('mensaje', $this->messages['update'])
                ->withInput($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(!$request->ajax()){
            abort(403, 'Error');
        }

        //eliminar pais
        Country::destroy($id);

        $message = $this->messages['delete'];

        return response()->json([
                                'message' => \View::make('admin.countries.messageDelete', compact('message'))->render()
                            ]);
    }

    public function getList()
    {
        return datatables()->eloquent(Country::query())
                ->addColumn('accion', 'admin.countries.columnButtonAction')
                ->editColumn('name', function(Country $country) {
                    return '<a href="/admin/paises/'. $country->id.'">'. $country->name . '</a>';
                })
                ->rawColumns(['name' => 'name', 'accion' => 'accion'])
                ->toJson();
    }
}
