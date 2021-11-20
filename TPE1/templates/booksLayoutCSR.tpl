{include 'templates/header.tpl'}

<div id= "container">
    <h1>{$title}</h1>

    <div>
        <h2>{$book->titulo} - {$book->nombre}, {$book->apellido}</h2>
        <p>{$book->sinopsis}</p>
        <p>{$book->genero} - {$book->anio}</p>
    </div>

    <div>
        {include 'vue/coments.tpl'}
    </div>
</div>


<script src="js/appComments.js"></script>
{include 'templates/footer.tpl'}
