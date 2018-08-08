@extends('adminlte::layouts.app')
@section('contentheader_title')
    Gestão de Colaboradores
@endsection
@section('main-content')
    <div style="float:right;">
        <a href="{{ URL::to('gestao/colaboradores/create') }}">
            <button type="button" class="btn btn-block btn-primary">
                <i class="fa fa-plus"></i> Adicionar Colaborador
            </button>
        </a><br><br>
    </div>
    <br><br>
    <div class="box box-primary">
        <div class="row">
            <div class="col-sm-12">
                <div class="box-body">
                    <table class="table table-hover table-condensed"
                           style="width:100%" id="users-table">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Perfil</th>
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
                    $('#users-table').DataTable({
                        language: {
                            url: '//cdn.datatables.net/plugins/1.10.16/i18n/Portuguese.json'
                        },
                        processing: true,
                        serverSide: true,
                        ajax: '{!! route('colaboradores.getColaboradores') !!}',
                        columns: [
                            { data: 'id', name: 'id' },
                            { data: 'name', name: 'name' },
                            { data: 'email', name: 'email' },
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
