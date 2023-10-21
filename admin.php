<?php
// admin κεντρικό view 
session_start();
include "./class/Views/Booking.php";

if (empty($_SESSION['username']) || $_SESSION['role'] != 'admin') {

    header('Location: ./forms/adminForm.php');
    exit;
}

$reservation = Booking::getAllReservervations();

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

    <main class="tableCnt container">

        <div class="tableHeader">
            <div class="item w60 ">Movie Name</div>
            <div class="item w60">Username</div>
            <div class="item w60 hidForMobile">Playing Hours</div>
            <div class="item w60 hidForMobile ">Date</div>
            <div class="item w60">No. Tickets</div>
            <div class="item w60">Total Amount</div>
            <div class="item w60">Verified</div>
            <div class="item hidForMobile w60">Seats Code</div>
            <div class="item w60 hidForMobile">Verify</div>
        </div>

        <?php foreach ($reservation as $r): ?>
            <form method="POST" action="class/Includes/adminVerifyReservation.php" class="tableRow">
                <div class="w60"><?= $r["movieName"] ?></div>
                <div class="w60">
                    <?= $r["username"] ?>
                </div>
                <div class="w60 hidForMobile">
                    <?= $r["playingHour"] ?>
                </div>
                <div class="w60 hidForMobile"><?= $r["date"] ?></div>
                <div class="w60">
                    <?= $r["no_tickets"] ?>
                </div>
                <div class="w60"><?= $r["total_amount"] ?>&euro;</div>
                <input class="w60" type="checkbox" name="verified" value="1" <?php if ($r['verified'] == 1) {
                    echo 'checked';
                } ?>>
                <input class="w60 hidForMobile" type="hidden" name="booking_id" value="<?= $r['booking_id'] ?>">
                <div class="w60 hidForMobile">
                    <?= $r["seats"] ?>
                </div>
                <div class="w60 overflow">
                    <button class="blueBtn" type="submit">Verify</button>
                </div>
            </form>
        <?php endforeach; ?>

    </main>
    <script src="./js/common.js"></script>
</body>

</html>