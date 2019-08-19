<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Entrada;
use App\Categoria;

class PageController extends Controller
{
//<---- INICIO ----->
    public function inicio(){
        $entradaN = Entrada::where('categoria_id', '1')->where('estado','PUBLICADO')->orderby('created_at','DESC')->take(1)->get();
        $entradaA = Entrada::where('categoria_id', '2')->where('estado','PUBLICADO')->orderby('created_at','DESC')->take(1)->get();
        $entradaR = Entrada::where('categoria_id', '3')->where('estado','PUBLICADO')->orderby('created_at','DESC')->take(1)->get();
        
        return view('index')->with(compact('entradaN'))->with(compact('entradaA'))->with(compact('entradaR'));
    }

//<---- NOSOTROS ----->
    public function nosotros(){
        return view('nosotros');
    }
//<---- PRODUCTOS ----->
    public function productos($linea=null, $producto=null){
        $categoria = null;
        if ($categoria == 'pollo-criollo' || $categoria = 'pollo-frances') {
            $lineas = 'linea-pollos';
        } elseif ($categoria == 'gallina-roja') {
            $lineas = 'linea-gallinas';
        } elseif ($categoria == 'pavo-blanco') {
            $lineas = 'linea-pavos';
        } elseif ($categoria == 'pato-criollo') {
            $lineas = 'linea-patos';
        } elseif ($categoria == 'pekin') {
            $lineas = 'linea-pekin';
        } elseif ($categoria == 'huevos-rosados') {
            $lineas = 'linea-huevos';
        } else {
            $lineas = '';
        }
        return view('productos')->with(compact('productos.categoria','producto'))->with(compact('lineas','linea'));
    }
//<---- SERVICIOS ----->
    public function servicios(){
        return view('servicios');
    }
//<---- BLOG ----->
    public function blog(){
        $entradas = Entrada::orderBy('id', 'DESC')->where('estado', 'PUBLICADO')->paginate(6);
        
        return view('blog', compact('entradas'));
        // return view('blog')->with(compact('categorias'))->with(compact('entradas'));
    }

    public function categoria($slug){
        $categoria  = Categoria::where('slug', $slug)->pluck('id')->first();
        $entradas   = Entrada::where('categoria_id', $categoria)
                    ->orderBy('id','DESC')->where('estado', 'PUBLICADO')->paginate(6);

        return view('blog', compact('entradas'));
    }

    public function etiqueta($slug){
        $entradas = Entrada::whereHas('etiquetas', function($query) use($slug){
                    $query->where('slug', $slug);
                    })->orderBy('id','DESC')->where('estado', 'PUBLICADO')->paginate(6);
        $categorias = Categoria::orderBy('id', 'DESC')->paginate();
        return view('blog')->with(compact('categorias'))->with(compact('entradas'));
    }

    public function entrada($slug){
        $entrada = Entrada::where('slug', $slug)->first();

        return view('blog.entrada', compact('entrada'));
    }
//<---- CONTACTO ----->
    public function contacto(){
        return view('contacto');
    }
}
