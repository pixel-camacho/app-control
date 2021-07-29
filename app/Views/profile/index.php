<?= $this->include('Componentes/sidebar')  ?>

<div class="profile">
    <main>
        <div class="form-update">
            <form action="Users/update" method="post">

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

                <label for="photo">Imagen de perfil</label>
                <input type="text" name="photo" id="photo" value="<?= session()->get('photo') ?>">

                <!--   <div class="label">
                    <label for="password" id="pass">Password</label>
                    <label for="confirm_password" id="confir">Confirm Password</label>
                </div>
                <input type="password" name="password">


                <input type="password" name="confirm_password"> -->

                <input type="submit" value="Actualizar" style="background: #333;">
            </form>
        </div>
    </main>
</div>