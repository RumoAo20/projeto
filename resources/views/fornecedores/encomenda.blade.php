@extends('adminlte::layouts.app')
@section('contentheader_title')
    Encomenda ao fornecedor
@endsection

@section('main-content')
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <!-- search form (Optional) -->
                        <form action="#" method="get" class="sidebar-form">
                            <div class="input-group">
                                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.produto') }}"/>
                                <span class="input-group-btn">
                        <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                        </span>
                            </div>
                        </form>
                        <!-- /.search form -->

                        <li class="list-group-item">
                            <a class="pull-right"></a>
                            <b>Fornecedor:</b> {{$fornecedor->nome}}
                       <ul class="list-group list-group-unbordered"></ul>

                        {!! Form::open(['url' => 'gestao/fornecedores/adiciona']) !!}

                            <b>Id do fornecedor:</b><input type="text" name="id" size="1" value={{$fornecedor->id}} readonly="true"/>

                        <li class="list-group-item"><b>Produtos</b>
                            <a class="pull-right"></a>{!! Form::select('produto',$produtos) !!}   {!! Form::input('number', 'quantidade', '', ['class' => 'form', '', 'placeholder' => 'Insira a Quantidade']) !!} <ul class="list-group list-group-unbordered"></ul>
                            {!! Form::label('estado', 'Estado da encomenda') !!}<input type="text" name="estado"  value="aberto" readonly="true"/> <div class=text-right>{!! Form::submit('Adicionar produto à encomenda',['class' =>'btn btn-primary']) !!}</div>


                    </li>




                    {!! Form::close() !!}

                        <b>Encomenda</b>
                        <div class="box box-primary">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="box-body">
                                        <table class="table table-hover table-condensed"
                                               style="width:100%" id="encomenda-table">
                                            <thead>
                                            <tr>
                                                <th>Id do produto</th>
                                                <th>produto</th>
                                                <th>quantidade</th>


                                            @if($produtosEncomenda)
                                                @foreach($produtosEncomenda as $produtoEncomenda)
                                                    @foreach($produto as $prod)

                                                                                           <tr>
                                                                                               <td>{{$produtoEncomenda->produto_id}}</td>
                                                                                               <td>{{$prod->nome_forma_dosagem}}</td>
                                                                                               <td>{{$produtoEncomenda->quantidade}}</td>
                                                                                           </tr>

                                                                               @endforeach
                                                                               @endforeach
                                                                               @endif



                                                                                   </tr>
                                                                                   </thead>
                                                                               </table>

                                                                               {!! Form::open(['url' => 'gestao/fornecedores/cancela']) !!}


                                                                           {!! Form::submit('Encomendar',['class' =>'btn btn-primary']) !!}
                                                                           {!! Form::submit('Cancelar',['class' =>'btn btn-primary']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                                                       </div>
                                                                       </div>
                                                                   </div>


                                                               </div>
                                                           <!-- /.box-body -->
                                                       </div>

                                                   </div>
                                                   <!-- /.col -->
                                               </div>

                                           </section>
                                       @endsection
