<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateBrandsRequest;
use Yajra\DataTables\DataTables;
use App\Brands; 

class BrandController extends Controller
{
    private $messages = [
                        'create' => 'Marca guardada exitosamente'
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
            //guarda la imagen el storage y guarda la ruta para almacenarla en la base de datos
            $args['logo'] = $request->file('logo')->store('brands', 'public');
        }

        Brands::create($args);

        return back()
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function getList()
    {
        return datatables()->eloquent(Brands::query())
                ->editColumn('name', function(Brands $brand) {
                    return '<a href="#">'. $brand->name . '</a>';
                })
                ->rawColumns(['name'])
                ->toJson();
    }
}
