<?php
// φόρμα για την αποστολή δεδομένων, με σκοπό της διάφορων διαδικασιών που περιγράφονται στη ονομασία του αρχείου
// admin view για την εκκίνηση διαδικασίας προβολής ταινίας

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
      
      <form method="post" action="../class/Includes/adminUploadShow.php" enctype="multipart/form-data">

          <div class="formTitle">Start a show!</div>

          <div class="formRow">
            <label for="fileToUpload" class="genericLabel">Image Upload:</label>
            <input name="fileToUpload" title="Add an jpeg or jpg" accept=".jpg, .jpeg" class="genericInput" type="file" required />
          </div>

          <div class="formRow">
            <label for="title" class="genericLabel">Title</label>
            <input name="title" class="genericInput" pattern="^\S{2,}$" title="At least 2 digits are required and no whitespaces are allowed." type="text"  required/>
          </div>

          <div class="formRow">
            <label for="url" class="genericLabel">Movie Trailer Url</label>
            <input name="url" class="genericInput" type="text"/>
          </div>

          <div class="formRow">
            <label for="playinghour1" class="genericLabel">Hour 1:</label>
            <input name="playinghour1"  pattern="^[0-9: -]*$" title="Only numbers, colons, and dash are allowed (e.g. 17:00-22:00)"  class="genericInput" type="text"  required/>
          </div>

          <div class="formRow">
            <label for="playinghour2" class="genericLabel">Hour 2:</label>
            <input name="playinghour2"  pattern="^[0-9: -]*$" title="Only numbers, colons, and dash are allowed (e.g. 17:00-22:00)"  class="genericInput" type="text" required/>
          </div>

          <div class="formRow">
            <label for="playinghour3" class="genericLabel">Hour 3:</label>
            <input name="playinghour3"  pattern="^[0-9: -]*$" title="Only numbers, colons, and dash are allowed (e.g. 17:00-22:00)"  class="genericInput" type="text"required />
          </div>

          <div class="formRow">
            <label for="startingDate" class="genericLabel">Date of the Show</label>
            <input name="startingDate" class="genericInput" type="date"  required/>
          </div>
<!-- 
          <div class="formRow">
            <label for="endingDate" class="genericLabel">Ending Date</label>
            <input name="endingDate" class="genericInput" type="date"required />
          </div> -->

          <div class="formRow">
            <label for="seat_count" class="genericLabel">Seat Number</label>
            <input name="seat_count" pattern="^[0-9]*$" title="Only numbers are allowed." class="genericInput" type="text" required />
          </div>

          <div class="formRow">
            <label for="description" class="genericLabel">Description</label>
            <input name="description" class="genericInput" type="text" />
          </div>

        <button class="blueBtn formBtn" name="submit" type="submit">Create Show</button>
      </form>
      <script src="../js/common.js"></script>

    </main>

  </body>

</html>