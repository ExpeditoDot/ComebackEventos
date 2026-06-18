@extends('adminlte::page')

@section('title', 'Meus Eventos - Comeback Eventos')

@section('css')
    @vite('resources/css/style.css')
@endsection

@section('content_header')
    <div class="d-flex justify-content-between align-items-center pr-2">
        <h1 class="text-white">Gerenciar Eventos</h1>
        <a href="#" class="btn btn-danger font-weight-bold">
            <i class="fas fa-plus-circle mr-1"></i> Novo Evento
        </a>
    </div>
@endsection

@section('content')
    <div class="eventos-bx">
        <div class="lista-eventos">
            
            {{-- Card 1 --}}
            <div class="evento-card">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT51BSZFV8GRWhwYjF4XqVtMlRqg082L37H6g&s" class="evento-card-img" alt="Banner">
                
                <div class="evento-card-body">
                    <h4 class="text-white font-weight-bold">Show de Rock Comeback</h4>
                    <span class="badge badge-success mb-2">Confirmado</span>
                    <p class="text-xs text-white-50">
                        <i class="fas fa-calendar-day mr-1"></i> 25/11/2026
                    </p>
                    <p class="text-xs text-white-50">
                        <i class="fas fa-map-marker-alt mr-1"></i> Arena Central
                    </p>
                </div>

                <div class="w-100 d-flex justify-content-between">
                    <a href="#" class="btn btn-sm btn-outline-light w-50 mr-1">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <button class="btn btn-sm btn-danger w-50">
                        <i class="fas fa-trash"></i> Excluir
                    </button>
                </div>
            </div>

            {{-- Card 2 --}}
            <div class="evento-card">
                <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?q=80&w=2070&auto=format&fit=crop" class="evento-card-img" alt="Banner">
                
                <div class="evento-card-body">
                    <h4 class="text-white font-weight-bold">Conferência Tech 2026</h4>
                    <span class="badge badge-warning mb-2">Pendente</span>
                    <p class="text-xs text-white-50">
                        <i class="fas fa-calendar-day mr-1"></i> 12/12/2026
                    </p>
                    <p class="text-xs text-white-50">
                        <i class="fas fa-map-marker-alt mr-1"></i> Auditório Alfa
                    </p>
                </div>

                <div class="w-100 d-flex justify-content-between">
                    <a href="#" class="btn btn-sm btn-outline-light w-50 mr-1">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <button class="btn btn-sm btn-danger w-50">
                        <i class="fas fa-trash"></i> Excluir
                    </button>
                </div>
            </div>

            {{-- Card 3 --}}
            <div class="evento-card">
                <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?q=80&w=2070&auto=format&fit=crop" class="evento-card-img" alt="Banner">
                
                <div class="evento-card-body">
                    <h4 class="text-white font-weight-bold">Festa de Fim de Ano</h4>
                    <span class="badge badge-secondary mb-2">Planejado</span>
                    <p class="text-xs text-white-50">
                        <i class="fas fa-calendar-day mr-1"></i> 31/12/2026
                    </p>
                    <p class="text-xs text-white-50">
                        <i class="fas fa-map-marker-alt mr-1"></i> Salão Nobre
                    </p>
                </div>

                <div class="w-100 d-flex justify-content-between">
                    <a href="#" class="btn btn-sm btn-outline-light w-50 mr-1">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <button class="btn btn-sm btn-danger w-50">
                        <i class="fas fa-trash"></i> Excluir
                    </button>
                </div>
            </div>

        </div>
    </div>
@endsection