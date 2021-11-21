"use strict"

const idBook = document.getElementById('title').getAttribute('data-book');
const API_URL = "api/libros/detalle";



let appCommensts = new Vue({
    el: "#appComments",
    data: {
        titulo: "Comentarios",
        comentarios: [],
    },
});



document.querySelector("#form").addEventListener("submit", e => {
    e.preventDefault();
    // comentarios.push();
});


async function getCommentsByBook() {
    try {
        let res = await fetch(`${API_URL}/${idBook}`);
        let comments = await res.json();

        appCommensts.comentarios = comments;
        console.log(comments);
    } catch (e) {
        console.log(e);
    }
}


getCommentsByBook();

async function deleteComment() {

    try {
        let res = await fetch(`${API_URL}/${idBook}`, {
            "method": "DELETE",
        });
        if (res.status === 200) {
            document.querySelector("#mensaje").innerHTML = `Eliminado!`;
        }
    } catch (error) {
        console.log(error);
    }
}

async function addComment() {
    let newComment = {
        puntuacion: " ",
        id_usuarios: " ",
        id_libro: idBook,
        nombre: " ",
        mail: " ",
        clave: "",
        rol: ""
    }

    try {
        let res = await fetch(`${API_URL}`, {
            "method": "POST",
            "headers": { "Content-type": "application/json" },
            "body": JSON.stringify(newComment),
        })
        if (res.ok) {
            console.log("Se ha agregado con exito");
        }
    } catch (error) {
        console.log(error);
    }
}

