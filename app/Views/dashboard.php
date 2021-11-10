<?= $this->include('Componentes/sidebar') ?>

<!-- CATALOGO MULTIFUNCIONAL -->
<?= $this->include('modal_edit/modal') ?>
<?= $this->include('modal_add/modal') ?>

<!-- CATALOGO REFACCION -->
<?= $this->include('modal_edit/modal_refaccion') ?>
<?= $this->include('modal_add/modal_refaccion')  ?>

<!-- CATALOGO TONNER -->
<?= $this->include('modal_edit/modal_tonner') ?>
<?= $this->include('modal_add/modal_tonner')  ?>




<div class="dashboard">

    <div class="container">
       <!-- <h2 class="title">Catalogos de Inventario</h2> -->
        <?php if(session()->get('role') == 'admin'):?>
        <?= $this->include('Componentes/filter') ?>
        <?php endif; ?>
    </div>

    <?= $this->include('Componentes/search') ?>

    <hr class="separator">

    <div class="contenedor-tarjetas" id="cards">

        <?php if(session()->get('error')): ?>
         <div class="error">
            <?= session()->get('error') ?>
         </div>
        <?php endif;?>

        
       <?php if(session()->get('success')): ?>
        <div class="success">
           <?= session()->get('success') ?>
        </div>
       <?php endif;?>

        <?php foreach($equipos as $equipo): ?>
        <div class="card" id="tarjeta">
            <a href="multifuncional/delete?id=<?= $equipo['id'] ?>" title="Eliminar"
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
            <a href="refaccion/delete?id=<?= $refaccion['id'] ?>" title="Eliminar"
                class="eliminar"><i class="fa fa-times close"></i></a>
            <img src="assets/img/refaccion.png" alt="imagen del elemento">
            <h5><?= $refaccion['pieza'] ?></h5>
            <div class="especificaciones">
                <label>Cantidad</label>
                <span id="cantidad"><?= $refaccion['cantidad'] ?></span>
                <br>
                <label>Multifuncional</label>
                <span id="multifuncional"><?= $refaccion['marca'].' '.$refaccion['modelo'] ?></span>
            </div>
            <div class="botonera">
                <button class="editar_refaccion" id="<?= $refaccion['id'] ?>">
                    Editar
                </button>
            </div>
        </div>
        <?php endforeach;?>

        <?php foreach($tonners  as $tonner): ?>
        <div class="card" id="tarjeta">
            <a href="tonner/delete?id=<?= $tonner['id'] ?>" title="Eliminar"
                class="eliminar"><i class="fa fa-times close"></i></a>
            <img src="assets/img/tonner.png" alt="imagen del elemento">
            <h5><?=  strtoupper($tonner['descripcion']) ?></h5>
            <div class="especificaciones">
                <label style="margin-top: 10px;">Cantidad</label>
                <span id="cantidad"><?= $tonner['cantidad'] ?></span>
                <label>Multifuncional</label>
                <span id="multifuncional" class="block"><?= $tonner['marca'].' '.$tonner['modelo'] ?></span>
            </div>
            <div class="botonera">
                <button class="editar_tonner" id="<?= $tonner['id'] ?>">
                    Editar
                </button>
            </div>
        </div>
        <?php endforeach;?>


        <?php if(isset($validation)): ?>
         <div class="errors">
            <?= $validation ?>
         </div>
        <?php endif; ?>

    </div>
