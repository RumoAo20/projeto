@extends('adminlte::layouts.app')
@section('contentheader_title')
    Gestão de Produtos
@endsection
@section('main-content')
    <div style="float:right;">
        <a href="{{ URL::to('gestao/produtos/create') }}">
            <button type="button" class="btn btn-block btn-primary">
                <i class="fa fa-plus"></i> Adicionar Produto
            </button>
        </a><br><br>
    </div>
    <br><br>
    <div class="box box-primary">
        <div class="row">
            <div class="col-sm-12">
                <div class="box-body">
                    <table class="table table-hover table-condensed"
                           style="width:100%" id="produtos-table">
                        <thead>
                        <tr>
                            <th>Número de Registo</th>
                            <th>CHNM</th>
                            <th>Descrição CHNM</th>
                            <th>Nome  -  Forma farmaceutica  -  Dosagem</th>
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
                    $('#produtos-table').DataTable({
                        language: {
                            url: '//cdn.datatables.net/plugins/1.10.16/i18n/Portuguese.json'
                        },
                        processing: true,
                        serverSide: true,
                        ajax: '{!! route('produtos.getProdutos') !!}',
                        columns: [
                            { data: 'numero_registo', name: 'numero_registo' },
                            { data: 'chnm', name: 'chnm' },
                            { data: 'descricao_chnm', name: 'descricao_chnm'},
                            { data: 'nome_forma_dosagem', name: 'nome_forma_dosagem'},
                            { data: 'encomendar', name: 'encomendar', orderable: false,
                                searchable: false},
                            { data: 'perfil', name: 'perfil', orderable: false,
                                searchable: false},
                            { data: 'apaga', name: 'apaga', orderable: false,
                                searchable: false}
                        ]
                    });
                });
            </script>
        @endpush
    </div>
@stop