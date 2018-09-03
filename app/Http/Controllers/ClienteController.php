<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Redirect;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('clientes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
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

        $cliente= new Cliente();
        $cliente->nome = $request->nome;
        $cliente->nif = $request->nif;
        $cliente->morada = $request->morada;
        $cliente->telemovel = $request->telemovel;
        $cliente->email = $request->email;

        $cliente->save();
        return Redirect::to('gestao/clientes/create')
            ->with('message', 'Cliente criado com sucesso')
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
        return view('clientes.edit', ['cliente' => Cliente::findOrFail($id)]);
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

        $cliente= Cliente::findOrFail($id);
        $cliente->update($request->all());
        return Redirect::to('gestao/clientes/'.$cliente->id.'/edit')
            ->with('message', 'Cliente editado com sucesso')
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

    public function getClientes()
    {
        return Datatables::of(Cliente::query())
            ->addColumn('encomendar', function ($cliente) {
                return '<a href="{{ URL::to(\'gestao/clientes/encomendar\')}}" <button type="button" class="btn btn-block btn-primary"></i> Encomendar</a>';
            })
            ->addColumn('estado', function ($cliente) {
                return '<a href="clientes/' . $cliente->id . '/edit" <button type="button" class="btn btn-block btn-primary"></i> Perfil</a>';
            })
            ->addColumn('action', function ($cliente) {
                return '<a href="{{ route(fornecedores.destroy ,$fornecedor->id)}}" class="btn btnprimary
tooltips"><i class="fa fa-close fa fa-white"></i></a>';
            })
            ->rawColumns(['encomendar','estado','action'])
            ->make(true);

    }


    public function formValidationCriar(Request $request){

        $this->validate($request,[

            'nome' => 'required',
            'nif' => 'required|digits:9|unique:cliente',
            'morada' => 'required',
            'telemovel' => 'required|digits:9|unique:cliente',
            'email' => 'required|email|unique:cliente',

        ],[
            'nome.required' => 'Precisa de preencher o nome do cliente',
            'nif.required' => 'Precisa de preencher o NIF do cliente',
            'nif.digits' => 'Atenção! O NIF apenas pode ter 9 caracteres, tendo estes de ser numeros',
            'nif.unique' => 'Já está registado um cliente com esse NIF',
            'morada.required' => 'Precisa de preencher a morada do cliente',
            'telemovel.required' => 'Precisa de preencher o numero de telemovel do cliente',
            'telemovel.digits' => 'Atenção! O numero de telemovel apenas pode ter 9 caracteres, tendo estes de ser numeros',
            'telemovel.unique' => 'Já está registado um cliente com esse número de telemovel',
            'email.required' => 'Precisa de preencher o email do cliente',
            'email.email' => 'O email não tem o formato correto (exemplo correto: cliente@mail.com)',
            'email.unique' => 'Já está registado um cliente com esse email',
        ]);
    }


    public function formValidationEditar(Request $request){

        $this->validate($request,[

            'nome' => 'required',
            'nif' => 'required|digits:9',
            'morada' => 'required',
            'telemovel' => 'required|digits:9',
            'email' => 'required|email',

        ],[
            'nome.required' => 'Não pode deixar o Nome em branco',
            'nif.required' => 'Não pode deixar o NIF em branco',
            'nif.digits' => 'Atenção! O NIF apenas pode ter 9 caracteres, tendo estes de ser numeros',
            'morada.required' => 'Não pode deixar a morada em branco',
            'telemovel.required' => 'Não pode deixar o número de telemovel em branco',
            'telemovel.digits' => 'Atenção! O numero de telemovel apenas pode ter 9 caracteres, tendo estes de ser numeros',
            'email.required' => 'Não pode deixar email em branco',
            'email.email' => 'O email não tem o formato correto (exemplo correto: cliente@mail.com)',
        ]);
    }
}
