<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categoria;

class CategoriaController extends Controller
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
        return Categoria::orderBy('id', 'ASC')->paginate(10);
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

        return Categoria::create([
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
        $categoria = Categoria::findOrFail($id);

        $this->validate($request,[
            'nombre'  =>  'required|string|max:191',
        ]);
        $categoria->nombre=$request->nombre;
        $categoria->slug=str_slug($request->nombre);
        $categoria->cuerpo=$request->cuerpo;
        $categoria->update();
    
        return ['message' => 'Categoria actualizada compa'];
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);

        //borrar usuario
        $categoria->delete();

        return ['message' => 'Categoria Borrada'];
    }
    /**
     * BUSCAR CATEGORIA
     */
    public function search(){
        if ($search = \Request::get('c')) {
            $categorias = Categoria::where(function($query) use ($search){
                $query -> where ('nombre', 'LIKE', "%$search%") 
                        -> orWhere('id', 'LIKE', "%$search%");
            })->paginate(10);
        } else{
            $categorias = Categoria::orderBy('id', 'ASC')->paginate(10);
        }

        return $categorias;
    }
}
