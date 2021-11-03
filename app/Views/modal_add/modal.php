<div class="modal_add">
    <div class="form-body">
        <h2 id="subtitle" >Agregar Multifuncional</h2>
        <a href="" id="cerrar_add" title="Cerrar">&times;</a>
        <form action="multifuncional/create" method="post">
            <label for="marca">Marca</label>
            <input type="text" name="marca" id="marca" value="<?= old('marca') ?>">

            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" id="modelo" value="<?= old('modelo') ?>">

            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" value="<?= old('cantidad') ?>">

            <label for="serie">Serie</label>
            <input type="text" name="serie" id="serie" max="8">

            <input type="submit" value="Agregar" id="submit">
        </form>
    </div>
</div>