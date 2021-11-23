{* {literal}
    <div id="appComments">
        
        <h2>Comentarios</h2>
        <ul>
            <li v-for= "comentario in comentarios">
                {{comentario.nombre}}{{comentario.apellido}} || Puntuacion: 
                {{comentario.puntuacion}} <br>
                {{comentario.comentario}}
                <button id="btn-delete" class="btn"> <a class="btn btn-danger "href="libros/detalle/{{book.id_libro}}/comments/{{comentario.id}}">Eliminar</a> </button>
            </li>
            
        </ul>

        <form id="form">
            <label class="form-label">Agrega un comentario</label>
            <input class="form-control"  id="comentario" placeholder="Comentario">
            <label class="form-label">¿Cuantos puntos le das?</label>

            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option selected>Puntos</option>
                <option value="1" name="puntos">1</option>
                <option value="2" name="puntos">2</option>
                <option value="3" name="puntos">3</option>
                <option value="4" name="puntos">4</option>
                <option value="5" name="puntos">5</option>
            </select>
            <button class="btn btn-primary m-2" type="submit" >Agregar</button>
        </form>
    
    </div>
{/literal} *}