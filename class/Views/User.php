<?php
use LDAP\Result;

include "../Controllers/UserCntrl.php";

class User extends UserCntrl
{
    // Η συσγκεκριμένη κλάσση είναι η κλάσση που καλείται στα views  χρήστων και διαχειρηστών , η ονομασία είναι περιγραφή της λειτουργικότητας
     // χρησιμοιποιήται κυρίως σαν ένας placeholder για διάφορες συναρτήσεις
    public static function registerUser($username, $password)
    {
        if (self::register($username, $password)) {
            echo "Registered";
            echo "<br/>";
            echo "<a href='/cinemaProject/forms/loginForm.php'>Go to Login Form</a>";
        } else {
            echo "This username already exists";
            echo "<br/>";
            echo "<a href='/cinemaProject/forms/loginForm.php'>Go to Login Form</a>";
        }
    }

    public static function logUser($username, $password)
    {
        if (self::login($username, $password)) {
            echo "<br/>";
            echo "Logged In";
        } else {
            echo "<br/>";
            echo "Something Went Wrong";
        }
    }

    public static function emptyInput($username, $password)
    {
        $result = true;
        $passwordError = $usernameError = "";
        if (empty($password)) {
            $passwordError = "Empty password field";
            echo $passwordError;
            echo "<br/>";
            $result = false;
        }

        if (empty($username)) {
            $usernameError = "Empty username field";
            echo $usernameError;
            $result = false;
        }

        if (!$result) {
            echo "<br/>";
            echo "<a href='/cinemaProject/forms/loginForm.php'>Back to login Form</a>";
            echo "<br/>";
            echo "<a style='background-color:red;' href='/cinemaProject/index.php'>Back to home</a>";
        }
        return $result;
    }
}