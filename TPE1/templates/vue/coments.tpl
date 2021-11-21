{literal}
<div id="appComments">

    <h2>Comentarios</h2>
    <ul>
        <li v-for="comentario in comentarios">
            {{comentario.nombre}}{{comentario.apellido}}
            {{comentario.puntaje}}
            {{comentario.comentario}}
            <button class="btn"> <a class="btn btn-danger " href="libros/eliminar/{$book->id_libro}">Eliminar</a>
            </button>
        </li>

    </ul>

    <div class="row" style="margin-bottom: 10%;">
        <form id="form">
            <label class="form-label">Agrega un comentario</label>
            <input class="form-control" name="comentario" placeholder="Comentario">
            <label class="form-label">¿Cuantos puntos le das?</label>

            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option selected>Puntos</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <button class="btn btn-primary m-2" type="submit">Agregar</button>
        </form>
    </div>



</div>
{/literal}