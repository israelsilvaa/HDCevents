{{-- qual o layouts sera utilizado --}}
@extends('layouts.main')

{{-- qual titulo, indicando o nome e o campo "title" --}}
@section('title', 'Produtos')

{{-- inicio do conteudo --}}
@section('content')
    
    <h1>Produtos</h1>
    <spam>
        COTIC
        <a href="/">| HOME |</a>
    </spam>
        
    
    <a href="/produto_teste/id=90">produto buscar</a>

<br>
    <a href="/produtos/?search=sapato">Fazer buscar por SAPATO</a>


    @if($busca != '')
        <p>o usuario esta buscando por {{$busca}}</p>
    @endif

{{-- indicar o fim do conteudo para a section do blade --}}
@endsection     
