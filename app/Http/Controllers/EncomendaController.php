<?php

namespace App\Http\Controllers;

use App\Encomenda_Fornecedor;
use App\Encomenda_Produto;
use Illuminate\Http\Request;
use App\Produto;
use App\Encomenda;
use App\Fornecedor;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class EncomendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $encomenda = Encomenda::find(DB::table('encomenda')->max('id'));
        $idEncomenda = $encomenda->id;

        $encomenda2 = Encomenda_Produto::orderBy('created_at', 'desc')->first();
        $idProduto = $encomenda2->produto_id;



        $produtos = Produto::pluck('nome_forma_dosagem');
        $produtosEncomenda= Encomenda_Produto::where('encomenda_id',$idEncomenda)->get();
        $fornecedor= Fornecedor::find($id);
        $produto= Produto::where('id',$idProduto)->get();
        return view('fornecedores.encomenda',compact('produtos','produtosEncomenda','produto'),['fornecedor' => Fornecedor::find($id)],Fornecedor::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {



        $encomenda = Encomenda::find(DB::table('encomenda')->max('id'));
        $idEncomenda = $encomenda->id;


        $encomenda_produto= new Encomenda_Produto();
        $encomenda_produto->encomenda_id = $idEncomenda;
        $encomenda_produto->produto_id = $request->produto+1;
        $encomenda_produto->quantidade = $request->quantidade;


        $encomenda_fornecedor= new Encomenda_Fornecedor();
        $encomenda_fornecedor->encomenda_id = $idEncomenda;
        $encomenda_fornecedor->fornecedor_id =$request->id;

        $encomenda_fornecedor->save();
        $encomenda_produto->save();

        return Redirect::to('gestao/fornecedores/'.$request->id.'/encomenda/create');
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
        //
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
        //
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

    public function encomendar($id)
    {
        $fornecedor= Fornecedor::find($id);
        $encomenda= new Encomenda();
        $encomenda->estado = "aberto";
        $encomenda->save();

        return Redirect::to('gestao/fornecedores/'.$fornecedor->id.'/encomenda/create');
    }
    public function cancelarEncomenda()
    {
        $encomenda = Encomenda::find(DB::table('encomenda')->max('id'));
        $idEncomenda = $encomenda->id;
        DB::table('encomenda')->where('id', $idEncomenda)->delete();
    }




}
