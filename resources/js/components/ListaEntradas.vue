<template>
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Lista de Entradas</h3>

            <div class="card-tools">
              <button class="btn btn-success" @click="newModal()">
                Nueva Entrada
                <i class="fas fa-plus-circle"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <th>ID</th>
                  <th>Usuario</th>
                  <th>Titulo</th>
                  <th>Tipo</th>
                  <th>Estado</th>
                  <th>Fecha de Creación</th>
                  <th>Fecha de Modificación</th>
                  <th>Modificar</th>
                </tr>
                <tr v-for="entrada in entradas.data" :key="entrada.id">
                  <td>{{entrada.id}}</td>
                  <td>{{entrada.n_user}}</td>
                  <td>{{entrada.nombre}}</td>
                  <td>{{entrada.n_categoria}}</td>
                  <td>{{entrada.estado}}</td>
                  <td>{{entrada.created_at | myDate}}</td>
                  <td>{{entrada.updated_at | myDate}}</td>
                  <td>
                    <a href="#" @click="editModal(entrada)">
                      <i class="fa fa-edit blue"></i>
                    </a>
                    /
                    <a href="#" @click="deleteUser(entrada.id)">
                      <i class="fa fa-trash red"></i>
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <pagination :data="entradas" @pagination-change-page="getResults"></pagination>
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
            <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Agregar Entrada</h5>
            <h5 class="modal-title" v-show="editmode" id="addNewLabel">Actualizar Entrada</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="editmode ? updatePost() : createPost()">
            <div class="modal-body">
              <div class="form-group">
                <input
                  v-model="form.nombre"
                  type="text"
                  name="nombre"
                  placeholder="Titulo"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('nombre') }"
                >
                <has-error :form="form" field="nombre"></has-error>
              </div>

              <div class="form-group">
                <textarea
                  v-model="form.cuerpo"
                  name="cuerpo"
                  id="cuerpo"
                  placeholder="Contenido"
                  class="form-control"
                  style="height: 25rem;"
                  :class="{ 'is-invalid': form.errors.has('cuerpo') }"
                ></textarea>
                <has-error :form="form" field="cuerpo"></has-error>
              </div>

              <div class="form-group">
                <select
                  name="type"
                  v-model="form.type"
                  id="type"
                  class="form-control"
                  :class="{'is-invalid': form.errors.has('type')}"
                >
                  <option value>Sleccionar Rol de Usuario</option>
                  <option value="usuario">Usuario</option>
                  <option value="editor">Editor</option>
                </select>
                <has-error :form="form" field="type"></has-error>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <button v-show="editmode" type="submit" class="btn btn-success">Actualizar</button>
              <button v-show="!editmode" type="submit" class="btn btn-primary">Crear</button>
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
      editmode: false,
      entradas: {},
      form: new Form({
        id: '',
        user_id: '',
        n_user:'',
        categoria_id: '',
        nombre:'',
        n_categoria: '',
        slug: '',
        excerpt: '',
        cuerpo: '',
        estado: '',
        imagen: ''
      })
    };
  },
  methods: {
    getResults(page = 1) {
      axios.get("/api/entrada?page=" + page).then(response => {
        this.entradas = response.data;
      });
    },
    editModal(entrada) {
      this.editmode = true;
      this.form.reset();
      $("#addNew").modal("show");
      this.form.fill(entrada);
    },

    newModal() {
      this.editmode = false;
      this.form.reset();
      $("#addNew").modal("show");
    },
    loadPosts() {
      axios.get("/api/entrada").then(({ data }) => (this.entradas = data));
    },
    createPost() {
      this.form.post("/api/entrada");
    }
  },

  created() {
    Fire.$on('searching',() =>{
        let query = this.$parent.search;
        axios.get('/api/findPosts?p=' + query)
        .then((data) => {
            this.entradas = data.data
        })
        .catch(() => {
            ['message','nada mano ']
        })
    })
    this.loadPosts();
    Fire.$on('AfterCreate', () =>{
        this.loadPosts();
    });
  }
};
</script>
