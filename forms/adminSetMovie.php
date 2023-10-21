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

          <form method="post" action="../class/Includes/adminUploadMovie.php" enctype="multipart/form-data">

            <div class="formTitle"> Archive a movie!</div>

            <div class="formRow">
              <label for="fileToUpload" class="genericLabel">Upload img</label>
              <input class="genericInput" title="Add an jpeg or jpg" accept=".jpg, .jpeg"  name="fileToUpload" type="file" required>
            </div>

            <div class="formRow">
              <label for="title" class="genericLabel">Title</label>
              <input class="genericInput" pattern="^\S{2,}$" title="At least 2 digits are required and no whitespaces are allowed." name="title" type="text" required>
            </div>
            <div class="formRow">
              <label for="url" class="genericLabel">Url</label>
              <input class="genericInput" name="url" type="text" >
            </div>
            <div class="formRow">
              <label for="description" class="genericLabel">Desctription</label>
              <input class="genericInput" name="description" type="textarea">
            </div>


            <button class="blueBtn formBtn" name="submit" type="submit">Archive</button>
          </form>

        <script src="../js/common.js"></script>

      </main>
  </body>

</html>