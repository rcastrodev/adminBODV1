<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateBrandsRequest;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Brands; 

class BrandController extends Controller
{
    private $messages = [
                        'create' => 'Marca guardada exitosamente',
                        'update' => 'Marca actualizada',
                        'delete' => 'Marca eliminada con exito'
                    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.brands.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBrandsRequest $request)
    {
        $args = [
            'name'      => $request->input('name'),
            'rif'       => $request->input('rif'),
            'tel'       => $request->input('tel'),
            'contact_person' => $request->input('contact_person'),
            'email'     => $request->input('email'),
            'address'   => $request->input('address'),
            'status'    => $request->input('status'),
        ];

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            //guarda la imagen en el storage y guarda la ruta para almacenarla en la base de datos
            $args['logo'] = $request->file('logo')->store('brands', 'public');
        }

        Brands::create($args);
        $ultimoRegistro = Brands::all()->last();

        return redirect('/admin/marcas/'.$ultimoRegistro->id.'/edit')
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
        $brand = Brands::findorfail($id);
        return view('admin.brands.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brands::findorfail($id);
        return view('admin.brands.edit', compact('brand'));
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
            'rif' => $request->input('rif'),
            'tel' => $request->input('tel'),
            'contact_person' => $request->input('contact_person'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'status' => $request->input('status')
        ];

        //valida si trae un objeto tipo file desde el front
        if( $request->hasFile('logo') ){
            // borrar imagen del storage
            Storage::disk('public')->delete(Brands::find($id)->logo);
            //agregar nueva ruta en la base de datos y gardar el archivo
            $args['logo'] =  $request->file('logo')->store('brands', 'public');
        }
        else{
            $args['logo'] = Brands::find($id)->logo;
        }

        Brands::where('id', $id)->update($args);

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
        if( !$request->ajax() ) abort(403, 'Error');

        //eliminar la imagen
        Storage::disk('public')->delete(Brands::find($id)->logo);
        //elimina la marca
        Brands::destroy($id);

        $message = $this->messages['delete'];

        return response()->json([
                                'message' => \View::make('admin.brands.messageDelete', compact('message'))->render()
                            ]);

    }


    public function getList()
    {
        return datatables()->eloquent(Brands::query())
                ->addColumn('accion', 'admin.brands.columnButtonAction')
                ->editColumn('name', function(Brands $brand) {
                    return '<a href="/admin/marcas/'. $brand->id.'">'. $brand->name . '</a>';
                })
                ->rawColumns(['name' => 'name', 'accion' => 'accion'])
                ->toJson();
    }
}
