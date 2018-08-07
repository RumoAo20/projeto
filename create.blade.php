@extends('adminlte::layouts.app')
@section('contentheader_title')
    Criar novo colaborador
@endsection

@section('main-content')
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">

                        {!! Form::open(['url' => 'gestao/colaboradores/store']) !!}

                        {!! Form::label('name', 'Nome') !!}
                        {!! Form::input('text', 'name', '', ['class' => 'form-control', '', 'placeholder' => 'Nome']) !!}

                        {!! Form::label('email', 'Email') !!}
                        {!! Form::input('text', 'email', '', ['class' => 'form-control', '', 'placeholder' => 'Email']) !!}

                        {!! Form::label('password', 'Password') !!}
                        {!! Form::input('text', 'password', '', ['class' => 'form-control', '', 'placeholder' => 'Password']) !!}

                        {!! Form::submit('Criar',['class' =>'btn btn-primary']) !!}

                        {!! Form::close() !!}


                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
