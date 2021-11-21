"use strict";
document.addEventListener("DOMContentLoaded", async () => {
    let url = 'libros';
    let divPaginador = document.querySelector('#paginador');
    divPaginador.innerHTML = '';
    const cantPaginas = divPaginador.getAttribute('data-totalPage');
    for (let i = 0; i < cantPaginas; i++) {
        let divCol = document.createElement('div');
        divCol.setAttribute('class', 'col-1');
        let btnPaginador = document.createElement('button');
        btnPaginador.setAttribute('class', 'btn btn-link');
        btnPaginador.id = `btn-paginador${i + 1}`;
        let img = document.createElement('img');
        img.src = `https://img.icons8.com/ios/30/000000/${i + 1}.png`;
        btnPaginador.appendChild(img);
        divCol.appendChild(btnPaginador);
        divPaginador.appendChild(divCol);
        btnPaginador.addEventListener('click', async () => {

        })
    }




})
