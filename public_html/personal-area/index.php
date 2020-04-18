<?php
session_start();
$title = "Личный кабинет";
$msg = '';
include_once('../includes/header.php');
?>
    <div class="banner padd">
        <div class="container">
            <img class="img-responsive" src="" alt=""/>
            <h2 class="white"><?= $title ?></h2>
            <ol class="breadcrumb">
                <li class="mr-1"><a href="index.php">Главная</a></li>
                <li class="active"><?= $title ?></li>
            </ol>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="inner-page padd">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <?php
                        include_once("../lib/RedBeanPHP5_4_2/rb.php");
                        include_once("../Dbsettings.php");
                        include_once("../model/DB.php");
                        include_once("../controller/User.php");
                        new DB($host, $port, $db_name, $user, $password);
                        ?>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>№</th>
                                <th>Логин</th>
                                <th>Имя пользователя</th>
                                <th>Фамилия пользователя</th>
                                <th>Электронная почта</th>
                                <th>Роль</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $categories = new User();
                            $username = $_SESSION['username'];
                            foreach ($categories->getOne($username) as $category) {
                                $id = $category['id'];
                                echo "<tr>
                        <td>" . $id . "</td>
                        <td>" . $category['username'] . "</td>
                        <td>" . $category['first_name'] . "</td>
                        <td>" . $category['last_name'] . "</td>
                        <td>" . $category['email'] . "</td>
                        <td>" . $category['is_staff'] . "</td>
                        <td><a href='edit-user.php' class='btn btn-info btn-sm float-right mr-1'>Редактировать</a></td>
                      </tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- / Inner Page Content End -->
<?php include_once('../includes/footer.php'); ?>