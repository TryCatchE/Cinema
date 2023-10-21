<?php

include "../Views/Admin.php";

//Εδώ καταλήγουν τα δεδομένα της φόρμας οταν την υποβάλει διαχειρηστής ή χρήστης (ανάλογα τη φόρμα) και με αύτα τρέχουμε κάποιες συναρτήσεις που ζουν σε κάποιες συγκεκριμένες κλάσσεις
// η ονομασία του αρχείου περιγράφει την λειτουργηκότητα του κάθε αρχείου

$booking_id = $_POST['booking_id'];
$verified = isset($_POST['verified']) ? 1 : 0;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    Admin::verifyReservation($verified, $booking_id);

}