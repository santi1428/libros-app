import axios from 'axios';
import { APP_ENDPOINT } from './conf';

const agregarLibro = async (usuarioId, libro) => {
    try{
        const request = await axios.post(`${APP_ENDPOINT}/api/agregarlibro`, {usuarioId, libroId: libro.id, nombre: libro.nombre, paginas: libro.paginas, descripcion: libro.descripcion, autor: libro.autor});
        return request.status;
    }catch(error){
        return error.response.status;
    }

}

const obtenerLibros = async () => {
    const request = await axios.get('https://www.etnassoft.com/api/v1/get/?criteria=most_viewed&num_items=4');
    return request.data;
}

const obtenerMisLibros = async (usuarioId) => {
    const request = await axios.get(`${APP_ENDPOINT}/api/obtenerlibros/${usuarioId}`);
    return request.data;
}

export {
    agregarLibro,
    obtenerLibros,
    obtenerMisLibros
}
