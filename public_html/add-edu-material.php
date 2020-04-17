<?php
session_start();
$title = "Добавить учебный материал";
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
                    <form method="post">
                        <div class="form-group">
                            <label for="name">Название</label>
                            <input type="text" class="form-control" id="name" placeholder="Название (номер)"
                                   name="name"
                                   value="">
                        </div>

                        <div class="form-group">
                            <label for="date">Дата</label>
                            <input type="datetime-local" class="form-control" id="date" placeholder="Дата"
                                   name="date">
                        </div>

                        <div class="form-group">
                            <label for="content">Содержание приказа</label>
                            <input type="text" class="form-control" id="content"
                                   name="content">
                        </div>

                        <div class="form-group">
                            <label for="to_employee">Для работника</label>
                            <input type="text" class="form-control" id="to_employee" placeholder="ФИО сотрудинка"
                                   name="to_employee">
                        </div>

                        <div class="form-group">
                            <label for="type_of_orders_id">Тип приказа</label>
                            <input type="text" class="form-control" id="type_of_orders_id" placeholder="Тип приказа"
                                   name="type_of_orders_id">
                        </div>

                        <div class="form-group">
                            <label for="order_author">Приказ составил</label>
                            <input type="text" class="form-control" id="order_author" placeholder="ФИО сотрудника"
                                   name="order_author">
                        </div>


                        <button type="submit" class="btn btn-primary">Войти</button>
                        <a href="index.php" class="btn btn-primary">Отмена</a>
                    </form>

                </div>
            </div>
        </div>
    </div><!-- / Inner Page Content End -->
<?php include_once('includes/footer.php'); ?>