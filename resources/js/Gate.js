export default class Gate{
    
    constructor(user){
        this.user = user;
    }

    esAdministrador(){
        return this.user.type === 'administrador';
    }

    esUsuario(){
        return this.user.type === 'usuario';
    }

    esAdministradorOrEditor(){
        if (this.user.type === 'administrador' || this.user.type === 'editor') {
            return true;
        }
    }

    esUsuarioOrEditor(){
        if (this.user.type === 'usuario' || this.user.type === 'editor') {
            return true;
        }
    }


}

