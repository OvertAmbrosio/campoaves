$(document).ready(function() {
    //var submenu de categorias
    var pantalla = $(window).width()
    //hallar url de categorias
    var URLactual = String(window.location.pathname);
    var cate= URLactual.substr(16);
    //tamaño de la pagina
    var tamaño = parseInt(document.body.scrollHeight) + parseInt(50);
    var pagina = 'height:'+tamaño+'px;';

    if (pantalla < 973){
        $("#nav-categorias").addClass("offset-1 col-10 navbar-azul bg-azul rounded");
        $("#entradas-blog").addClass("justify-content-center");  
        $("#p-categorias").addClass("mostrar");
        $("#ul-categorias").addClass("text-t-1-3");
        $("#tituloNavCate").addClass("ocultar");
        $("#cont-categorias").addClass("col-12");
        $("#hr-gr").addClass("ocultar");
    }else {
        $("#cont-categorias").addClass("fondo-menu-blog position-absolute shadow-sm");
        $("#p-categorias").addClass("ocultar");
        $("#ul-categorias").addClass("text-t-1-7 justify-content-right");
        $("#nav-categorias").addClass("tituloAzul ml-3 text-t-2");  
        $("#entradas-blog").addClass("mr-5 justify-content-end");   
        //tamaño del contenedor de categorias
        $("#cont-categorias").attr("style", pagina);   
    };

    //cambiar estilo del submenu categorias
    if (cate === 'noticias') {
        $("#noticias").addClass("a-blog-activo");
    } else if (cate === 'actualizaciones' ) {
        $("#actualizaciones").addClass("a-blog-activo");
    } else if(cate === 'recetas' ) {
        $("#recetas").addClass("a-blog-activo");
    }
    
    
});