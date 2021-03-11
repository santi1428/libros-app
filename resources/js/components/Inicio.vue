<template>
  <div class="row">
      <div class="col">
          <listar-libros></listar-libros>
      </div>
  </div>
</template>

<script>

import ListarLibros from './ListarLibros';
export default {
    name: "Inicio",
    components: {
        'listar-libros': ListarLibros
    },
    data(){
        return {

        }
    },
    methods: {

    },
    mounted(){

    }
}
</script>

<style>

</style>
