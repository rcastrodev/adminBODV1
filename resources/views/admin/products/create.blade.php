@extends('adminlte::page')

@section('css')
@stop

@section('title', 'Producto')

@section('content_header')
<h1>Producto</h1>
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
    <!-- Custom Tabs -->
    <div class="card">
      <div class="card-header d-flex p-0">
        <h3 class="card-title p-3">Crear producto</h3>
        <ul class="nav nav-pills ml-auto p-2">
          <li class="nav-item">
          	<a class="nav-link active" href="#tab_1" data-toggle="tab">Detalles</a>
          </li>
          <li class="nav-item">
          	<a class="nav-link" href="#tab_2" data-toggle="tab">Galería de Imágenes</a>
          </li>
          <li class="nav-item">
          	<a class="nav-link" href="#tab_3" data-toggle="tab">Establecimientos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#tab_4" data-toggle="tab">Condiciones</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#tab_5" data-toggle="tab">Inventario</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#tab_6" data-toggle="tab">Productos Hijos</a>
          </li>
        </ul>
      </div>
      <!-- /.card-header -->
      
      <div class="card-body">
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            @include('admin.products.form.product-of-basic-data')
          </div>
          <!-- /.tab-pane -->
          
          <div class="tab-pane" id="tab_2">
            @include('admin.products.form.product-of-galery-image')
          </div>
          <!-- /.tab-pane -->
          
          <div class="tab-pane" id="tab_3">
            @include('admin.products.form.product-of-establishment')
          </div>
          <!-- /.tab-pane -->

          <div class="tab-pane" id="tab_4">
            @include('admin.products.form.product-of-conditions')
          </div>
          <!-- /.tab-pane -->

          <div class="tab-pane" id="tab_5">
            @include('admin.products.form.product-of-inventory')
          </div>
          <!-- /.tab-pane -->

          <div class="tab-pane" id="tab_6">
            @include('admin.products.form.product-of-product')
          </div>
          <!-- /.tab-pane -->
        
        </div>
        <!-- /.tab-content -->
      
      </div>
      <!-- /.card-body -->
    
    </div>
    <!-- ./card -->
  
  </div>
  <!-- /.col -->

</div>
<!-- /.row -->
@stop

@section('js')
<script>
  CKEDITOR.replace('description')
</script>
@stop