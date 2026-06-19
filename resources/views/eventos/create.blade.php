@extends('adminlte::page')

@section('title', 'Cadastrar Evento - Comeback Eventos')

@section('content')
<div class="row justify-content-center pt-5">
    <div class="col-md-8">
        <div class="card card-danger">
            <div class="card-header border-bottom border-danger" style="background-color: #111;">
                <h3 class="card-title text-white font-weight-bold">
                    <i class="fas fa-plus-circle mr-2"></i> Cadastrar Novo Evento
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

                <form method="POST" action="{{ route('eventos.store') }}" enctype="multipart/form-data">
                    @csrf
                    
                     <div class="form-group">
                        <label for="Nome">Nome do Evento</label>
                        <input type="text" name="Nome" id="Nome" class="form-control @error('Nome') is-invalid @enderror" value="{{ old('Nome') }}" placeholder="Ex: Show de Rock Comeback">
                        @error('Nome')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                      <div class="form-group">
                        <label for="Local">Local do Evento</label>
                        <input type="text" name="Local" id="Local" class="form-control @error('Local') is-invalid @enderror" value="{{ old('Local') }}" placeholder="Ex: Arena Central">
                        @error('Local')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                  <div class="form-group">
                        <label for="Data">Data e Hora do Evento</label>
                        <input type="datetime-local" name="Data" id="Data" class="form-control @error('Data') is-invalid @enderror" value="{{ old('Data') }}">
                        @error('Data')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                     <div class="form-group">
                        <label for="PrecoIngresso">Preço do Ingresso</label>
                        <input type="number" step="0.01" name="PrecoIngresso" id="PrecoIngresso" class="form-control @error('PrecoIngresso') is-invalid @enderror" value="{{ old('PrecoIngresso') }}" placeholder="0.00">
                        @error('PrecoIngresso')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                        <div class="form-group">
                        <label for="descricao">Descrição do Evento</label>
                        <textarea name="descricao" id="descricao" rows="3" class="form-control @error('descricao') is-invalid @enderror" placeholder="Insira os detalhes do evento...">{{ old('descricao') }}</textarea>
                        @error('descricao')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                   
                    <div class="form-group">
                        <label for="image">Imagem do Banner</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="image" id="image" class="custom-file-input">
                                <label class="custom-file-label" for="image">Escolher arquivo de imagem...</label>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 d-flex justify-content-between">
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                        <button type="submit" class="btn btn-danger font-weight-bold">
                            <i class="fas fa-save"></i> Salvar Evento
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@stop