@extends('adminlte::page')

@section('title', 'Editar Evento')

@section('content')

<div class="row justify-content-center pt-5">
    <div class="col-md-8">
        <div class="card card-info">
            <div class="card-header" style="background-color: #17a2b8; color: white;">
                <h3 class="card-title">
                    <i class="fas fa-edit mr-2"></i> Editar Evento #{{ $evento->id }}
                </h3>
            </div>

            <div class="card-body bg-dark text-white">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5><i class="icon fas fa-ban"></i> Atenção!</h5>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('eventos.update', $evento->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                   <div class="form-group">
                        <label for="Nome">Nome do Evento</label>
                        <input type="text" name="Nome" id="Nome" class="form-control @error('Nome') is-invalid @enderror" value="{{ old('Nome', $evento->Nome) }}">
                        @error('Nome')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Local">Local do Evento</label>
                        <input type="text" name="Local" id="Local" class="form-control @error('Local') is-invalid @enderror" value="{{ old('Local', $evento->Local) }}">
                        @error('Local')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                     <div class="form-group">
                        <label for="Data">Data do Evento</label>
                        <input type="datetime-local" name="Data" id="Data" class="form-control @error('Data') is-invalid @enderror" value="{{ old('Data', $evento->Data ? date('Y-m-d\TH:i', strtotime($evento->Data)) : '') }}">
                        @error('Data')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                          <div class="form-group">
                        <label for="PrecoIngresso">Preço do Ingresso</label>
                        <input type="number" step="0.01" name="PrecoIngresso" id="PrecoIngresso" class="form-control @error('PrecoIngresso') is-invalid @enderror" value="{{ old('PrecoIngresso', $evento->PrecoIngresso) }}">
                        @error('PrecoIngresso')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                       <div class="form-group">
                        <label for="descricao">Descrição do Evento</label>
                        <textarea name="descricao" id="descricao" rows="3" class="form-control @error('descricao') is-invalid @enderror">{{ old('descricao', $evento->descricao) }}</textarea>
                        @error('descricao')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                   
                    <div class="form-group">
                        <label for="image">Imagem do evento (Deixe em branco para manter a atual)</label>
                        @if($evento->image)
                            <div class="mb-2">
                                <small class="d-block text-muted">Imagem atual:</small>
                                <img src="{{ asset('storage/' . $evento->image) }}" alt="Imagem do Evento" style="max-height: 80px; border-radius: 4px;">
                            </div>
                        @endif
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="image" id="image" class="custom-file-input">
                                <label class="custom-file-label" for="image">Escolher novo arquivo...</label>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 d-flex justify-content-between">
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                        <button type="submit" class="btn btn-info font-weight-bold">
                            <i class="fas fa-sync-alt"></i> Atualizar Evento
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@stop