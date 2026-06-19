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
                                    <th>Status</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#001</td>
                                    <td class="font-weight-bold text-white">Show de Rock Comeback</td>
                                    <td>Arena Central</td>
                                    <td>25/11/2026</td>
                                    <td><span class="badge badge-success">Confirmado</span></td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-outline-light mr-1"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>#002</td>
                                    <td class="font-weight-bold text-white">Conferência Tech 2026</td>
                                    <td>Auditório Alfa</td>
                                    <td>12/12/2026</td>
                                    <td><span class="badge badge-warning">Pendente</span></td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-outline-light mr-1"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>#003</td>
                                    <td class="font-weight-bold text-white">Festa de Fim de Ano</td>
                                    <td>Salão Nobre</td>
                                    <td>31/12/2026</td>
                                    <td><span class="badge badge-secondary">Planejado</span></td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-outline-light mr-1"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection