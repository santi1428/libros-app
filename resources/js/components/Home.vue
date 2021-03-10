<template>
  <div class="row">
      <div class="col">
          <div class="row justify-content-center mb-2">
              <div class="col-auto">
                 <h4>Lista</h4>
              </div>
          </div>
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
                        <tbody>
                            <tr>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td></td>
                                <td>
                                    <button class="btn btn-sm btn-success">Agregar</button>
                                    <button class="btn btn-sm btn-primary">Ver</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
      </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
    name: "home",
    data(){
        return {
            books: []
        }
    },
    methods: {
        async obtenerLibros(){
            const datos = await axios.get('https://www.etnassoft.com/api/v1/get/?category=libros_programacion&criteria=most_viewed');
            console.log(datos);
        }
    },
    mounted(){
        console
        this.obtenerLibros();
    }
}
</script>

<style>

</style>