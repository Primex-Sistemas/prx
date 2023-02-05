<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use App\Models\Departamento;
use Yajra\DataTables\Facades\DataTables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){     
        $departamento = DB::table('departamentos')->paginate(5);    
        return view('home')->with('departamento',$departamento);
        
  }
  
  public function getDepartamento(Request $request)
    {
        $departamento = Departamento::all();
        return DataTables::of($departamento)->make(true);
    }

}