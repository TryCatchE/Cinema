<?php

  include "../Views/User.php";

      //Εδώ καταλήγουν τα δεδομένα της φόρμας οταν την υποβάλει διαχειρηστής ή χρήστης (ανάλογα τη φόρμα) και με αύτα τρέχουμε κάποιες συναρτήσεις που ζουν σε κάποιες συγκεκριμένες κλάσσεις
    // η ονομασία του αρχείου περιγράφει την λειτουργηκότητα του κάθε αρχείου

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $validation = User::emptyInput($username, $password);

      if($validation){
        User::logUser($username, $password);
      }
  }