<?php

namespace App\Http\Controllers;
use App\Models\Departamento;


class DepartamentoController extends Controller
{

    public function index()
    {
    if(request()->ajax()) {
    return datatables()->of(Departamento::select('*'))
    ->addColumn('action', 'departamentos.action')
    ->rawColumns(['action'])
    ->addIndexColumn()
    ->make(true);
    }
    return view('departamentos.index');
}

}
