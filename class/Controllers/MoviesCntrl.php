<?php
include_once "Db.php";
class MovieCntrl extends Db
{
    // συναρτήσεις με διάφορες λειτουργικότητες που χρειαζόμαστε οταν επικοινωνούμε με τη βάση για το view των χρηστών, η ονομασία είναι η περιγραφή της λειτουργικότητας 
    public static function getMovies()
    {
        $db = DB::getInstance();

        $sql = "Select * from movies";
        $res = $db->executeQuery($sql);
        $results = $db->fetchAllResults($res);

        return $results;
    }
    public static function getShows()
    {
        $db = DB::getInstance();

        $sql = "Select * from events";
        $res = $db->executeQuery($sql);
        $results = $db->fetchAllResults($res);

        return $results;
    }
    
    public static function getHours()
    {
        $db = DB::getInstance();

        $sql = "Select * from workinghours";
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