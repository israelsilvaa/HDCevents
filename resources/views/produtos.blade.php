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
        
    <p>Equipe:</p>
    
    @foreach ($chaveNomes as $nome)
    <spam>{{$nome}},</spam>
    @endforeach
    
    <p>Email: {{$chaveEmail}}</p>
    <p>Telefone: {{$chaveTelefone}}</p>
    
    @for($i = 0; $i < count($chaveArray);  $i++)
        {{-- este é um comentário do blade, portanto não aparecerá no HTML --}}
        <spam>{{$chaveArray[$i]}}</spam>
        
        @if($i == 2)
        <p>chave do {{$chaveArray[$i]}} é igual a 2</p>
        @endif
    @endfor
    {{-- <img src="/img/banner.jpg" alt=""> --}}
    
{{-- indicar o fim do conteudo para a section do blade --}}
@endsection     
