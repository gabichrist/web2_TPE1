{include 'templates/header.tpl'}

<h1>Ingrese los datos del nuevo escritor</h1>

<form class="form-alta" action="admin" method="post">
    <input placeholder="nombre" type="text" name="name" id="name" required>
    <input placeholder="apellido" type="text" name="last-name" id="last-name" required>
    <input type="date" >
    <textarea placeholder="biografia" type="text" name="biography" id="biography"> </textarea>
    <input type="submit" class="btn btn-primary" value="Guardar">
</form>


{include 'templates/footer.tpl'} 