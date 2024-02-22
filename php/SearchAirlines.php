<?php

include 'dbconfig.php';


$conn = new mysqli(DatabaseConfig::$servername, DatabaseConfig::$dbusername, DatabaseConfig::$dbpassword, DatabaseConfig::$dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$searchRoute = htmlspecialchars(trim($_GET['SearchRoute'] ?? ''));
$searchCountry = htmlspecialchars(trim($_GET['SearchCountry'] ?? ''));
$searchArrivalDate = htmlspecialchars(trim($_GET['SearchArrival_date'] ?? ''));
$searchDepartureDate = htmlspecialchars(trim($_GET['SearchDeparture_date'] ?? ''));
// $searchPassengerNumber = htmlspecialchars(trim($_GET['passenger_number'] ?? ''));

// Meklējam datus datubāzē
$sql = "SELECT * FROM `airports/airlines` WHERE Airline = '$searchRoute' AND country = '$searchCountry' 
AND arrival_date Like '$searchArrivalDate' AND departure_date Like '$searchDepartureDate'";


$result = mysqli_query($conn, $sql);

// Выводим результаты поиска
if (mysqli_num_rows($result) > 0) {
    echo "<table>
        <tr>
            <th>Airline</th>
            <th>Airport Name</th>
            <th>ITADA Code</th>
            <th>City</th>
            <th>Country</th>
            <th>Ticket Price</th>
            <th>Arrival Date</th>
            <th>Departure Date</th>
            <th>Arrival time</th>
            <th>Departure time</th>
            <th>Action</th>
        </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td>".$row["Airline"]."</td>
            <td>".$row["airport_name"]."</td>
            <td>".$row["ITADA"]."</td>
            <td>".$row["City"]."</td>
            <td>".$row["country"]."</td>
            <td>".$row["T_price"]."</td>
            <td>".$row["arrival_date"]."</td>
            <td>".$row["departure_date"]."</td>
            <td>".$row["arrival_time"]."</td>
            <td>".$row["departure_time"]."</td>
            <td><a href='#'>Buy Ticket</a></td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "No results";
}


mysqli_close($conn);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finded tickets</title>
</head>
<body>
  <!-- перенести оформление в отдельный файл -->
<style>
    table {
    border-collapse: collapse;
    width: 100%;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 14px;
  }
  
  th, td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }
  
  th {
    background-color: #4CAF50;
    color: white;
  }
  
  tr:nth-child(even) {
    background-color: #f2f2f2;
  }
  
  .airline, .airport_name, .itada, .city, .country, .t_price, .arrival_date, .departure_date {
    font-weight: bold;
  }
  
  .airline {
    color: #0066ff;
  }
  
  .itada {
    text-transform: uppercase;
  }
  
  .t_price {
    color: #009933;
  }
  
  .arrival_date, .departure_date {
    font-size: 12px;
    color: #666;
  }
  
</style>
</body>
</html> 