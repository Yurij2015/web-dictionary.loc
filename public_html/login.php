<?php
session_start();
$title = "Авторизация в системе";

require_once("forms/LoginForm.php");
require_once('DBA.php');
require_once('includes/Password.php');
require_once('includes/Session.php');
require_once('Dbsettings.php');

$msg = '';

try {
    $db = new DBA($host, $user, $password, $db_name, $port);
} catch (Exception $e) {
}
$form = new LoginForm($_POST);

if ($_POST) {
    if ($form->validate()) {
        $username = $db->escape($form->getUsername());
        $password = new Password($db->escape($form->getPassword()));

        try {
            $res = $db->query("SELECT * FROM auth_user WHERE username = '{$username}' AND password = '{$password}' LIMIT 1");
        } catch (Exception $e) {
        }
        if (!$res) {
            $msg = 'Пользователя с таким учетными данными нет';
        } else {
            $username = $res[0]['username'];
            Session::set('username', $username);
            header('location: index.php?msg=Вы авторизированы на сайте');
        }
    } else {
        $msg = 'Пожалуйста, заполните все поля';
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
            <h2 class="white"><?= $title ?></h2>
            <ol class="breadcrumb">
                <li class="mr-1"><a href="index.php">Главная</a></li>
                <li class="active"><?= $title ?></li>
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
                            <h3>Вход на сайт</h3>
                            <!-- Form -->
                            <b style="color: red;"><?= $msg; ?></b>
                            <form method="post">
                                <div class="form-group">
                                    <label for="username">Логин</label>
                                    <input type="text" class="form-control" id="username" placeholder="Ваш логин"
                                           name="username"
                                           value="<?= $form->getUsername(); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="password">Пароль</label>
                                    <input type="password" class="form-control" id="password" placeholder="Пароль"
                                           name="password">
                                </div>

                                <button type="submit" class="btn btn-primary">Войти</button>
                                <a href="index.php" class="btn btn-primary">Отмена</a>
                            </form>
                        </div><!--/ Contact form end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Us End -->
    </div><!-- / Inner Page Content End -->
<?php include_once('includes/footer.php'); ?>