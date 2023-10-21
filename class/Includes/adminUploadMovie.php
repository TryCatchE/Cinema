<?php

include "../Views/Admin.php";

//Εδώ καταλήγουν τα δεδομένα της φόρμας οταν την υποβάλει διαχειρηστής ή χρήστης (ανάλογα τη φόρμα) και με αύτα τρέχουμε κάποιες συναρτήσεις που ζουν σε κάποιες συγκεκριμένες κλάσσεις
// η ονομασία του αρχείου περιγράφει την λειτουργηκότητα του κάθε αρχείου

$title = $_POST['title'];
$url = $_POST['url'];
$description = $_POST['description'];
$filename=  $_FILES["fileToUpload"]["name"];
$tempname = $_FILES["fileToUpload"]["tmp_name"];
$folder = "../../images/" . $filename;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    Admin::uploadMovie($filename, $title, $tempname, $folder,$url,$description);

}