//SCRIPT PArA CARGAR CONTENIDO DINAMICAMENTE
$(document).ready(function() {

    var URLactual = String(window.location);
    var cate= URLactual.substr(URLactual.indexOf('#') + 1,URLactual.length);

    if (cate === 'capacitacion-de-alimentacion-y-sanidad' || cate.indexOf('servicios') > 1) {
        $("#capacitacion-de-alimentacion-y-sanidad").addClass("botonCategoria2");
        $.ajax({
            type: "POST",
            url: "modulos/capacitacion-de-alimentacion-y-sanidad.php",
            success: function(response) {
                $('#contenedorCategorias').html(response);
            }
        });
    } else if (cate === 'seguimiento-post-venta' ) {
        $("#seguimiento-post-venta").addClass("botonCategoria2");
        $.ajax({
            type: "POST",
            url: "modulos/seguimiento-post-venta.php",
            success: function(response) {
                $('#contenedorCategorias').html(response);
            }
        });
    } else if(cate === 'alimentacion' ) {
        $("#alimentacion").addClass("botonCategoria2");
        $.ajax({
            type: "POST",
            url: "modulos/alimentacion.php",
            success: function(response) {
                $('#contenedorCategorias').html(response);
            }
        });
    }
    
    $('#capacitacion-de-alimentacion-y-sanidad').on('click', function(){
        $("#capacitacion-de-alimentacion-y-sanidad").addClass("botonCategoria2");
        $("#seguimiento-post-venta").removeClass("botonCategoria2");
        $("#alimentacion").removeClass("botonCategoria2");
        $.ajax({
            type: "POST",
            url: "/modulos/capacitacion-de-alimentacion-y-sanidad.php",
            success: function(response) {
                $('#contenedorCategorias').html(response);
            }
        });
    });

    $('#seguimiento-post-venta').on('click', function(){
        $("#seguimiento-post-venta").addClass("botonCategoria2");
        $("#capacitacion-de-alimentacion-y-sanidad").removeClass("botonCategoria2");
        $("#alimentacion").removeClass("botonCategoria2");
        $.ajax({
            type: "POST",
            url: "modulos/seguimiento-post-venta.php",
            success: function(response) {
                $('#contenedorCategorias').html(response);
            }
        });
    });

    $('#alimentacion').on('click', function(){
        $("#alimentacion").addClass("botonCategoria2");
        $("#capacitacion-de-alimentacion-y-sanidad").removeClass("botonCategoria2");
        $("#seguimiento-post-venta").removeClass("botonCategoria2");
        $.ajax({
            type: "POST",
            url: "modulos/alimentacion.php",
            success: function(response) {
                $('#contenedorCategorias').html(response);
            }
        });
    });

//boton para ir arriba
    $('.ir-arriba').on('click', function(){
        $('body, html').animate({
            scrollTop: '0px'
        }, 300);
    });
 
    $(window).scroll(function(){
        if( $(this).scrollTop() > 400 ){
            $('.ir-arriba').slideDown(300);
        } else {
            $('.ir-arriba').slideUp(300);
        }
    });
});
//
