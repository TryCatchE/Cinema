<?php
// φόρμα για την αποστολή δεδομένων, με σκοπό της διάφορων διαδικασιών που περιγράφονται στη ονομασία του αρχείου
session_start();

if (empty($_SESSION['username']) || $_SESSION['role'] != 'admin') {

    header('Location: ./adminForm.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>My Cinema</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../admin.css">

    </head>

    <body>

        <?php include('../uiComponents/adminHeader.php') ?>

        <main class="container formCnt">

            <form method="post" action="../class/Includes/adminChangeHours.php">

                <div class="formTitle">Change Working Hours</div>

                <div class="formRow">
                    <label for="openingHour" class="genericLabel">Open Hour</label>
                    <input name="openingHour" pattern="^[0-9: -]*$" title="Only numbers, colons, and dash are allowed (e.g. 17:00-22:00)" class="genericInput" type="text" required />
                </div>

                <div class="formRow">
                    <label for="closingHour" class="genericLabel">Closing Hour</label>
                    <input name="closingHour" pattern="^[0-9: -]*$" title="Only numbers, colons, and dash are allowed (e.g. 17:00-22:00)" class="genericInput" type="text" required/>
                </div>

                <button class="blueBtn" type="submit">Change Hours</button>

            </form>

            <script src="../js/common.js"></script>

        </main>
    </body>

</html>