<div class="tituloAzul">
    <p></i>&nbsp;Nuestros Valores</p><br>
</div>

<div class="row" id="fondoValores">
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 contenedorCuadroP ">
		<div>
			<h1 class="responsiveTexto">Honestidad</h1><br>
			<p>Trabajamos de forma transparente con cada uno de nuestros clientes</p>
		</div>
	</div>

	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 contenedorCuadroP ">
		<div>
			<h1 class="responsiveTexto">Compromiso</h1><br>
			<p>Un trato hecho es un cliente satisfecho, por eso nos comprometemos con cada tarea</p>
		</div>
	</div>

	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 contenedorCuadroP ">
		<div>
			<h1 class="responsiveTexto">Calidad</h1><br>
			<p>El amor hacia nuestro trabajo nos impulsa mejorar cada dia</p>
		</div>
	</div>
</div>

<div class="card border-0 m-4">
	<div class="card-body">
		<h5 class="card-title tituloAzul azul mr-3 ml-3 d-flex justify-content-start">Metodos de Crianza</h5><hr><br>
		<p class="card-text text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis, accusamus! Ducimus facere ipsum, labore veniam voluptate aspernatur inventore ex illo sint eaque asperiores illum atque. Non sint, cupiditate aliquam distinctio.</p>
	</div>
</div>

<div id="wrapper">
<!-- Slideshow 2 -->
	<div class="rslides_container">
	  <ul class="rslides" id="slider2">
	    <li><img src="imagenes/nosotros/banner-nosotros.jpg" alt=""></li>
	    <li><img src="imagenes/nosotros/2.jpg" alt=""></li>
	    <li><img src="imagenes/nosotros/3.jpg" alt=""></li>
	  </ul>
	</div>
</div>

<div id="fondoImportancia">
	<div class="card border-0 m-4 bg-transparent">
		<div class="card-body">
			<h5 class="card-title tituloAzul text-left azul mr-3 ml-3 d-flex justify-content-start">Importancia Ecológica</h5><hr><br>
			<p class="card-text text-center fuente-2 text-t-1-2 font-weight-bold">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis, accusamus! Ducimus facere ipsum, labore veniam voluptate aspernatur inventore ex illo sint eaque asperiores illum atque. Non sint, cupiditate aliquam distinctio.</p>
			<p class="card-text text-center fuente-2 text-t-1-2 font-weight-bold">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis, accusamus! Ducimus facere ipsum, labore veniam voluptate aspernatur inventore ex illo sint eaque asperiores illum atque. Non sint, cupiditate aliquam distinctio.</p>
			<p class="card-text text-center fuente-2 text-t-1-2 font-weight-bold">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis, accusamus! Ducimus facere ipsum, labore veniam voluptate aspernatur inventore ex illo sint eaque asperiores illum atque. Non sint, cupiditate aliquam distinctio.</p>
		</div>
	</div>
</div>

<script>
  jQuery ( ".responsiveTexto" ).fitText(0.8);

    // You can also use "$(window).load(function() {"
    $(function () {
      // Slideshow 
      $("#slider2").responsiveSlides({
        auto: false,
        pager: true,
        nav: true,
        speed: 500,
        namespace: "transparent-btns"
      });

    });
</script>