@extends('adminlte::layouts.app')
@section('contentheader_title')
    Perfil do Cliente
@endsection
24
@section('main-content')
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle"
                             src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
                        <h3 class="profile-username text-center">{{ $cliente->nome }}</h3>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Nif</b> <a class="pull-right">{{ $cliente->nif }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Morada</b> <a class="pull-right">{{ $cliente->morada }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Nº tlm</b> <a class="pull-right">{{ $cliente->telemovel }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> <a class="pull-right">{{ $cliente->email }}</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection