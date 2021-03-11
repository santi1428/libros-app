<template>
    <tr>
        <td>{{libro.nombre}}</td>
        <td v-html="libro.descripcion.substring(0, 100) + '...'"></td>
        <td>{{libro.autor}}</td>
        <td>{{libro.paginas}}</td>
        <td>
            <button class="btn btn-sm btn-success mb-2" title="Agregar" @click="agregarLibro(libro)" :disabled="agregado"><i class="fas fa-plus"></i></button>
            <button class="btn btn-sm btn-primary" title="Ver" @click="mostrarDetallesLibro(libro)"><i class="fas fa-eye"></i></button>
        </td>
    </tr>
</template>

<script>
import { agregarLibro } from '../API/requests';
export default {
    name: "Libro",
    props: ["libro", "usuarioId"],
    data(){
      return {
          agregado: false
      }
    },
    methods: {
        async agregarLibro(libro){
            const response = await agregarLibro(this.usuarioId, libro);
            if (response === 200){
                this.$emit('agregado');
                this.agregado = true;
            }
        },
        mostrarDetallesLibro(libro){
            this.$emit('mostrarDetallesLibro', libro);
        }
    }
}
</script>

<style>

</style>
