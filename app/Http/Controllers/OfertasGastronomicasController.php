<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OfertasGastronomicasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ofertas-gastronomicas');
    }

    public function producto()
    {
    	return view('producto');
    }

    public function maps()
    {
        return view('admin.maps');
    }
}
