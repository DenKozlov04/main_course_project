<?php
session_start();
include 'dbconfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cardType']) && isset($_POST['id'] ) && isset($_POST['class'] ) && isset($_POST['price'] )) {
    $cardType = $_POST['cardType'];
    $class = $_POST['class'];
    $id = $_POST['id'];
    $price = $_POST['price'];
    $Percents = number_format(($price * 34)/100 , 2);
    $PlusPrice = number_format($price + $Percents, 2);
 
    $sql = "SELECT `Airline`, `airport_name`, `ITADA`, `City`, `country`, `T_price`, `arrival_date`, `departure_date`, `arrival_time`, `departure_time`,`id` 
    FROM `airports/airlines` 
    WHERE  `id` = ?";

    $stmt = $mysqli->prepare($sql);


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

    }

    $sql2 = "SELECT `departure_date`,arrival_date, `departure_time`, `arrival_time` 
    FROM `acessabledata` 
    WHERE  `airline_id` = ?";

    $stmt = $mysqli->prepare($sql2);


    if ($stmt) {

        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
    }
    while ($row = $result->fetch_assoc()) {
            $arrival_date = $row['arrival_date'];
            $departure_date = $row['departure_date'];
            $dateObject = new DateTime($departure_date);
            $formattedDepartDate = $dateObject->format('j M');
            $arrival_time = date('H:i', strtotime($row['arrival_time']));
            $departure_time = date('H:i', strtotime($row['departure_time']));
    }
}

?>

