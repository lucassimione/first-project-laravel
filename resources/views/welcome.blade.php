@extends('layouts/main') {{-- Extende o arquivo (como se fosse o include), primeiro indicando a pasta (layouts) e depois o arquivo (main). --}}

@section('title', 'HDC Events') {{-- Indica o yield da página extendida ('title') e qual valor ele deve ser atribuído ('HDC Events') --}}

@section('content')
<div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>
    <form action="">
        <input type="text" name="" id="search" class="form-control" placeholder="Procurar">
    </form>
</div>
<div id="events-container" class="col-md-12">
    <h2>Próximos Eventos</h2>
    <p class="subtitle">Veja os evnetos dos próximos dias</p>
    <div id="cards-container" class="row">
        @foreach($events as $event)
            <div class="card col-md-3">
                <img src="/img/event_placeholder.jpg" alt="{{ $event-> title }}">
                <div class="card-body">
                    <p class="card-date">10-01-2022</p>
                    <h5 class="card-title">{{ $event->title }}</h5>
                    <p class="card-participants">X Participantes</p>
                    <a href="#" class="btn btn-primary">Saber mais</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection