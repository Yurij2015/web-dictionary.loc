<?php
session_start();
$title = "Просмотр учебного материала";
$msg = '';
include_once('includes/header.php');
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
                    <?php
                    include_once("lib/RedBeanPHP5_4_2/rb.php");
                    include_once("Dbsettings.php");
                    include_once("model/DB.php");
                    include_once("controller/Learnbook.php");
                    include_once("controller/Tutor.php");
                    include_once("controller/Category.php");
                    new DB($host, $port, $db_name, $user, $password);
                    ?>
                    <?php
                    $id = $_GET['id'];
                    $learnbooks = new Learnbook();
                    foreach ($learnbooks->getOne($id) as $learnbook) {
                        ?>
                        <p class="lead"><?= $learnbook['title'] ?></p>
                        <p><?= $learnbook['summary'] ?></p>
                        <p><?= htmlspecialchars_decode($learnbook['content']) ?></p>
                        <?php $tutor = new Tutor(); ?>
                        <p><?= $tutor->getTutor($learnbook['tutor_id']) ?></p>
                        <?php $category = new Category(); ?>
                        <p><?= $category->getCategory($learnbook['category_id']) ?></p>
                        <?php
                    }
                    ?>
                    <a href="edit-edu-material.php?id=<?= $id ?>" class="btn btn-primary">Редактировать</a>
                    <a href="edu-material.php?id=<?=$id?>" class="btn btn-primary">Назад</a>

                </div>
            </div>
        </div>
    </div><!-- / Inner Page Content End -->
<?php include_once('includes/footer.php'); ?>