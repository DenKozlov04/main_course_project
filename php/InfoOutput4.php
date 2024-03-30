<?php
session_start();
include 'dbconfig.php';

$user_id = $_SESSION['user_id'];
$admin_id = $_SESSION['admin_id'];

if(isset($_GET['buttonValue'])) {
    // получаю значение из URL
    $alert = '';
    $buttonValue = $_GET['buttonValue'];
    if($buttonValue === 0){
        $alert = "test";
    }
    echo "Received buttonValue: " . $buttonValue;

} 

// echo $user_id;
// echo $admin_id;




if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cardType']) && isset($_POST['id'] ) && isset($_POST['plusPrice2']) && isset($_POST['seat'])) {

    $id = $_POST['id'];
    $LastPrice= $_POST['plusPrice2'];
    $SeatPlace=$_POST['seat'];
    // echo $SeatPlace;
    // echo $id;
    // echo  $LastPrice;
    // echo $price;
   
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




?>