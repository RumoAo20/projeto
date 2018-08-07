<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Colaborador;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Redirect;

class ColaboradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('colaboradores.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('colaboradores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $colaborador= new Colaborador();
        $colaborador->name = $request->name;
        $colaborador->email = $request->email;
        $colaborador->password = $request->password;


        $colaborador->save();
        return Redirect::to('gestao/colaboradores/create');
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
        return view('colaboradores.edit', ['colaborador' => Colaborador::findOrFail($id)]);
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
        $colaborador= Colaborador::findOrFail($id);
        $colaborador->update($request->all());
        return Redirect::to('gestao/colaboradores/'.$colaborador->id.'/edit');
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

    public function getColaboradores()
    {
        return Datatables::of(Colaborador::query())
            ->addColumn('estado', function ($colaborador) {
                return '<a href="colaboradores/' . $colaborador->id . '/edit" <button type="button" class="btn btn-block btn-primary"></i> Perfil</a>';
            })
            ->addColumn('action', function ($colaborador) {
                return '<a href="{{ route(colaboradores.destroy ,$colaborador->id)}}" class="btn btnprimary
tooltips"><i class="fa fa-close fa fa-white"></i></a>';
            })
            ->rawColumns(['encomendar','estado','action'])
            ->make(true);
    }
}
