@extends('adminlte::page')

@section('title', 'Cadastro evento')

@section('content')

<div class="row justify-content-center mt-5 ">
    <div class="col-md-6">
        <div class="card card-sucess">
            <div class="card-header">
                <h3 class="card-title">
                    Cadastro do Evento
                </h3>
            </div>

            <div class="card-body">

            <form method="POST" action="{{ route('eventos.store') }}" enctype="multipart/form-data">
                @csrf
               
                <div class="form-group">
                    <label>Nome do Evento solicitado</label>
                    <input type="text" name="Nome" class="form-control">

                    @error('Nome')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>

                <div class="form-group">
                    <label>Local do Evento solicitado</label>
                    <input type="text" name="Local" class="form-control">

                    @error('Local')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    
                </div>

                <div class="form-group">
                    <label>Data do Evento solicitado</label>
                    <input type="datetime-local" name="Data" class="form-control">

                    @error('Data')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                    <label>Preco do Evento solicitado</label>
                    <input type="number" name="PrecoIngresso" class="form-control">

                    @error('PrecoIngresso')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    
                    <div class="form-group">
                    <label>descrição do Evento solicitado</label>
                    <input type="text" name="descricao" class="form-control">

                    @error('descricao')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    
                    <div class="form-group">
                        <label> Imagem do evento</label>
                        <input type="file" name="image" class="form-control @error('image') is invalid @enderror">

                        @error('image')
                        <span class="text-danger">
                           {{ $message }} 
                        </span>
                        @enderror
                    </div>

                    <button class="btn btn-sucess">
                        Cadastrar
                    </button>
                </div>
                </div>
                    
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

@stop