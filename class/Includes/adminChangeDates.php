<?php

include "../Views/Admin.php";

//Εδώ καταλήγουν τα δεδομένα της φόρμας οταν την υποβάλει διαχειρηστής ή χρήστης (ανάλογα τη φόρμα) και με αύτα τρέχουμε κάποιες συναρτήσεις που ζουν σε κάποιες συγκεκριμένες κλάσσεις
// η ονομασία του αρχείου περιγράφει την λειτουργηκότητα του κάθε αρχείου

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $date_id = $_POST['id'];
    $closed = isset($_POST['closed']) ? 1 : 0;

    if($_POST['submit'] == 'open'){
        $closed = 0;
    }else{
        $closed = 1;
    }
    
    Admin::changeDates($closed, $date_id);
}