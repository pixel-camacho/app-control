<div class="modal_add_tonner">
    <div class="form-body">
        <h2 id="subtitle" >Agregar Tonner</h2>
        <a href="" id="cerrar_add_tonner" title="Cerrar">&times;</a>
        <form action="tonner/update" method="post">
            <label for="Descripcion">Descripcion</label>
            <input type="text" name="descripcion" id="descripcion">

            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad_tonner">

            <label for="Multifuncional">Multifuncional</label>
            <select name="multifuncional_id" id="multifuncional_tonner_add">
                <?php foreach($equipos as $equipo):?>
                   <?= '<option value='.$equipo->id.'>'.$equipo->marca.' '.$equipo->modelo.'</option>' ?>
                <?php endforeach;?>
            </select>

            <input type="hidden" name="id" id="identificador_tonner">

            <input type="submit" value="Editar" id="submit">
        </form>
    </div>
</div>