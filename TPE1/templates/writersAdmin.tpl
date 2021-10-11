{include 'templates/header.tpl'}

<h1>Administrador de Escritores <a class="btn btn-success" href="create" >Agregar</a></h1>


<ul>
    {foreach from=$writers item=$writer} 
    <li>
        <a href="view/{$writer->id_escritor}">{$writer->nombre} {$writer->apellido}</a>
        <a class="btn btn-success" href="/update/{$writer->id_escritor}">Editar </a>
        <a class="btn btn-danger" href= "delete/{$writer->id_escritor}">Borrar</a>
    </li>
    {/foreach}
</ul>




{include 'templates/footer.tpl'}