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
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                
                <label for="photo">Imagen de perfil</label>
                <input type="text" name="photo" id="photo">

                <label for="password">Password</label>
                <input type="password" name="password">

                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password">

                <input type="submit" value="Actualizar" style="background: #333;">
            </form>
        </div>
    </main>
</div>