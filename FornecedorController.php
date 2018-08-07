<?php

namespace App\Http\Controllers;


use App\Fornecedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\DataTables;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('fornecedores.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fornecedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $fornecedor= new Fornecedor();
        $fornecedor->nome = $request->nome;
        $fornecedor->nif = $request->nif;
        $fornecedor->morada = $request->morada;
        $fornecedor->telemovel = $request->telemovel;
        $fornecedor->email = $request->email;
        $fornecedor->tipoProduto = $request->tipoProduto;
        $fornecedor->designacaoComercial = $request->designacaoComercial;

        $fornecedor->save();
        return Redirect::to('gestao/fornecedores/create');
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
        $fornecedor= Fornecedor::find($id);
        return view('fornecedores.edit', ['fornecedor' => Fornecedor::findOrFail($id)]);
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
        $fornecedor= Fornecedor::findOrFail($id);
        $fornecedor->update($request->all());
        return Redirect::to('gestao/fornecedores/'.$fornecedor->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $fornecedor = Fornecedor::find($id);
        $fornecedor->delete();
    }

    public function getFornecedores()
    {
        return Datatables::of(Fornecedor::query())
            ->addColumn('encomendar', function ($fornecedor) {
                return '<a href="{{ URL::to(\'gestao/fornecedores/encomendar\')}}" <button type="button" class="btn btn-block btn-primary"></i> Encomendar</a>';
            })
            ->addColumn('estado', function ($fornecedor) {
                return '<a href="fornecedores/' . $fornecedor->id . '/edit" <button type="button" class="btn btn-block btn-primary"></i> Perfil</a>';
            })
            ->addColumn('action', function ($fornecedor) {
                return '<a href="{{ route(fornecedores.destroy ,$fornecedor->id)}}" class="btn btnprimary
tooltips"><i class="fa fa-close fa fa-white"></i></a>';
            })
            ->rawColumns(['encomendar','estado','action'])
            ->make(true);


    }
}
