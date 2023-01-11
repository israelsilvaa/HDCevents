@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')
    
<div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar... ">
    </form>
</div>
 <div id="events-container" class="col-md-12">
    @if($search)
    <h2>Buscando por: {{ $search }}</h2>
    @else
    <h2>Próximos Eventos</h2>
    <p class="subtitle">Veja os eventos dos próximos dias</p>
    @endif
    <div id="cards-container" class="row">
        @foreach($events as $events)
            <div class="card col-md-3">
                <img src="/img/events/{{$events->image}}" alt="{{ $events->title }}">
                <div class="card-body">
                    <p class="card-date">{{ date('d/m/Y', strtotime($events->date)) }}</p>
                    <h5 class="card-title">{{ $events->title }}</h5>
                    <p class="card-participantes">X Participantes</p>
                    <a href="/events/{{ $events->id }}" class="btn btn-primary">Saber mais</a>
                </div>
            </div>
       @endforeach
       {{-- feedback de quando não tem eventos
            porem a "count($events)" retorna um array de obj, e não pode comparar com "0"   --}}
       {{-- @if(count($events) == 0)
            <p>Não há eventos disponíveis</p>
       @endif --}}
    </div>
 </div>
@endsection