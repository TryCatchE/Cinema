<?php

include "../Views/Admin.php";

//Εδώ καταλήγουν τα δεδομένα της φόρμας οταν την υποβάλει διαχειρηστής ή χρήστης (ανάλογα τη φόρμα) και με αύτα τρέχουμε κάποιες συναρτήσεις που ζουν σε κάποιες συγκεκριμένες κλάσσεις
// η ονομασία του αρχείου περιγράφει την λειτουργηκότητα του κάθε αρχείου

$title = $_POST['title'];
$playinghours = $_POST["playinghour1"].','.$_POST["playinghour2"].','. $_POST["playinghour3"];
$startingDate = $_POST["startingDate"];

$url = $_POST["url"];
$description = $_POST["description"];
$seatCount = $_POST["seat_count"];

$filename=  $_FILES["fileToUpload"]["name"];
$tempname = $_FILES["fileToUpload"]["tmp_name"];
$folder = "../../images/" . $filename;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    Admin::uploadShow  ($filename, $title, $tempname, $folder,$url, $playinghours, $description,$startingDate,$seatCount);

}