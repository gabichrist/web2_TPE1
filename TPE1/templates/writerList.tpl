{include 'templates/header.tpl'}

<h1>{$title}</h1>


<ul>
    {foreach from=$writers item=$writer}
    <li>
        <a href="view/{$writer->id_escritor}">{$writer->nombre} {$writer->apellido}</a>
    </li>
    {/foreach}
</ul>



{include 'templates/footer.tpl'}