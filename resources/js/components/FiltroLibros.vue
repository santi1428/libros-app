<template>
        <div class="modal animated fadeIn" tabindex="-1" role="dialog" id="myModal">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header px-3 py-2 bg-light text-dark">
                        <div class="w-100 text-center">
                            <h6 id="texto-encabezado" class="text-dark m-0">
                                Filtros
                            </h6>
                        </div>
                        <button  type="button" class="close" data-dismiss="modal" aria-label="Close" @click="cerrarModal">
                            <span aria-hidden="true" class="text-dark">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <hr>
                        <div class="row">
                            <div class="col-auto">
                                <p class="font-weight-bold">Titulo: </p>
                            </div>
                            <div class="col">
                                <p>

                                </p>
                            </div>
                        </div>
                        <div class="row justify-content-center m-1">
                            <div class="col-auto">
                                <h6 class="font-weight-bold">Categorias/Etiquetas</h6>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <span class="badge badge-pill badge-light"><i class="fas fa-tag text-dark mr-2"></i><span class="categoria">{{categoria.name}}</span></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</template>

<script>
export default {
    name: "FiltroLibros",
    methods: {
        cerrarModal(){
            $('#myModal').modal('hide');
            this.$emit("cerrarModal");
        },
    },
    mounted() {
        $('#myModal').modal({
            backdrop: 'static',
            keyboard: false
        });
    }

}
</script>

<style scoped>

</style>
