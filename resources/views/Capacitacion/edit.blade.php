@extends('adminlte::page')
@section('title', 'SIPSUTERMCFE')

@section('content')
<div class="container">

<form action="{{ url('/capacitacion/'.$curso->id) }}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}
@include('Capacitacion.form',['modo'=>'Editar'])




</form>
</div>
@stop

