@extends('adminlte::page')
@section('title', 'SIPSUTERMCFE')


@section('content')
<div class="container">

<form action="{{ url('/empleado') }}" method="post" enctype="multipart/form-data">
@csrf 
@include('empleado.form',['modo'=>'Crear'])
</form>
</div>
@stop