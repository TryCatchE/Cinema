<?php
// φόρμα για την αποστολή δεδομένων, με σκοπό της διάφορων διαδικασιών που περιγράφονται στη ονομασία του αρχείου
session_start();

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>My Cinema</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../index.css">
    </head>

    <body>

        <main class="container formCnt">

            <form method="post" action="../class/Includes/adminLogin.php" class="form">
                <div class="formTitle">Welcome</div>
                <div class="formSubTitle">Login As Admin!</div>

                <div class="formRow">
                    <label for="username" class="genericLabel">Username</label>
                    <input name="username" class="genericInput" type="text" required />
                </div>

                <div class="formRow">
                    <label for="password" class="genericLabel">Password</label>
                    <input name="password" class="genericInput" type="password" required />
                </div>

                <button class="blueBtn formBtn" type="submit" class="submit">Login</button>
            </form>

        </main>
        <script src="../js/common.js"></script>
    </body>

</html>