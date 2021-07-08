<?= $this->include('Componentes/sidebar')  ?>

<div class="profile">
    <main>
        <div class="form-update">
        <h1 class="title">Actualizar perfil de usuario</h1>
            <form action="Users/update" method="post">
                <img src="assets/img/perfil.jpg" alt="imagen de perfil">

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
            </form>
        </div>
    </main>
</div>