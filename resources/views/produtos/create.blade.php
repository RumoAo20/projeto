@extends('adminlte::layouts.app')
@section('contentheader_title')
    Criar novo produto
@endsection

@section('main-content')
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
                    <!-- /.box-body -->
                </div>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection