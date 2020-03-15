<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Region;
use App\City;
use App\Zone;
use App\Brand;
use App\Type;
use App\Establishment;
use App\Http\Requests\CreateBasicEstablishmentDataRequests;
use App\Http\Requests\UpdateBasicDataOfStablishmentsRequests;
use Illuminate\Support\Facades\Storage;
use App\GalleryEstablishment;

class EstablishmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.establishments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries  = Country::all();
        $brands     = Brand::all();
        $types      = Type::where('category', 'Gastronomia')->get();
        return view('admin.establishments.create', compact('countries', 'brands', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBasicEstablishmentDataRequests $request)
    {
       // dd($request->all());
        $args = [
            'user_id'   => $request->input('user_id'),
            'brand_id'  => $request->input('brand_id'),
            'type_id'   => $request->input('type_id'),
            'country_id'=> $request->input('country_id'),
            'region_id' => $request->input('region_id'),
            'city_id'   => $request->input('city_id'),
            'zone_id'   => $request->input('zone_id'),
            'name'      => $request->input('name'),
            'owner_name'=> $request->input('owner_name'),
            'rif'       => $request->input('rif'),
            'address'   => $request->input('address'),
            'latitude'  => $request->input('latitude'),
            'length'    => $request->input('length'),
            'phone'     => $request->input('phone'),
            'logo'      => $request->file('logo')->store('establishments', 'my_img'),
            'main_image'=> $request->file('main_image')->store('establishments', 'my_img'),
            'linear_discount' => $request->input('linear_discount'),
            'description'     => $request->input('description'),
            'menu' => $request->input('menu'),
            'reservation_email' => $request->input('reservation_email'),
            'status' => Establishment::validateInputBoolean($request, 'status'),
            'publish_on_the_web' => Establishment::validateInputBoolean($request, 'publish_on_the_web'),
            'admit_reservation' => Establishment::validateInputBoolean($request, 'admit_reservation')
        ];

        Establishment::create($args);
        $establishment = Establishment::all()->last();        
        return redirect("/admin/establecimientos/{$establishment->id}/edit")
                                        ->withInput()
                                        ->with('mensaje', 'Establecimiento creado con exito');
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
        $images    = GalleryEstablishment::orderBy('order', 'ASC')->get();
        $countries  = Country::all();
        $brands     = Brand::all();
        $types      = Type::where('category', 'Gastronomia')->get();
        $establishment = Establishment::find($id);
        return view('admin.establishments.edit', compact('establishment', 'countries', 'brands', 'types', 'images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBasicDataOfStablishmentsRequests $request, $id)
    {
        $args = [
            'user_id'   => $request->input('user_id'),
            'brand_id'  => $request->input('brand_id'),
            'type_id'   => $request->input('type_id'),
            'country_id'=> $request->input('country_id'),
            'region_id' => $request->input('region_id'),
            'city_id'   => $request->input('city_id'),
            'zone_id'   => $request->input('zone_id'),
            'name'      => $request->input('name'),
            'owner_name'=> $request->input('owner_name'),
            'rif'       => $request->input('rif'),
            'address'   => $request->input('address'),
            'latitude'  => $request->input('latitude'),
            'length'    => $request->input('length'),
            'phone'     => $request->input('phone'),
            'logo'      => Establishment::deleteIfYouHaveImage($request, $id, 'logo', 'logo'),
            'main_image'=> Establishment::deleteIfYouHaveImage($request, $id, 'main_image', 'main_image'),
            'linear_discount' => $request->input('linear_discount'),
            'description'     => $request->input('description'),
            'menu'            => $request->input('menu'),
            'reservation_email' => $request->input('reservation_email'),
            'status'            => Establishment::validateInputBoolean($request, 'status'),
            'publish_on_the_web'=> Establishment::validateInputBoolean($request, 'publish_on_the_web'),
            'admit_reservation' => Establishment::validateInputBoolean($request, 'admit_reservation')
        ];

        Establishment::where('id', $id)->update($args);     
        return back()->withInput()->with('mensaje', 'Actualizado');

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


}
