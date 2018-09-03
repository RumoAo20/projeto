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

        $this->formValidationCriar($request);


        $fornecedor= new Fornecedor();
        $fornecedor->nome = $request->nome;
        $fornecedor->nif = $request->nif;
        $fornecedor->morada = $request->morada;
        $fornecedor->telemovel = $request->telemovel;
        $fornecedor->email = $request->email;
        $fornecedor->tipoProduto = $request->tipoProduto;
        $fornecedor->designacaoComercial = $request->designacaoComercial;

        $fornecedor->save();
        return Redirect::to('gestao/fornecedores/create')
            ->with('message', 'Fornecedor criado com sucesso')
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

        $this->formValidationEditar($request);

        $fornecedor= Fornecedor::findOrFail($id);
        $fornecedor->update($request->all());
        return Redirect::to('gestao/fornecedores/'.$fornecedor->id.'/edit')
            ->with('message', 'Fornecedor editado com sucesso')
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



    public function formValidationCriar(Request $request){

        $this->validate($request,[

            'nome' => 'required',
            'nif' => 'required|digits:9|unique:fornecedor',
            'morada' => 'required',
            'telemovel' => 'required|digits:9|unique:fornecedor',
            'email' => 'required|email|unique:fornecedor',
            'tipoProduto' => 'required',
            'designacaoComercial' => 'required',

        ],[
            'nome.required' => 'Precisa de preencher o nome do fornecedor',
            'nif.required' => 'Precisa de preencher o NIF do fornecedor',
            'nif.digits' => 'Atenção! O NIF apenas pode ter 9 caracteres, tendo estes de ser numeros',
            'nif.unique' => 'Já está registado um fornecedor com esse NIF',
            'morada.required' => 'Precisa de preencher a morada do fornecedor',
            'telemovel.required' => 'Precisa de preencher o numero de telemovel do fornecedor',
            'telemovel.digits' => 'Atenção! O numero de telemovel apenas pode ter 9 caracteres, tendo estes de ser numeros',
            'telemovel.unique' => 'Já está registado um fornecedor com esse número de telemovel',
            'email.required' => 'Precisa de preencher o email do fornecedor',
            'email.email' => 'O email não tem o formato correto (exemplo correto: fornecedor@mail.com)',
            'email.unique' => 'Já está registado um fornecedor com esse email',
            'tipoProduto.required' => 'Precisa de preencher o tipo de produto a fornecer',
            'designacaoComercial.required' => 'Precisa de preencher a designação comercial do fornecedor',
        ]);
    }


    public function formValidationEditar(Request $request){

        $this->validate($request,[

            'nome' => 'required',
            'nif' => 'required|digits:9',
            'morada' => 'required',
            'telemovel' => 'required|digits:9',
            'email' => 'required|email',
            'tipoProduto' => 'required',
            'designacaoComercial' => 'required',

        ],[
            'nome.required' => 'Precisa de preencher o nome do fornecedor',
            'nif.required' => 'Precisa de preencher o NIF do fornecedor',
            'nif.digits' => 'Atenção! O NIF apenas pode ter 9 caracteres, tendo estes de ser numeros',
            'morada.required' => 'Precisa de preencher a morada do fornecedor',
            'telemovel.required' => 'Precisa de preencher o numero de telemovel do fornecedor',
            'telemovel.digits' => 'Atenção! O numero de telemovel apenas pode ter 9 caracteres, tendo estes de ser numeros',
            'email.required' => 'Precisa de preencher o email do fornecedor',
            'email.email' => 'O email não tem o formato correto (exemplo correto: fornecedor@mail.com)',
            'tipoProduto.required' => 'Precisa de preencher o tipo de produto a fornecer',
            'designacaoComercial.required' => 'Precisa de preencher a designação comercial do fornecedor',
        ]);
    }
}
