<template>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista de Categorias</h3>
                        <div class="card-tools">
                            <button class="btn btn-success" @click="newModal()">
                                Nueva Categoria
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
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Fecha de Creación</th>
                                    <th>Fecha de Modificación</th>
                                    <th>Modificar</th>
                                </tr>
                                <tr v-for="categoria in categorias.data" :key="categoria.id">
                                    <td>{{categoria.id}}</td>
                                    <td>{{categoria.nombre}}</td>
                                    <td>{{categoria.cuerpo}}</td>
                                    <td>{{categoria.created_at | myDate}}</td>
                                    <td>{{categoria.updated_at | myDate}}</td>
                                    <td>
                                        <a href="#" @click="editModal(categoria)">
                                        <i class="fa fa-edit blue"></i>
                                        </a>
                                        /
                                        <a href="#" @click="deleteCategory(categoria.id)">
                                        <i class="fa fa-trash red"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <pagination :data="categorias" @pagination-change-page="getResults"></pagination>
                    </div>
                </div>
                <!-- /.card -->
                <!-- Modal -->
                <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Agregar Categoria</h5>
                                <h5 class="modal-title" v-show="editmode" id="addNewLabel">Actualizar Categoria</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form @submit.prevent="editmode ? updateCategory() : createCategory()">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input
                                        v-model="form.nombre"
                                        type="text"
                                        name="nombre"
                                        placeholder="Nombre de categoria (La primera letra en mayúsculas)."
                                        class="form-control"
                                        :class="{ 'is-invalid': form.errors.has('nombre') }"
                                        >
                                        <has-error :form="form" field="nombre"></has-error>
                                    </div>

                                    <div class="form-group">
                                        <textarea
                                        v-model="form.cuerpo" 
                                        name="cuerpo" 
                                        style="height: 15em !important"
                                        id="cuerpo" 
                                        placeholder="Descripción de la categoria."
                                        class="form-control" 
                                        :class="{ 'is-invalid': form.errors.has('cuerpo') }">
                                        </textarea>
                                        <has-error :form="form" field="cuerpo"></has-error>
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
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                editmode: false,
                categorias: {},
                form: new Form({
                    id: '',
                    nombre: '',
                    cuerpo: '',
                    slug: ''
                })
            };
        },
        methods: {
            getResults(page = 1) {
                axios.get("/api/categoria?page=" + page).then(response => {
                    this.categorias = response.data;
                });
            },
            updateCategory(){
                this.$Progress.start();
                this.form.put('/api/categoria/' + this.form.id)
                .then(()=>{
                    //success
                    $('#addNew').modal('hide');
                    Toast.fire({
                        type: 'success',
                        title: 'Categoria actualizada correctamente'
                    })
                    this.$Progress.finish();
                    Fire.$emit('AfterCreate');
                }).catch(()=>{
                    Toast.fire({
                        type: 'error',
                        title: 'ERROR - Categoria Repedita o Inválida'
                    })
                    this.$Progress.fail();
                });
            },
            editModal(categoria) {
                this.editmode = true;
                this.form.reset();
                $("#addNew").modal("show");
                this.form.fill(categoria);
            },
            newModal() {
                this.editmode = false;
                this.form.reset();
                $("#addNew").modal("show");
            },
            deleteCategory(id){
                this.$Progress.start();
                Swal.fire({
                    title: '¿Estás Seguro?',
                    text: "¡Esta acción no se puede revertir!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, ¡Eliminar Categoria!'
                }).then((result) => {
                    //envia peticion al servidor                    
                    if (result.value) {
                        this.form.delete('/api/categoria/'+id).then(()=>{
                                Swal.fire(
                                '¡Eliminado!',
                                'La Categoria ha sido eliminada.',
                                'success'
                                )
                            Fire.$emit('AfterCreate');
                            this.$Progress.finish();
                        }).catch(()=>{
                            Swal.fire("¡Error!", "Algo salió mal.", "warning");
                            this.$Progress.fail();
                        });
                    }else{
                        this.$Progress.finish();
                    }
                })
            },
            loadCategorys() {
                axios.get("/api/categoria").then(({ data }) => (this.categorias = data));
            },
            createCategory() {
                this.$Progress.start();
                this.form.post("/api/categoria")
                .then(()=>{
                    Fire.$emit('AfterCreate')
                    $('#addNew').modal('hide')
                    Toast.fire({
                        type: 'success',
                        title: 'Categoria agregada correctamente'
                    })
                    this.$Progress.finish();
                }).catch(()=>{
                    Toast.fire({
                        type: 'error',
                        title: 'ERROR - Categoria Repetida o Inválida'
                    })
                    this.$Progress.fail();
                });
            }
        },
        created(){
            Fire.$on('searching',() =>{
                let query = this.$parent.search;
                axios.get('/api/findCategory?c=' + query)
                .then((data) => {
                    this.categorias = data.data
                })
                .catch(() => {
                    ['message','nada mano ']
                })
            })
            this.loadCategorys();
            Fire.$on('AfterCreate', () =>{
                this.loadCategorys();
            });
        }
    }
</script>
