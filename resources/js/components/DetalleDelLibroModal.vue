<template>
    <div class="modal animated fadeIn" tabindex="-1" role="dialog" id="detalle-libro-modal">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header px-3 py-2 bg-light text-dark">
                    <div class="w-100 text-center">
                        <h6 id="texto-encabezado" class="text-dark m-0" v-if="detallesLibro !== null">
                            {{detallesLibro.nombre}}
                        </h6>
                    </div>
                    <button  type="button" class="close" data-dismiss="modal" aria-label="Close" @click="cerrarModal">
                        <span aria-hidden="true" class="text-dark">&times;</span>
                    </button>
                </div>
                <div class="modal-body" v-if="detallesLibro !== null">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <i class="fas fa-book fa-5x"></i>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-auto">
                            <p class="font-weight-bold">Titulo: </p>
                        </div>
                        <div class="col">
                            <p>
                                {{detallesLibro.nombre}}
                            </p>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <p class="font-weight-bold">Autor: </p>
                        </div>
                        <div class="col">
                            <p>
                                {{detallesLibro.autor}}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <p class="font-weight-bold">Descripcion: </p>
                        </div>
                        <div class="col">
                            <p v-html="detallesLibro.descripcion.substring(0, 300) + '...'"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <p class="font-weight-bold">Año: </p>
                        </div>
                        <div class="col">
                            <p>
                                {{detallesLibro.year}}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <p class="font-weight-bold">Idioma: </p>
                        </div>
                        <div class="col">
                            <p>
                                {{detallesLibro.idioma}}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <p class="font-weight-bold">Categorias: </p>
                        </div>
                        <div class="col">
                            <span v-for="categoria in detallesLibro.categorias" class="mr-2">{{categoria.name + ","}}</span>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-3 mb-2">
                        <div class="col-auto" v-for="etiqueta in detallesLibro.etiquetas">
                            <span class="badge badge-pill badge-light"><i class="fas fa-tag text-dark mr-2"></i><span class="categoria">{{etiqueta.name}}</span></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "DetalleDelLibroModal",
    props: ["detallesLibro"],
    methods: {
        cerrarModal(){
            $('#detalle-libro-modal').modal('hide');
            this.$emit("cerrarDetallesModal");
        },
    },
    mounted() {
        $('#detalle-libro-modal').modal({
            backdrop: 'static',
            keyboard: false
        });
    }
}
</script>

<style scoped>
    .categoria{
        font-size: 0.9rem;
    }
</style>
