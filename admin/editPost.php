<?php
require_once "../core/lib.php";
require_once "../core/config.php";
require_once "secure/secure.php";
require_once "secure/session.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $header = trim($_POST["header"]);
    $content = trim($_POST["content"]);
    $id = (int)$_GET["id"];
    editPost($id, $header, $content);
}


$arrPosts = getPosts();
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Изменение</title>
    <link rel="stylesheet" href="../libs/bootstrap/bootstrap-grid-3.3.1.min.css"/>
    <link rel="stylesheet" href="../libs/font-awesome-4.2.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="../css/fonts.css"/>
    <link rel="stylesheet" href="../css/main.css"/>
    <link rel="stylesheet" href="../css/media.css"/>
</head>
<body>

<div class="home-content">
    <section style="margin-top: -100px" class="feedback">
        <div class="container">
            <a href="../admin">Назад</a>
            <form style="margin-top: 40px;" action="<?php $_SERVER["PHP_SELF"] ?>" method="post" enctype="multipart/form-data">
                <label>Название:</label>
                <input style="margin-bottom: 15px;" type="text" name="header" required
                       value="<?php echo $arrPosts[$id - 1]["header"] ?>"> <br>
                <label>Описание:</label> <br>
                <textarea style="margin-bottom: 15px;" type="text" name="content" required><?php echo $arrPosts[$id - 1]["content"];  ?>
                </textarea> <br>
                <label>Превью:</label> <br>
                <input style="margin-bottom: 15px;" type="file" name="uploadfile" required><br>
                <input type="submit" value="Изменить">
            </form>
        </div>
    </section>
</div>

</body>
</html>