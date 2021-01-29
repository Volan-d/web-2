<?php
include "db_connect.php";
session_start();
$is_login = false;
if (isset($_SESSION['user_id'])) {
    $is_login = true;
}

if (isset($_GET['logout'])) {
    session_unset();
    header("location: http://cmit-asino.ml/index.php");
}

try {
$category = "";
    if (isset($_GET["category"])) {
        $data = $DBH->query("SELECT `key` FROM `categories` WHERE `category`='".$_GET["category"]."'");
        $data->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $data->fetch()) {
            $category = $row['key'];
        }
    } else {
        $category = "1";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" integrity="sha512-Velp0ebMKjcd9RiCoaHhLXkR1sFoCCWXNp6w4zj1hfMifYB5441C+sKeBl/T/Ka6NjBiRfBBQRaQq65ekYz3UQ==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css">
    <title>
        <?php
        if ($category == 1) {
            echo "Котики";
        } elseif ($category == 3) {
            echo "Хомяки";
        } elseif ($category == 5) {
            echo "Дракоши";
        }
        ?>
    </title>
</head>
<body class="bg-dark" id="cat-page">
<!-- Body-->
<!-- Шарики-->
<!-- новогодняя мотня newyear.html -->
<div class="fixed-top b-page_newyear bg-primary">
    <div class="b-page__content">
        <i class="b-head-decor">
            <i class="b-head-decor__inner b-head-decor__inner_n1">
                <div class="b-ball b-ball_n1 b-ball_bounce" data-note="0"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n2 b-ball_bounce" data-note="1"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n3 b-ball_bounce" data-note="2"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n4 b-ball_bounce" data-note="3"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n5 b-ball_bounce" data-note="4"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n6 b-ball_bounce" data-note="5"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n7 b-ball_bounce" data-note="6"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n8 b-ball_bounce" data-note="7"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n9 b-ball_bounce" data-note="8"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i1"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i2"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i3"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i4"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i5"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i6"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            </i>
            <i class="b-head-decor__inner b-head-decor__inner_n2">
                <div class="b-ball b-ball_n1 b-ball_bounce" data-note="9"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n2 b-ball_bounce" data-note="10"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n3 b-ball_bounce" data-note="11"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n4 b-ball_bounce" data-note="12"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n5 b-ball_bounce" data-note="13"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n6 b-ball_bounce" data-note="14"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n7 b-ball_bounce" data-note="15"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n8 b-ball_bounce" data-note="16"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n9 b-ball_bounce" data-note="17"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i1"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i2"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i3"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i4"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i5"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i6"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            </i>
            <i class="b-head-decor__inner b-head-decor__inner_n3">
                <div class="b-ball b-ball_n1 b-ball_bounce" data-note="18"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n2 b-ball_bounce" data-note="19"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n3 b-ball_bounce" data-note="20"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n4 b-ball_bounce" data-note="21"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n5 b-ball_bounce" data-note="22"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n6 b-ball_bounce" data-note="23"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n7 b-ball_bounce" data-note="24"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n8 b-ball_bounce" data-note="25"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n9 b-ball_bounce" data-note="26"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i1"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i2"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i3"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i4"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i5"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i6"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            </i>
            <i class="b-head-decor__inner b-head-decor__inner_n4">
                <div class="b-ball b-ball_n1 b-ball_bounce" data-note="27"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n2 b-ball_bounce" data-note="28"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n3 b-ball_bounce" data-note="29"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n4 b-ball_bounce" data-note="30"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n5 b-ball_bounce" data-note="31"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n6 b-ball_bounce" data-note="32"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n7 b-ball_bounce" data-note="33"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n8 b-ball_bounce" data-note="34"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n9 b-ball_bounce" data-note="35"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i1"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i2"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i3"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i4"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i5"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i6"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            </i>
            <i class="b-head-decor__inner b-head-decor__inner_n5">
                <div class="b-ball b-ball_n1 b-ball_bounce" data-note="0"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n2 b-ball_bounce" data-note="1"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n3 b-ball_bounce" data-note="2"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n4 b-ball_bounce" data-note="3"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n5 b-ball_bounce" data-note="4"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n6 b-ball_bounce" data-note="5"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n7 b-ball_bounce" data-note="6"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n8 b-ball_bounce" data-note="7"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n9 b-ball_bounce" data-note="8"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i1"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i2"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i3"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i4"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i5"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i6"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            </i>
            <i class="b-head-decor__inner b-head-decor__inner_n6">
                <div class="b-ball b-ball_n1 b-ball_bounce" data-note="9"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n2 b-ball_bounce" data-note="10"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n3 b-ball_bounce" data-note="11"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n4 b-ball_bounce" data-note="12"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n5 b-ball_bounce" data-note="13"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n6 b-ball_bounce" data-note="14"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n7 b-ball_bounce" data-note="15"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n8 b-ball_bounce" data-note="16"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n9 b-ball_bounce" data-note="17"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i1"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i2"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i3"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i4"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i5"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i6"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            </i>
            <i class="b-head-decor__inner b-head-decor__inner_n7">
                <div class="b-ball b-ball_n1 b-ball_bounce" data-note="18"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n2 b-ball_bounce" data-note="19"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n3 b-ball_bounce" data-note="20"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n4 b-ball_bounce" data-note="21"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n5 b-ball_bounce" data-note="22"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n6 b-ball_bounce" data-note="23"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n7 b-ball_bounce" data-note="24"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n8 b-ball_bounce" data-note="25"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n9 b-ball_bounce" data-note="26"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i1"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i2"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i3"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i4"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i5"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i6"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            </i>
        </i>
    </div>
</div>
<!-- Шарики кончились-->
<div class="container">
    <h1 class="text-center text-light">
        <?php
            if ($category == 1) {
                echo "Котики";
            } elseif ($category == 3) {
                echo "Хомяки";
            } elseif ($category == 5) {
                echo "Дракоши";
            }
        ?>
    </h1>
    <div class="row row-cols-3">
<?php
    try {
        $data = $DBH->query("SELECT name, disc FROM photos WHERE id_cat_name=".$category);
        $data->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $data->fetch()) {
            echo '<div class="col mb-4">';
            echo '<a href="img/'.$row['name'].'" data-toggle="lightbox" data-title="Котейки" data-footer="'.$row['disc'].'">';
            echo '<div class="card border-primary text-center h-100 shadow-lg-cat bg-white rounded">';
            echo '<img src="img/'.$row['name'].'" class="card-img-top" alt="...">';
            echo '<div class="card-body">';
            echo '<p class="card-text">'.$row['disc'].'</p>';
            echo '</div>';
            echo '</div>';
            echo '</a>';
            echo '</div>';
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
?>
    </div>
</div>

<!-- footer -->
<footer>
    <div class="text-center fixed-bottom text-light"><h5>&copy; Евгений Ушаков</h5></div>
</footer>

<!-- Navigation-->
<nav class="navbar navbar-dark fixed-top bg-primary"> <!--bg-primary-->
    <a class="navbar-brand" href="gallary_old/index.html">
        <i class="fas fa-images"></i> Фотогалерея
    </a>
    <div class="flex-row d-flex">
        <a class="nav-item nav-link text-light" href="index.php">Котейки</a>
        <a class="nav-item nav-link text-light" href="index.php?category=homka">Хомяки</a>
        <a class="nav-item nav-link text-light" href="index.php?category=dragons">Дракоши</a>
        <!--<a class="nav-item nav-link text-light" href="#" data-toggle="modal" data-target="#setting"><i class="fas fa-cogs"></i></a> -->
        <?php
            if ($is_login) {
                echo '<div class="btn-group">';
                echo '<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                echo '<i class="fas fa-user"></i>';
                echo '</button>';
                echo '<div class="dropdown-menu dropdown-menu-right">';
                echo '<a class="dropdown-item" href="#" data-toggle="modal" data-target="#setting"><i class="fas fa-cogs"></i> Настройки</a>';
                echo '<a class="dropdown-item" href="?logout"><i class="fas fa-sign-out-alt"></i> Выход</a>';
                echo '</div>';
                echo '</div>';
            } else {
                echo '<a class="nav-item nav-link text-light" href="#" data-toggle="modal" data-target="#login"><i class="fas fa-sign-in-alt"></i></a>';
            }
        ?>



    </div>
</nav>

<!-- Modal Setting -->
<div class="modal fade" id="setting" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Заголовок</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Укажите цвет элемента: <input type="color" name="bg" value="#ff0000" id="changeItemColor">
                </p>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="check-theme">
                    <label class="custom-control-label" for="check-theme">Темная тема</label>
                </div>
            </div>
            <div class="modal-footer">
                <footer>
                    Тут подпись
                </footer>
            </div>
        </div>
    </div>
</div>

<!-- Modal Login -->
<div class="modal fade" id="login" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Авторизация пользователя</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="InputLogin">Login<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control" id="InputLogin">
                    </div>
                    <div class="form-group">
                        <label for="InputPassword">Password<sup class="text-danger">*</sup></label>
                        <input type="password" class="form-control" id="InputPassword">
                    </div>
                    <button type="submit" class="btn btn-primary">Войти</button> или <a href="registration.php">Зарегистрироваться</a>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="js/jquery-3.5.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js" integrity="sha512-Y2IiVZeaBwXG1wSV7f13plqlmFOx8MdjuHyYFVoYzhyRr3nH/NMDjTBSswijzADdNzMyWNetbLMfOpIPl6Cv9g==" crossorigin="anonymous"></script>
<script src="js/script.js"></script>

</body>
</html>