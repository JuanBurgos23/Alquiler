<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('perfil.perfil', compact('users'));
    }
    public function calendario(){
        return view('calendario.calendario');
    }
}
