{include 'templates/header.tpl'}

<h1 class="text-uppercase fw-light container" style="width: 60rem">{$title}</h1>

<div class="card container" style="width: 60rem" >
    <ul class="list-group list-group-flush">
        {foreach from=$books item=$book}
        <li class="list-group-item" >
            <p > {$book->titulo} ({$book->nombre}, {$book->apellido}) <a class="btn btn-link btn-sm" href="libros/detalle/{$book->id_libro}">
                    Ver más</a>
                {if $isLogged}
                <button class="btn"> <a class="btn btn-warning " href='libros/editar/{$book->id_libro}'>Editar </a></button>
                <button class="btn"> <a class="btn btn-danger "href="libros/eliminar/{$book->id_libro}">Eliminar</a> </button>
                {/if}
            </p>

        </li>
        {/foreach}
    </ul>
</div>

{if $isLogged}
<div class="container" style="width: 60rem">
    <h2 class="text-primary m-3">Agregar Libro</h2>
    <form class="mb-3" action="libros/agregar" method="POST" style="width: 30rem">
        <label class="form-label">Titulo</label>
        <input class="form-control"  name="titulo" placeholder="Título">
        <label class="form-label">Sinopsis</label>
        <input class="form-control" name="sinopsis" placeholder="Sinopsis">
        <label class="form-label">Género</label>
        <input class="form-control" name="genero" placeholder="Genero">
        <label class="form-label">Año</label>
        <input class="form-control"  name="anio" type="number" placeholder="Año">
        <label class="form-label" for="escritor">Escritor</label>
        <select class="form-select" name="escritor">
                {foreach from=$writers item=$writer}
                    <option value="{$writer->id_escritor}">{$writer->nombre}, {$writer->apellido} </option>
                {/foreach}
        </select>

        <button class="btn btn-primary m-2" type="submit" >Agregar</button>

    </form>
</div>
{/if}

{include 'templates/footer.tpl'}