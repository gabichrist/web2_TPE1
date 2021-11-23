"use strict"

document.addEventListener("DOMContentLoaded", async () => {

    const idUser = document.querySelector("#user").getAttribute('data-user');
    const idBook = document.getElementById('title').getAttribute('data-book');
    const API_URL = "api/libros/detalle";

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
            
                
                list.innerHTML += `<li>${nombre} || ${puntaje} <br> ${comentario} <button id="delete-${id}" class="btn btn-danger"> Eliminar </button> </li>`
                
                document.querySelector(`#delete-${id}`).addEventListener("click",async (e) => {
                    e.preventDefault();
                    deleteComment(id);
                }); 
            }
        } catch (e) {
            console.log(e);
        }
    }

    getCommentsByBook();

    async function deleteComment(id){
        try {
            let res = await fetch(`${API_URL}/${idBook}/comments/${id}`, {
                "method": "DELETE",

            });
            if (res.status === 200) {
                getCommentsByBook();
            }
        
        } catch (error) {
            console.log(error);
        }
    }


    document.querySelector("#btn-add").addEventListener("click", async (e) =>{

        e.preventDefault();

        let comentario = document.querySelector("#comentario").value;
        let puntaje= Number(document.querySelector("#puntaje").value);

        let newComment = {
            "comentario": comentario,
            "puntuacion": puntaje,
            "id_usuario":idUser,
            "id_libro": idBook
        }

        try {
            let res = await fetch(`${API_URL}/${idBook}/comments`, {
                "method": "POST",
                "mode": "cors",
                "headers": { "Content-type": "application/json" },
                "body": JSON.stringify(newComment),
            })
            if (res.ok) {
                return await res.json();
            } else {
                return false;
            }
        } catch (error) {
            console.log(error);
        }
    });
});
