<div class="modal">
    <div class="form-body">
        <h2>Agregar Multifuncional</h2>
        <a href="" id="cerrar" title="Cerrar">&times;</a>
        <form action="dashboard/addItem" method="post">
            <label for="marca">Marca</label>
            <input type="text" name="marca" id="marca">

            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" id="modelo">

            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad">

            <label for="serie">Serie</label>
            <input type="text" name="serie" id="serie" max="8">

            <input type="submit" value="Agregar">
        </form>
    </div>
</div>