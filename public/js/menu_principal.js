$(document).ready(function(){
    //funcion para esconder el menu al hacer click
    var $menu = $('#navbarResponsive'), 
    	$menulink = $('.navbar-toggler'),
    	$links = $('#navbarResponsive').find('a')

    $links.click(function(){
    	$menulink.removeClass("show")
    	$menu.removeClass("show")
    });
    //funcion que cambia el estilo del menú cuando bajas el scroll
    var x = window.matchMedia("(min-width: 967px)")
    // jQuery plug-in
    if (x.matches) {
    $(window).scroll(function(){console.log($(window).scrollTop());
		if($(window).scrollTop() > 56){

			$("#menu_principal").addClass("navbar-activo");

		} else {

			$("#menu_principal").removeClass("navbar-activo");
		}
    });
    }else{
        $("#menu_principal").addClass("navbar-activo");
	};

	//funcion que cambia el estilo del los botones del menú cuando bajas el scroll
    var e = window.matchMedia("(min-width: 967px)")
    // jQuery plug-in
    if (e.matches) {
    $(window).scroll(function(){console.log($(window).scrollTop());
		if($(window).scrollTop() > 600){

			$("#seccion_n").addClass("submenuActivo");
			$("#seccion_p").removeClass("submenuActivo");
			$("#seccion_s").removeClass("submenuActivo");
			$("#seccion_b").removeClass("submenuActivo");
			$("#seccion_c").removeClass("submenuActivo");

			if ($(window).scrollTop() > 1380) {
				$("#seccion_p").addClass("submenuActivo");
				$("#seccion_n").removeClass("submenuActivo");
				$("#seccion_s").removeClass("submenuActivo");
				$("#seccion_b").removeClass("submenuActivo");
				$("#seccion_c").removeClass("submenuActivo");

				if ($(window).scrollTop() > 2100) {
					$("#seccion_s").addClass("submenuActivo");
					$("#seccion_p").removeClass("submenuActivo");
					$("#seccion_n").removeClass("submenuActivo");
					$("#seccion_b").removeClass("submenuActivo");
					$("#seccion_c").removeClass("submenuActivo");

					if ($(window).scrollTop() > 3000) {
						$("#seccion_b").addClass("submenuActivo");
						$("#seccion_p").removeClass("submenuActivo");
						$("#seccion_n").removeClass("submenuActivo");
						$("#seccion_s").removeClass("submenuActivo");
						$("#seccion_c").removeClass("submenuActivo");

						if ($(window).scrollTop() > 3480) {
							$("#seccion_c").addClass("submenuActivo");
							$("#seccion_p").removeClass("submenuActivo");
							$("#seccion_n").removeClass("submenuActivo");
							$("#seccion_b").removeClass("submenuActivo");
							$("#seccion_s").removeClass("submenuActivo");

						}
					}
				}
			}
		} else{
			$("#seccion_c").removeClass("submenuActivo");
			$("#seccion_p").removeClass("submenuActivo");
			$("#seccion_n").removeClass("submenuActivo");
			$("#seccion_b").removeClass("submenuActivo");
			$("#seccion_s").removeClass("submenuActivo");
		}

    });
    }
});


/*funcion que cambia de colores los botones del menú*/
function seccionActivo(id){
	var activo = id;
	 if (activo === "seccion_0") {
		$("#seccion_c").removeClass("submenuActivo");
		$("#seccion_p").removeClass("submenuActivo");
		$("#seccion_n").removeClass("submenuActivo");
		$("#seccion_b").removeClass("submenuActivo");
		$("#seccion_s").removeClass("submenuActivo");
	}else if (activo === "seccion_n") {
		$("#seccion_n").addClass("submenuActivo");
		$("#seccion_p").removeClass("submenuActivo");
		$("#seccion_s").removeClass("submenuActivo");
		$("#seccion_b").removeClass("submenuActivo");
		$("#seccion_c").removeClass("submenuActivo");
	} else if (activo === "seccion_p") {
		$("#seccion_p").addClass("submenuActivo");
		$("#seccion_n").removeClass("submenuActivo");
		$("#seccion_s").removeClass("submenuActivo");
		$("#seccion_b").removeClass("submenuActivo");
		$("#seccion_c").removeClass("submenuActivo");
	} else if (activo ===  "seccion_s") {
		$("#seccion_s").addClass("submenuActivo");
		$("#seccion_n").removeClass("submenuActivo");
		$("#seccion_p").removeClass("submenuActivo");
		$("#seccion_b").removeClass("submenuActivo");
		$("#seccion_c").removeClass("submenuActivo");
	} else if (activo === "seccion_b") {
		$("#seccion_b").addClass("submenuActivo");
		$("#seccion_n").removeClass("submenuActivo");
		$("#seccion_s").removeClass("submenuActivo");
		$("#seccion_p").removeClass("submenuActivo");
		$("#seccion_c").removeClass("submenuActivo");
	} else{
		$("#seccion_c").addClass("submenuActivo");
		$("#seccion_n").removeClass("submenuActivo");
		$("#seccion_s").removeClass("submenuActivo");
		$("#seccion_b").removeClass("submenuActivo");
		$("#seccion_p").removeClass("submenuActivo");
	}

}


