<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Cuarto;
use App\Models\Inquilino;
use Illuminate\Http\Request;

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
    public function index()
    {
        return view('home');
    }
    public function mostrar()
    {
        $inquilinos = Inquilino::all();
        $Totalinquilinos = Inquilino::count();
        $cuartos = Cuarto::all();
        $Totalcuartos = Cuarto::count();
        $totalGanancia = Contrato::sum('monto_total');
        return view('principal.index', compact('Totalinquilinos','inquilinos','Totalcuartos','cuartos','totalGanancia'));
    }
  
}
