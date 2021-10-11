{include 'templates/header.tpl'}

<form action="escritores/edit/{$id}" method="POST">
    <label>Nombre</label>
    <input name="nombre" type="text" placeholder="Nombre" value="{$nombre}">
    <label>Apellido</label>
    <input name="apellido" type="text" placeholder="Apellido" value="{$apellido}">
    <label>Fecha Nacimiento</label>
    <input name="fecha_nacimiento" type="date" placeholder="Fecha_Nacimiento" value="{$fecha_nacimiento}">
    <label>Biografía</label>
    <textarea name="biografia" type="text" placeholder="biografia">
        {$biografia}
    </textarea>
    <button type="submit">Editar</button>
</form>

{include 'templates/footer.tpl'}