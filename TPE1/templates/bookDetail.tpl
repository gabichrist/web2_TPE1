{include 'templates/header.tpl'}

<h1>{$title}</h1>

<div>
    <h2>{$book->titulo} - {$book->nombre}, {$book->apellido}</h2>
    <p>{$book->sinopsis}</p>
    <p>{$book->genero} - {$book->anio}</p>
</div>


{include 'templates/footer.tpl'}