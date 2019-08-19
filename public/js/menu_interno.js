$(document).ready(function(){
    //funcion para esconder el menu al hacer click
    var $menu = $('#navbarResponsive'), 
    	$menulink = $('.navbar-toggler'),
    	$links = $('#navbarResponsive').find('a')

    $links.click(function(){
    	$menulink.removeClass("show")
    	$menu.removeClass("show")
    });

    //cambiar color del menu al estar ahi
    var URLactual = String(window.location);
    var m_seccion= URLactual.substr(22,URLactual.length);
    if (m_seccion.indexOf('nosotros') !== -1 ) {
        $("#seccion_n").addClass("submenuActivo");
    } else if (m_seccion.indexOf('productos') !== -1 ) {
        $("#seccion_p").addClass("submenuActivo");
    } else if (m_seccion.indexOf('servicios') !== -1 ) {
        $("#seccion_s").addClass("submenuActivo");
    } else if (m_seccion.indexOf('blog') !== -1 ) {
        $("#seccion_b").addClass("submenuActivo");
    } else if(m_seccion.indexOf('contacto') !== -1 ) {
        $("#seccion_c").addClass("submenuActivo");
    }
});

function seccionActivo(id){
	var activo = id;
	if (activo === "seccion_n") {
		$("#quienes-somos").addClass("botonCategoria2");
        $("#nuestro-equipo").removeClass("botonCategoria2");
        $("#nuestros-valores").removeClass("botonCategoria2");
        $.ajax({
            type: "POST",
            url: "/modulos/quienes-somos.php",
            success: function(response) {
                $('#contenedorCategorias').html(response);
            }
        });
	} 
}


