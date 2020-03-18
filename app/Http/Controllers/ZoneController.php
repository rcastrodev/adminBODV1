<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\DataTables\DataTables;
use App\Zone;
use App\City;

class ZoneController extends Controller
{
    private $messages = [
        'create' => 'Zona guardada exitosamente',
        'update' => 'Zona actualizada',
        'delete' => 'Zona eliminada con exito'
                    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.zones.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('admin.zones.create', compact('cities'));
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
            'name'    => $request->input('name'),
            'code'    => $request->input('code'),
            'city_id' => $request->input('city_id')
        ];

        Zone::create($args);
        $ultimoRegistro = Zone::all()->last();

        return redirect('/admin/zonas/'.$ultimoRegistro->id.'/edit')
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
        $cities = City::all();
        $zone = Zone::findorfail($id);
        return view('admin.zones.edit', compact('zone', 'cities'));
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
            'name'    => $request->input('name'),
            'code'    => $request->input('code'),
            'city_id' => $request->input('city_id'),
        ];

        Zone::where('id', $id)->update($args);

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

        //eliminar zona
        Zone::destroy($id);

        $message = $this->messages['delete'];

        return response()->json([
                                'message' => \View::make('admin.cities.messageDelete', compact('message'))->render()
                            ]);
    }

    public function getList()
    {
        $zones = Zone::select('zones.id', 'zones.name', 'zones.code', 'cities.name AS city')
                        ->leftJoin('cities', 'zones.city_id', '=', 'cities.id');
        
        return datatables()->eloquent($zones)
                ->addColumn('accion', 'admin.zones.columnButtonAction')
                ->editColumn('name', function(Zone $zone) {
                    return '<a href="/admin/zonas/'. $zone->id.'/edit">'. $zone->name . '</a>';
                })
                ->rawColumns(['name' => 'name', 'accion' => 'accion'])
                ->toJson();
    }

    public function byCity(Request $request)
    {
        $zones = Zone::where('city_id', $request['id'])->get();
        return response()->json($zones);
    }
}
