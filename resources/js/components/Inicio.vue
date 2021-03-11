<template>
  <div class="row">
      <div class="col">
          <div class="row justify-content-center mb-2">
              <div class="col-auto">
                 <h4>Lista</h4>
              </div>
          </div>
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