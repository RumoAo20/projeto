@extends('adminlte::layouts.app')
@section('contentheader_title')
    Perfil do Colaborador
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

                        {{ Form::model($colaborador, array('route' => array('colaboradores.update', $colaborador->id), 'method' => 'PUT')) }}

                        <li class="list-group-item">
                            <a class="profile-username text-center"></a><b>Nome {{ Form::text('name', null, array('class' => 'form')) }} {{Form::button('<i class="fa fa-pencil fa fa-white"></i>', ['class'=>'btn btn-info', 'type'=>'submit']) }}<ul class="list-group list-group-unbordered"></ul></b>
                        </li>
                        <li class="list-group-item">
                            <a class="pull-right"></a><b>Email{{ Form::text('email', null, array('class' => 'form')) }}</b> {{Form::button('<i class="fa fa-pencil fa fa-white"></i>', ['class'=>'btn btn-info', 'type'=>'submit']) }}<ul class="list-group list-group-unbordered"></ul>
                        </li>
                        <li class="list-group-item">
                            <a class="pull-right"></a><b>Password{{ Form::text('password', null, array('class' => 'form')) }}</b> {{Form::button('<i class="fa fa-pencil fa fa-white"></i>', ['class'=>'btn btn-info', 'type'=>'submit']) }}<ul class="list-group list-group-unbordered"></ul>
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