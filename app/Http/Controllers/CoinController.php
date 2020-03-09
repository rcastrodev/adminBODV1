<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\DataTables\DataTables;
use App\Coin; 

class CoinController extends Controller
{
    private $messages = [
                        'create' => 'Moneda guardada exitosamente',
                        'update' => 'Moneda actualizada',
                        'delete' => 'Moneda eliminada con exito'
                    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.coins.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coins.create');
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
            'name'      => $request->input('name'),
            'shortname' => $request->input('shortname'),
            'symbol'    => $request->input('symbol')
        ];

        Coin::create($args);
        $ultimoRegistro = Coin::all()->last();

        return redirect('/admin/monedas/'.$ultimoRegistro->id.'/edit')
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
        $coin = Coin::findorfail($id);
        return view('admin.coins.edit', compact('coin'));
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
            'name'      => $request->input('name'),
            'shortname' => $request->input('shortname'),
            'symbol'    => $request->input('symbol'),
        ];

        Coin::where('id', $id)->update($args);

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

        //eliminar moneda
        Coin::destroy($id);

        $message = $this->messages['delete'];

        return response()->json([
                                'message' => \View::make('admin.coins.messageDelete', compact('message'))->render()
                            ]);
    }

    public function getList()
    {
        return datatables()->eloquent(Coin::query())
                ->addColumn('accion', 'admin.coins.columnButtonAction')
                ->editColumn('name', function(Coin $coin) {
                    return '<a href="/admin/monedas/'. $coin->id.'">'. $coin->name . '</a>';
                })
                ->rawColumns(['name' => 'name', 'accion' => 'accion'])
                ->toJson();
    }
}
