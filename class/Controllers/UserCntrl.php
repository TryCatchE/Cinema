<?php

include 'Db.php';

class UserCntrl extends Db
{
     // συναρτήσεις με διάφορες λειτουργικότητες που χρειαζόμαστε οταν επικοινωνούμε με τη βάση για τη εγγραφή και την είσοδο χρήστη, η ονομασία είναι η περιγραφή της λειτουργικότητας 
    protected static function register($username, $password)
    {
        $db = DB::getInstance();
        $results = false;

        $sql = "SELECT * FROM users WHERE username ='$username'";
        $querry = $db->executeQuery($sql);
        $rows = $querry->rowCount();

        if (empty($rows)) {

            $ar = [
                "username" => $username,
                "password" => $password
            ];

            $results = true;

            $db->executeQuery("INSERT INTO users SET " . $db->buildUpdateParams($ar, true), $ar);
        }
        return $results;
    }

    protected static function login($username, $password)
    {

        $db = DB::getInstance();
        $result = false;

        $sql = "SELECT * FROM users WHERE username ='$username'";
        $querry = $db->executeQuery($sql);
        $rows = $querry->rowCount();

        if (!empty($rows)) {

            // $datFetched = $db->fetchAllResults($querry)[0]["password"]  ?? [];
            $dataFetched = $db->fetchAllResults($querry)[0];

            $userid = $dataFetched["users_id"];
            $username = $dataFetched["username"];
            $pass = $dataFetched["password"];

            if ($pass != $password) {
                echo "Password Doesnt Match Username";
                echo "<br/>";
                echo "<a href='/cinemaProject/forms/loginForm.php'>Back to Login Page</a>";
                return;
            }

            session_start();
            $_SESSION["users_id"] = $userid;
            $_SESSION["username"] = $username;
            $_SESSION["role"] = "user";

            header("Location: /cinemaProject/index.php");

            $result = true;
        }
        return $result;
    }
}