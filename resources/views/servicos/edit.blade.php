@extends('adminlte::page')

@section('title', 'Editar Serviço')

@section('content_header')
    <h1>Editar Serviço - <strong>{{ $servico->nome }} ID: {{ $servico->id }}</strong> </h1>
@stop

@section('content')
    <form action="{{ route('servicos.update', $servico) }}" method="post">
        @method('PUT');

        @include('servicos._form')       
    </form>
@stop