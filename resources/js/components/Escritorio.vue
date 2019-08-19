<template>
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-12">
            <div class="card-header mt-2">
               <h3 class="card-title text-center">Escritorio</h3>
            </div>
            <div class="card-deck mt-2">
               <div class="card p-5">
                  <img src="/img/usuarios.png" class="card-img-top" alt="usuarios">
                  <div class="card-body text-center">
                     <h1>Usuarios</h1>
                     <hr>
                     <h5>Total: {{this.escritorio[0]}} Usuarios</h5>
                  </div>
               </div>
               <div class="card p-5">
                  <img src="/img/entradas.png" class="card-img-top" alt="entradas">
                  <div class="card-body text-center">
                     <h1>Entradas</h1>
                     <hr>
                     <h5>Total: {{this.escritorio[1]}} Entradas</h5>
                  </div>
               </div>
               <div class="card p-5">
                  <img src="/img/mensajes.png" class="card-img-top" alt="mensajes">
                  <div class="card-body text-center">
                     <h1>Mensajes</h1>
                     <hr>
                     <h5>Total: {{this.escritorio[2]}} Mensajes</h5>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</template>

<script>
   export default {
      data(){
         return{
            escritorio : [],
         }
      },
      methods:{
         loadTotal(){
            axios.get("/api/escritorio").then(({data}) => (this.escritorio = data));  
         },
      },
      mounted() {
         console.log('Component mounted.')
      },
      created() {
         this.loadTotal();
      }
   }
</script>
