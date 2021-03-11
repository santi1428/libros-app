import axios from 'axios';
import { APP_ENDPOINT, API_ENDPOINT } from './conf';

const agregarLibro = async (usuarioId, libro) => {
    try{
        const request = await axios.post(`${APP_ENDPOINT}/api/agregarlibro`, {usuarioId, libroId: libro.id, nombre: libro.nombre, paginas: libro.paginas, descripcion: libro.descripcion, autor: libro.autor});
        return request.status;
    }catch(error){
        return error.response.status;
    }

}

const obtenerLibros = async () => {
    // const request = await axios.get('https://www.etnassoft.com/api/v1/get/?criteria=most_viewed&num_items=4&lang=english');
    const request = await axios.get(`${API_ENDPOINT}/?criteria=most_viewed&num_items=4&lang=english`)
    return request.data;
}

const obtenerLibrosConFiltro = async (autor, year, lenguaje) => {
    const request = await axios.get(`${API_ENDPOINT}/?num_items=4&lang=${lenguaje}&publisher_date=${year}&book_author=${autor}`)
    return request.data;
}

const obtenerMisLibros = async (usuarioId) => {
    const request = await axios.get(`${APP_ENDPOINT}/api/obtenerlibros/${usuarioId}`);
    return request.data;
}

export {
    agregarLibro,
    obtenerLibros,
    obtenerMisLibros,
    obtenerLibrosConFiltro
}
