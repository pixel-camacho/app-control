<?= $this->include('Componentes/sidebar')  ?>
<style>
 .card{
     height: 380px;
 }
 .card b,.card span{
     display: block;
     text-align: center;
     padding: 7px 0;
 }

 .contenedor-tarjetas {
      display: grid;
      gap: 1rem;
      grid-auto-rows: 24rem;
      grid-template-columns: repeat(auto-fill, minmax(15rem,1fr));
      padding: 12px;
}

.btn-delete{
    display: block;
    width: 70%;
    background: #333;
    color: white;
    font-weight: bold;
    padding: 10px;
    margin: 14px auto;
    border-radius: 4px;
}

</style>

<div class="reportes">
    <!-- <div class="header">
        <i class="fa fa-clipboard-prescription"></i>
        <h1 class="title">Registro de reportes</h1>
    </div> -->
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

    <div class="report-form">
        <form action="Reports/generate" method="post">
        <label for="catalogo">Catalogo</label>
            <select name="catalogo" required="true"  >
                <option value=" ">* Selecciona catalogo</option>
                <?php foreach($catalogos as $catalogo):?>
                    <?= '<option value= "'.$catalogo.'">'.$catalogo.'</option>'?>
                <?php endforeach; ?>
            </select>

       <!-- <label for="Fecha">Fecha</label>
            <input type="date" name="start" id="start" required="true" >
             <span>AL</span>
            <input type="date" name="end" id="end" required="true" >
                -->
            <input type="submit" value="Generar">
        </form>
    </div>

    <hr class="separador">

    <div class="contenedor-tarjetas" id="cards">

<?php foreach($reports as $report): ?>
    <div class="card">
          <a  onclick="window.open('<?= $report['path'] ?>' ,'_blank')">
          <img src="assets/img/reporte.png" alt="imagen">
          <div class="informacion">
          <b>Fecha de creacion:</b>
          <span><?= $report['fecha_creacion'] ?></span>
          <b>Catalogo:</b>
          <span><?= $report['catalogo'] ?></span>
          </div>
          </a>
          <form action="Reports/delete" method="post">
              <input type="hidden" name="id" value="<?= $report['id'] ?>">
              <input type="submit" value="Eliminar" class="btn-delete">
          </form>
    </div>
<?php endforeach; ?>

    </div>
</div>