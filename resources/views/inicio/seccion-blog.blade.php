<!--BLOG  -->
<section id="blog" class="allvh">
  <div class="row tituloAzul">
    <a href="blog">
      <p style="font-size:4rem;">CampoBlog</p>
    </a>
  </div>
  <div class="row mt-4">
			<div class="card-group pr-4 pl-4 pb-5 ">
				<div class="card bg-transparent border-0">
          <div class="card-body">
            <table style="height: 60%;">
              <tbody>
                <tr>
                  <td class="align-bottom"><h1>Enterate de las ultimas noticias, curiosidad y mas</h1></td>
                </tr>
              </tbody>
            </table>
            <hr>
            <div class="">
              <a href="blog" class="card-link btn btn-primary">Últimas Entradas</a>
            </div>            
          </div>
        </div>

        <div class="card bg-transparent border-0">
          <div class="img-transform m-2 h-auto shadow-sm">
              <img src="{{$entradaN[0]->imagen}}" class="card-img-top rounded hr-15" alt="...">
          </div>
          <div class="card-body">
            <h3 class="card-title text-left h-45">{{$entradaN[0]->nombre}}</h3>
            <p class="card-subtitle">{{$entradaN[0]->categoria->nombre}}</p>
            <hr>
            <a href="blog/entrada/{{$entradaN[0]->slug}}" class="card-link btn btn-primary">Leer Mas</a>
          </div>
        </div>
        
				<div class="card bg-transparent border-0">
						<div class="img-transform m-2 h-auto shadow-sm">
							  <img src="{{$entradaA[0]->imagen}}" class="card-img-top rounded hr-15" alt="...">
						</div>
					<div class="card-body">
						<h3 class="card-title text-left h-45">{{$entradaA[0]->nombre}}</h3>
            <p class="card-subtitle">{{$entradaA[0]->categoria->nombre}}</p>
            <hr>
						<a href="blog/entrada/{{$entradaA[0]->slug}}" class="card-link btn btn-primary">Leer Mas</a>
					</div>
        </div>
        
				<div class="card bg-transparent border-0">
						<div class="img-transform m-2 h-auto shadow-sm">
							  <img src="{{$entradaR[0]->imagen}}" class="card-img-top rounded hr-15" alt="...">
						</div>
					<div class="card-body">
						<h3 class="card-title text-left h-45">{{$entradaR[0]->nombre}}</h3>
            <p class="card-subtitle">{{$entradaR[0]->categoria->nombre}}</p>
            <hr>
						<a href="blog/entrada/{{$entradaR[0]->slug}}" class="card-link btn btn-primary">Leer Mas</a>
					</div>
				</div>
			</div>
	  </div>
</section>