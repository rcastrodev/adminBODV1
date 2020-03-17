<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateProductsRequest;

use App\Coin;
use App\Type;
use App\Condition;
use App\Product;

class ProductController extends Controller
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
    return view('admin.products.index');
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $coins = Coin::All();
    $types = Type::All();
    $conditions = Condition::All();
    $products = Product::All();
    return view('admin.products.create', compact('coins', 'types', 'conditions', 'products'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(CreateProductsRequest $request)
  {
    $args = [
      'nombre'      => $request->input('nombre'),
    ];

    try {
      Product::create($args);
      $ultimoRegistro = Product::all()->last();

      return response()->json(['message' => 'creado']);
    } catch (Exception $e) {
      return response()->json(['message' => $e]);
    }
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
}
