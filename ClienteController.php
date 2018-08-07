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
        $cliente= new Cliente();
        $cliente->nome = $request->nome;
        $cliente->nif = $request->nif;
        $cliente->morada = $request->morada;
        $cliente->telemovel = $request->telemovel;
        $cliente->email = $request->email;

        $cliente->save();

        return Redirect::to('gestao/clientes/create');

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
        $cliente= Cliente::find($id);
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
        $cliente= Cliente::findOrFail($id);
        $cliente->update($request->all());
        return Redirect::to('gestao/clientes/'.$cliente->id.'/edit');
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
}
