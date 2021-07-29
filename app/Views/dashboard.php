<?= $this->include('Componentes/sidebar') ?>
<?= $this->include('Componentes/modal') ?>

<!-- Modal Refacciones -->
<div class="modal-multiple">
    <div class="form-body">
        <h2>Agregar Refaccione</h2>
        <a href="" id="cerrar1" title="Cerrar">&times;</a>
        <form action="dashboard/addItem" method="post">
            <label for="pieza">Pieza</label>
            <input type="text" name="pieza" id="pieza">

            <label for="cantidad">Cantidad</label>
            <input type="text" name="cantidad" id="cantidad">

            <label for="multifuncional">Multifuncional</label>
            <select name="idMultifuncional" id="multifuncional">
                <option value=""> * Seleccion multifuncional</option>
                <?php foreach($equipos as $equipo): ?>
                    <?= "<option value= ".$equipo['idMultifuncional'].">".$equipo['marca'].' '.$equipo['modelo']."</option>" ?>
                <?php endforeach;?>
            </select>
            <input type="submit" value="Agregar">
        </form>
    </div>
</div>

<!-- Modal Tonners -->
<div class="modal-multiple1">
    <div class="form-body">
        <h2>Agregar Tonner</h2>
        <a href="" id="cerrar2" title="Cerrar">&times;</a>
        <form action="dashboard/addItem" method="post">
            <label for="descripcion">Descripcion</label>
            <input type="text" name="descripcion" id="descripcion">

            <label for="cantidad">Cantidad</label>
            <input type="text" name="cantidad" id="cantidad">

            <label for="multifuncional">Multifuncional</label>
            <select name="idMultifuncional" id="multifuncional">
                <option value=""> * Seleccion multifuncional</option>
                <?php foreach($equipos as $equipo): ?>
                    <?= "<option value= ".$equipo['idMultifuncional'].">".$equipo['marca'].' '.$equipo['modelo']."</option>" ?>
                <?php endforeach;?>
            </select>
            <input type="submit" value="Agregar">
        </form>
    </div>
</div>

<?= $validation->listErrors() ?>
<div class="dashboard">
    <div class="container">
        <h2 class="title">Mis catalogos</h2>
        <?= $this->include('Componentes/filter') ?>
    </div>

    <hr class="separator">
    <div class="contenedor-tarjetas" id="cards">

        <?php if(session()->get('success')): ?>
        <div class="success">
            <?= session()->get('success') ?>
        </div>
        <?php endif;?>

        <?php foreach($equipos as $equipo): ?>
        <div class="card" id="tarjeta">
            <a href="dashboard/deleteitem?id=<?= $equipo['idMultifuncional'] ?>&&catalogo=multifuncional"
                title="Eliminar" class="eliminar"><i class="fa fa-times close"></i></a>
            <img src="assets/img/printer.png" alt="imagen del elemento">
            <h5><?= $equipo['marca'].' '.$equipo['modelo'] ?></h5>
            <div class="especificaciones">
                <label>Cantidad</label>
                <span id="cantidad"><?= $equipo['cantidad'] ?></span>
                <label>Serie</label>
                <span id="serie"><?= $equipo['serie'] ?></span>
            </div>
            <div class="botonera">
                <button class="editar" id="<?= $equipo['idMultifuncional'] ?>" onclick="editarCard('.editar')">
                    Editar
                </button>
            </div>
        </div>
        <?php endforeach; ?>


        <?php foreach($refacciones as $refaccion): ?>
        <div class="card" id="tarjeta">
            <a href="dashboard/deleteitem?id=<?= $refaccion['idRefaccion'] ?>&&catalogo=refaccion" title="Eliminar"
                class="eliminar"><i class="fa fa-times close"></i></a>
            <img src="assets/img/refaccion.png" alt="imagen del elemento">
            <h5><?= $refaccion['pieza'] ?></h5>
            <div class="especificaciones">
                <label>Cantidad</label>
                <span id="cantidad"><?= $refaccion['cantidad'] ?></span>
                <br>
                <label>Multifuncional</label>
                <span id="multifuncional"><?= $refaccion['multifuncional'] ?></span>
            </div>
            <div class="botonera">
                <button class="editarR" id="<?= $refaccion['idRefaccion'] ?>">
                    Editar
                </button>
            </div>
        </div>
        <?php endforeach;?>

        <?php foreach($tonners  as $tonner): ?>
        <div class="card" id="tarjeta">
            <a href="dashboard/deleteitem?id=<?= $tonner['idTonner'] ?>&&catalogo=tonner" title="Eliminar"
                class="eliminar"><i class="fa fa-times close"></i></a>
            <img src="assets/img/tonner.png" alt="imagen del elemento">
            <h5><?= $tonner['descripcion'] ?></h5>
            <div class="especificaciones">
                <label style="margin-top: 10px;">Cantidad</label>
                <span id="cantidad"><?= $tonner['cantidad'] ?></span>
                <label>Multifuncional</label>
                <span id="multifuncional" class="block"><?= $tonner['multifuncional'] ?></span>
            </div>
            <div class="botonera">
                <button class="editarT" id="<?= $tonner['idTonner'] ?>">
                    Editar
                </button>
            </div>
        </div>
        <?php endforeach;?>

        <?php if(session()->get('errors')): ?>
        <div class="validations">
            <?php foreach(session()->get('errors') as $error):?>
                <p><?= $error ?></p>
            <?php endforeach; ?>
        </div>
        <?php endif;?>

    </div>
