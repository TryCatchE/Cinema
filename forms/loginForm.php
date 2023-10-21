<!DOCTYPE html>
<html lang="en">
    <!-- φόρμα για την αποστολή δεδομένων, με σκοπό της διάφορων διαδικασιών που περιγράφονται στη ονομασία του αρχείου -->

    <head>
        <title>My Cinema</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../index.css">
    </head>

    <body>

        <?php include('../uiComponents/header.php') ?>

        <main class="container formCnt">

            <form method="post" action="../class/Includes/login.php" class="gericForm">
                <div class="formTitle">Welcome</div>
                <div class="formSubTitle">Login!</div>

                <div class="formRow">
                    <label for="username" class="genericLabel">Username</label>
                    <input id="username" name="username" class="genericInput" type="text" placeholder=" " required/>
                </div>

                <div class="formRow">
                    <label for="password" class="genericLabel">Password</label>
                    <input id="password" name="password" class="genericInput" type="password" placeholder=" "required />
                </div>

                <button class="blueBtn formBtn" type="submit">Login</button>
                <div>Not registered yet?&nbsp; <a class="blue" classhref="//localhost/cinemaProject/forms/registerForm.php">Register</a></div>
            </form>

        </main>

        <?php include('../uiComponents/footer.php') ?>
        <script src="../js/common.js"></script>
    </body>

</html>