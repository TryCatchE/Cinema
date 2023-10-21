<?php
include 'Db.php';
class AdminCntrl extends Db
{
     // συναρτήσεις με διάφορες λειτουργικότητες που χρειαζόμαστε οταν επικοινωνούμε με τη βάση για το view των διαχειρηστών, η ονομασία είναι η περιγραφή της λειτουργικότητας 
    protected static function login($username, $password)
    {

        $db = DB::getInstance();
        $result = false;

        $sql = "SELECT * FROM admins WHERE username ='$username'";
        $querry = $db->executeQuery($sql);
        $rows = $querry->rowCount();

        if (!empty($rows)) {

            $dataFetched = $db->fetchAllResults($querry)[0];
            $username = $dataFetched["username"];
            $pass = $dataFetched["password"];

            if ($pass != $password) {
                echo "Password Doesnt Match Username";
                echo "<br/>";
                echo "<a href='/cinemaProject/forms/loginForm.php'>Back to Login Page</a>";
                return;
            }

            session_start();
            $_SESSION["username"] = $username;
            $_SESSION['role'] = 'admin';

            header("Location: /cinemaProject/admin.php");

            $result = true;
        }
        return $result;
    }
         // $endingDate,// 
    protected static function setShow($filename, $title, $tempname, $folder, $url, $playinghours, $description, $startingDate,$seatCount)
    {

        $db = DB::getInstance();

        $ar = [
            "title" => $title,
            "image" => $filename,
            "url" => $url,
            "playinghours" => $playinghours,
            "description" => $description,
            "startingDate" => $startingDate,
            // "endingDate" => $endingDate,
            "seat_count" => $seatCount,
        ];

        $results = $db->executeQuery("INSERT INTO events SET " . $db->buildUpdateParams($ar, true), $ar);

        if (move_uploaded_file($tempname, $folder)) {
            echo "<h1>  Show Upload Successfully!</h1>";
        } else {
            echo "<h1>  Failed to upload image, try Jpeg!</h1>";
            echo "<a href='/cinemaProject/forms/adminSetShow.php'>Back to set a show</a>";
        }

        if ($results) {
            echo "<h2> Show uploaded successfully!</h2>";
            echo "<a href='/cinemaProject/forms/adminSetShow.php'>Back to set a show</a>";
        } else {
            echo "<h2>  Failed to upload show!</h2>";
            echo "<a href='/cinemaProject/forms/adminSetShow.php'>Back to set a show</a>";
        }
    }
    protected static function setMovie($filename, $title, $tempname, $folder, $url, $description)
    {

        $db = DB::getInstance();

        $ar = [
            "title" => $title,
            "image" => $filename,
            "url" => $url,
            "description" => $description
        ];

        $results = $db->executeQuery("INSERT INTO movies SET " . $db->buildUpdateParams($ar, true), $ar);

        if (move_uploaded_file($tempname, $folder)) {
            echo "<h1> Image Upload! </h1>";
        } else {
            echo "<h1>  Failed to upload image, try Jpeg!</h1>";
            echo "<a href='/cinemaProject/forms/adminSetMovie.php'>Back to set a movie</a>";
        }

        if ($results) {
            echo "<h2> Movie uploaded successfully!</h2>";
            echo "<a href='/cinemaProject/forms/adminSetMovie.php'>Back to set a movie</a>";
        } else {
            echo "<h2>  Failed to upload movie!</h2>";
            echo "<a href='/cinemaProject/forms/adminSetMovie.php'>Back to set a movie</a>";
        }
    }

    protected static function getReservations()
    {

        $db = DB::getInstance();
        $sql = "SELECT * FROM booking";
        $res = $db->executeQuery($sql);
        $results = $db->fetchAllResults($res);

        return $results;
    }

    protected static function getWorkingDates()
    {

        $db = DB::getInstance();
        $sql = "SELECT * FROM workingDates";
        $res = $db->executeQuery($sql);
        $results = $db->fetchAllResults($res);

        return $results;
    }

    protected static function setReservation($verified, $booking_id)
    {
        $db = DB::getInstance();

        $ar = [
            "verified" => $verified,
            "booking_id" => $booking_id,
        ];

        $result = $db->executeQuery("UPDATE booking   SET " . $db->buildUpdateParams($ar) . " WHERE booking_id=:booking_id", $ar);

        if ($result) {

            echo "Booking changed status successfully";
            echo "<br/>";
            echo "<a href='/cinemaProject/admin.php'>Back to Admin View<a/>";

        } else {

            echo "Something went wrong";
            echo "<br/>";
            echo "<a href='/cinemaProject/admin.php'>Back to Admin View<a/>";
        }
    }
    protected static function setWorkingDates($closed, $date_id)
    {
        $db = DB::getInstance();

        $ar = [
            "closed" => $closed,
            "id" => $date_id,
        ];

        $result = $db->executeQuery("UPDATE workingDates   SET " . $db->buildUpdateParams($ar) . " WHERE id=:id", $ar);

        if ($result) {

            echo "Working dates changed successfully";
            echo "<br/>";
            echo "<a href='/cinemaProject/admin-dates.php'>Back to Change dates<a/>";

        } else {

            echo "Something went wrong";
            echo "<br/>";
            echo "<a href='/cinemaProject/admin-dates.php'>Back to Change dates<a/>";
        }
    }

    protected static function setHours($openingHour, $closingHour)
    {

        $db = DB::getInstance();

        $ar = [
            "openingHour" => $openingHour,
            "ClosingHour" => $closingHour,
        ];

        $result = $db->executeQuery("SELECT COUNT(*) FROM workingHours")->fetchColumn();

        if ($result > 0) {
            $db->executeQuery("UPDATE workingHours SET " . $db->buildUpdateParams($ar), $ar);
        } else {
            $db->executeQuery("INSERT INTO workingHours SET " . $db->buildUpdateParams($ar), $ar);
        }

        if ($result) {

            echo "Working hours changed successfully";
            echo "<br/>";
            echo "<a href='/cinemaProject/forms/adminChangeCinemaHours.php'>Back to change hours<a/>";

        } else {

            echo "Something went wrong";
            echo "<br/>";
            echo "<a href='/cinemaProject/forms/adminChangeCinemaHours.php'>Back to change hours<a/>";
        }
    }
}