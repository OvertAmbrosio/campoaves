<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Etiqueta;

class EtiquetaController extends Controller
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
        return Etiqueta::orderBy('id', 'ASC')->paginate(10);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nombre'  =>  'required|string|max:20',
        ]);

        return Etiqueta::create([
            'nombre' => $request['nombre'],
            'slug' => str_slug($request['nombre'])
        ]);
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
        $etiqueta = Etiqueta::findOrFail($id);

        $this->validate($request,[
            'nombre'  =>  'required|string|max:191',
        ]);
        $etiqueta->nombre=$request->nombre;
        $etiqueta->slug=str_slug($request->nombre);
        $etiqueta->update();
    
        return ['message' => 'Etiqueta actualizada compa'];
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $etiqueta = Etiqueta::findOrFail($id);

        //borrar usuario
        $etiqueta->delete();

        return ['message' => 'Etiqueta Borrada'];
    }
    /**
     * BUSCAR ETIQUETA
     */
    public function search(){
        if ($search = \Request::get('t')) {
            $etiquetas = Etiqueta::where(function($query) use ($search){
                $query -> where ('nombre', 'LIKE', "%$search%") 
                        -> orWhere('id', 'LIKE', "%$search%");
            })->paginate(10);
        } else{
            $etiquetas = Etiqueta::orderBy('id', 'ASC')->paginate(10);
        }

        return $etiquetas;
    }
}
