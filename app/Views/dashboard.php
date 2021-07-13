<?= $this->include('Componentes/sidebar') ?>

<div class="dashboard">
    <div class="container">
        <h2 class="title">Mis catalogos</h2>
        <?= $this->include('Componentes/filter') ?>
    </div>

    <hr class="separator">
    <div class="contenedor-tarjetas" id="cards">

        <?php foreach($equipos as $equipo): ?>
        <div class="card" id="tarjeta">
            <a href="#" title="Eliminar" class="eliminar"><i class="fa fa-times close"></i></a>
            <img src="assets/img/printer.png" alt="imagen del elemento">
            <h5><?= $equipo['marca'].' '.$equipo['modelo'] ?></h5>
            <div class="especificaciones">
                <label>Cantidad</label>
                <span id="cantidad"><?= $equipo['cantidad'] ?></span>
                <label>Serie</label>
                <span id="serie"><?= $equipo['serie'] ?></span>
            </div>
            <div class="botonera">
                <button class="editar" >
                    Editar
                </button>
            </div>
        </div>
        <?php endforeach; ?>


        <?php for($i = 0; $i < 5; $i++): ?>
        <div class="card" id="tarjeta">
            <a href="#" title="Eliminar" class="eliminar"><i class="fa fa-times close"></i></a>
            <img src="assets/img/refaccion.png" alt="imagen del elemento">
            <h5>TAMBOR DE IMPRESORA</h5>
            <div class="especificaciones">
                <label>Cantidad</label>
                <span id="cantidad">5</span>
                <br>
                <label>Multifuncional</label>
                <span id="multifuncional">BROTHER 56-GKJBH</span>
            </div>
            <div class="botonera">
                <button class="editar">
                    Editar
                </button>
            </div>
        </div>
        <?php endfor;?>

        <?php for($i = 0; $i < 5; $i++): ?>
        <div class="card" id="tarjeta">
            <a href="#" title="Eliminar" class="eliminar"><i class="fa fa-times close"></i></a>
            <img src="assets/img/tonner.png" alt="imagen del elemento">
            <h5>TONNER LP2</h5>
            <div class="especificaciones">
                <label style="margin-top: 10px;">Cantidad</label>
                <span id="cantidad">50</span>
                <label>Multifuncional</label>
                <span id="multifuncional" class="block">BROTHER 56-GKJBH</span>
            </div>
            <div class="botonera">
                <button class="editar">
                    Editar
                </button>
            </div>
        </div>
        <?php endfor;?>

    </div>