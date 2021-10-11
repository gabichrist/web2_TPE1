{include 'templates/header.tpl'}


<h1>{$writer->nombre} {$writer->apellido}</h1>

<h2>{$writer->fecha_nacimiento}</h2>

<p>{$writer->biografia}</p>

<h3>Libros publicados</h3>

<ul>
    {foreach from=$books item=$book}
    <li>
        {if $book->writer}
        <a href="view/{$book->id_libro}">{$book->titulo} {$book->anio}</a>
    </li>
    {/foreach}
</ul>



{include 'templates/footer.tpl'}