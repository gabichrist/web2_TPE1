{include 'templates/header.tpl'}

<form action="libros/edit/{$id}" method="POST">
    <label>Titulo</label>
    <input name="titulo" placeholder="Titulo" value="{$titulo}">
    <label>Sinopsis</label>
    <input name="sinopsis" placeholder="Sinopsis" value="{$sinopsis}">
    <label>Género</label>
    <input name="genero" placeholder="Genero" value="{$genero}">
    <label>Año</label>
    <input name="anio" type="number" placeholder="Año" value="{$anio}">
    <button type="submit">Editar</button>
</form>

{include 'templates/footer.tpl'}