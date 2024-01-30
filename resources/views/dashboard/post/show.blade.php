@extends('dashboard.layout')

@section('content')

<h1>Titulo: {{ $post -> title}}</h1>

    <p>Descripcion: {{$post->description}}</p>
    <p>Posteado: {{$post->posted}}</p>
    <div>Contenido: {{$post->content}}</div>



@endsection


