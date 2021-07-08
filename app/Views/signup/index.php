<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/signup.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/alert.css') ?>">
</head>

<body>

    <main>
        <div class="box-login">
            <h1 class="title">REGISTER USER</h1>
            <img src="https://www.clker.com/cliparts/x/O/e/e/3/F/male-avatar-md.png" alt="foto de Usuario" class="img">
            <form action="/register" method="POST">

                <label for="username">Username</label>
                <input type="text" name="username" value="<?= set_value('username') ?>">

                <label for="name">Name</label>
                <input type="text" name="name" value="<?= set_value('name') ?>" >

                <div class="passwordlabel">
                    <label for="password">Password</label>
                    <label for="passwordConfirm">Confirm Password</label>
                </div>

                <div class="passwordinput">
                    <input type="password" name="password">
                    <input type="password" name="passwordConfirm">
                </div>

                <input type="submit" value="Register">
                <a href="/">You already have an account ?</a>
            </form>
        </div>
    </main>

    <?php if(isset($validation)): ?>
    <div class="errors">
        <?= $validation->listErrors() ?>
    </div>
    <?php endif; ?>

    <script src="<?= base_url('assets/js/users.js') ?>"></script>

</body>
</html>