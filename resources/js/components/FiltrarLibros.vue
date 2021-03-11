<template>
        <div class="modal animated fadeIn" tabindex="-1" role="dialog" id="filtrar-libros-modal">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header px-3 py-2 bg-light text-dark">
                        <div class="w-100 text-center">
                            <h6 id="texto-encabezado" class="text-dark m-0">
                                <i class="fas fa-filter mr-2"></i>Filtros
                            </h6>
                        </div>
                        <button  type="button" class="close" data-dismiss="modal" aria-label="Close" @click="cerrarModal">
                            <span aria-hidden="true" class="text-dark">&times;</span>
                        </button>
                    </div>
                    <form class="modal-body" v-on:submit.prevent>
                        <div class="row mt-2 mb-3">
                            <div class="col-3">
                                <p class="font-weight-bold">Autor: </p>
                            </div>
                            <div class="col">
                                <input type="text" id="autor" name="autor" v-model="autor" class="form-control" placeholder="Ingresa el autor" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">
                                <p class="font-weight-bold">Año: </p>
                            </div>
                            <div class="col">
                                <input type="number" id="year" name="year" v-model="year" class="form-control" placeholder="Ingresa el año de publicacion" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">
                                <p class="font-weight-bold">Lenguaje: </p>
                            </div>
                            <div class="col">
                                <select class="form-control" aria-label="Default select example" name="lenguaje" v-model="lenguaje" required>
                                    <option selected>Desplegar</option>
                                    <option value="spanish">Español</option>
                                    <option value="english">Ingles</option>
                                    <option value="german">Aleman</option>
                                    <option value="portuguese">Portugues</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="submit" class="btn btn-block btn-dark" @click="aplicarFiltros" value="Aplicar Filtros" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</template>

<script>
export default {
    name: "FiltrarLibros",
    data(){
      return {
          autor: "",
          year: "",
          lenguaje: "spanish"
      }
    },
    methods: {
        aplicarFiltros(){
            $('#filtrar-libros-modal').modal('hide');
            this.$emit("aplicarFiltros", {autor: this.autor, year: this.year, lenguaje: this.lenguaje});
        },
        cerrarModal(){
            $('#filtrar-libros-modal').modal('hide');
            this.$emit("cerrarFiltroModal");
        }
    },
    mounted() {
        $('#filtrar-libros-modal').modal({
            backdrop: 'static',
            keyboard: false
        });
    }

}
</script>

<style scoped>

</style>
