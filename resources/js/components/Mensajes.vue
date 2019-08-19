<template>
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Lista de Mensajes</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Telefono</th>
                  <th>Fecha de Contácto</th>
                  <th>Ver</th>
                </tr>
                <tr v-for="contacto in contactos.data" :key="contacto.id">
                  <td>{{contacto.nombre}}</td>
                  <td>{{contacto.email}}</td>
                  <td>{{contacto.telefono}}</td>
                  <td>{{contacto.created_at | myDate}}</td>
                  <td>
                    <a href="#" @click="verModal(contacto)">
                      <i class="fa fa-eye green"></i>
                    </a>
                    /
                    <a href="#" @click="deleteContacto(contacto.id)">
                      <i class="fa fa-trash red"></i>
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <pagination :data="contactos" @pagination-change-page="getResults"></pagination>
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>

<!-- Modal -->
    <div
      class="modal fade"
      id="addNew"
      tabindex="-1"
      role="dialog"
      aria-labelledby="addNewLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addNewLabel">Ver Mensaje</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form>
            <div class="modal-body">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nombre:</label>
                <div class="col-sm-10">
                  <input 
                  v-model="form.nombre" 
                  type="text" 
                  readonly 
                  name="nombre"
                  class="form-control-plaintext" 
                  :class="{ 'is-invalid': form.errors.has('nombre') }">
                </div>
                <has-error :form="form" field="nombre"></has-error>
              </div>
              
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email:</label>
                <div class="col-sm-10">
                  <input 
                  v-model="form.email" 
                  type="email" 
                  readonly 
                  name="email"
                  class="form-control-plaintext" 
                  :class="{ 'is-invalid': form.errors.has('email') }">
                </div>
                <has-error :form="form" field="email"></has-error>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Telefono:</label>
                <div class="col-sm-10">
                  <input 
                  v-model="form.telefono" 
                  type="number" 
                  readonly 
                  name="telefono"
                  class="form-control-plaintext" 
                  :class="{ 'is-invalid': form.errors.has('telefono') }">
                </div>
                <has-error :form="form" field="telefono"></has-error>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Ubicación:</label>
                <div class="col-sm-10">
                  <input 
                  v-model="form.ubicacion" 
                  type="text" 
                  readonly 
                  name="ubicacion"
                  class="form-control-plaintext" 
                  :class="{ 'is-invalid': form.errors.has('ubicacion') }">
                </div>
                <has-error :form="form" field="ubicacion"></has-error>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Asunto:</label>
                <div class="col-sm-10">
                  <input 
                  v-model="form.asunto" 
                  type="text" 
                  readonly 
                  name="asunto"
                  class="form-control-plaintext" 
                  :class="{ 'is-invalid': form.errors.has('asunto') }">
                </div>
                <has-error :form="form" field="asunto"></has-error>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Mensaje:</label>
                <div class="col-sm-10">
                  <textarea
                  v-model="form.mensaje"
                  readonly
                  name="mensaje"
                  id="mensaje"
                  class="form-control"
                  rows="5"
                  :class="{ 'is-invalid': form.errors.has('mensaje') }">
                  </textarea>
                <has-error :form="form" field="mensaje"></has-error>
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      contactos: {},
      form: new Form({
        id: '',
        nombre: '',
        email: '',
        telefono: '',
        ubicacion: '',
        asunto: '',
        mensaje: '',
      })
    };
  },
  methods: {
    getResults(page = 1) {
      axios.get("/api/mensaje?page=" + page).then(response => {
        this.contactos = response.data;
      });
    },
    verModal(contacto) {
      this.form.reset();
      $("#addNew").modal("show");
      this.form.fill(contacto);
    },
    deleteContacto(id){
        Swal.fire({
            title: '¿Estás Seguro?',
            text: "¡Esta acción no se puede revertir!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, ¡Eliminar Mensaje!'
            }).then((result) => {
                //envia peticion al servidor
                if (result.value) {
                    this.form.delete('/api/mensaje/'+id).then(()=>{
                            Swal.fire(
                            '¡Eliminado!',
                            'El Mensaje ha sido eliminado.',
                            'success'
                            )
                        Fire.$emit('AfterCreate')          
                    }).catch(()=>{
                        Swal.fire("¡Error!", "Algo salió mal.", "warning");
                });
            }
        })
    },
    loadMsg() {
      axios.get("/api/mensaje").then(({ data }) => (this.contactos = data));
    }
  },
  created() {
    Fire.$on('searching',() =>{
        let query = this.$parent.search;
        axios.get('/api/findMsg?p=' + query)
        .then((data) => {
            this.contactos = data.data
        })
        .catch(() => {
            ['message','nada mano ']
        })
    })
    this.loadMsg();
    Fire.$on('AfterCreate', () =>{
        this.loadMsg();
    });
  }
};
</script>
