@php
$linea_i = substr($linea,6);
$url = $linea_i.'/'.$producto;
@endphp
<div class="p_contenedorProductoInterno">
    <div class="tituloAzul">
        <p>Pato Pekin</p> 
    </div>

    <div class="card-group m-3">
        <div class="card bg-transparent text-left border-0">
            <div class="card-body fuente-3 text-t-1-2">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolores obcaecati incidunt placeat culpa possimus modi hic odio voluptates quos, itaque non eligendi perferendis deleniti aliquam quam, veritatis dolorem repudiandae. Omnis?</p>
                    
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolores obcaecati incidunt placeat culpa possimus modi hic odio voluptates quos, itaque non eligendi perferendis deleniti aliquam quam, veritatis dolorem repudiandae. Omnis?</p>
            </div>
        </div>
        <div class="card bg-transparent border-0 pl-2 pr-2 pb-5">
            <img src="{{ URL::asset('imagenes/productos/producto-pato.jpg') }}" class="card-img-top h-auto rounded shadow-sm img-transform" alt="...">
        </div>
    </div>

    <div class="card-deck m-1">
        <div class="card text-white shadow-sm" style="background-color: rgb(13, 116, 229, 0.08) !important;">
            <div class="card-header">
                <h4 class="card-title text-primary text-center">Peso Pollo Macho</h4>
            </div>
            <div class="card-body">
                <p class="card-text text-dark fuente-3 text-t-1-1">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum similique amet vero pariatur nesciunt porro voluptatibus officiis quasi reprehenderit ab ullam quae minima exercitationem dolorem et repellat, repudiandae non numquam.</p>
            </div>
        </div>
        <div class="card text-white shadow-sm" style="background-color: rgb(13, 116, 229, 0.08) !important;">
            <div class="card-header">
                <h4 class="card-title text-primary text-center">Peso Pollo Hembra</h4>
            </div>
            <div class="card-body">
                <p class="card-text text-dark fuente-3 text-t-1-1">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Harum soluta assumenda commodi voluptatum totam deleniti sequi pariatur ea inventore corporis minus quis, exercitationem nihil consectetur quibusdam temporibus architecto mollitia excepturi?</p>
            </div>
        </div>
    </div>

    <div class="card-deck mt-5 m-1 mb-5">
        <div class="card text-center" style="background-color: rgb(13, 116, 229, 0.08) !important;">
            <div class="card-header">
                <h5 class="card-title" style="color:#0D74E5;"><i class="fas fa-feather-alt"></i>&nbsp;&nbsp;Tipos de Plumajes y Crestas</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item bg-transparent">Cras justo odio</li>
                <li class="list-group-item bg-transparent">Dapibus ac facilisis in</li>
                <li class="list-group-item bg-transparent">Vestibulum at eros</li>
                <li class="list-group-item bg-transparent">Vestibulum at eros</li>
                <li class="list-group-item bg-transparent">Vestibulum at eros</li>
            </ul>
        </div>
        <div class="card bg-transparent text-center" style="background-color: rgb(13, 116, 229, 0.08) !important;">
            <div class="card-header ">
                <h5 class="card-title" style="color:#0D74E5;"><i class="far fa-calendar-check"></i>&nbsp;&nbsp;Alimentacion</h5>
            </div>
            <div class="card-body fuente-3 text-t-1-3">
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis distinctio nihil sed fugiat ipsa. Magnam ducimus iusto quo, odit rem soluta libero totam ut necessitatibus earum iste veniam mollitia repudiandae.</p>
            </div>
        </div>
    </div>

    <div class="card-deck mt-5 m-1 mb-5">
        <div class="card text-center" style="background-color: rgb(13, 116, 229, 0.08) !important;">
            <div class="card-header">
                <h5 class="card-title" style="color:#0D74E5;"><i class="fas fa-info-circle"></i>&nbsp;&nbsp;Valor Nutricional</h5>
            </div>
            <ul class="list-group list-group-flush text-left">
                <li class="list-group-item bg-transparent">• Cras justo odio</li>
                <li class="list-group-item bg-transparent">• Dapibus ac facilisis in</li>
                <li class="list-group-item bg-transparent">• Vestibulum at eros</li>
                <li class="list-group-item bg-transparent">• Vestibulum at eros</li>
                <li class="list-group-item bg-transparent">• Vestibulum at eros</li>
            </ul>
        </div>
    </div>

    <div class="card-deck mt-5 m-1 mb-5">
        <div class="card text-center" style="background-color: rgb(13, 116, 229, 0.08) !important;">
            <div class="card-header">
                <h5 class="card-title" style="color:#0D74E5;"><i class="fas fa-camera"></i>&nbsp;&nbsp;Galeria de Imágenes</h5>
            </div>
            <section class="gallery-block compact-gallery">
                <div class="container">
                    <div class="row no-gutters">
                        <div class="col-md-6 col-lg-4 item zoom-on-hover">
                            <a class="lightbox imgGaleriaH" href="{{ URL::asset('imagenes/productos/'.$url) }}-1.jpg">
                                <img class="img-fluid image imgGaleriaS" src="{{ URL::asset('imagenes/productos/'.$url) }}-1.jpg">
                                <span class="description">
                                    <span class="description-heading">Lorem Ipsum</span>
                                    <span class="description-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna.Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                </span>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-4 item zoom-on-hover">
                            <a class="lightbox imgGaleriaH" href="{{ URL::asset('imagenes/productos/'.$url) }}-1.jpg">
                                <img class="img-fluid image imgGaleriaS" src="{{ URL::asset('imagenes/productos/'.$url) }}-1.jpg">
                                <span class="description">
                                    <span class="description-heading">Lorem Ipsum</span>
                                    <span class="description-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna.Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                </span>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-4 item zoom-on-hover">
                            <a class="lightbox imgGaleriaH" href="{{ URL::asset('imagenes/productos/'.$url) }}-1.jpg">
                                <img class="img-fluid image imgGaleriaS" src="{{ URL::asset('imagenes/productos/'.$url) }}-1.jpg">
                                <span class="description">
                                    <span class="description-heading">Lorem Ipsum</span>
                                    <span class="description-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna.Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                </span>
                            </a>
                        </div>    
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="mb-4 justify-content-center row">
        <a href="/contacto" class="btn btn-primary">¡Cotizar ahora!</a>
    </div>
</div>