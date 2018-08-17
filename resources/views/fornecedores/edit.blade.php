@extends('adminlte::layouts.app')
@section('contentheader_title')
    Perfil do Fornecedor
@endsection
@section('main-content')


    {{--Lista com erros do formulario--}}

    <div class ='alert alert-error'>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>


    {{--Mensagem de sucesso--}}
    @if(Session::has('message'))
        <div class="alert alert-{{ Session::get('message-type') }} alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <i class="glyphicon glyphicon-{{ Session::get('message-type') == 'success' ? 'ok' : 'remove'}}"></i> {{ Session::get('message') }}
        </div>
    @endif


    <section class="content">
        <div class="row">
            <div class="col-md-5">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle"
                             src="../../dist/img/user4-128x128.jpg" alt="User profile picture">

                        {{ Form::model($fornecedor, array('route' => array('fornecedores.update', $fornecedor->id), 'method' => 'PUT')) }}

                        <li class="list-group-item">
                            <a class="profile-username text-center"></a><b>Nome {{ Form::text('nome', null, array('class' => 'form')) }} {{Form::button('<i class="fa fa-pencil fa fa-white"></i>', ['class'=>'btn btn-info', 'type'=>'submit']) }}<ul class="list-group list-group-unbordered"></ul></b>
                        </li>
                        <li class="list-group-item">
                            <a class="pull-right"></a><b>Nif {{ Form::text('nif', null, array('class' => 'form')) }}</b> {{Form::button('<i class="fa fa-pencil fa fa-white"></i>', ['class'=>'btn btn-info', 'type'=>'submit']) }}<ul class="list-group list-group-unbordered"></ul>
                        </li>
                        <li class="list-group-item">
                            <a class="pull-right"></a><b>Morada {{ Form::text('morada', null, array('class' => 'form')) }}</b> {{Form::button('<i class="fa fa-pencil fa fa-white"></i>', ['class'=>'btn btn-info', 'type'=>'submit']) }}<ul class="list-group list-group-unbordered"></ul>
                        </li>
                        <li class="list-group-item">
                            <a class="pull-right"></a><b>Nº tlm {{ Form::text('telemovel', null, array('class' => 'form')) }}</b> {{Form::button('<i class="fa fa-pencil fa fa-white"></i>', ['class'=>'btn btn-info', 'type'=>'submit']) }}<ul class="list-group list-group-unbordered"></ul>
                        </li>
                        <li class="list-group-item">
                            <a class="pull-right"></a><b>Email{{ Form::text('email', null, array('class' => 'form')) }}</b> {{Form::button('<i class="fa fa-pencil fa fa-white"></i>', ['class'=>'btn btn-info', 'type'=>'submit']) }}<ul class="list-group list-group-unbordered"></ul>
                        </li>
                        <li class="list-group-item">
                            <a class="pull-right"></a><b>Tipo de produto{{ Form::text('tipoProduto', null, array('class' => 'form')) }}</b> {{Form::button('<i class="fa fa-pencil fa fa-white"></i>', ['class'=>'btn btn-info', 'type'=>'submit']) }}<ul class="list-group list-group-unbordered"></ul>
                        </li>
                        <li class="list-group-item">
                            <a class="pull-right"></a><b>Designação comercial {{ Form::text('designacaoComercial', null, array('class' => 'form')) }}</b> {{Form::button('<i class="fa fa-pencil fa fa-white"></i>', ['class'=>'btn btn-info', 'type'=>'submit']) }}<ul class="list-group list-group-unbordered">
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