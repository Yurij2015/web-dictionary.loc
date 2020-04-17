<?php
if ($_POST) {
    $title = trim(htmlspecialchars($_POST['title']));
    $summary = trim(htmlspecialchars($_POST['summary'])) ?: null;
    $content = htmlspecialchars($_POST['content']) ?: null;
    $tutor_id = $_POST['tutor_id'] ?: null;
    $category_id = $_POST['category_id'] ?: null;
    $id = $_POST['id'] ?: null;
    if (!empty($title)) {
        include_once("lib/RedBeanPHP5_4_2/rb.php");
        include_once("Dbsettings.php");
        include_once("model/DB.php");
        include_once("controller/Learnbook.php");
        new DB($host, $port, $db_name, $user, $password);
        $update= new Learnbook();
        $update->update($title, $summary, $content, $tutor_id, $category_id, $id);
        header('location: edu-material.php?msg=Запись успешно обновлена!');
    }
}
?>
<?php
session_start();
$title = "Учебные материалы";
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
                    new DB($host, $port, $db_name, $user, $password);
                    ?>
                    <?php
                    $id = $_GET['id'];
                    $learnbooks = new Learnbook();
                    foreach ($learnbooks->getOne($id) as $learnbook) {
                        ?>
                        <form method="post">
                            <div class="form-group">
                                <label for="title">Название учебного материала</label>
                                <input type="text" class="form-control" id="title"
                                       placeholder="Название учебного материала"
                                       name="title"
                                       value="<?= $learnbook['title'] ?>">
                                <input name="id" hidden value="<?= $learnbook['id'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="summary">Описание</label>
                                <input type="text" class="form-control" id="summary" placeholder="Описание"
                                       name="summary"
                                       value="<?= $learnbook['summary'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="content">Текст учебного материала</label>
                                <textarea type="text" class="form-control" id="content"
                                          name="content"><?= htmlspecialchars_decode($learnbook['content']) ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="tutor_id">Автор (преподаватель)</label>
                                <input type="text" class="form-control" id="tutor_id" placeholder="Преподаватель"
                                       name="tutor_id"
                                       value="<?= $learnbook['tutor_id'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="category_id">Тип приказа</label>
                                <input type="text" class="form-control" id="category_id" placeholder="Категория"
                                       name="category_id"
                                       value="<?= $learnbook['category_id'] ?>">
                            </div>
                            <button type="submit" class="btn btn-primary">Обновить</button>
                            <a href="index.php" class="btn btn-primary">Отмена</a>
                        </form>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div><!-- / Inner Page Content End -->
<?php include_once('includes/footer.php'); ?>