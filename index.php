<?php
// homepage 
include "./class/Views/Movies.php";

session_start();

$movies = Movies::fetch();

$hours = Movies::fetchHours();

$shows = Movies::getShows();

$dates = Movies::getDates();

$closedDays = "";
foreach ($dates as $item) {
    if ($item['closed'] != 0) {
        $closedDays .= $item['date'] . ", ";
    }
}
$closedDays = rtrim($closedDays, ", ");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">
    <!-- <link rel="preload" href="https://fonts.google.com/specimen/Roboto?executeQuery=roboto" as="font" crossorigin />
	    <link rel="preload" href="https://fonts.google.com/specimen/Roboto?executeQuery=roboto" as="font" crossorigin /> -->

    <title>MyCinema</title>
</head>

<body>

    <div class="workingHours">

        <div>
            <?php if(!empty($hours)) : ?>
            <div id="scroll-container">
                
                <div id="scroll-text">

                    <div class="nobreak" > Cinemas working hours are  from <?=  $hours[0]["openingHour"] ?> to <?=  $hours[0]["closingHour"] ?> </div>

                    <?php if(!empty($closedDays)) : ?>
                      <div class="nobreak red" >Cinema is closed on <?=$closedDays?> </div>
                    <?php endif ; ?>

                </div>

            </div>
            <?php endif ; ?>
            <?php include('./uiComponents/header.php') ?>


            <main class="container">
                <h1 class="genericTitle">Playing now!</h1>
                <div class="moviesCnt">
                    <?php if(empty($shows)) : ?>

                        <div class="noShowsMsg">No available shows yet!</div>
                        <?php else: ?>

                        <?php foreach ($shows as $s): ?>
                        <div class="movieCard">

                            <div class="imgCnt">
                                <picture class="picture">
                                    <img class="img" src="./images/<?= $s["image"] ?>" alt="">
                                </picture>
                            </div>

                            <div class="movieTitle"><?= $s["title"] ?></div>
                            <div class="datesCnt">
                                <?php if(!empty($s["startingDate"])):?>
                                    <div>Starting date: <?= date('d/m/Y', strtotime($s["startingDate"])) ?></div>
                                <?php endif;?>
                            </div>
                            <div class="bookingTrailerBtn">

                                <?php if(!empty($s["url"])) : ?>
                                <a target="_blank" class="blueBtn" href="<?= $s["url"] ?>">Watch Trailer</a>
                                <?php else: ?>
                                <div class="trailerBtn">No trailer found!</div>
                                <?php endif ; ?>

                                <div>
                                    <a class="whiteBtn"   href="//localhost/cinemaProject/forms/bookingForm.php"> Go to booking </a>
                                </div>
                            </div>
                        </div>

                        <?php endforeach; ?>

                    <?php endif ; ?>
                </div>
            </main>

            <?php include('./uiComponents/footer.php') ?>

            <script src="./js/common.js"></script>

</body>

</html>