<?php
// φόρμα για την αποστολή δεδομένων, με σκοπό της διάφορων διαδικασιών που περιγράφονται στη ονομασία του αρχείου
session_start();

if (empty($_SESSION['username'])) {

  header('Location: //localhost/cinemaProject/forms/loginForm.php');
  exit;
}

?>


<!DOCTYPE html>
<html lang="en">

  <head>
    <title>My Cinema</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../index.css">

    <script src="../js/booking.js"></script>

    
  </head>


  <body>


    <?php include('../uiComponents/header.php') ?>
    <main>
      <h1 class="genericTitle">Booking</h1>
      <p class="dMovie"> Please select a seat of your desired movie!</p>
        <div id="displayDynamicForms" class="container"></div>

    </main>

    
    <script src="../js/common.js"></script>
  </body>
  <?php include('../uiComponents/footer.php') ?>


</html>