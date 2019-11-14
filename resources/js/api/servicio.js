const url_base = "/";

export default {
    url() {
        return url_base;
    },

    verificarPlaca(fecha, placa) {
        return axios.post(this.url() + "validar-placa", {
            fecha: fecha,
            placa: placa
        });
    }
}