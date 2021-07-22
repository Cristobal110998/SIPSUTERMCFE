@extends('adminlte::page')
@section('title', 'SIPSUTERMCFE')


@section('content')
<div class="container">

<form action="{{ url('/capacitacion') }}" method="post" enctype="multipart/form-data">
@csrf 
@include('Capacitacion.form',['modo'=>'Crear'])
</form>
</div>
@stop