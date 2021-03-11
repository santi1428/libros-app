<template>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Cant. paginas</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody v-if="libros.length > 0">
                    <!-- <tr v-for="libro in libros" v-bind:key="libro.id"> -->
                        <libro-component v-for="libro in libros" v-bind:key="libro.id" :libro="libro" :usuarioId="usuarioId"></libro-component>
                    <!-- </tr> -->
                </tbody>
            </table>
            <div class="row justify-content-center mt-4" v-if="libros.length <= 0">
                <div class="col-auto">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { obtenerLibros, obtenerMisLibros }  from '../API/requests';
import Libro from './Libro';
export default {
    name: "ListarLibros",
    data(){
        return {
            libros: [],
            usuarioId: null
        }
    },
    components: {
        "libro-component": Libro
    },
    methods: {
       async asignarLibros(){
           const libros = await obtenerLibros();
            libros.forEach(libro => {
                this.libros.push({
                    id: parseInt(libro.ID),
                    nombre: libro.title,
                    descripcion: libro.content,
                    autor: libro.author,
                    paginas: parseInt(libro.pages),
                    categorias: libro.categories
                })
            });
        },
        async agregarLibro(libro){
            console.log("agregando libro", this.usuarioId);
            const response = await this.agregarLibro(this.usuarioId, libro);
            console.log(response);
        },
        async obtenerMisLibros(){
            const response = await obtenerMisLibros(this.usuarioId);
            console.log(response);
        }
    },
    mounted(){
        Vue.prototype.$userId = document.querySelector("meta[name='user-id']").getAttribute('content');
        this.usuarioId = this.$userId;
        this.asignarLibros();
        this.obtenerMisLibros();
    }

}
</script>

<style>

</style>
