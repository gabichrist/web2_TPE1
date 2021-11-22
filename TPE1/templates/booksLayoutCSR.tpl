{include 'templates/header.tpl'}

<div class= "container">
    <h1 id="title" data-book="{$book->id_libro}">{$title}</h1>

    <div>
        <h2>{$book->titulo} - {$book->nombre}, {$book->apellido}</h2>
        <p>{$book->sinopsis}</p>
        <p>{$book->genero} - {$book->anio}</p>
    </div>

    <div id="comments" data-isLogged="{$isLogged}">
        {include 'vue/coments.tpl'}
    </div>
</div>


<script src="js/appComments.js"></script>
{include 'templates/footer.tpl'}
