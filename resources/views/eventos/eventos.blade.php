@extends('adminlte::page')

@section('title', 'Cartaz de Eventos - Comeback Eventos')

@section('css')
    @vite('resources/css/style.css')
@endsection

@section('content_header')
    <div class="d-flex justify-content-between align-items-center pr-2">
        <h1 class="text-white font-weight-bold">Cartaz de Filmes & Eventos</h1>
        <a href="{{ route('eventos.create') }}" class="btn btn-danger font-weight-bold">
            <i class="fas fa-plus-circle mr-1"></i> Novo Evento
        </a>
    </div>
@endsection

@section('content')
    <div class="container-fluid px-0">
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <i class="icon fas fa-check-circle mr-1"></i> {{ session('success') }}
            </div>
        @endif

        <div class="row">
            
            @forelse ($eventos as $evento)
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4"></div>
                    <div class="cinema-card">
                        
                         <div class="cinema-poster-wrapper">
                            @if($evento->image)
                                <img src="{{ asset('storage/' . $evento->image) }}" class="cinema-poster" alt="Cartaz do Evento">
                            @else
                                <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?q=80&w=2070&auto=format&fit=crop" class="cinema-poster" alt="Cartaz Padrão">
                            @endif

                            <div class="cinema-badge">
                                @if($evento->PrecoIngresso)
                                    R$ {{ number_format($evento->PrecoIngresso, 2, ',', '.') }}
                                @else
                                    Gratuito
                                @endif
                            </div>

                             <div class="cinema-actions">
                                <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-xs btn-light mr-1" title="Editar">
                                    <i class="fas fa-edit text-dark"></i>
                                </a>
                                <button type="button" class="btn btn-xs btn-danger" title="Excluir" onclick="if(confirm('Tem certeza que deseja remover este evento?')) { document.getElementById('form-delete-{{ $evento->id }}').submit(); }">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <form id="form-delete-{{ $evento->id }}" action="{{ route('eventos.destroy', $evento->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>
                        
                            <div class="cinema-card-body mt-2">
                            <h5 class="cinema-title text-white font-weight-bold text-truncate mb-1" title="{{ $evento->Nome }}">
                                {{ $evento->Nome }}
                            </h5>
                            <p class="cinema-meta text-muted text-truncate mb-0">
                                <i class="fas fa-map-marker-alt text-danger mr-1"></i> {{ $evento->Local }}
                            </p>
                            <p class="cinema-meta text-muted mb-0">
                                <i class="fas fa-calendar-day mr-1"></i> {{ date('d/m/Y', strtotime($evento->Data)) }}
                            </p>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted"><i class="fas fa-calendar-times fa-3x mb-3 d-block"></i> Nenhum evento cadastrado no momento.</p>
                </div>
            @endforelse

        </div>

       
        <div class="d-flex justify-content-center mt-4 bg-dark p-2 rounded">
            {{ $eventos->links('pagination::bootstrap-4') }}
        </div>

    </div>
@endsection