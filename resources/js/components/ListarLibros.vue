<template>
    <div class="row">
        <div class="col">
            <div class="row" v-if="mostrarDetallesLibroModal">
                <div class="col">
                    <detalle-del-libro-modal :detallesLibro="detallesLibro" v-on:cerrarDetallesModal="cerrarDetallesModal"></detalle-del-libro-modal>
                </div>
            </div>
            <div class="row"  v-if="mostrarFiltrarLibrosModal">
                <div class="col">
                    <filtrar-libros v-on:aplicarFiltros="aplicarFiltros" v-on:cerrarFiltroModal="cerrarFiltroModal" v-if="mostrarFiltrarLibrosModal"></filtrar-libros>
                </div>
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
            <div class="row mb-3">
                <div class="col-auto">
                    <button class="btn btn-outline-dark" @click="mostrarModalDeFiltro"><i class="fas fa-filter mr-2"></i>Filtrar</button>
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
import { obtenerLibros, obtenerMisLibros, obtenerLibrosConFiltro }  from '../API/requests';
import Libro from './Libro';
import DetalleDelLibroModal from "./DetalleDelLibroModal";
import FiltrarLibros from "./FiltrarLibros";
export default {
    name: "ListarLibros",
    components: {
        "detalle-del-libro-modal": DetalleDelLibroModal,
        "libro-component": Libro,
        "filtrar-libros": FiltrarLibros
    },
    data(){
        return {
            libros: [],
            usuarioId: null,
            agregado: false,
            detallesLibro: null,
            mostrarDetallesLibroModal: false,
            mostrarFiltrarLibrosModal: false
        }
    },
    methods: {
       asignarLibros(libros){
            libros.forEach(libro => {
                this.libros.push({
                    id: parseInt(libro.ID),
                    nombre: libro.title,
                    descripcion: libro.content,
                    autor: libro.author,
                    paginas: parseInt(libro.pages),
                    categorias: libro.categories,
                    etiquetas: libro.tags,
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
        mostrarDetallesLibro(libro) {
           this.detallesLibro = libro;
           this.mostrarDetallesLibroModal = true;
        },
        mostrarModalDeFiltro(){
          this.mostrarFiltrarLibrosModal = true;
        },
        cerrarDetallesModal(){
           this.mostrarDetallesLibroModal = false;
        },
        aplicarFiltros(filtros){
           this.obtenerLibrosConFiltro(filtros);
           this.mostrarFiltrarLibrosModal = false;
        },
        cerrarFiltroModal(){
            this.mostrarFiltrarLibrosModal = false;
        },
        async obtenerLibros(){
            this.libros = [];
            const libros = await obtenerLibros();
            this.asignarLibros(libros);
       },
        async obtenerLibrosConFiltro(filtros){
            this.libros = [];
            const libros = await obtenerLibrosConFiltro(filtros.autor, filtros.lenguaje, filtros.year);
            this.asignarLibros(libros);
        }
    },
    mounted(){
        Vue.prototype.$userId = document.querySelector("meta[name='user-id']").getAttribute('content');
        this.usuarioId = this.$userId;
        this.obtenerLibros();
    }

}
</script>

<style>

</style>
