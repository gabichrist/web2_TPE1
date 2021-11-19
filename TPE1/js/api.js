"use strict";

const API_url = "api/libros";

let app= new Vue({
    el: "#app",
    data: {
        titulo: "Lista de tareas CSR",
        subtitulo: "Esta lista de tareas se renderiza desde JS usando Vue",

        tareas: [], // this->smarty->assign("tareas",  $tareas)
    },
}); 