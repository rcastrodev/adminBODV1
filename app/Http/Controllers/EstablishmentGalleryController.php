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
    		'img' => 'required|mimes:jpeg,png,jpg|dimensions:min_width=1080,min_height=1080|max:50000',
            'order' => 'required',

    	], [
    		'img.dimensions' => '¡Imagen debe poseer medidas de 1080 x 1080 Px!',
     		'img.mimes'      => 'IMG debe ser JPEG o PNG',
            'img.max'        => '¡Imagen debe pesar menos de 500 KB!' ,
            'order.required' => 'La imagén debe tener un ordén',
    	]);

    	//actualizar los datos
    	$this->insertGallery($request);

    	return back()->with('mensaje', 'Se subio galería de imágenes con exito');
    }

    private function insertGallery($request){

        $args = [
            'establishment_id'  => $request->input('establishment_id'),
            'order'             => $request->input('order'),
            'ruta'              => $request->file('img')->store('establishments_gallery', 'my_img')
        ];

        if(! GalleryEstablishment::where('order', $request->input('order'))->exists() ) {
            GalleryEstablishment::create($args);
        } else {
            //borrar la imagen
            Storage::disk('my_img')->delete(GalleryEstablishment::where('order', $request->input('order'))->first()->ruta);

            GalleryEstablishment::where('order', $request->input('order'))
                    ->update($args);
        }
    
    }

    public function destroy($id)
    {
        Storage::disk('my_img')->delete(GalleryEstablishment::where('id', $id)->first()->ruta);
        GalleryEstablishment::where('id', $id)->delete();
        return back()->with('mensaje', 'Imágen de la galería borrada');
    }

}
