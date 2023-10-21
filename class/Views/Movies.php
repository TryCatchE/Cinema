<?php
include "./class/Controllers/MoviesCntrl.php";

class Movies extends MovieCntrl
{
    // Η συσγκεκριμένη κλάσση είναι η κλάσση που καλείται στα views  χρήστων και διαχειρηστών , η ονομασία είναι περιγραφή της λειτουργικότητας
     // χρησιμοιποιήται κυρίως σαν ένας placeholder για διάφορες συναρτήσεις
    public static function fetch()
    {
        return self::getMovies();
    }

    public static function fetchHours()
    {
        return self::getHours();
    }
}