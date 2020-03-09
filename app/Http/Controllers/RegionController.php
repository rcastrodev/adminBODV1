<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\DataTables\DataTables;
use App\Region;
use App\Country;

class RegionController extends Controller
{
    private $messages = [
        'create' => 'Estado guardado exitosamente',
        'update' => 'Estado actualizado',
        'delete' => 'Estado eliminado con exito'
                    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.regions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('admin.regions.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $args = [
            'name'       => $request->input('name'),
            'code'       => $request->input('code'),
            'country_id' => $request->input('country_id')
        ];

        Region::create($args);
        $ultimoRegistro = Region::all()->last();

        return redirect('/admin/estados/'.$ultimoRegistro->id.'/edit')
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
        $countries = Country::all();
        $region = Region::findorfail($id);
        return view('admin.regions.edit', compact('region', 'countries'));
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
            'name'       => $request->input('name'),
            'code'       => $request->input('code'),
            'country_id' => $request->input('country_id'),
        ];

        Region::where('id', $id)->update($args);

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

        //eliminar estado
        Region::destroy($id);

        $message = $this->messages['delete'];

        return response()->json([
                                'message' => \View::make('admin.regions.messageDelete', compact('message'))->render()
                            ]);
    }

    public function getList()
    {
        return datatables()->eloquent(Region::query())
                ->addColumn('accion', 'admin.regions.columnButtonAction')
                ->editColumn('name', function(Region $region) {
                    return '<a href="/admin/estados/'. $region->id.'">'. $region->name . '</a>';
                })
                ->rawColumns(['name' => 'name', 'accion' => 'accion'])
                ->toJson();
    }

    public function byCountry(Request $request)
    {
        $regions = Region::where('country_id', $request['id'])->get();
        return response()->json($regions);
    }
}
