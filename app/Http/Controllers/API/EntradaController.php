<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entrada;
use App\Etiqueta;

class EntradaController extends Controller
{   
    public function __construct()
    {   
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Gate::allows('esAdministrador')){
            $entradas = Entrada::orderBy('id', 'ASC')
                ->join('users','entradas.user_id','=','users.id')
                ->join('categorias','entradas.categoria_id','=','categorias.id')
                ->select('entradas.*','users.name as n_user', 'categorias.nombre as n_categoria')->paginate(15);
            return $entradas;
        }
    }
    public function misEntradas()
    {   
        $user = auth('api') -> user()->id;
        $misEntradas = ['entradas'      => Entrada::orderBy('id', 'ASC')->where('user_id', $user)
                                            ->join('categorias','entradas.categoria_id','=','categorias.id')
                                            ->select('entradas.*', 'categorias.nombre as n_categoria')->paginate(15),
                        // 'misEtiquetas'  => Entrada::orderBy('id', 'ASC')->where('user_id', $user)
                        //                     ->join('entrada_etiqueta','entradas.id','=','entrada_etiqueta.entrada_id')
                        //                     ->join('etiquetas','entrada_etiqueta.etiqueta_id','=','etiquetas.id')
                        //                     ->select('entradas.id', 'etiquetas.nombre as n_etiqueta','etiquetas.id as id_etiqueta')->get(),
                        'etiquetas'     => Etiqueta::orderBy('id', 'ASC')->get()];  
        return $misEntradas;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return['message'=> 'tengo tu data socio'];
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
        //
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
        //
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

    public function search(){
        if ($search = \Request::get('p')) {
            $entradas = Entrada::where(function($query) use ($search){
                $query -> where ('nombre', 'LIKE', "%$search%") 
                        -> orWhere('id', 'LIKE', "%$search%");
            })->paginate(10);
        } else{
            $entradas = Entrada::orderBy('id', 'ASC')->paginate(10);
        }

        return $entradas;
    }
}
