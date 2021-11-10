<div class="modal_add_refaccion">
    <div class="form-body">
        <h2 id="subtitle" >Agregar Refaccion</h2>
        <a href="" id="cerrar_add_refaccion" title="Cerrar">&times;</a>
        <form action="refaccion/create" method="post">
            <label for="marca">pieza</label>
            <input type="text" name="pieza" id="pieza">

            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad_refaccion">

            <label for="Multifuncional">Multifuncional</label>
            <select name="multifuncional_id" id="multifuncional_refaccion_add">
                <?php foreach($equipos as $equipo):?>
                   <?= '<option value='.$equipo['id'].'>'.$equipo['marca'].' '.$equipo['modelo'].'</option>' ?>
                <?php endforeach;?>
            </select>

            <input type="hidden" name="id" id="identificador_refaccion">

            <input type="submit" value="Editar" id="submit">
        </form>
    </div>
</div>