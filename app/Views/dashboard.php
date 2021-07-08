<?= $this->include('Componentes/sidebar') ?>

<div class="dashboard">
    <div class="container">
        <h2 class="title">Mis catalogos</h2>
        <div class="filter">
            <ul>
                <li>
                    <a href="#" title="Multifuncionales">
                        <span class="icon"><i class="fa fa-print"></i></span>
                    </a>
                </li>
                <li>
                    <a href="#" title="Refacciones">
                        <span class="icon"> <i class="fa fa-wrench"></i></span>
                    </a>
                </li>
                <li>
                    <a href="#" title="Tonners">
                        <span class="icon"><i class="fa fa-home"></i></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <hr class="separator">

    <div class="contenedor-tarjetas" id="cards">

        <?php for($i = 0; $i < 5; $i++ ): ?>
        <div class="card" id="tarjeta">
            <a href="#" title="Eliminar" class="eliminar"><i class="fa fa-times close"></i></a>
            <img src="assets/img/printer.png" alt="imagen del elemento">
            <h5>MULTIFUNCIONALES-MULTIFUNCIONALES</h5>
            <div class="especificaciones">
                <label>Cantidad</label>
                <span id="cantidad">10</span>
                <label>Serie</label>
                <span id="serie">734JSF546</span>
            </div>
            <div class="botonera">
                <button class="editar">
                    Editar
                </button>
            </div>
        </div>
        <?php endfor; ?>

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

        <button class="add" title="Agregar Multifuncional" id="addM"><i class="fa fa-print fa-2x"></i></button>
        <button class="add1" title="Agregar Refaccion" id="addR"><i class="fa fa-cog fa-2x"></i></button>
        <button class="add2" title="Agregar Tonner" id="addT"><i class="fa fa-home fa-2x"></i></button>
    </div>