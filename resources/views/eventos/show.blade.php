@extends('adminlte::page')

@section('title', $evento->Nome . ' - Detalhes')

@section('css')
    @vite('resources/css/style.css')
@endsection

@section('content_header')
    <div class="d-flex justify-content-between align-items-center pr-2">
        <h1 class="text-white font-weight-bold">Detalhes do Evento</h1>
        <a href="{{ route('eventos.cards') }}" class="btn btn-secondary font-weight-bold">
            <i class="fas fa-arrow-left mr-1"></i> Voltar para os Cartazes
        </a>
    </div>
@endsection

@section('content')
    <div class="container-fluid px-0">
        <div class="row">
            
            {{-- Coluna 1: O Cartaz Gigante --}}
            <div class="col-md-4 mb-4">
                <div class="cinema-card p-0" style="overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.7); border-radius: 12px;">
                    <div class="cinema-poster-wrapper" style="padding-top: 145%;">
                        @if($evento->image)
                            <img src="{{ asset('storage/' . $evento->image) }}" class="cinema-poster" alt="Cartaz">
                        @else
                            <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?q=80&w=2070&auto=format&fit=crop" class="cinema-poster" alt="Padrão">
                        @endif
                    </div>
                </div>
            </div>

            {{-- Coluna 2: As Informações Detalhadas --}}
            <div class="col-md-8 mb-4">
                <div class="card h-100 p-4 text-white" style="background: #121212; border: 1px solid #222; border-radius: 12px;">
                    
                    {{-- Título Principal --}}
                    <h2 class="display-5 font-weight-bold text-danger mb-3">{{ $evento->Nome }}</h2>
                    <hr class="border-secondary mb-4">

                    {{-- Detalhes --}}
                    <div class="space-y-4">
                        <div class="mb-3">
                            <strong class="text-muted uppercase tracking-wider d-block mb-1"><i class="fas fa-map-marker-alt text-danger mr-2"></i> Localização:</strong>
                            <span class="h5 font-weight-normal">{{ $evento->Local }}</span>
                        </div>

                        <div class="mb-3">
                            <strong class="text-muted uppercase tracking-wider d-block mb-1"><i class="fas fa-calendar-alt text-danger mr-2"></i> Data do Evento:</strong>
                            <span class="h5 font-weight-normal">{{ date('d/m/Y', strtotime($evento->Data)) }}</span>
                        </div>

                        <div class="mb-4">
                            <strong class="text-muted uppercase tracking-wider d-block mb-1"><i class="fas fa-ticket-alt text-danger mr-2"></i> Valor do Ingresso:</strong>
                            <span class="badge {{ $evento->PrecoIngresso ? 'badge-danger' : 'badge-success' }} px-3 py-2 text-md font-weight-bold">
                                @if($evento->PrecoIngresso)
                                    R$ {{ number_format($evento->PrecoIngresso, 2, ',', '.') }}
                                @else
                                    Entrada Gratuita
                                @endif
                            </span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection