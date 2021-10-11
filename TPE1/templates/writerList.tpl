{include 'templates/header.tpl'}

<h1>{$title}</h1>

<div class="container">
    <ul>
        {foreach from=$writers item=$writer}
        <li>
            <p> {$writer->nombre}, {$writer->apellido} ({$writer->fecha_nacimiento}), {$writer->biografia}- &nbsp;
             <a class="btn-link" href="escritores/libros/{$writer->id_escritor}">Ver Libros</a>;
                {if $isLogged}
                    <button class="btn btn-info"> <a href='escritores/editar/{$writer->id_escritor}'>Editar </a></button>
                    <button class="btn btn-info"> <a href="escritores/eliminar/{$writer->id_escritor}">Eliminar</a> </button>
                {/if}
            </p>
        </li>
        {/foreach}
    </ul>
</div>

{if $isLogged}
<div class="container">
    <h2>Agregar Escritor</h2>
        <form action="escritores/agregar" method="POST">
    <label>Nombre</label>
    <input name="nombre" type="text" placeholder="Nombre" >
    <label>Apellido</label>
    <input name="apellido" type="text" placeholder="Apellido">
    <label>Fecha Nacimiento</label>
    <input name="fecha_nacimiento" type="date" placeholder="Fecha_Nacimiento">
    <label>Biografía</label>
    <textarea name="biografia" type="text" placeholder="biografia">
    </textarea>

     <button class="btn btn-info" type="submit">Agregar</button>

        </form>
</div>
{/if}

{include 'templates/footer.tpl'}