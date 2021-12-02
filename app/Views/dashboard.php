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
        <?= $this->include('Componentes/filter') ?>
    </div>

    <?= $this->include('Componentes/search') ?>

    <hr class="separator">

    <?php if(session()->getFlashdata('success')): ?>
        <div class="success">
           <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif;?>

    <?php if(session()->getFlashdata('error') ): ?>
        <div class="error">
          <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif;?>

    <?php if(session()->getFlashdata('warning') ): ?>
        <div class="warning">
          <?= session()->getFlashdata('warning') ?>
        </div>
    <?php endif;?>
 
    <div class="contenedor-tarjetas" id="cards">
           
    <h2 id="message_empty">SIN RESULTADOS</h2>

        <?php foreach($equipos as $equipo): ?>
        <div class="card" id="tarjeta">
            <form action="multifuncional/delete" method="post">
                <input type="hidden" value="<?= $equipo->id ?>" name="id">
                <button type="submit" class="eliminar">
                    <i class="fa fa-times close"></i>
                </button>
            </form>
            <img src="assets/img/printer.png" alt="imagen del elemento">
            <h5 id="desc"><?= $equipo->marca.' '.$equipo->modelo ?></h5>
            <div class="especificaciones">
                <label>Cantidad</label>
                <span id="cantidad"><?= $equipo->cantidad ?></span>
                <label>Serie</label>
                <span id="serie"><?= $equipo->serie ?></span>
            </div>
            <div class="botonera">
                <button class="editar" id="<?= $equipo->id ?>">
                    Editar
                </button>
            </div>
        </div>
        <?php endforeach; ?>

        <?php foreach($refacciones as $refaccion): ?>
        <div class="card" id="tarjeta">
        <?php if(session()->get('role') == 'admin'):?>
            <form action="refaccion/delete" method="post">
                <input type="hidden" value="<?= $refaccion->id ?>" name="id">
                <button type="submit" class="eliminar">
                    <i class="fa fa-times close"></i>
                </button>
            </form>
        <?php endif; ?>
            <img src="assets/img/refaccion.png" alt="imagen del elemento">
            <h5><?= $refaccion->pieza ?></h5>
            <div class="especificaciones">
                <label>Cantidad</label>
                <span id="cantidad"><?= $refaccion->cantidad ?></span>
                <br>
                <label>Multifuncional</label>
                <span id="multifuncional"><?= $refaccion->marca.' '.$refaccion->modelo ?></span>
            </div>
            <?php if(session()->get('role') == 'admin'):?>
            <div class="botonera">
                <button class="editar_refaccion" id="<?= $refaccion->id ?>">
                    Editar
                </button>
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach;?>

        <?php foreach($tonners  as $tonner): ?>
        <div class="card" id="tarjeta">
        <?php if(session()->get('role') == 'admin'):?>
            <form action="tonner/delete" method="post">
                <input type="hidden" value="<?= $tonner->id ?>" name="id">
                <button type="submit" class="eliminar">
                    <i class="fa fa-times close"></i>
                </button>
            </form>
        <?php endif; ?>
            <img src="assets/img/tonner.png" alt="imagen del elemento">
            <h5><?=  strtoupper($tonner->descripcion) ?></h5>
            <div class="especificaciones">
                <label style="margin-top: 10px;">Cantidad</label>
                <span id="cantidad"><?= $tonner->cantidad ?></span>
                <label>Multifuncional</label>
                <span id="multifuncional" class="block"><?= $tonner->marca.' '.$tonner->modelo ?></span>
            </div>
            <?php if(session()->get('role') == 'admin'):?>
            <div class="botonera">
                <button class="editar_tonner" id="<?= $tonner->id ?>">
                    Editar
                </button>
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach;?>


        <?php if(isset($validation)): ?>
         <div class="errors">
            <?= $validation ?>
         </div>
        <?php endif; ?>
    </div>
