<template>
    <div class="container">
        <div class="row mt-5" v-if="$gate.esAdministradorOrEditor()">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de Usuarios</h3>

                <div class="card-tools">
                    <button class="btn btn-success" @click="newModal()">Añadir Nuevo <i class="fas fa-user-plus fa-fw"></i></button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Tipo</th>
                        <th>Fecha de Registro</th>
                        <th>Modificar</th>
                    </tr>
                    <tr v-for="user in users.data" :key="user.id">
                        <td>{{user.id}}</td>
                        <td>{{user.name}}</td>
                        <td>{{user.email}}</td>
                        <td>{{user.type | upText}}</td>
                        <td>{{user.created_at | myDate}}</td>                    
                    <td>
                        <a href="#" @click="editModal(user)">
                            <i class="fa fa-edit blue"></i>
                        </a>
                        /
                        <a href="#" @click="deleteUser(user.id)">
                            <i class="fa fa-trash red"></i>
                        </a>
                    </td>
                  </tr>
                </tbody></table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <pagination :data="users" @pagination-change-page="getResults"></pagination>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>

        <div v-if="!$gate.esAdministradorOrEditor()">
            <not-found></not-found>
        </div>

        <!-- Modal -->
    <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Añadir Nuevo</h5>
                <h5 class="modal-title" v-show="editmode" id="addNewLabel">Actualizar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="editmode ? updateUser() : createUser()">
            <div class="modal-body">
                <div class="form-group">
                    <input v-model="form.name" type="text" name="name" placeholder="Nombre de Usuario"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                    <has-error :form="form" field="name"></has-error>
                </div>

                <div class="form-group">
                    <input v-model="form.email" type="email" name="email" placeholder="Correo Electrónico"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                    <has-error :form="form" field="email"></has-error>
                </div>

                <div class="form-group">
                    <textarea v-model="form.bio" name="bio" id="bio" placeholder="Descripcion del usuario (Opcional)"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('bio') }"></textarea>
                    <has-error :form="form" field="bio"></has-error>
                </div>

                <div class="form-group">
                    <select name="type" v-model="form.type" id="type" class="form-control" :class="{'is-invalid': form.errors.has('type')}">
                        <option value="">Sleccionar Rol de Usuario</option>
                        <option value="usuario">Usuario</option>
                        <option value="editor">Editor</option>
                    </select>
                    <has-error :form="form" field="type"></has-error>
                </div>

                <div class="form-group">
                    <input v-model="form.password" type="password" name="password" id="password" placeholder="Contraseña"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                    <has-error :form="form" field="password"></has-error>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button v-show="editmode" type="submit" class="btn btn-success">Actualizar</button>
                <button v-show="!editmode" type="submit" class="btn btn-primary">Guardar</button>
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
                users : {},
                form: new Form({
                    id : '',
                    name : '',
                    email : '',
                    password : '',
                    type : '',
                    bio : '',
                    photo : ''
                }) 
            }
        },
        methods:{
            getResults(page = 1) {
                axios.get('/api/user?page=' + page)
                    .then(response => {
                        this.users = response.data;
                        console.log(this.users);
                        console.log(response.data);
                    });
            },
            updateUser(){
                this.$Progress.start();
                this.form.put('/api/user/' + this.form.id)
                .then(()=>{
                    //success
                    $('#addNew').modal('hide');
                    Swal.fire(
                        '¡Actualizado!',
                        'La informacion ha sido actualizada.',
                        'success'
                        )
                        this.$Progress.finish();
                        Fire.$emit('AfterCreate');
                }).catch(()=>{
                    this.$Progress.fail();
                });
            },
            editModal(user){
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(user);
                console.log(this.form);
            },

            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show')
            },

            deleteUser(id){
                Swal.fire({
                    title: '¿Estás Seguro?',
                    text: "¡Esta acción no se puede revertir!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, ¡Eliminar Usuario!'
                    }).then((result) => {
                        //envia peticion al servidor
                        if (result.value) {
                            this.form.delete('/api/user/'+id).then(()=>{
                                    Swal.fire(
                                    '¡Eliminado!',
                                    'El Usuario ha sido eliminado.',
                                    'success'
                                    )
                                Fire.$emit('AfterCreate')          
                            }).catch(()=>{
                                Swal.fire("¡Error!", "Algo salió mal.", "warning");
                        });
                    }
                })
            },
            
            loadUsers(){
                if(this.$gate.esAdministradorOrEditor()){
                    axios.get("/api/user").then(({data}) => (this.users = data));    
                }
            },

            createUser(){
                this.$Progress.start();
                this.form.post('/api/user')
                .then(() => {
                    Fire.$emit('AfterCreate')
                    $('#addNew').modal('hide')
                    Toast.fire({
                        type: 'success',
                        title: 'Usuario agregado correctamente'
                    })
                    this.$Progress.finish();
                })
                .catch(() => {
                    Toast.fire({
                        type: 'error',
                        title: 'ERROR - Usuario Repetido o Inválido'
                    })
                    this.$Progress.fail();
                })           
                
            }
        },
        created() {
            Fire.$on('searching',() =>{
                let query = this.$parent.search;
                axios.get('/api/findUser?q=' + query)
                .then((data) => {
                    this.users = data.data
                })
                .catch(() => {

                })
            })
            this.loadUsers();
            Fire.$on('AfterCreate', () =>{
                this.loadUsers();
            });
            //setInterval(() => this.loadUsers(), 3000);
        },
        mounted() {
            console.log("Component mounted.");
        }
    }
</script>
