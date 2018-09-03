<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\DataTables;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('produtos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->formValidationCriar($request);


        $produto= new Produto();
        $produto->numero_registo = $request->numero_registo;
        $produto->chnm = $request->chnm;
        $produto->descricao_chnm = $request->descricao_chnm;
        $produto->nome_forma_dosagem = $request->nome_forma_dosagem;

        $produto->save();
        return Redirect::to('gestao/produtos/create')
            ->with('message', 'Produto criado com sucesso')
            ->with('message-type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('produtos.edit', ['produto' => Produto::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->formValidationEditar($request);

        $produto= Produto::findOrFail($id);
        $produto->update($request->all());
        return Redirect::to('gestao/produtos/'.$produto->id.'/edit')
            ->with('message', 'Produto editado com sucesso')
            ->with('message-type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function getProdutos()
    {
        return Datatables::of(Produto::query())
            ->addColumn('encomendar', function ($produto) {
                return '<a href="{{ URL::to(\'gestao/produtos/encomendar\')}}" <button type="button" class="btn btn-block btn-primary"></i> Encomendar</a>';
            })
            ->addColumn('perfil', function ($produto) {
                return '<a href="produtos/' . $produto->id . '/edit" <button type="button" class="btn btn-block btn-primary"></i> Perfil</a>';
            })
            ->addColumn('apaga', function ($produto) {
                return '<a href="{{ route(produtos.destroy ,$produto->id)}}" class="btn btnprimary
tooltips"><i class="fa fa-close fa fa-white"></i></a>';
            })
            ->rawColumns(['encomendar','perfil','apaga'])
            ->make(true);
    }


    public function formValidationCriar(Request $request){

        $this->validate($request,[

            'chnm' => 'required|digits:8|unique:produto',
            'descricao_chnm' => 'required',
            'nome_forma_dosagem' => 'required',

        ],[
            'chnm.required' => 'Precisa de preencher o código CHNM do produto',
            'chnm.digits' => 'Atenção! o código CHNM tem de ter 8 caracteres, tendo estes de ser números',
            'chnm.unique' => 'Já está registado um produto com esse código',
            'descricao_chnm.required' => 'Precisa de preencher a descrição CHNM do produto',
            'nome_forma_dosagem.required' => 'Precisa de preencher o Nome - Forma farmacêutica - Dosagem do produto',
        ]);
    }


    public function formValidationEditar(Request $request){

        $this->validate($request,[

            'chnm' => 'required|digits:8',
            'descricao_chnm' => 'required',
            'nome_forma_dosagem' => 'required',

        ],[
            'chnm.required' => 'Não pode deixar o código CHNM do produto em branco',
            'chnm.digits' => 'Atenção! o código CHNM tem de ter 8 caracteres, tendo estes de ser números',
            'descricao_chnm.required' => 'Não pode deixar a descrição CHNM do produto em branco',
            'nome_forma_dosagem.required' => 'Não pode deixar o Nome - Forma farmacêutica - Dosagem do produto em branco',
        ]);
    }

}
