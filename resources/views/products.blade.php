@extends('layouts/main')

@section('title', 'Produtos')

@section('content')
@if(isset($busca))
<p>Você está atrás do produto {{ $busca }} ?</p>
@endif
@endsection