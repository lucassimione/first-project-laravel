@extends('layouts/main') {{-- Extende o arquivo (como se fosse o include), primeiro indicando a pasta (layouts) e depois o arquivo (main). --}}

@section('title', 'HDC Events') {{-- Indica o yield da página extendida ('title') e qual valor ele deve ser atribuído ('HDC Events') --}}

@section('content')
<div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>
    <form action="/" method="GET">
        <input type="text" name="search" id="search" class="form-control" placeholder="Procurar">
    </form>
</div>
<div id="events-container" class="col-md-12">
    @if(isset($search))
        <h2> Resultado da busca relacionada ao termo "{{ $search }}"
    @else
        <h2>Próximos Eventos</h2>
        <p class="subtitle">Veja os eventos dos próximos dias</p>
    @endif
    <div id="cards-container" class="row">
        @foreach($events as $event)
            <div class="card col-md-3">
                <img src="/img/events/{{$event->image}}" alt="{{ $event-> title }}">
                <div class="card-body">
                    <p class="card-date">{{ date('d/m/Y', strtotime($event->date)) }}</p>
                    <h5 class="card-title">{{ $event->title }}</h5>
                    <p class="card-participants">X Participantes</p>
                    <a href="/events/{{ $event->id; }}" class="btn btn-primary">Saber mais</a>
                </div>
            </div>
        @endforeach
        @if(count($events) == 0 && $search)
        <p> Não há eventos disponível. <a href="/">ver todos </a></p>
        @endif
    </div>
</div>
@endsection