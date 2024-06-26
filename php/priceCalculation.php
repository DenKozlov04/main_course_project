<?php
session_start();
include 'dbconfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['price']) && isset($_POST['id'])) {
    $price = $_POST['price'];
    $id = $_POST['id'];
    $user_id = $_SESSION['user_id'];
    $admin_id = $_SESSION['admin_id'];
        $user_id = $_SESSION['user_id'];
        $alert = '';
        $sql2 = "SELECT * FROM `tickets` WHERE `user_id` = ?";
        
        if ($stmt = $mysqli->prepare($sql2)) {
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $alert = 'You already have a valid ticket.';
                echo "<meta http-equiv='refresh' content='0;url=index.php?alert=" . urlencode($alert) . "'>";
                
            } else {
                if ($admin_id === 1) {
                    $alert = 'You re an admin, you cant order tickets';
                    echo "<meta http-equiv='refresh' content='0;url=index.php?alert=" . urlencode($alert) . "'>";
                    
                }
            }
            
            $stmt->close();
        }
  
    $price = preg_replace('/[^0-9.]/', '', $price); 
    $price = floatval($price);
    $result0 = number_format($price, 2);
   
    $result = (25 * $price) / 100;
    $result1 = number_format($result + $price, 2);

    $result = (45 * $price) / 100;
    $result2 = number_format($result + $price, 2);

    $result = (65 * $price) / 100;
    $result3 = number_format($result + $price, 2);
    
    ///<a href="https://www.flaticon.com/ru/free-icons/" title=""> Radhe Icon - Flaticon</a>

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