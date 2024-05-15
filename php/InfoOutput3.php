<?php
session_start();
include 'dbconfig.php';


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cardType']) && isset($_POST['id'] ) && isset($_POST['plusPrice2'])) {

    $id = $_POST['id'];
    $PricePlusQuant= $_POST['plusPrice2'];
    // echo $id;
    // echo  $PricePlusQuant;
    // echo $price; vivoditj v evro

   
    $sql = "SELECT `Airline`, `airport_name`, `ITADA`, `City`, `country`, `T_price`, `arrival_date`, `departure_date`, `arrival_time`, `departure_time`,`id` 
    FROM `airports/airlines` 
    WHERE  `id` = ?";

    $stmt = $conn->prepare($sql);


    if ($stmt) {

        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
    }
    while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $airport_name = $row['airport_name'];
            $ITADA = $row['ITADA'];
            $City = $row['City'];
            $country = $row['country'];
            $T_price = $row['T_price'];
            $arrival_date = $row['arrival_date'];
            $departure_date = $row['departure_date'];
            $dateObject = new DateTime($departure_date);
            $formattedDepartDate = $dateObject->format('j M');
            $arrival_time = date('H:i', strtotime($row['arrival_time']));
            $departure_time = date('H:i', strtotime($row['departure_time']));
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $json = file_get_contents("php://input");

    
    $data = json_decode($json, true);

   
    if ($data !== null && isset($data['seatNumbers']) && isset($data['id'])) {
        $seatNumbers = $data['seatNumbers'];
        $id = $data['id'];

     
        $availabilityResults = [];

     
        // foreach ($seatNumbers as $seatNumber) {
        //     $sql = "SELECT COUNT(*) AS count FROM tickets WHERE Seat = ? AND airlines_id = ?";
        //     $stmt = $conn->prepare($sql);
        //     $stmt->bind_param("si", $seatNumber, $id);
        //     $stmt->execute();
        //     $result = $stmt->get_result();
    
           
        //     $row = $result->fetch_assoc();
    
         
        //     $available = ($row['count'] == 0) ? true : false;
            
       
        //     $availabilityResults[] = array('seatNumber' => $seatNumber, 'available' => $available);
        // }
        foreach ($seatNumbers as $seatNumber) {
            $sql = "SELECT COUNT(*) AS count FROM (
                        SELECT seat FROM tickets WHERE seat = ? AND airlines_id = ?
                        UNION ALL
                        SELECT seat FROM children WHERE seat = ? AND airline_id = ?
                    ) AS combinedSeats";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sisi", $seatNumber, $id, $seatNumber, $id);
            $stmt->execute();
            $result = $stmt->get_result();

            $row = $result->fetch_assoc();

            $available = ($row['count'] == 0) ? true : false;

            $availabilityResults[] = array('seatNumber' => $seatNumber, 'available' => $available);
        }
     
        echo json_encode($availabilityResults);
    } else {
      
        // echo json_encode(array('error' => 'Данные не были получены или отсутствует идентификатор'));
    }
} else {
    
    // echo json_encode(array('error' => 'Метод запроса не поддерживается'));
}

?>

