<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;


class DepartamentoController extends Controller
{
 
    public function index(){
        $departamento = Departamento::orderBy('id','desc')->paginate(5);
        return view('departamentos.show',compact('departamento'));
    }

    public function save(Request $request){
        if ($request->ajax()){
            // Create 
            $departamento = new Departamento;
            $departamento->sigla = $request->input('sigla');
            $departamento->nome = $request->input('nome');
            $departamento->descricao = $request->input('descricao');
            // Save 
            $departamento->save();
             
            return response($departamento);
        }
    }
     
    public function delete(Request $request){
        if ($request->ajax()){
            Departamento::destroy($request->id);
        }
    }
 
    public function update(Request $request){
        if ($request->ajax()){
            $departamento = Departamento::find($request->id);
            $departamento->sigla = $request->input('sigla');
            $departamento->nome = $request->input('nome');
            $departamento->descricao = $request->input('descricao');
 
            $departamento->update();
            return response($departamento);
        }
    }
   
}
