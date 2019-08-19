<template>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista de Etiquetas</h3>
                        <div class="card-tools">
                            <button class="btn btn-success" @click="newModal()">
                                Nueva Etiqueta
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
                                    <th>Fecha de Creación</th>
                                    <th>Fecha de Modificación</th>
                                    <th>Modificar</th>
                                </tr>
                                <tr v-for="etiqueta in etiquetas.data" :key="etiqueta.id">
                                    <td>{{etiqueta.id}}</td>
                                    <td>{{etiqueta.nombre}}</td>
                                    <td>{{etiqueta.created_at | myDate}}</td>
                                    <td>{{etiqueta.updated_at | myDate}}</td>
                                    <td>
                                        <a href="#" @click="editModal(etiqueta)">
                                        <i class="fa fa-edit blue"></i>
                                        </a>
                                        /
                                        <a href="#" @click="deleteTag(etiqueta.id)">
                                        <i class="fa fa-trash red"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <pagination :data="etiquetas" @pagination-change-page="getResults"></pagination>
                    </div>
                </div>
                <!-- /.card -->
                <!-- Modal -->
                <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Agregar Etiqueta</h5>
                                <h5 class="modal-title" v-show="editmode" id="addNewLabel">Actualizar Etiqueta</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form @submit.prevent="editmode ? updateTag() : createTag()">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input
                                        v-model="form.nombre"
                                        type="text"
                                        name="nombre"
                                        placeholder="Nombre de etiqueta"
                                        class="form-control"
                                        :class="{ 'is-invalid': form.errors.has('nombre') }"
                                        >
                                        <has-error :form="form" field="nombre"></has-error>
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
                etiquetas: {},
                form: new Form({
                    id: '',
                    nombre: '',
                    slug: ''
                })
            };
        },
        methods: {
            getResults(page = 1) {
                axios.get("/api/etiqueta?page=" + page).then(response => {
                    this.etiquetas = response.data;
                });
            },
            updateTag(){
                this.$Progress.start();
                this.form.put('/api/etiqueta/' + this.form.id)
                .then(()=>{
                    //success
                    $('#addNew').modal('hide');
                    Toast.fire({
                        type: 'success',
                        title: 'Etiqueta actualizada correctamente'
                    })
                    this.$Progress.finish();
                    Fire.$emit('AfterCreate');
                }).catch(()=>{
                    Toast.fire({
                        type: 'error',
                        title: 'ERROR - Etiqueta Repedita o Inválida'
                    })
                    this.$Progress.fail();
                });
            },
            editModal(etiqueta) {
                this.editmode = true;
                this.form.reset();
                $("#addNew").modal("show");
                this.form.fill(etiqueta);
            },
            newModal() {
                this.editmode = false;
                this.form.reset();
                $("#addNew").modal("show");
            },
            deleteTag(id){
                this.$Progress.start();
                Swal.fire({
                    title: '¿Estás Seguro?',
                    text: "¡Esta acción no se puede revertir!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, ¡Eliminar Etiqueta!'
                }).then((result) => {
                    //envia peticion al servidor                    
                    if (result.value) {
                        this.form.delete('/api/etiqueta/'+id).then(()=>{
                                Swal.fire(
                                '¡Eliminado!',
                                'La Etiqueta ha sido eliminada.',
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
            loadTags() {
                axios.get("/api/etiqueta").then(({ data }) => (this.etiquetas = data));
            },
            createTag() {
                this.$Progress.start();
                this.form.post("/api/etiqueta")
                .then(()=>{
                    Fire.$emit('AfterCreate')
                    $('#addNew').modal('hide')
                    Toast.fire({
                        type: 'success',
                        title: 'Etiqueta agregada correctamente'
                    })
                    this.$Progress.finish();
                }).catch(()=>{
                    Toast.fire({
                        type: 'error',
                        title: 'ERROR - Etiqueta Repetida o Inválida'
                    })
                    this.$Progress.fail();
                });
            }
        },
        created(){
            Fire.$on('searching',() =>{
                let query = this.$parent.search;
                axios.get('/api/findTag?t=' + query)
                .then((data) => {
                    this.etiquetas = data.data
                })
                .catch(() => {
                    ['message','nada mano ']
                })
            })
            this.loadTags();
            Fire.$on('AfterCreate', () =>{
                this.loadTags();
            });
        }
    }
</script>
