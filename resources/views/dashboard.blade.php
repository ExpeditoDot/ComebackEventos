@extends('adminlte::page')

@section('title', 'Painel de Eventos')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1><i class="fas fa-calendar-alt text-danger"></i> Painel União Festas</h1>
        <a href="{{ route('eventos.create') }}" class="btn btn-danger font-weight-bold" style="background-color: #ff4444; border-color: #ff4444;">
            <i class="fas fa-plus-circle"></i> Novo Evento
        </a>
    </div>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="icon fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card card-danger card-outline">
        <div class="card-body bg-dark text-white p-0">
            <div class="table-responsive">
                <table class="table table-dark table-striped table-hover m-0">
                    <thead>
                        <tr class="text-danger">
                            <th>ID</th>
                            <th>Imagem</th>
                            <th>Nome do Evento</th>
                            <th>Local</th>
                            <th>Data/Hora</th>
                            <th>Preço</th>
                            <th>Descrição</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($eventos as $evento)
                            <tr>
                                <td>{{ $evento->id }}</td>
                                <td>
                                    @if($evento->image)
                                        <img src="{{ asset('storage/' . $evento->image) }}" alt="Banner" class="img-thumbnail" style="max-height: 50px; background-color: #333; border-color: #555;">
                                    @else
                                        <span class="badge badge-secondary">Sem Foto</span>
                                    @endif
                                </td>
                                <td class="font-weight-bold">{{ $evento->nome }}</td>
                                <td>{{ $evento->local }}</td>
                                <td>{{ date('d/m/Y H:i', strtotime($evento->data)) }}</td>
                                <td>
                                    @if($evento->preco_ingresso)
                                        R$ {{ number_format($evento->preco_ingresso, 2, ',', '.') }}
                                    @else
                                        <span class="text-success">Gratuito</span>
                                    @endif
                                </td>
                                <td><small>{{ Str::limit($evento->descricao, 40) }}</small></td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-info mr-1" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja remover este evento?');" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" title="Excluir">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4 text-muted">
                                    <i class="fas fa-calendar-times fa-2x d-block mb-2"></i>
                                    Nenhum evento solicitado ou cadastrado no sistema.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop