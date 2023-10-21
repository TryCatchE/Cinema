<?php
// admin view για αλλαγή ωρών
session_start();
include "./class/Views/Booking.php";

if (empty($_SESSION['username']) || $_SESSION['role'] != 'admin') {

    header('Location: ./forms/adminForm.php');
    exit;
}

$dates = Booking::getWorkingDates();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="preload" href="https://fonts.google.com/specimen/Roboto?executeQuery=roboto" as="font" crossorigin />
    <link rel="preload" href="https://fonts.google.com/specimen/Roboto?executeQuery=roboto" as="font" crossorigin />
    <title>My Cinema</title>
</head>

<body>

    <?php include('./uiComponents/adminHeader.php') ?>

    <main class="tableCnt container ">
        <div class="tableHeader">
            <div class="item w60 ">Date</div>
            <div class="item w60">Change Status</div>
        </div>
        <?php foreach ($dates as $d): ?>
            <form class="tableRow" method="POST" action="class/Includes/adminChangeDates.php">

                <div class="w60">
                    <?= $d["date"] ?>
                </div>

                <input class="w60" type="hidden" name="id" value="<?= $d['id'] ?>">
                <input class="w60" type="hidden" name="closed" value="<?= $d['closed'] == 1 ? 0 : 1 ?>">

                <div class="w60 overflow">
                    <?php if ($d['closed'] != 0): ?>
                        <button class="whiteBtn" type="submit" name="submit" value="open">OPEN</button>
                    <?php else: ?>
                        <button class="blueBtn" type="submit" name="submit" value="close">CLOSE</button>
                    <?php endif ?>

                </div>
            </form>

        <?php endforeach; ?>

    </main>
    <script src="./js/common.js"></script>
</body>

</html>