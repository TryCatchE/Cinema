<?php
// archive view για αποθήκευση ταινιών που δεν προβάλονται πλεον
include "./class/Views/Movies.php";

session_start();

$movies = Movies::fetch();

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="index.css">

        <title>MyCinema</title>
    </head>

    <body>

        <?php include('./uiComponents/header.php') ?>

        <main class="container">
            <h1 class="genericTitle">Archived Movies</h1>
            <div class="moviesCnt">
                <?php foreach ($movies as $m): ?>
                <div class="movieCard">

                    <div class="imgCnt">
                        <picture class="picture">
                            <img class="img" src="./images/<?= $m["image"] ?>" alt="">
                        </picture>
                    </div>

                    <div class="movieTitle"><?= $m["title"] ?></div>
                    <?php if(!empty($m["url"])) : ?>
                    <a class="blueBtn" href="<?= $m["url"] ?>">Watch Trailer</a>
                    <?php else: ?>
                    <div class="blueBtn">Coming soon</div>
                    <?php endif ; ?>

                </div>
                <?php endforeach; ?>

            </div>
        </main>

        <?php include('./uiComponents/footer.php') ?>

        <script src="./js/common.js"></script>
    </body>

</html>