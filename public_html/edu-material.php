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



                        <a href="add-edu-material.php" class="btn btn-primary">Добавить учебный материал</a>
                    </div>
                </div>
        </div>
    </div><!-- / Inner Page Content End -->
<?php include_once('includes/footer.php'); ?>