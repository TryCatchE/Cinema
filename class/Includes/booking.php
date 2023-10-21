<?php

//Εδώ καταλήγουν τα δεδομένα της φόρμας οταν την υποβάλει διαχειρηστής ή χρήστης (ανάλογα τη φόρμα) και με αύτα τρέχουμε κάποιες συναρτήσεις που ζουν σε κάποιες συγκεκριμένες κλάσσεις
// η ονομασία του αρχείου περιγράφει την λειτουργηκότητα του κάθε αρχείου

session_start();
include "../Controllers/BookingCntrl.php";

$movieName = $_POST['movieName'];
$date = $_POST['date'];
$playingHour = $_POST['hour'];
$seats = $_POST["seats"];

$seatsBought = $_POST["seatsBought"];
$user = $_SESSION["users_id"];
$showid = $_POST["showid"];

$totalAmount = $_POST["totalAmount"];
$noTickets = $_POST["numberOfTickets"];



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $flabResult = BookingCntrl::setBooking($seatsBought, $noTickets, $user, $totalAmount, $date, $movieName, $playingHour);

    if ($flabResult){
        BookingCntrl::seatReservation($seats, $showid);
        echo "Booking successfully done!";
        echo "<a href='/cinemaProject/index.php'>Back to home</a>";
    }else{
        echo "Something went wrong";
    }
}