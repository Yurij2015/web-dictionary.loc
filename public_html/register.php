<?php
session_start();
$title = "Регистрация в системе";

require_once("forms/RegistrationForm.php");
require_once('DBA.php');
require_once('includes/Password.php');
require_once('includes/Session.php');
require_once('Dbsettings.php');

$msg = '';
try {
    $db = new DBA($host, $user, $password, $db_name, $port);
} catch (Exception $e) {
}
$form = new RegistrationForm($_POST);

if ($_POST) {
    if ($form->validate()) {
        $email = $db->escape($form->getEmail());
        $username = $db->escape($form->getUsername());
        $password = new Password($db->escape($form->getPassword()));

        $res = $db->query("SELECT * FROM `auth_user` WHERE email = '{$email}'");
        if ($res) {
            $msg = 'Пользователь с таким эл. адресом уже существует!';
        } else {
            $db->query("INSERT INTO `auth_user` (email, username, password) VALUES ('{$email}','{$username}', '{$password}')");
            $msg = "Регистрация прошла успешно, можете войти на сайт";
        }
    } else {
        $msg = $form->passwordsMatch() ? 'Пожалуйста, заполните все поля' : 'Пароли не совпадают';
    }
}

include_once('includes/header.php');
?>
    <!-- Banner Start -->

    <div class="banner padd">
        <div class="container">
            <!-- Image -->
            <img class="img-responsive" src="" alt=""/>
            <!-- Heading -->
            <h2 class="white">Регистрация</h2>
            <ol class="breadcrumb">
                <li class="mr-1"><a href="index.php">Главная</a></li>
                <li class="active">Регистрация</li>
            </ol>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- Banner End -->
    <!-- Inner Content -->
    <div class="inner-page padd">
        <!-- Contact Us Start -->
        <div class="contactus">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Contact form -->
                        <div class="register-form">
                            <!-- Heading -->
                            <h3>Регистрация на сайте</h3>
                            <!-- Form -->
                            <b style="color: red;"><?= $msg; ?></b>
                            <form method="post">
                                <div class="form-group">
                                    <label for="email">Адрес электронной почты</label>
                                    <input type="email" class="form-control" id="email" placeholder="Ваш email"
                                           name="email"
                                           value="<?= $form->getEmail(); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="username">Имя пользователя</label>
                                    <input type="text" class="form-control" id="username"
                                           placeholder="Ваше Имя" name="username" value="<?= $form->getUsername() ?>">
                                </div>

                                <div class="form-group">
                                    <label for="password">Пароль</label>
                                    <input type="password" class="form-control" id="password" placeholder="Пароль"
                                           name="password">
                                </div>
                                <div class="form-group">
                                    <label for="passwordConfirm">Проверка пароля</label>
                                    <input type="password" class="form-control" id="passwordConfirm"
                                           placeholder="Проверка пароля"
                                           name="passwordConfirm">
                                </div>
                                <button type="submit" class="btn btn-primary">Отправить</button>
                                <a href="index.php" class="btn btn-primary">Отмена</a>
                            </form>
                        </div><!--/ form end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End -->
    </div><!-- / Inner Page Content End -->
<?php include_once('includes/footer.php'); ?>