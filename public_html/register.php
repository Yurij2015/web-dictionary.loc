<?php
session_start();
$title = "Регистрация в системе";

require_once("forms/RegistrationForm.php");
require_once('DB.php');
require_once('includes/Password.php');
require_once('includes/Session.php');
require_once('Dbsettings.php');

$msg = '';
try {
    $db = new DB($host, $user, $password, $db_name, $port);
} catch (Exception $e) {
}
$form = new RegistrationForm($_POST);

if ($_POST) {
    if ($form->validate()) {
        $email = $db->escape($form->getEmail());
        $login = $db->escape($form->getLogin());
        $password = new Password($db->escape($form->getPassword()));

        $res = $db->query("SELECT * FROM `users` WHERE email = '{$email}'");
        if ($res) {
            $msg = 'Пользователь с таким эл. адресом уже существует!';
        } else {
            $db->query("INSERT INTO `users` (email, login, password) VALUES ('{$email}','{$login}', '{$password}')");
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
            <img class="img-responsive" src="img/crown-white.png" alt=""/>
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
                                    <label for="InputEmail">Адрес электронной почты</label>
                                    <input type="email" class="form-control" id="InputEmail" placeholder="Ваш email"
                                           name="email"
                                           value="<?= $form->getEmail(); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="InputUsername">Имя пользователя</label>
                                    <input type="text" class="form-control" id="InputUsername"
                                           placeholder="Ваше Имя" name="login" value="<?= $form->getLogin() ?>">
                                </div>

                                <div class="form-group">
                                    <label for="InputPassword">Пароль</label>
                                    <input type="password" class="form-control" id="InputPassword" placeholder="Пароль"
                                           name="password">
                                </div>
                                <div class="form-group">
                                    <label for="InputPasswordConfirm">Проверка пароля</label>
                                    <input type="password" class="form-control" id="InputPasswordConfirm"
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