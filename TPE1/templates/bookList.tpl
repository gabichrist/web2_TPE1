{include 'templates/header.tpl'}

<h1>{$title}</h1>

<div>
    <ul>
        {foreach from=$books item=$book}
        <li>
            <p> {$book->titulo} ({$book->nombre}, {$book->apellido}) &nbsp; <a href="libros/detalle/{$book->id_libro}">
                    Ver más</a>;
                {if $isLogged}
                <button> <a href='libros/editar/{$book->id_libro}'>Editar </a></button>
                <button> <a href="libros/eliminar/{$book->id_libro}">Eliminar</a> </button>
                {/if}
            </p>

        </li>
        {/foreach}
    </ul>
</div>

{if $isLogged}
<div>
    <h2>Agregar Libro</h2>
    <form action="libros/agregar" method="POST">
        <label>Titulo</label>
        <input name="titulo" placeholder="Titulo">
        <label>Sinopsis</label>
        <input name="sinopsis" placeholder="Sinopsis">
        <label>Género</label>
        <input name="genero" placeholder="Genero">
        <label>Año</label>
        <input name="anio" type="number" placeholder="Año">
        <label for="escritor">Escritor</label>
        <select name="escritor">
                {foreach from=$writers item=$writer}
                    <option value="{$writer->id_escritor}">{$writer->nombre}, {$writer->apellido} </option>
                {/foreach}
        </select>

        <button type="submit">Agregar</button>

    </form>
</div>
{/if}

{include 'templates/footer.tpl'}