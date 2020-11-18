@extends('layout.plantilla')
 @section('contenido')
<div class="row">
 <div class="col-md-8 col-xs-12">
 @include('publicacn.search')
 </div>
 <div class="col-md-2">
 <a href="publicacn/create" class="pull-right">
 <button class="btn btn-success">Crear Publicacion</button>
 </a>
 </div>
 </div>
 <div class="row">
 <div class="col-md-12 col-xs-12">
 <div class="table-responsive">
 <table class="table table-striped table-hover">
 <thead>

 <th>Id</th>
 <th>Titulo</th>
 <th>Cuerpo</th>
 <th>Primer Nombre</th>

 <th>Primer Apellido</th>

 <th>Correo</th>
 


 <th width="180">Opciones</th>
 </thead>
 <tbody>
 @foreach($publicacn as $pb)
 <tr>
 <td>{{ $pb->id }}</td>
 <td>{{ $pb->titulo }}</td>
 <td>{{ $pb->cuerpo }}</td>

 <td>{{ $pb->habitantes->primer_nombre }}</td>

 <td>{{ $pb->habitantes->primer_apellido }}</td>

 <td>{{ $pb->habitantes->correo }}</td>

<a href="{{URL::action('PublicacionController@edit',$pb->id)}}"><button class="btn btn-primary">Ingreso</button></a>

 
<a href="" data-target="#modal-delete-{{$pb->id}}" data-toggle="modal"> <button class="btn btn-danger">Eliminar</button></a>



 </a>
 </td>
 </tr>
 @include('publicacn.modal')
 @endforeach
 </tbody>
 </table>
 </div>
 {{$publicacn->links()}}
 </div>
 </div>
 @endsection

