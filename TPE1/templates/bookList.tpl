{include 'templates/header.tpl'}

<h1>{$title}</h1>

<div>
    <ul>
        {foreach $books as $book}
        <li>
            <p> {$book->titulo} ({$book->nombre}, {$book->apellido})- &nbsp; <a href="libro/detalle/{$book->id_libro}"> Ver más</a>; </p>
            
        </li>
        {/foreach}
    </ul>
</div>

{include 'templates/footer.tpl'}