<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateBrandsRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Brand; 

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
        $file = $request->file('logo');

        $args = [
            'name'      => $request->input('name'),
            'rif'       => $request->input('rif'),
            'tel'       => $request->input('tel'),
            'contact_person' => $request->input('contact_person'),
            'email'     => $request->input('email'),
            'address'   => $request->input('address'),
            'logo'      => $file->store('brands', 'public'),
            'status'    => Brand::setStatusAttribute($request->status),
        ];

        Brand::create($args);
        $ultimoRegistro = Brand::all()->last();

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
        $brand = Brand::findorfail($id);
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
        $brand = Brand::findorfail($id);
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
        $validator = Validator::make($request->all(), [
            'name'  => 'required',
            'rif'   => 'required|unique:brands',
            'tel'   => 'required',
            'contact_person' => 'required',
            'email'     => 'required',
            'address'   => 'required',
        ]);

        $args = [
            'name'      => $request->input('name'),
            'rif'       => $request->input('rif'),
            'tel'       => $request->input('tel'),
            'contact_person' => $request->input('contact_person'),
            'email'     => $request->input('email'),
            'address'   => $request->input('address'),
            'status'    => Brand::setStatusAttribute($request->status),
        ];

        $this->deleteIfYouHaveImage($request, $id);

        Brand::where('id', $id)->update($args);

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
    }


    public function getList()
    {
        return datatables()->eloquent(Brand::query())
                ->addColumn('accion', 'admin.brands.columnButtonAction')
                ->editColumn('name', function(Brand $brand) {
                    return '<a href="/admin/marcas/'. $brand->id.'">'. $brand->name . '</a>';
                })
                ->editColumn('status', function(Brand $brand) {
                    return ($brand->status) ? 'Activo' : 'Inactivo';
                })
                ->rawColumns(['name' => 'name', 'accion' => 'accion', 'status' => 'status'])
                ->toJson();
    }

    private function deleteIfYouHaveImage($request, $id)
    {
        //valida si trae un objeto tipo file desde el front
        if( $request->hasFile('logo') ){
            // borrar imagen del storage
            Storage::disk('public')->delete(Brand::find($id)->logo);
            //agregar nueva ruta en la base de datos y gardar el archivo
            $args['logo'] =  $request->file('logo')->store('brands', 'public');
        }
        else{
            // si no trae el objeto file se queda con su valor 
            $args['logo'] = Brand::find($id)->logo;
        }
    }

}
