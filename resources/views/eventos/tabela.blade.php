@extends('adminlte::page')

@section('title', 'Tabela de Eventos - Comeback Eventos')

@section('css')
    @vite('resources/css/style.css')
@endsection

@section('content_header')
    <div class="d-flex justify-content-between align-items-center pr-2">
        <h1 class="text-white">Métricas e Registros</h1>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="icon fas fa-check-circle mr-1"></i> {{ session('success') }}
                </div>
            @endif
            
            <div class="card bg-dark border border-secondary">
                <div class="card-header border-bottom border-danger" style="background-color: #111;">
                    <h3 class="card-title text-white font-weight-bold">
                        <i class="fas fa-list mr-1"></i> Lista Geral de Eventos
                    </h3>
                </div>
                
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-dark-custom table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome do Evento</th>
                                    <th>Localização</th>
                                    <th>Data</th>
                                    <th>Preço</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($eventos as $evento)
                                    <tr>
                                        
                                        <td>#{{ str_pad($evento->id, 3, '0', STR_PAD_LEFT) }}</td>
                                        
                                        
                                        <td class="font-weight-bold text-white">{{ $evento->Nome }}</td>
                                        
                                       
                                        <td>{{ $evento->Local }}</td>
                                        
                                        
                                        <td>{{ date('d/m/Y H:i', strtotime($evento->Data)) }}</td>
                                        
                                       
                                        <td>
                                            @if($evento->PrecoIngresso)
                                                R$ {{ number_format($evento->PrecoIngresso, 2, ',', '.') }}
                                            @else
                                                <span class="text-success">Gratuito</span>
                                            @endif
                                        </td>
                                        
                                       <td class="text-center">
                                       <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-sm btn-outline-light mr-1" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            
                                           <button type="button" class="btn btn-sm btn-danger" title="Excluir" onclick="if(confirm('Tem certeza que deseja deletar este evento?')) { document.getElementById('form-table-delete-{{ $evento->id }}').submit(); }">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                             <form id="form-table-delete-{{ $evento->id }}" action="{{ route('eventos.destroy', $evento->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4 text-muted">
                                            <i class="fas fa-calendar-times mr-1"></i> Nenhum registro encontrado.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

           <div class="d-flex justify-content-center mt-3 bg-dark p-2 rounded">
                {{ $eventos->links('pagination::bootstrap-4') }}
            </div>

        </div>
    </div>
@endsection