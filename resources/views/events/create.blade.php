@extends('layouts.main')

@section('title', 'Criar evento')

@section('content')

    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Crie seu evento</h1>
        <form action="/events" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-gourp">
                <label for="image">Image do evento:</label>
                <input type="file" id="image" name="image" class="form-control-life"></input>
            </div>
            <div class="form-gourp">
                <label for="title">Nome do evento?</label>
                <input type="text" class="form-control" id="title" name="title" required placeholder="Curso de PHP"></input>
            </div>
            <div class="form-gourp">
                <label for="">Descrição</label>
                <textarea class="form-control" id="description" required name="description" placeholder="Introdução a php"></textarea>
            </div>
            <div class="form-gourp">
                <label for="city">Cidade:</label>
                <input type="text" class="form-control" id="city" name="city" required placeholder="Marituba"></input>
            </div>
            <div class="form-gourp">
                <label for="title">É privado?</label>
                <select name="private" id="private" required class="fomr-control">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" value="Criar envento">
        </form>
    </div>

@endsection