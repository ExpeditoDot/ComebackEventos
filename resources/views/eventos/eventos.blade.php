@extends('adminlte::page')

@section('title', 'Meus Eventos - Comeback Eventos')

@section('css')
    @vite('resources/css/style.css')
@endsection

@section('content_header')
    <div class="d-flex justify-content-between align-items-center pr-2">
        <h1 class="text-white">Gerenciar Eventos</h1>
          <a href="{{ route('eventos.create') }}" class="btn btn-danger font-weight-bold">
            <i class="fas fa-plus-circle mr-1"></i> Novo Evento
        </a>
    </div>
@endsection

@section('content')
    <div class="eventos-bx">
        
         @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <i class="icon fas fa-check-circle mr-1"></i> {{ session('success') }}
            </div>
        @endif

        <div class="lista-eventos">
            
           @forelse ($eventos as $evento)
                <div class="evento-card">
                    
                  @if($evento->image)
                        <img src="{{ asset('storage/' . $evento->image) }}" class="evento-card-img" alt="Banner do Evento">
                    @else
                         <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?q=80&w=2070&auto=format&fit=crop" class="evento-card-img" alt="Banner Padrão">
                    @endif
                    
                    <div class="evento-card-body">
                        <h4 class="text-white font-weight-bold">{{ $evento->Nome }}</h4>
                        
                       <span class="badge badge-danger mb-2">R$ {{ number_format($evento->PrecoIngresso, 2, ',', '.') }}</span>
                        
                              <p class="text-xs text-white-50">
                            <i class="fas fa-calendar-day mr-1"></i> 
                            {{ date('d/m/Y H:i', strtotime($evento->Data)) }}
                        </p>
                        
                      <p class="text-xs text-white-50">
                            <i class="fas fa-map-marker-alt mr-1"></i> {{ $evento->Local }}
                        </p>
                    </div>

                   <div class="w-100 d-flex justify-content-between">
                        <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-sm btn-outline-light w-50 mr-1">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        
                        <button type="button" class="btn btn-sm btn-danger w-50" onclick="if(confirm('Tem certeza que deseja remover este evento?')) { document.getElementById('form-delete-{{ $evento->id }}').submit(); }">
                            <i class="fas fa-trash"></i> Excluir
                        </button>

                         <form id="form-delete-{{ $evento->id }}" action="{{ route('eventos.destroy', $evento->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
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