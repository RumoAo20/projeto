@extends('adminlte::layouts.app')
@section('contentheader_title')
    Perfil de Produto
@endsection
@section('main-content')
    <section class="content">
        <div class="row">
            <div class="col-md-5">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle"
                             src="../../dist/img/user4-128x128.jpg" alt="User profile picture">

                        {{ Form::model($produto, array('route' => array('produtos.update', $produto->id), 'method' => 'PUT')) }}

                        <li class="list-group-item">
                            <a class="profile-username text-center"></a><b>Numero de registo {{ Form::text('numero_registo', null, array('class' => 'form')) }} {{Form::button('<i class="fa fa-pencil fa fa-white"></i>', ['class'=>'btn btn-info', 'type'=>'submit']) }}<ul class="list-group list-group-unbordered"></ul></b>
                        </li>
                        <li class="list-group-item">
                            <a class="pull-right"></a><b>CHNM {{ Form::text('chnm', null, array('class' => 'form')) }}</b> {{Form::button('<i class="fa fa-pencil fa fa-white"></i>', ['class'=>'btn btn-info', 'type'=>'submit']) }}<ul class="list-group list-group-unbordered"></ul>
                        </li>
                        <li class="list-group-item">
                            <a class="pull-right"></a><b>Descrição CHNM{{ Form::text('descricao_chnm', null, array('class' => 'form')) }}</b> {{Form::button('<i class="fa fa-pencil fa fa-white"></i>', ['class'=>'btn btn-info', 'type'=>'submit']) }}<ul class="list-group list-group-unbordered"></ul>
                        </li>
                        <li class="list-group-item">
                            <a class="pull-right"></a><b>Nome - Forma farmaceutica - Dosagem{{ Form::text('nome_forma_dosagem', null, array('class' => 'form')) }}</b> {{Form::button('<i class="fa fa-pencil fa fa-white"></i>', ['class'=>'btn btn-info', 'type'=>'submit']) }}<ul class="list-group list-group-unbordered"></ul>
                        </li>

                        </ul>
                        {{ Form::close() }}
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection