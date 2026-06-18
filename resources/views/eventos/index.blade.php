@extends('adminlte::page')

@define('title','Lista de Eventos')

@section('content')

@vite('resources/css/style.css')

<header>
    <div class="image"><a href="/">Comeback Eventos</a>

 <nav>
        <a href="{{ route('eventos') }}">Eventos</a>
        <a href="{{ route('table') }}">Tabela</a>
    </nav>
</header>

@endsection

