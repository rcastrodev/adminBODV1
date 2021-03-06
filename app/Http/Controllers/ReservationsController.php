<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    private $messages = [
        'create' => 'Cuidad guardada exitosamente',
        'update' => 'Ciudad actualizada',
        'delete' => 'Ciudad eliminada con exito'
                    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.reservations.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $regions = Region::all();
        return view('admin.reservations.create', compact('countries', 'regions'));
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
            'country_id' => $request->input('country_id'),
            'region_id'  => $request->input('region_id')
        ];

        City::create($args);
        $ultimoRegistro = City::all()->last();

        return redirect('/admin/ciudades/'.$ultimoRegistro->id.'/edit')
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
        $regions   = Region::all();
        $city      = City::findorfail($id);
        return view('admin.reservations.edit', compact('city', 'regions', 'countries'));
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
            'region_id'  => $request->input('region_id'),
        ];

        City::where('id', $id)->update($args);

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
        City::destroy($id);

        $message = $this->messages['delete'];

        return response()->json([
                                'message' => \View::make('admin.reservations.messageDelete', compact('message'))->render()
                            ]);
    }

    public function getList()
    {
        $cities = City::select('cities.id', 'cities.name', 'cities.code', 'countries.name AS country')
                        ->leftJoin('countries', 'cities.id', '=', 'countries.id');       

        return datatables()->eloquent($cities)
                ->addColumn('accion', 'admin.reservations.columnButtonAction')
                ->editColumn('name', function(City $city) {
                    return '<a href="/admin/ciudades/'. $city->id.'/edit">'. $city->name . '</a>';
                })
                ->rawColumns(['name' => 'name', 'accion' => 'accion'])
                ->toJson();
    }

    public function byRegion(Request $request)
    {
        $cities = City::where('region_id', $request['id'])->get();
        return response()->json($cities);
    }
}
