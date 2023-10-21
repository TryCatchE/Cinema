<!DOCTYPE html>
<html lang="en">

<!-- // φόρμα για την αποστολή δεδομένων, με σκοπό της διάφορων διαδικασιών που περιγράφονται στη ονομασία του αρχείου -->

    <head>
        <title>My Cinema</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../index.css">
    </head>

    <body>

        <?php include('../uiComponents/header.php') ?>

        <main class="container formCnt">

            <form method="post" action="../class/Includes/register.php" class="form">
                <div class="formTitle">Welcome</div>
                <div class="formSubTitle">Register!</div>

                <div class="formRow">
                    <label for="username" class="genericLabel">Username</label>
                    <input id="username" pattern="^\S{6,}$" title="At least 6 digits are required and no whitespaces are allowed."  name="username" class="genericInput" type="text" placeholder=" " required/>
                </div>

                <div class="formRow">
                    <label for="password" class="genericLabel">password</label>
                    <input id="password" pattern="^\S{6,}$" title="At least 6 digits are required and no whitespaces are allowed." name="password" class="genericInput" type="password" placeholder=" " required/>
                </div>

                <button class="blueBtn formBtn" type="submit" >Register</button>
                <div>Already a user!&nbsp; <a class="blue" classhref="//localhost/cinemaProject/forms/loginForm.php">Login</a></div>
            </form>

        </main>


        <?php include('../uiComponents/footer.php') ?>
        <script src="../js/common.js"></script>
    </body>

</html>