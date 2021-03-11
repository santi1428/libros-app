<script>
import { Pie } from 'vue-chartjs';
export default {
    name: "GraficaLibros",
    props: ["libros"],
    extends: Pie,
    data(){
        return {
            categorias: [],
            cantidadesPorCategoria: [],
            chartdata: {
                labels: [],
                datasets: [
                    {
                        label: 'Data One',
                        backgroundColor: ['#f88888', '#f99999', '#f87469', '#f82919', '#f87911', '#f87922', '#f833979', '#f844979', '#f55979', '#f87889', '#f817970', '#h320929', '#f87939', '#f47979', '#f57979', '#f67979', '#f77979', '#f77889'],
                        data: []
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        }
    },
    methods: {
        obtenerCantidadDeLibrosDeLaCategoria(categoriaNombre){
            let c = 0;
            this.libros.forEach(libro => {
                libro.categorias.forEach(categoria => {
                    if(categoria.name == categoriaNombre){
                        c++;
                    }
                })
            });
            return c;
        }
    },
    watch: {
        libros: function(libros, valorViejo) { // watch it
            this.categorias = [];
            this.cantidadesPorCategoria = [];
            this.chartdata.labels = [];
            this.chartdata.datasets[0].data = [];
            this.libros.forEach(libro => {
                libro.categorias.forEach(categoria => {
                    if(this.categorias.indexOf(categoria.name) === -1) {
                        this.categorias.push(categoria.name);
                    }
                })
            });
            this.categorias.forEach(categoria => {
                const cantidadDeLibrosPorCategoria = this.obtenerCantidadDeLibrosDeLaCategoria(categoria);
                this.cantidadesPorCategoria.push(cantidadDeLibrosPorCategoria);
            });
            this.chartdata.labels = this.categorias;
            this.chartdata.datasets[0].data = this.cantidadesPorCategoria;
        }
    },
    mounted () {
        this.renderChart(this.chartdata, this.options)
    }
}
</script>
<style scoped>

</style>
