<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Requests\ContactoStoreRequest;
use App\Http\Controllers\Controller;
use App\Contacto;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware('auth');
        $contactos = Contacto::orderBy('id','DESC')->paginate(15);

        return $contactos;
    }

    public function store(ContactoStoreRequest $request)
    {
        $contacto = Contacto::create($request->all());
       
        return redirect()->route('contacto')->with('info', 'Información enviada con éxito');
    }


    public function destroy($id)
    {
        Contacto::find($id)->delete();

        return ['message', 'eliminado compa'];
    }

    public function search(){
        if ($search = \Request::get('p')) {
            $mensajes = Contacto::where(function($query) use ($search){
                $query -> where ('nombre', 'LIKE', "%$search%") 
                        -> orWhere('id', 'LIKE', "%$search%")
                        -> orWhere('email', 'LIKE', "%$search%");
            })->paginate(10);
        } else{
            $mensajes = Contacto::orderBy('id', 'ASC')->paginate(10);
        }

        return $mensajes;
    }
}
