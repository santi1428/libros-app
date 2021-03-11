<template>
    <div class="row">
        <div class="col">
            <div class="row" v-if="mostrarDetallesLibroModal">
                <detalle-del-libro-modal :detallesLibro="detallesLibro" v-on:cerrarDetallesModal="cerrarModal"></detalle-del-libro-modal>
            </div>
            <div class="row" v-if="agregado == true">
                <div class="col">
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <strong>Agregado. </strong> Se acaba de agregar un libro a tu coleccion.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Autor</th>
                                <th scope="col">Cant. paginas</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody v-if="libros.length > 0" class="text-center">
                        <!-- <tr v-for="libro in libros" v-bind:key="libro.id"> -->
                         <libro-component v-for="libro in libros" v-bind:key="libro.id" :libro="libro" :usuarioId="usuarioId" v-on:agregado="mostrarAlerta" v-on:mostrarDetallesLibro="mostrarDetallesLibro"></libro-component>
                        <!-- </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
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
import DetalleDelLibroModal from "./DetalleDelLibroModal";
export default {
    name: "ListarLibros",
    data(){
        return {
            libros: [],
            usuarioId: null,
            agregado: false,
            detallesLibro: null,
            mostrarDetallesLibroModal: false
        }
    },
    components: {
        "detalle-del-libro-modal": DetalleDelLibroModal,
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
                    categorias: libro.categories,
                    year: libro.publisher_date,
                    idioma: libro.language
                })
            });
        },
        mostrarAlerta(){
            this.agregado = true;
            setTimeout(() => {
               this.agregado = false;
           }, 3000);
        },
        async obtenerMisLibros(){
            const response = await obtenerMisLibros(this.usuarioId);
            console.log(response);
        },
        mostrarDetallesLibro(libro) {
           this.detallesLibro = libro;
           this.mostrarDetallesLibroModal = true;
        },
        cerrarModal(){
           this.mostrarDetallesLibroModal = false;
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
