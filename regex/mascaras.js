export default {
    cpf(event) {
        return event.target.value
            .replace(/[^0-9]/g, "")
            .replace(/([0-9]{3})([0-9])/, "$1.$2")
            .replace(/([0-9]{3})([0-9])/, "$1.$2")
            .replace(/([0-9]{3})([0-9])/, "$1-$2")
            .replace(/(-[0-9]{2}).+/, "$1");
    },
    rg(event) {
        return event.target.value
            .replace(/[^0-9]/g, "")
            .replace(/([0-9]{2})([0-9])/, "$1.$2")
            .replace(/([0-9]{3})([0-9])/, "$1.$2")
            .replace(/([0-9]{3})([0-9])/, "$1-$2")
            .replace(/(-[0-9]).+/, "$1");
    },
    celular(event) {
        return event.target.value
            .replace(/[^0-9]/g, "")
            .replace(/([0-9])/, "($1")
            .replace(/([0-9]{2})([0-9])/, "$1) $2")
            .replace(/([0-9]{5})([0-9])/, "$1-$2")
            .replace(/(-[0-9]{4}).+/, "$1");
    },
    cep(event) {
        return event.target.value
            .replace(/[^0-9]/g, "")
            .replace(/([0-9]{5})([0-9])/, "$1-$2")
            .replace(/(-[0-9]{3}).+/, "$1");
    },
    //Máscaras  para bloquear caracteres proibidos a partir daqui
    email(event) {
        return event.target.value.replace(/[^0-9a-z.@]/gi, "");
    },
    nome(event) {
        return event.target.value.replace(/[^a-zà-ú ]/gi, "");
    },
    estado(event) {
        return event.target.value.replace(/[^a-zà-ú ]/gi, "");
    },
    cidade(event) {
        return event.target.value.replace(/[^a-zà-ú' \-]/gi, "");
    },
    bairro(event) {
        return event.target.value.replace(/[^a-zà-ú0-9' \-]/gi, "");
    },
    rua(event) {
        return event.target.value.replace(/[^a-zà-ú0-9' \-]/gi, "");
    },
    numero(event) {
        return event.target.value.replace(/[^0-9]/g, "");
    },
};
