@extends('adminlte::layouts.app')
@section('contentheader_title')
    Criar novo produto
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

                        {!! Form::open(['url' => 'gestao/produtos/store']) !!}

                        {!! Form::label('numero_registo', 'Numero de registo') !!}
                        {!! Form::input('text', 'numero_registo', '', ['class' => 'form-control', '', 'placeholder' => 'Numero de registo']) !!}

                        {!! Form::label('chnm', 'CHNM') !!}
                        {!! Form::input('text', 'chnm', '', ['class' => 'form-control', '', 'placeholder' => 'CHNM']) !!}

                        {!! Form::label('descricao_chnm', 'Descricao CHNM') !!}
                        {!! Form::input('text', 'descricao_chnm', '', ['class' => 'form-control', '', 'placeholder' => 'Descricao CHNM']) !!}

                        {!! Form::label('nome_forma_dosagem', 'Nome - Forma farmaceutica - Dosagem') !!}
                        {!! Form::input('text', 'nome_forma_dosagem', '', ['class' => 'form-control', '', 'placeholder' => 'Nome - Forma farmaceutica - Dosagem']) !!}

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