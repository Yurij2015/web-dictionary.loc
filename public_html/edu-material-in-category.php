<?php
session_start();
$title = "Учебные материалы категории";
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
                    include_once("lib/RedBeanPHP5_4_2/rb.php");
                    include_once("Dbsettings.php");
                    include_once("model/DB.php");
                    include_once("controller/Learnbook.php");
                    include_once("controller/Tutor.php");
                    include_once("controller/Category.php");
                    new DB($host, $port, $db_name, $user, $password);
                    ?>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Наименование</th>
                            <th>Описание</th>
                            <!--<th>Содержание</th>-->
                            <th>Автор</th>
                            <th>Категория</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $id_category = $_GET['id-category'];
                        $tutor = new Tutor();
                        $learnbooks = new Learnbook();
                        $category = new Category();
                        foreach ($learnbooks->getEdMatInCategory($id_category) as $learnbook) {
                            $id = $learnbook['id'];
                            echo "<tr>
                        <td>" . $id . "</td>
                        <td>" . $learnbook['title'] . "</td>
                        <td>" . $learnbook['summary'] . "</td>
                        <td>" . $tutor->getTutor($learnbook['tutor_id']) . "</td>
                        <td>" . $category->getCategory($learnbook['category_id']) . "</td>
                        <td><a href='view-learnbook.php?id=$id' class='btn btn-info btn-sm'>Открыть</a></td>
                        <td><a href='delete-learnbook.php?id=$id' class='btn btn-warning btn-sm' onclick='return confirmDelete();'>Удалить</a></td>
                      </tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                    <a href="category.php" class="btn btn-primary">Назад</a>
                </div>
            </div>
        </div>
    </div><!-- / Inner Page Content End -->
<?php include_once('includes/footer.php'); ?>