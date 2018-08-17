@extends('adminlte::layouts.app')
@section('contentheader_title')
    Criar novo cliente
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

    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">

                        {!! Form::open(['url' => 'gestao/clientes/store']) !!}


                        {!! Form::label('nome', 'Nome') !!}
                        {!! Form::input('text', 'nome', '', ['class' => 'form-control', '', 'placeholder' => 'Nome']) !!}

                        {!! Form::label('nif', 'Nif') !!}
                        {!! Form::input('text', 'nif', '', ['class' => 'form-control', '', 'placeholder' => 'Nif']) !!}

                        {!! Form::label('morada', 'Morada') !!}
                        {!! Form::input('text', 'morada', '', ['class' => 'form-control', '', 'placeholder' => 'Morada']) !!}

                        {!! Form::label('telemovel', 'Telemovel') !!}
                        {!! Form::input('text', 'telemovel', '', ['class' => 'form-control', '', 'placeholder' => 'Telemovel']) !!}

                        {!! Form::label('email', 'Email') !!}
                        {!! Form::input('text', 'email', '', ['class' => 'form-control', '', 'placeholder' => 'Email']) !!}

                        {!! Form::submit('Criar',['class' =>'btn btn-primary']) !!}

                        {!! Form::close() !!}



                    </div>

                    {{--Mensagem de sucesso--}}

                    @if(Session::has('message'))
                        <div class="alert alert-{{ Session::get('message-type') }} alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <i class="glyphicon glyphicon-{{ Session::get('message-type') == 'success' ? 'ok' : 'remove'}}"></i> {{ Session::get('message') }}
                        </div>
                @endif


                    <!-- /.box-body -->

                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection