<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css\Buy_Tickets.css">
    <title>buy tickets</title>
</head>
<body>
</body>
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
</html>

<?php
session_start();
 $_SESSION['user_id'];
$_SESSION['admin_id'];
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'airflightsdatabase';

$mysqli = new mysqli($host, $user, $password, $database);

// parbudījam pieslēgšanu
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Datu dzēšana no tabulas un datubāzes
if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $mysqli->query("DELETE FROM `airports/airlines` WHERE `id`=$id") or die($mysqli->error());
}

// izpildījam pieprasījumu
$result = $mysqli->query("SELECT * FROM `airports/airlines`");
if ($result->num_rows > 0) {
    echo "<table>
        <tr>
          <th>ID</th>
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
          <th>Buy</th>
          <th>order ticket</th>";
          
    if ($_SESSION['admin_id'] != 1) {
        echo "<th>Action</th>";
    }
    
    echo "</tr>";

    while($row = $result->fetch_assoc()) {
      echo "<tr>
              <td>".$row["id"]."</td>
              <td>".$row["Airline"]."</td>
              <td>".$row["airport_name"]."</td>
              <td>".$row["ITADA"]."</td>
              <td>".$row["City"]."</td>
              <td>".$row["country"]."</td>
              <td>".$row["T_price"]."</td>
              <td>".$row["arrival_date"]."</td>
              <td>".$row["departure_date"]."</td>
              <td>".$row["arrival_time"]."</td>
              <td>".$row["departure_time"]."</td>";
    
              if ($_SESSION['admin_id'] == 1) {
                echo "<td>
                        <form method='POST' action='edit_record.php'>
                          <input type='hidden' name='edit' value='".$row['id']."'>
                          <button type='submit'>Edit</button>
                        </form>
                        <form method='POST' action='Buy_Tickets.php'>
                          <input type='hidden' name='delete' value='".$row['id']."'>
                          <button type='submit'>Delete</button>
                        </form>
                      </td>";
            }
            if ($_SESSION['admin_id'] == 0) {
              // кнопки "buy" и "order" для пользователей с ID = 2
              echo "<td>
                      <form method='POST' action='purchase_checkout.php'>
                        <input type='hidden' name=''>
                        <button type='submit'>Buy</button>
                      </form>
                    </td>";
              echo "<td>
                      <form method='POST' action='Booking.php'>
                        <input type='hidden' name='Order'".$row['id'].">
                        <input type='hidden' name='airline_id' value='".$row['id']."'>
                        <input type='hidden' name='Airline' value='".$row['Airline']."'>
                        <input type='hidden' name='airport_name' value='".$row['airport_name']."'>
                        <input type='hidden' name='ITADA' value='".$row['ITADA']."'>
                        <input type='hidden' name='City' value='".$row['City']."'>
                        <input type='hidden' name='T_price' value='".$row['T_price']."'>
                        <input type='hidden' name='arrival_date' value='".$row['arrival_date']."'>
                        <input type='hidden' name='departure_date' value='".$row['departure_date']."'>
                        <input type='hidden' name='arrival_time' value='".$row['arrival_time']."'>
                        <input type='hidden' name='departure_time' value='".$row['departure_time']."'>
                        <button type='submit'>Order</button>
                      </form>
                    </td>";
            }
            

    
      echo "</tr>";
    }
    

    echo "</table>";
} else {
    echo "0 results";
}
$mysqli->close();
