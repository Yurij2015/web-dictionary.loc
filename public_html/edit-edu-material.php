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
        $update = new Learnbook();
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
                    include_once("controller/Category.php");
                    include_once("controller/Tutor.php");
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
                                <select type="text" class="form-control" name="tutor_id"
                                        id="tutor_id">
                                    <?php
                                    $tutors = new Tutor();
                                    ?>
                                    <option value="<?= ($learnbook['tutor_id']) ?>" selected="selected">
                                        <?= $tutors->getTutor($learnbook['tutor_id']) ?>
                                    </option>
                                    <?php
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
                                    ?>
                                    <option value="<?= $learnbook['category_id'] ?>" selected="selected">
                                        <?= $categories->getCategory($learnbook['category_id']) ?>
                                    </option>
                                    <?php
                                    foreach ($categories->get() as $category) { ?>
                                        <option value="<?php echo $category['id']; ?>">
                                            <?php echo $category['name']; ?>
                                        </option>
                                    <?php } ?>

                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Обновить</button>
                            <a href="view-learnbook.php?id=<?=$id?>" class="btn btn-primary">Отмена</a>
                        </form>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div><!-- / Inner Page Content End -->
<?php include_once('includes/footer.php'); ?>