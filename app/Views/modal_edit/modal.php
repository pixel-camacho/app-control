<div class="modal_edit">
    <div class="form-body">
        <h2 id="subtitle" >Actualizar Multifuncional</h2>
        <a href="" id="cerrar_edit" title="Cerrar">&times;</a>
        <form action="multifuncional/update" method="post">
            <label for="marca">Marca</label>
            <input type="text" name="marca" id="marca">

            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" id="modelo">

            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad">

            <label for="serie">Serie</label>
            <input type="text" name="serie" id="serie" max="12">

            <input type="hidden" name="id" id="identificador">

            <input type="submit" value="Editar" id="submit">
        </form>
    </div>
</div>