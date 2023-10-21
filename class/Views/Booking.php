<?php

include "./class/Controllers/BookingCntrl.php";

class Booking extends BookingCntrl
{
    // Η συσγκεκριμένη κλάσση είναι η κλάσση που καλείται στα views  χρήστων και διαχειρηστών , η ονομασία είναι περιγραφή της λειτουργικότητας
     // χρησιμοιποιήται κυρίως σαν ένας placeholder για διάφορες συναρτήσεις
    public static function getAllReservervations()
    {
        return self::getAll();
    }
    public static function getWorkingDates()
    {
        return self::getDates();
    }

}