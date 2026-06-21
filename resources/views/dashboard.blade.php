@extends('adminlte::page')

@section('title', 'Dashboard - Comeback Eventos')

@section('content_header')
    <h1 class="text-white font-weight-bold">Dashboard Inicial</h1>
@endsection

@section('content')
    <div class="container-fluid">
        
        {{-- Linha de Cartões de Indicadores (Widgets) --}}
        <div class="row">
            
            {{-- Indicador 1: Total de Eventos --}}
            <div class="col-lg-4 col-6">
                <div class="small-box bg-info shadow-sm" style="border-radius: 12px; overflow: hidden;">
                    <div class="inner p-4">
                        <h3 class="font-weight-bold">{{ $totalEventos }}</h3>
                        <p class="text-uppercase tracking-wide font-weight-bold text-sm m-0">Total de Eventos</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <a href="{{ route('eventos.cards') }}" class="small-box-footer py-2">
                        Ver Cartazes <i class="fas fa-arrow-circle-right ml-1"></i>
                    </a>
                </div>
            </div>

            {{-- Indicador 2: Eventos Pagos --}}
            <div class="col-lg-4 col-6">
                <div class="small-box bg-danger shadow-sm" style="border-radius: 12px; overflow: hidden;">
                    <div class="inner p-4">
                        <h3 class="font-weight-bold">{{ $totalPagos }}</h3>
                        <p class="text-uppercase tracking-wide font-weight-bold text-sm m-0">Eventos com Bilheteria</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-ticket-alt"></i>
                    </div>
                    <a href="{{ route('eventos.tabela') }}" class="small-box-footer py-2">
                        Ver Tabela de Métricas <i class="fas fa-arrow-circle-right ml-1"></i>
                    </a>
                </div>
            </div>

            {{-- Indicador 3: Eventos Gratuitos --}}
            <div class="col-lg-4 col-12">
                <div class="small-box bg-success shadow-sm" style="border-radius: 12px; overflow: hidden;">
                    <div class="inner p-4">
                        <h3 class="font-weight-bold">{{ $totalGratuitos }}</h3>
                        <p class="text-uppercase tracking-wide font-weight-bold text-sm m-0">Eventos Gratuitos</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-laugh-beam"></i>
                    </div>
                    <a href="{{ route('eventos.cards') }}" class="small-box-footer py-2">
                        Ver Todos <i class="fas fa-arrow-circle-right ml-1"></i>
                    </a>
                </div>
            </div>

        </div>

        {{-- Bloco de Boas-Vindas --}}
        <div class="row mt-3">
            <div class="col-12">
                <div class="card bg-neutral-900 border-secondary text-white" style="background: #121212; border: 1px solid #222; border-radius: 12px;">
                    <div class="card-body p-4 text-center">
                        <h4 class="font-weight-bold text-danger">Bem-vindo ao Sistema Administrativo da Comeback Eventos</h4>
                        <p class="text-muted m-0 mt-2">Utilize o menu lateral para gerenciar as atrações, visualizar métricas consolidadas ou emitir novos registros.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection