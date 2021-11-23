"use strict"

const idUser = document.querySelector("#user").getAttribute('data-user');
const form = document.querySelector("#form");
const idBook = document.getElementById('title').getAttribute('data-book');
const API_URL = "api/libros/detalle";

document.querySelector("#btn-add").addEventListener("click", addComment);

async function getCommentsByBook() {

    const list= document.querySelector("#comments");
    try {
        let res = await fetch(`${API_URL}/${idBook}`);
        let comments = await res.json();
        for(const comment of comments){
            let comentario= comment.comentario;
            let nombre = comment.nombre;
            let puntaje = comment.puntuacion;
            let id = comment.id; 
          

            list.innerHTML += `<li>${nombre} || ${puntaje} <br> ${comentario} <button id="delete" class="btn btn-danger" > Eliminar </button> </li>`

            document.querySelector("#delete").addEventListener("click",(e) => {
                e.preventDefault();
                deleteComment(id);
            }); 
        }

    } catch (e) {
        console.log(e);
    }
}

getCommentsByBook();



async function deleteComment(id) {

    try {
        let res = await fetch(`${API_URL}/${idBook}/comments/${id}`, {
            "method": "DELETE",

        });
        if (res.status === 200) {
            console.log("Elimnado!");
        }
       
    } catch (error) {
        console.log(error);
    }
}



async function addComment() {

    let comentario = document.querySelector("#comentario").value;
    let puntaje= Number(document.querySelector("#puntaje").value);

    let newComment = {
        "comentario": comentario,
        "puntuacion": puntaje,
        "id_usuarios":idUser,
        "id_libro": idBook,
    }

    try {
        let res = await fetch(`${API_URL}/${idBook}/comments`, {
            "method": "POST",
            "headers": { "Content-type": "application/json" },
            "body": JSON.stringify(newComment),
        })
        if (res.ok) {
            console.log("Se ha agregado con exito");
            getCommentsByBook();
        }
    } catch (error) {
        console.log(error);
    }
}

