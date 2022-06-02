@extends('layouts/main') {{-- Extende o arquivo (como se fosse o include), primeiro indicando a pasta (layouts) e depois o arquivo (main). --}}

@section('title', 'HDC Events') {{-- Indica o yield da página extendida ('title') e qual valor ele deve ser atribuído ('HDC Events') --}}

@section('content')
@if(10 < 15) 
    <h1>Seja bem-vindo, {{$nome}} !</h1>
@endif

@for($i = 0; $i < count($arr); $i++): 
    <p>{{$arr[$i]}}</p> {{-- Comentário que não é imprimido na estrutura do HTML --}}
@endfor
@endsection