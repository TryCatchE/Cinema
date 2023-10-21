<?php

include "../Views/Admin.php";

//Εδώ καταλήγουν τα δεδομένα της φόρμας οταν την υποβάλει διαχειρηστής ή χρήστης (ανάλογα τη φόρμα) και με αύτα τρέχουμε κάποιες συναρτήσεις που ζουν σε κάποιες συγκεκριμένες κλάσσεις
// η ονομασία του αρχείου περιγράφει την λειτουργηκότητα του κάθε αρχείου

$openingHour = $_POST['openingHour'];
$closingHour = $_POST['closingHour'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    Admin::changeHours($openingHour, $closingHour);
    
}
