@extends('adminlte::layouts.app')
@section('contentheader_title')
    Gestão de Fornecedores
@endsection
@section('main-content')
    <div style="float:right;">
        <a href="{{ URL::to('gestao/fornecedores/create') }}">
            <button type="button" class="btn btn-block btn-primary">
                <i class='fa fa-link'></i> Adicionar Fornecedor
            </button>
        </a><br><br>
    </div>
    <br><br>
    <div class="box box-primary">
        <div class="row">
            <div class="col-sm-12">
                <div class="box-body">
                    <table class="table table-hover table-condensed"
                           style="width:100%" id="fornecedores-table">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>NIF</th>
                            <th>Morada</th>
                            <th>Telemovel</th>
                            <th>Email</th>
                            <th>Tipo de produto</th>
                            <th>Designação comercial</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>



@push('scriptDatatables')
    <script>
        $(function() {
            $('#fornecedores-table').DataTable({
                language: {
                    url: '//cdn.datatables.net/plugins/1.10.16/i18n/Portuguese.json'
                },
                processing: true,
                serverSide: true,
                ajax: '{!! route('fornecedores.getFornecedores') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'nome', name: 'nome' },
                    { data: 'nif', name: 'nif' },
                    { data: 'morada', name: 'morada' },
                    { data: 'telemovel', name: 'telemovel' },
                    { data: 'email', name: 'email' },
                    { data: 'tipoProduto', name: 'tipoProduto' },
                    { data: 'designacaoComercial', name: 'designacaoComercial' },
                    { data: 'encomendar', name: 'encomendar', orderable: false,
                        searchable: false},
                    { data: 'estado', name: 'estado', orderable: false,
                        searchable: false},
                    { data: 'action', name: 'action', orderable: false,
                        searchable: false}
                ]
            });
        });
    </script>
    @endpush

    </div>

@stop
