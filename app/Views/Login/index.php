<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/login.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/alert.css') ?>">


</head>

<body>

<?php if(session()->get('success')): ?>
     <div class="success">
       <?= session()->get('success') ?>
     </div>
<?php endif;?>

    <main>
        <div class="box-login">
            <h1 class="title">ACCOUNT LOGIN</h1>
            <form action="/" method="POST">
                <div class="input">
                    <label>USERNAME</label>
                    <i class="fa fa-user fa-2x icon"></i>
                    <input type="text" name="username">
                </div>
                <div class="input">
                    <label>PASSWORD</label>
                    <i class="fa fa-lock fa-2x icon"></i>
                    <input type="password" name="password" id="password">
                    <i class="fa fa-eye-slash show" id="view"></i>
                </div>
                <a href="#">Don't you have an account ?</a>
                <button type="submit" class="btn">Login</button>
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