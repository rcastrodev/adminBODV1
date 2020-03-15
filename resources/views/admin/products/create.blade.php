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
        <h3 class="card-title p-3">Crear producto <a href="/admin/productos" class="ml-3 btn btn-sm btn-primary">Ver productos</a></h3>
        <ul class="nav nav-pills ml-auto p-2">
          <li class="nav-item">
          	<a class="nav-link active" href="#tab_1" data-toggle="tab">Tab 1</a>
          </li>
          <li class="nav-item">
          	<a class="nav-link" href="#tab_2" data-toggle="tab">Tab 2</a>
          </li>
          <li class="nav-item">
          	<a class="nav-link" href="#tab_3" data-toggle="tab">Tab 3</a>
          </li>
        </ul>
      </div>
      <!-- /.card-header -->
      
      <div class="card-body">
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now.
          </div>
          <!-- /.tab-pane -->
          
          <div class="tab-pane" id="tab_2">
            the European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differin their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages.
          </div>
          <!-- /.tab-pane -->
          
          <div class="tab-pane" id="tab_3">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
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
@stop