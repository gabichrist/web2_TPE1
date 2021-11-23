{include 'templates/header.tpl'}

<div id= "container" >
    <h1 id="title" data-book="{$book->id_libro}">{$title}</h1>

    <div>
        <h2>{$book->titulo} - {$book->nombre}, {$book->apellido}</h2>
        <p>{$book->sinopsis}</p>
        <p>{$book->genero} - {$book->anio}</p>
    </div>

    <div id="user" data-user="{$user->id_usuario}">
        {include 'templates/comments.tpl'}
    </div>
</div>


<script src="js/appComments.js"></script>
{include 'templates/footer.tpl'}
