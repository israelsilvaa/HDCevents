@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')
    
<div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>
    <form action="">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar... ">
    </form>
</div>
 <div id="events-container" class="col-md-12">
    <p class="subtitle">veja os eventos dos próximos dias</p>
    <div id="cards-container" class="row">
        @foreach($events as $events)
            <div class="card col-md-3">
                <img src="/img/events/{{$events->image}}" alt="{{ $events->title }}">
                <div class="card-body">
                    <p class="card-date">02/12132/02</p>
                    <h5 class="card-title">{{ $events->title }}</h5>
                    <p class="card-participantes">X Participantes</p>
                    <a href="/events/{{ $events->id }}" class="btn btn-primary">Saber mais</a>
                </div>
            </div>
       @endforeach
    </div>
 </div>
@endsection