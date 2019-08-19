//SCRIPT PArA CARGAR CONTENIDO DINAMICAMENTE
$(document).ready(function() {

    var URLactual = String(window.location);
    var cate= URLactual.substr(URLactual.indexOf('#') + 1,URLactual.length);

    if (cate === 'quienes-somos' || cate.indexOf('nosotros') > 1) {
        $("#quienes-somos").addClass("botonCategoria2");
        $.ajax({
            type: "POST",
            url: "modulos/quienes-somos.php",
            success: function(response) {
                $('#contenedorCategorias').html(response);
            }
        });
    } else if (cate === 'nuestro-equipo' ) {
        $("#nuestro-equipo").addClass("botonCategoria2");
        $.ajax({
            type: "POST",
            url: "modulos/nuestro-equipo.php",
            success: function(response) {
                $('#contenedorCategorias').html(response);
            }
        });
    } else if(cate === 'nuestros-valores' ) {
        $("#nuestros-valores").addClass("botonCategoria2");
        $.ajax({
            type: "POST",
            url: "modulos/nuestros-valores.php",
            success: function(response) {
                $('#contenedorCategorias').html(response);
            }
        });
    }
    
    $('#quienes-somos').on('click', function(){
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
    });

    $('#nuestro-equipo').on('click', function(){
        $("#nuestro-equipo").addClass("botonCategoria2");
        $("#quienes-somos").removeClass("botonCategoria2");
        $("#nuestros-valores").removeClass("botonCategoria2");
        $.ajax({
            type: "POST",
            url: "modulos/nuestro-equipo.php",
            success: function(response) {
                $('#contenedorCategorias').html(response);
            }
        });
    });

    $('#nuestros-valores').on('click', function(){
        $("#nuestros-valores").addClass("botonCategoria2");
        $("#quienes-somos").removeClass("botonCategoria2");
        $("#nuestro-equipo").removeClass("botonCategoria2");
        $.ajax({
            type: "POST",
            url: "modulos/nuestros-valores.php",
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
