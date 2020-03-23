<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateProductsRequest;

use Illuminate\Support\Facades\Storage;

use App\Coin;
use App\Type;
use App\Condition;
use App\Product;
use App\Establishment;
use App\ProductoEstablishment;
use App\ProductoGallery;
use App\ProductoCondition;
use App\ProductoCodigoStock;

class ProductController extends Controller
{
  private $messages = [
    'create' => 'Producto guardado exitosamente',
    'update' => 'Producto actualizado',
    'delete' => 'Producto eliminado con exito'
  ];

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $products = Product::All();
    return view('admin.products.index', compact('products'));
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
    $establishments = Establishment::All();
    return view('admin.products.create', compact('coins', 'types', 'conditions', 'products', 'establishments'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(CreateProductsRequest $request)
  {
    $fileImagenPrincipal = $request->file('imagen_principal');
    $fileLogo = $request->file('logo');

    $args = [
      'nombre'      => $request->input('nombre'),
      'tipo_producto_id' => $request->input('tipo_producto_id'),
      'category_id' => $request->input('category_id'),
      'category_destacada_id' => $request->input('category_destacada_id'),
      'direccion' => $request->input('direccion'),
      'fecha_producto' => $request->input('fecha_producto'),
      'hora_producto' => $request->input('hora_producto'),
      'description' => $request->input('description'),
      'estatus' => $request->input('estatus'),
      'coin_afiliado_id' => $request->input('coin_afiliado_id'),
      'afiliado_precio' => $request->input('afiliado_precio'),
      'afiliado_gratis' => $request->input('afiliado_gratis'),
      'afiliado_na' => $request->input('afiliado_na'),
      'coin_publico_id' => $request->input('coin_publico_id'),
      'publico_precio' => $request->input('publico_precio'),
      'publico_gratis' => $request->input('publico_gratis'),
      'public_na' => $request->input('public_na'),
      'imagen_principal' => $fileImagenPrincipal->store('products', 'my_img'),
      'logo' => $fileLogo->store('products', 'my_img'),
    ];

    try {
      Product::create($args);
      
      $ultimoRegistro = Product::all()->last();
      
      $establecimientos = array_unique($request['establecimiento']);
      foreach ($establecimientos as $establecimiento) {
        ProductoEstablishment::create([
          'product_id' => $ultimoRegistro->id,
          'establishment_id' => $establecimiento
        ]);
      }

      $i = 0;
      foreach ($request->gallery as $gallery) {
        ProductoGallery::create([
          'product_id' => $ultimoRegistro->id,
          'ruta' => $gallery->store('products_gallery', 'my_img'),
          'orden' => $request['ordenGallery'][$i]
        ]);
        $i++;
      }

      if (isset($request['conditions'])) {
        $conditions = array_unique($request['conditions']);
        foreach ($conditions as $condition) {
          ProductoCondition::create([
            'condition_id' => $condition,
            'product_id' => $ultimoRegistro->id
          ]);
        }
      }
      

      $inventarios = array_unique($request['inventario']);
      foreach ($inventarios as $inventario) {
        ProductoCodigoStock::create([
          'producto_id' => $ultimoRegistro->id,
          'estatus' => 1,
          'localizador' => $inventario
        ]);
      }

      if (isset($request['hijos'])) {
        $hijos = array_unique($request['hijos']);
        foreach ($hijos as $hijo) {
          Product::where('id', $hijo)->update(['producto_padre' => $ultimoRegistro->id]);
        }
      }

      return redirect('/admin/productos/'.$ultimoRegistro->id.'/edit')
                ->with('mensaje', $this->messages['create'])
                ->withInput($request->all());

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
    $coins = Coin::All();
    $types = Type::All();
    $conditions = Condition::All();
    $products = Product::All();
    $establishments = Establishment::All();
    $productogallery = ProductoGallery::All()->where('product_id', $id);
    $productoestablishment = ProductoEstablishment::All()->where('product_id', $id);
    $productocondition = ProductoCondition::All()->where('product_id', $id);
    $productocodigostock = ProductoCodigoStock::All()->where('producto_id', $id);
    $productohijo = Product::All()->where('producto_padre', $id);

    $producto = Product::findorfail($id);
    return view('admin.products.edit', compact('producto','coins', 'types', 'conditions', 'products', 'establishments', 'productogallery', 'productoestablishment', 'productocondition', 'productocodigostock', 'productohijo'));
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
      'nombre' => $request->input('nombre'),
      'tipo_producto_id' => $request->input('tipo_producto_id'),
      'category_id' => $request->input('category_id'),
      'category_destacada_id' => $request->input('category_destacada_id'),
      'direccion' => $request->input('direccion'),
      'fecha_producto' => $request->input('fecha_producto'),
      'hora_producto' => $request->input('hora_producto'),
      'description' => $request->input('description'),
      'estatus' => $request->input('estatus'),
      'coin_afiliado_id' => $request->input('coin_afiliado_id'),
      'afiliado_precio' => $request->input('afiliado_precio'),
      'afiliado_gratis' => $request->input('afiliado_gratis'),
      'afiliado_na' => $request->input('afiliado_na'),
      'coin_publico_id' => $request->input('coin_publico_id'),
      'publico_precio' => $request->input('publico_precio'),
      'publico_gratis' => $request->input('publico_gratis'),
      'public_na' => $request->input('public_na'),
    ];

    if ($request->file('imagen_principal')) {
      $fileImagenPrincipal = $request->file('imagen_principal');
      $args['imagen_principal'] = $fileImagenPrincipal->store('products', 'my_img');
    }

    if ($request->file('logo')) {
      $fileLogo = $request->file('logo');
      $args['logo'] = $fileLogo->store('products', 'my_img');
    }

    Product::where('id', $id)->update($args);


    if ($request->file('gallery')) {
      $actuals = ProductoGallery::All()->where('product_id', $id);

      foreach ($actuals as $actual) {
        ProductoGallery::destroy($actual->id);
      }

      $i = 0;
      foreach ($request->gallery as $gallery) {
        ProductoGallery::create([
          'product_id' => $id,
          'ruta' => $gallery->store('products_gallery', 'my_img'),
          'orden' => $request['ordenGallery'][$i]
        ]);
        $i++;
      }
    }

    if ($request->input('establecimiento')) {
      $actuals = ProductoEstablishment::All()->where('product_id', $id);

      foreach ($actuals as $actual) {
        ProductoEstablishment::destroy($actual->id);
      }

      $establecimientos = array_unique($request['establecimiento']);
      foreach ($establecimientos as $establecimiento) {
        ProductoEstablishment::create([
          'product_id' => $id,
          'establishment_id' => $establecimiento
        ]);
      }
    }

    if ($request->input('conditions')) {
      $actuals = ProductoCondition::All()->where('product_id', $id);

      foreach ($actuals as $actual) {
        ProductoCondition::destroy($actual->id);
      }

      $conditions = array_unique($request['conditions']);
      foreach ($conditions as $condition) {
        ProductoCondition::create([
          'condition_id' => $condition,
          'product_id' => $id
        ]);
      }
    }

    if ($request->input('inventario')) {
      $actuals = ProductoCodigoStock::All()->where('producto_id', $id);

      foreach ($actuals as $actual) {
        ProductoCodigoStock::destroy($actual->id);
      }

      $inventarios = array_unique($request['inventario']);
      foreach ($inventarios as $inventario) {
        ProductoCodigoStock::create([
          'producto_id' => $id,
          'localizador' => $inventario
        ]);
      }
    }

    if ($request->input('hijos')) {
      $actuals = Product::All()->where('producto_padre', $id);

      foreach ($actuals as $actual) {
        Product::where('id', $actual->id)->update(['producto_padre' => Null]);
      }

      $hijos = array_unique($request['hijos']);
      foreach ($hijos as $hijo) {
        Product::where('id', $hijo)->update(['producto_padre' => $id]);
      }
    }

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
  public function destroy($id)
  {
    //
  }

  public function getList()
    {
      return datatables()->eloquent(Product::query())
              ->addColumn('accion', 'admin.products.columnButtonAction')
              ->editColumn('name', function(Product $product) {
                  return '<a href="/admin/productos/'. $product->id.'">'. $product->nombre . '</a>';
              })
              ->rawColumns(['name' => 'name', 'accion' => 'accion'])
              ->toJson();
    }
}
