<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GalleryEstablishment;
use Illuminate\Support\Facades\Storage;

class EstablishmentGalleryController extends Controller
{
    public function store(Request $request)
    {
    	$request->validate([
    		'img1' => 'mimes:jpeg,png,jpg|dimensions:min_width=1080,min_height=1080',
    		'img2' => 'mimes:jpeg,png,jpg|dimensions:min_width=1080,min_height=1080',
    		'img3' => 'mimes:jpeg,png,jpg|dimensions:min_width=1080,min_height=1080',
    	], [
    		'img1.dimensions' => '¡Imagen debe poseer medidas de 1080 x 1080 Px!',
    		'img2.dimensions' => '¡Imagen debe poseer medidas de 1080 x 1080 Px!',
    		'img3.dimensions' => '¡Imagen debe poseer medidas de 1080 x 1080 Px!',
     		'img1.mimes' => 'IMG debe ser JPEG o PNG',
    		'img2.mimes' => 'IMG debe ser JPEG o PNG',
    		'img3.mimes' => 'IMG debe ser JPEG o PNG'
    	]);

    	//actualizar los datos
    	$this->insertGallery($request, 'img1', 'ordenImg1');
    	$this->insertGallery($request, 'img2', 'ordenImg2');
    	$this->insertGallery($request, 'img3', 'ordenImg3');

    	return back()->with('mensaje', 'Se subio galería de imágenes con exito');
    }

    private function insertGallery($request, $name, $orderInput){
    	if($request->hasFile($name)) {

    		Storage::disk('my_img')->delete(GalleryEstablishment::where('name', $name)->first()->ruta);

    		$args = [
    			'establishment_id' 	=> $request->input('establishment_id'),
    			'order' 			=> $request->input($orderInput),
    			'ruta'				=> $request->file($name)->store('establishments_gallery', 'my_img')
    		];

    		GalleryEstablishment::where('name', $name)->update($args);
    	}
    }

}
