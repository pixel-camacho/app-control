<?= $this->include('Componentes/sidebar')  ?>

<div class="reportes">
    <!-- <div class="header">
        <i class="fa fa-clipboard-prescription"></i>
        <h1 class="title">Registro de reportes</h1>
    </div> -->

    <div class="report-form">
        <form action="Reports/reportGenerate" method="post">

        <label for="catalogo">Catalogo</label>
            <select name="catalogo">
                <option value=" ">* Selecciona catalogo</option>
                <?php foreach($catalogos as $index =>  $catalogo):?>
                    <?= '<option value= "'.$index.'">'.$catalogo.'</option>'?>
                <?php endforeach; ?>
            </select>

        <label for="Fecha">Fecha</label>
            <input type="date" name="start" id="start">
             <span>AL</span>
            <input type="date" name="end" id="end">

            <input type="submit" value="Generar">
        </form>
    </div>

    <hr class="separador">

    <div class="contenedor-tarjetas" id="cards">


    </div>
</div>