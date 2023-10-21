<?php
class Api
{
    function getAllShows()
    {
        // αλλαγή  credentials στα σωστά με τη βάση που χρησιμοποιείται 
        // η συγκεκριμένη κλασση είναι ένα API , ώστε όταν ο διαχειριστής δημιουργήσει μια προβολή ταινίας να δε;iχνουμε τα δεδομένα στο front-end- client
        $servername = "localhost";
        $username = "root";
        $password = "1234";
        $dbname = "cinema";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM events LEFT JOIN reservedSeats ON events.event_id = reservedSeats.show_id";
        $result = $conn->executeQuery($sql);


        while ($dt = $result->fetch_assoc()) {


            $shows[$dt["event_id"]] = array(

                'id' => $dt['event_id'],
                'title' => $dt['title'],
                'image' => $dt['image'],
                'url' => $dt['url'],
                'playinghours' => $dt['playinghours'],
                'description' => $dt['description'],
                'startingDate' => $dt['startingDate'],
                // 'endingDate' => $dt['endingDate'],
                'seatno' => $dt['seatno'],
                'seat_count' => $dt['seat_count'],
                
            );
        }
        $conn->close();
        return json_encode($shows);
    }
}

$api = new Api;
header('Content-Type: application/json');
echo $api->getAllShows();
