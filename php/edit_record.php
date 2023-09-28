<?php
session_start();

$_SESSION['admin_id'];
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'airflightsdatabase';

$mysqli = new mysqli($host, $user, $password, $database);

// parbaudījam pieslēgumu
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// datus atjaunināšana datubazē
if (isset($_POST['update'])) {
    $id = $_POST['update'];
    $airline = $_POST['airline'];
    $airport_name = $_POST['airport_name'];
    $itada = $_POST['itada'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $t_price = $_POST['t_price'];
    $arrival_date = $_POST['arrival_date'];
    $departure_date = $_POST['departure_date'];
    $arrival_time = $_POST['arrival_time'];
    $departure_time = $_POST['departure_time'];
    
   // Datu atjaunināšana tabulā un datubāzē ar sql pieprasījumu
    $mysqli->query("UPDATE `airports/airlines` SET `Airline`='$airline', `airport_name`='$airport_name', 
    `ITADA`='$itada', `City`='$city', `country`='$country', `T_price`='$t_price', `arrival_date`='$arrival_date', 
    `departure_date`='$departure_date', `arrival_time`='$arrival_time',
     `departure_time`='$departure_time' WHERE `id`='$id'") or die($mysqli->error());

    header('Location: Buy_Tickets.php');
    exit();
}

// Получение данных из базы данных для редактирования
if (isset($_POST['edit'])) {
    $id = $_POST['edit'];
    $result = $mysqli->query("SELECT * FROM `airports/airlines` WHERE `id`='$id'") or die($mysqli->error());

    if ($result->num_rows == 1) {
        $row = $result->fetch_array();
        $airline = $row['Airline'];
        $airport_name = $row['airport_name'];
        $itada = $row['ITADA'];
        $city = $row['City'];
        $country = $row['country'];
        $t_price = $row['T_price'];
        $arrival_date = $row['arrival_date'];
        $departure_date = $row['departure_date'];
        $arrival_time = $row['arrival_time'];
        $departure_time = $row['departure_time'];
    }
}

// Закрытие соединения с базой данных


$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Record</title>
</head>

<body>
	<h2>Edit Record</h2>
	<form action="" method="POST">
		<input type="hidden" name="update" value="<?php echo $id; ?>">
		<label>Airline:</label><br>
		<input type="text" name="airline" value="<?php echo $airline; ?>"><br>
		<label>Airport Name:</label><br>
		<input type="text" name="airport_name" value="<?php echo $airport_name; ?>"><br>
		<label>ITADA Code:</label><br>
		<input type="text" name="itada" value="<?php echo $itada; ?>"><br>
		<label>City:</label><br>
		<input type="text" name="city" value="<?php echo $city; ?>"><br>
		<label>Country:</label><br>
		<input type="text" name="country" value="<?php echo $country; ?>"><br>
		<label>Ticket Price:</label><br>
		<input type="text" name="t_price" value="<?php echo $t_price; ?>"><br>
		<label>Arrival Date:</label><br>
		<input type="date" name="arrival_date" value="<?php echo $arrival_date; ?>"><br>
		<label>Departure Date:</label><br>
		<input type="date" name="departure_date" value="<?php echo $departure_date; ?>"><br>
        <label>Departure time:</label><br>
        <input type="text" name="arrival_time" value="<?php echo $arrival_date; ?>"><br>
		<label>Departure time:</label><br>
		<input type="text" name="departure_time" value="<?php echo $departure_date; ?>"><br>
		<button type="submit" name="submit">Update</button>
	</form>

</body>
</html>