<div class="modal_edit_refaccion">
    <div class="form-body">
        <h2 id="subtitle" >Actualizar Refaccion</h2>
        <a href="" id="cerrar_edit_refaccion" title="Cerrar">&times;</a>
        <form action="refaccion/update" method="post">
            <label for="marca">pieza</label>
            <input type="text" name="pieza" id="pieza">

            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad_refaccion">


            <input type="hidden" name="id" id="identificador1">

            <input type="submit" value="Editar" id="submit">
        </form>
    </div>
</div>