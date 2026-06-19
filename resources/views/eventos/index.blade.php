@extends('adminlte::page')

@section('title', 'Comeback Eventos')

{{-- Injeta o CSS usando o Vite no local correto que o AdminLTE disponibiliza --}}
@section('css')
    @vite('resources/css/style.css')
@endsection

@section('content')
    {{-- Seção Hero customizada do seu CSS --}}
    <div class="hero rounded mb-4">
        <div class="conteudo">
            <h1>Comeback <span>Eventos</span></h1>
            <p>Gerencie seus eventos com facilidade e controle total em nossa plataforma reformulada.</p>
            
            <div class="act">
                <div><strong>Ações Rápidas:</strong> Acesso imediato à tabelas de métricas.</div>
                <div><strong>Monitoramento:</strong> Atualizações em tempo real dos status.</div>
            </div>

            {{-- Links com suas classes customizadas de botões --}}
            <a href="{{ route('eventos') }}" class="btn-principal d-inline-block text-center text-decoration-none">
                <i class="fas fa-calendar-alt mr-1"></i> Ir para Eventos
            </a>
            <a href="{{ route('table') }}" class="btn-topo d-inline-block text-center text-decoration-none ml-2">
                <i class="fas fa-table mr-1"></i> Ver Tabela
            </a>
        </div>
    </div>

    {{-- Exemplo de Grid de Eventos usando suas classes --}}
    <div class="eventos-bx">
        <h3 class="mb-4 text-white">Eventos em Destaque</h3>
        <div class="lista-eventos">
            
            {{-- Card de exemplo --}}
            <div class="evento-card">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT51BSZFV8GRWhwYjF4XqVtMlRqg082L37H6g&s" alt="Banner do Evento">
                <h4 class="mt-3 text-white">Nome do Evento</h4>
                <p class="text-sm text-center text-white-50">Descrição curta do que vai acontecer neste evento corporativo ou show.</p>
                <button class="btn btn-dark btn-sm w-100">Gerenciar</button>
            </div>

        </div>
    </div>
    <p>aueifbqetofqgtyqvo7qfgtwoufhwirugniwofmhwiwniygwomifhwiofgywigfryfq</p>
@endsection