<?php
if ($_POST) {
    $title = trim(htmlspecialchars($_POST['title']));
    $summary = trim(htmlspecialchars($_POST['summary'])) ?: null;
    $content = htmlspecialchars($_POST['content']) ?: null;
    $tutor_id = $_POST['tutor_id'] ?: null;
    $category_id = $_POST['category_id'] ?: null;
    if (!empty($title)) {
        include_once("lib/RedBeanPHP5_4_2/rb.php");
        include_once("Dbsettings.php");
        include_once("model/DB.php");
        include_once("controller/Learnbook.php");
        new DB($host, $port, $db_name, $user, $password);
        $create = new Learnbook();
        $create->create($title, $summary, $content, $tutor_id, $category_id);
        header('location: edu-material.php?msg=Запись успешно добавлена!');
    }
}
?>
<?php
session_start();
$title = "Добавить учебный материал";
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
                    <form method="post">
                        <div class="form-group">
                            <label for="title">Название учебного материала</label>
                            <input type="text" class="form-control" id="title" placeholder="Название учебного материала"
                                   name="title"
                                   value="">
                        </div>

                        <div class="form-group">
                            <label for="summary">Описание</label>
                            <input type="text" class="form-control" id="summary" placeholder="Описание"
                                   name="summary">
                        </div>

                        <div class="form-group">
                            <label for="content">Текст учебного материала</label>
                            <textarea type="text" class="form-control" id="content"
                                      name="content">Текст главы</textarea>
                        </div>
                        <?php
                        include_once("lib/RedBeanPHP5_4_2/rb.php");
                        include_once("Dbsettings.php");
                        include_once("model/DB.php");
                        include_once("controller/Category.php");
                        include_once("controller/Tutor.php");
                        new DB($host, $port, $db_name, $user, $password);
                        ?>
                        <div class="form-group">
                            <label for="tutor_id">Автор (преподаватель)</label>
                            <select type="text" class="form-control" name="tutor_id"
                                    id="tutor_id">
                                <?php
                                $tutors = new Tutor();
                                foreach ($tutors->get() as $tutor) { ?>
                                    <option value="<?php echo $tutor['id']; ?>">
                                        <?php echo $tutor['first_name'] . " " . $tutor['last_name']; ?>
                                    </option>
                                <?php } ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="category_id">Категория</label>
                            <select type="text" class="form-control" name="category_id"
                                    id="category_id">
                                <?php
                                $categories = new Category();
                                foreach ($categories->get() as $category) { ?>
                                    <option value="<?php echo $category['id']; ?>">
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php } ?>

                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Сохранить</button>
                        <a href="index.php" class="btn btn-primary">Отмена</a>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- / Inner Page Content End -->
<?php include_once('includes/footer.php'); ?>