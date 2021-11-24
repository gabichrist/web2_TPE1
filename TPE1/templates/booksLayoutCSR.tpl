{include 'templates/header.tpl'}

<div class= "container">
    <h1 id="title" data-book="{$book->id_libro}">{$title}</h1>

    <div>
        <h2>{$book->titulo} - {$book->nombre}, {$book->apellido}</h2>
        <p>{$book->sinopsis}</p>
        <p>{$book->genero} - {$book->anio}</p>
    </div>

    <div id="comments" data-isLogged="{$isLogged}" data-isAdmin="{$isAdmin}">
        {include 'vue/coments.tpl'}
         <div class="row" style="margin-bottom: 10%;">
        {if $isLogged}
        <h2>Agregá un comentario</h2>
        <form id="form" method="POST">
            <label class="form-label">Agrega un comentario</label>
            <input class="form-control"  name="comentario" placeholder="Comentario">
            <label class="form-label">¿Cuantos puntos le das?</label>

            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name='puntaje'>
                <option selected>Puntos</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <button id="test" class="btn btn-primary m-2" type="submit">Agregar</button>
        </form>
        {/if}
    </div>
    </div>
</div>


<script src="js/appComments.js"></script>
{include 'templates/footer.tpl'}
