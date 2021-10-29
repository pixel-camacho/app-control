<?= $this->include('Componentes/sidebar') ?>
<?= $this->include('modalEdit/modal') ?>


<div class="dashboard">

    <div class="container">
        <h2 class="title">Mis catalogos</h2>
        <?php if(session()->get('role') == 'admin'):?>
        <?= $this->include('Componentes/filter') ?>
        <?php endif; ?>
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
            <a href="dashboard/deleteitem?id=<?= $equipo['id'] ?>&&catalogo=multifuncional" title="Eliminar"
                class="eliminar"><i class="fa fa-times close"></i></a>
            <img src="assets/img/printer.png" alt="imagen del elemento">
            <h5 id="desc"><?= $equipo['marca'].' '.$equipo['modelo'] ?></h5>
            <div class="especificaciones">
                <label>Cantidad</label>
                <span id="cantidad"><?= $equipo['cantidad'] ?></span>
                <label>Serie</label>
                <span id="serie"><?= $equipo['serie'] ?></span>
            </div>
            <div class="botonera">
                <button class="editar" id="<?= $equipo['id'] ?>">
                    Editar
                </button>
            </div>
        </div>
        <?php endforeach; ?>

        <?php foreach($refacciones as $refaccion): ?>
        <div class="card" id="tarjeta">
            <a href="dashboard/deleteitem?id=<?= $refaccion['id'] ?>&&catalogo=refaccion" title="Eliminar"
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
                <button class="editarR" id="<?= $refaccion['id'] ?>">
                    Editar
                </button>
            </div>
        </div>
        <?php endforeach;?>

        <?php foreach($tonners  as $tonner): ?>
        <div class="card" id="tarjeta">
            <a href="dashboard/deleteitem?id=<?= $tonner['id'] ?>&&catalogo=tonner" title="Eliminar"
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
                <button class="editarT" id="<?= $tonner['id'] ?>">
                    Editar
                </button>
            </div>
        </div>
        <?php endforeach;?>

    </div>
