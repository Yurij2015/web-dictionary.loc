<?php
session_start();
$title = "Учебные материалы";
$msg = '';
include_once('includes/header.php');
?>
    <div class="banner padd">
        <div class="container">
            <img class="img-responsive" src="img/crown-white.png" alt=""/>
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
                    <?php
                    require("lib/RedBeanPHP5_4_2/rb.php");
                    require("Dbsettings.php");
                    R::setup("mysql:host=$host;port=$port;dbname=$db_name", $user, $password);
                    ?>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Наименование</th>
                            <th>Описание</th>
                            <th>Содержание</th>
                            <th>Автор</th>
                            <th>Категория</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $managers = R::getAll('SELECT * FROM learnbook');
                        foreach ($managers as $manager) {
                            $id = $manager['id'];
                            echo "<tr>
                        <td>" . $id . "</td>
                        <td>" . $manager['title'] . "</td>
                        <td>" . $manager['summary'] . "</td>
                        <td>" . $manager['content'] . "</td>
                        <td>" . $manager['content'] . "</td>
                        <td>" . $manager['content'] . "</td>

                        <td><a href='managerupdate.php?id=$id' class='btn btn-info btn-sm'>Открыть</a>
                        | <a href='managerdelete.php?id=$id' class='btn btn-warning btn-sm' onclick='return confirmDelete();'>Удалить</a></td>
                      </tr>";
                        }
                        ?>
                        </tbody>
                    </table>


                    <a href="add-edu-material.php" class="btn btn-primary">Добавить учебный материал</a>
                </div>
            </div>
        </div>
    </div><!-- / Inner Page Content End -->
<?php include_once('includes/footer.php'); ?>