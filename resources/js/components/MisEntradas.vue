<template>
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Lista de Entradas</h3>

            <div class="card-tools">
              <button class="btn btn-success" @click="newModal()">Nueva Entrada
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
                  <th>Titulo</th>
                  <th>Categoría</th>
                  <th>Estado</th>
                  <th>Fecha de Creación</th>
                  <th>Fecha de Modificación</th>
                  <th>Modificar</th>
                </tr>
              </tbody>
              <tbody v-for="entradas in misEntradas" :key="entradas.misEntradas"> 
                <tr v-for="data in entradas.data" :key="data.id">
                  <td>{{data.id}}</td>
                  <td>{{data.nombre}}</td>
                  <td>{{data.n_categoria}}</td>
                  <td>{{data.estado}}</td>
                  <td>{{data.created_at | myDate}}</td>
                  <td>{{data.updated_at | myDate}}</td>
                  <td>
                    <a href="#" @click="editModal(data)">
                      <i class="fa fa-edit blue"></i>
                    </a>
                    /
                    <a href="#" @click="deleteUser(data.id)">
                      <i class="fa fa-trash red"></i>
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <pagination :data="misEntradas.entradas" @pagination-change-page="getResults"></pagination>
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
                  v-model="form[0].form.nombre"
                  type="text"
                  name="nombre"
                  placeholder="Titulo"
                  class="form-control"
                  :class="{ 'is-invalid': form[0].form.errors.has('form.nombre') }"
                >
                <has-error :form="form[0].form" field="nombre"></has-error>
              </div>
              <div class="form-group">
                <select
                  name="categoria_id"
                  v-model="form[0].form.categoria_id"
                  id="categoria_id"
                  class="form-control"
                  :class="{'is-invalid': form[0].form.errors.has('categoria_id')}"
                >
                  <option value>Sleccionar Categoría</option>
                  <option value="1">Noticias</option>
                  <option value="2">Actualizaciones</option>
                  <option value="3">Recetas</option>
                </select>
                <has-error :form="form[0].form" field="categoria"></has-error>
              </div>
              <div class="form-group">
                <div class="form-check form-check-inline">
                  <label class="form-check-label" for="estado">Estado</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="PUBLICADO" v-model="form[0].form.estado" id="PUBLICADO" value="PUBLICADO">
                  <label class="form-check-label" for="PUBLICADO">Publicado</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="BORRADOR" v-model="form[0].form.estado" id="BORRADOR" value="BORRADOR">
                  <label class="form-check-label" for="BORRADOR">Borrador</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-check form-check-inline">
                  <label class="form-check-label" for="estado">Etiquetas</label>
                </div>
                <!-- <div v-for="etiqueta in misEntradas" :key="etiqueta.misEntradas">
                  <div v-for="data in etiqueta.data" :key="data.id" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions"  v-model="form[1].form.id" id="inlineRadio1" value="{{data.id}}">
                    <label class="form-check-label" for="inlineRadio1">{{data.nombre}}</label>
                  </div>
                </div> -->
                <has-error :form="form[1].form" field="id"></has-error>
              </div>
              <div class="form-group">
                <textarea
                  v-model="form[0].form.excerpt"
                  name="excerpt"
                  id="excerpt"
                  placeholder="Subtitulo"
                  class="form-control"
                  rows="3"
                  :class="{ 'is-invalid': form[0].form.errors.has('excerpt') }"
                ></textarea>
                <has-error :form="form[0].form" field="extracto"></has-error>
              </div>
              <div class="form-group">
                <textarea
                  v-model="form[0].form.cuerpo"
                  name="cuerpo"
                  id="cuerpo"
                  placeholder="Contenido"
                  class="form-control"
                  rows="7"
                  :class="{ 'is-invalid': form[0].form.errors.has('cuerpo') }"
                ></textarea>
                <has-error :form="form[0].form" field="cuerpo"></has-error>
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
  data(){
    return{
      editmode: false,
      misEntradas: {},
      form:[{
        form: new Form({
          id: '',
          user_id: '',
          categoria_id: '',
          nombre: '',
          slug: '',
          excerpt: '',
          cuerpo: '',
          estado: '',
          imagen: '',
        })  
      },
      {
        form: new Form({
          id: '',
          nombre: '',
        })
      }]
    }
  },
  
  methods: {
    getResults(page = 1) {
            axios.get('/api/misEntradas?page=' + page)
                .then(response => {
                  this.misEntradas = response.entrada;
                  console.log(this.misEntradas);
                  console.log(response.entrada);
                });
                
    },
    editModal(data) {
      this.editmode = true;
      this.form[0].form.reset();
      $("#addNew").modal("show");
      this.form[0].form.fill(data);
      console.log(this.form[0].form);

      this.form[1].form.reset();
      this.form[1].form.fill(data);
      console.log(this.form[1].form);
    },
    newModal() {
      this.editmode = false;
      this.form[0].form.reset();
      $("#addNew").modal("show");
    },
    loadPosts(){
      axios.get("/api/misEntradas").then(({data}) => (this.misEntradas = data));   
    },
    createPost(){
        this.form.post('/api/misEntradas');
    }
  },
  created() {
    this.loadPosts();
      // console.dir(this.misEntradas[1].id);
  }
};
</script>


