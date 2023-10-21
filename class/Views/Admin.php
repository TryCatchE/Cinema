<?php

include "../Controllers/AdminCntrl.php";
class Admin extends AdminCntrl
{
     // Η συσγκεκριμένη κλάσση είναι η κλάσση που καλείται στα views  χρήστων και διαχειρηστών , η ονομασία είναι περιγραφή της λειτουργικότητας
     // χρησιμοιποιήται κυρίως σαν ένας placeholder για διάφορες συναρτήσεις
     public static function loginAdmin($username, $password)
     {
          self::login($username, $password);
     }

     public static function uploadShow($filename, $title, $tempname, $folder, $url, $playinghours, $description, $startingDate, $seatCount)
     {
          self::setShow($filename, $title, $tempname, $folder, $url, $playinghours, $description, $startingDate,  $seatCount);
     }

     public static function uploadMovie($filename, $title, $tempname, $folder, $url, $description)
     {
          self::setMovie($filename, $title, $tempname, $folder, $url, $description);
     }

     public static function verifyReservation($verified, $booking_id)
     {
          self::setReservation($verified, $booking_id);
     }
     
     public static function changeDates($closed, $date_id)
     {
          self::setWorkingDates($closed, $date_id);
     }
     
     public static function changeHours($openingHour, $closingHour)
     {
          self::setHours($openingHour, $closingHour);
     }
}