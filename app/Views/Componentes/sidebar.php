<div id="slider">
    <?php 
    $uri = service('uri');
     ?>

    <img src="<?=  session()->get('photo') ?>" alt="foto de perfil" class="perfil">
    <label>BIENVENIDO</label>
    <span class="user"><?= session()->get('name') ?? 'USUARIO'; ?></span>

    <ul class="opciones">
        <li id="catalogos">
            <a href="/dashboard" title="Home" class="<?= ($uri->getSegment(1) === 'dashboard') ? 'active' : '' ?>">
                <span class="icon"><i class="fa fa-home"></i></span>
                <span class="title">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="/profile" title="Perfil" class="<?= ($uri->getSegment(1) === 'profile') ? 'active' : '' ?>">
               <span class="icon"><i class="fa fa-user"></i></span>
                <span class="title">Perfil</span>
            </a>
        </li>
        <li id="reportes">
            <a href="dashboard/reporte" title="Reportes" class="<?= ($uri->getSegment(1) === 'report') ? 'active' : '' ?>">
                <span class="icon"><i class="fa fa-list-ul"></i></span>
                <span class="title">Reportes</span>
            </a>
        </li>
        <li>
            <a href="dashboard/salir" title="Cerrar session">
                <span class="icon"><i class="fa fa-sign-out"></i></span>
                <span class="title">Salir</span>
            </a>
        </li>
    </ul>

</div>