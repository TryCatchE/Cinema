<?php

  //Εδώ καταλήγουν τα δεδομένα της φόρμας οταν την υποβάλει διαχειρηστής ή χρήστης (ανάλογα τη φόρμα) και με αύτα τρέχουμε κάποιες συναρτήσεις που ζουν σε κάποιες συγκεκριμένες κλάσσεις
  // η ονομασία του αρχείου περιγράφει την λειτουργηκότητα του κάθε αρχείου
  session_start();

  $_SESSION = array();

  session_destroy();

  header("location: //localhost/cinemaProject/index.php");
  exit;
?>