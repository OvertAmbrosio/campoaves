<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use App\Entrada;
use App\Contacto;

class EscritorioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function index()
    {
        $escritorio = [User::orderBy('id', 'ASC')->count(),
                        Entrada::orderBy('id', 'ASC')->count(),
                        Contacto::orderBy('id', 'ASC')->count()];

        return $escritorio;
    }

}
