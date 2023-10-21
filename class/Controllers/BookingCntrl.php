<?php
include 'Db.php';
class BookingCntrl extends Db
{
    // συναρτήσεις με διάφορες λειτουργικότητες που χρειαζόμαστε οταν επικοινωνούμε με τη βάση  για τη λειτουργία της κράτησης, η ονομασία είναι η περιγραφή της λειτουργικότητας 
    public static function seatReservation($seats, $show_id)
    {
        $db = DB::getInstance();

        $ar = [
            "show_id" => $show_id,
            "seatno" => $seats
        ];

        $sql = "SELECT * FROM reservedseats WHERE show_id = $show_id";
        $res = $db->executeQuery($sql);

        if ($db->getRowCount($res) > 0) {
            $db->executeQuery("UPDATE reservedseats SET " . $db->buildUpdateParams($ar) . " WHERE show_id=:show_id", $ar);
        } else {
            $db->executeQuery("INSERT INTO reservedseats SET" . $db->buildUpdateParams($ar), $ar);
        }
    }

    public static function setBooking($seatsBought, $noTickets, $user_id, $totalAmount, $date, $movieName, $playingHour)
    {
        $result = false;

        $db = DB::getInstance();

        $ar = [
            "user_id" => $user_id,
            "no_tickets" => $noTickets,
            "seats" => $seatsBought,
            "total_amount" => $totalAmount,
            "date" => $date,
            "movieName" => $movieName,
            "playingHour" =>$playingHour
        ];

       $result =  $db->executeQuery("INSERT INTO booking SET " . $db->buildUpdateParams($ar, true), $ar);
        return $result;
    }

    public static function getAll()
    {
        $db = DB::getInstance();

        $sql = "Select u.username, b.booking_id, b.no_tickets, b.playingHour, b.movieName, b.total_amount ,b.seats, b.date , b.verified
        from booking b, users u
        where u.users_id = b.user_id";
        
        $res = $db->executeQuery($sql);
        $results = $db->fetchAllResults($res);

        return $results;
    }
    
    public static function getDates()
    {
        $db = DB::getInstance();

        $sql = "Select * from workingDates";
        $res = $db->executeQuery($sql);
        $results = $db->fetchAllResults($res);

        return $results;
    }
}