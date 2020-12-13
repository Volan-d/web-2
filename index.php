<?php
try {
$host = "localhost";
$dbname = "f0459275_galary";
$user = "f0459275_galary";
$pass = "f0459275_galary_pass";

$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

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
<nav class="navbar navbar-dark fixed-top"> <!--bg-primary-->
    <a class="navbar-brand" href="index.html">
        <i class="fas fa-images"></i> Фотогалерея
    </a>
    <div class="flex-row d-flex">
        <a class="nav-item nav-link text-light" href="index.php">Котейки</a>
        <a class="nav-item nav-link text-light" href="index.php?category=homka">Хомяки</a>
        <a class="nav-item nav-link text-light" href="index.php?category=dragons">Дракоши</a>
        <a class="nav-item nav-link text-light" href="#" data-toggle="modal" data-target="#setting"><i class="fas fa-cogs"></i></a>
    </div>
</nav>

<!-- Modal -->
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

<script src="js/jquery-3.5.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js" integrity="sha512-Y2IiVZeaBwXG1wSV7f13plqlmFOx8MdjuHyYFVoYzhyRr3nH/NMDjTBSswijzADdNzMyWNetbLMfOpIPl6Cv9g==" crossorigin="anonymous"></script>
<script src="js/script.js"></script>

</body>
</html>