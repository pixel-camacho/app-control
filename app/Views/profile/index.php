<?= $this->include('Componentes/sidebar')  ?>

<div class="profile">
    <main>
        <div class="form-update">
            <form action="Profile/updateDataUser" method="post" enctype="mutlipart/form-data">

                <label for="username">Username</label>
                <input type="text" name="username" value="<?= session()->get('username') ?>">

                <label for="name">Name</label>
                <input type="text" name="name" value="<?= session()->get('name') ?>">
                <label for="role">Rol</label>
                <select name="role">
                    <option value="">* Seleciona rol</option>
                    <?php foreach ($roles as $role): ?>
                    <?= "<option value='".$role."' selected >".$role."</option>" ?>
                    <?php endforeach; ?>
                </select>

                <img src="<?= session()->get('photo') ?>" alt="imagen de perfil" id="img">

                <label for="photo">Cargar Imagen</label>
                <input type="file" name="photo" id="photo">

            <!--<div class="label">
                    <label for="password" id="pass">Password</label>
                    <label for="confirm_password" id="confir">Confirm Password</label>
                </div>
                
                <input type="password" name="password">
                <input type="password" name="confirm_password"> -->
                <input type="hidden" name="empleado" value="<?= session()->get('id') ?>" >
                <input type="submit" value="Actualizar" style="background: #333;cursor:pointer;">
            </form>
        </div>
    </main>
</div>