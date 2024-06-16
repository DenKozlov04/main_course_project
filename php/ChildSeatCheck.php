<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'dbconfig.php';


$Seat = null;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cardType']) && isset($_POST['id']) && isset($_POST['plusPrice2']) && isset($_POST['seat'])) {
    $Seat = $_POST['seat'];
    $_SESSION['selected_seat'] = $Seat; 
   
}

$user_id = $_SESSION['user_id'];
$selected_seat = isset($_SESSION['selected_seat']) ? $_SESSION['selected_seat'] : null;

$sql = "SELECT `airlines_id` FROM `tickets` WHERE `user_id` = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();


if (isset($row['airlines_id'])) {
    $id = $_SESSION['id'];
    
} else {
    $id = $_SESSION['id'];
}

$sql = "SELECT `Airline`, `airport_name`, `ITADA`, `City`, `country`, `T_price`, `arrival_date`, `departure_date`, `arrival_time`, `departure_time`, `id` 
        FROM `airports/airlines` 
        WHERE `id` = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $json = file_get_contents("php://input");
    $data = json_decode($json, true);

    if ($data !== null && isset($data['seatNumbers']) && isset($data['id'])) {
        $seatNumbers = $data['seatNumbers'];
        $id = $data['id'];

        $availabilityResults = [];

        
        foreach ($seatNumbers as $seatNumber) {
            $sql = "SELECT COUNT(*) AS count FROM (
                        SELECT seat FROM tickets WHERE seat = ? AND airlines_id = ?
                        UNION ALL
                        SELECT seat FROM children WHERE seat = ? AND airline_id = ?
                    ) AS combinedSeats";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("sisi", $seatNumber, $id, $seatNumber, $id);
            $stmt->execute();
            $result = $stmt->get_result();

            $row = $result->fetch_assoc();

            $available = ($row['count'] == 0) ? true : false;

            $availabilityResults[] = array('seatNumber' => $seatNumber, 'available' => $available);
        }

       
        if ($selected_seat !== null) {
            $availabilityResults[] = array('seatNumber' => $selected_seat, 'available' => false);
        }

        echo json_encode($availabilityResults);
    } else {
       
    }
} else {
    
}
?>
