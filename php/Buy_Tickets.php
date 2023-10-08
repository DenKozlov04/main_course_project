<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Buy_Tickets.css">

    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php
session_start();

class FlightTableManager {
    private $mysqli;

    public function __construct($host, $user, $password, $database) {
        $this->mysqli = new mysqli($host, $user, $password, $database);
        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }
    }

    public function deleteRecord($id) {
        $id = $this->mysqli->real_escape_string($id);
        $this->mysqli->query("DELETE FROM `airports/airlines` WHERE `id` = $id") or die($this->mysqli->error);
    }

    public function getRecords() {
        $result = $this->mysqli->query("SELECT * FROM `airports/airlines`");
        $records = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $records[] = $row;
            }
        }

        return $records;
    }

    public function displayTable($isAdmin) {
        $records = $this->getRecords();
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
                <th>Departure time</th>";
        
        if ($_SESSION['user_id'] != 0) {
            echo "<th>Buy</th>
                <th>Order</th>";
        }else{echo"<th></th>
                   <th></th>";

        }
        
        echo "</tr>";
    
        foreach ($records as $row) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["Airline"] . "</td>
                    <td>" . $row["airport_name"] . "</td>
                    <td>" . $row["ITADA"] . "</td>
                    <td>" . $row["City"] . "</td>
                    <td>" . $row["country"] . "</td>
                    <td>" . $row["T_price"] . "</td>
                    <td>" . $row["arrival_date"] . "</td>
                    <td>" . $row["departure_date"] . "</td>
                    <td>" . $row["arrival_time"] . "</td>
                    <td>" . $row["departure_time"] . "</td>";
    
            if ($isAdmin) {
                echo "<td>
                        <form method='POST' action='edit_record.php'>
                            <input type='hidden' name='edit' value='" . $row['id'] . "'>
                            <button type='submit'>Edit</button>
                        </form>
                        <form method='POST' action='Buy_Tickets.php'>
                            <input type='hidden' name='delete' value='" . $row['id'] . "'>
                            <button type='submit'>Delete</button>
                        </form>
                    </td>";
            } else {
                if ($_SESSION['user_id'] == 0) {

                } else {
                echo "<td>
                        <form method='POST' action='purchase_checkout.php'>
                            <input type='hidden' name=''>
                            <button type='submit'>Buy</button>
                        </form>
                    </td>";
                }
            }
    
            echo "<td>
                  <form method='POST' action='Booking.php'>
                      <input type='hidden' name='Order' value='" . $row['id'] . "'> <!-- Возможно, вы хотели передать значение id здесь -->
                      <input type='hidden' name='airline_id' value='" . $row['id'] . "'>
                      <input type='hidden' name='Airline' value='" . $row['Airline'] . "'>
                      <input type='hidden' name='airport_name' value='" . $row['airport_name'] . "'>
                      <input type='hidden' name='ITADA' value='" . $row['ITADA'] . "'>
                      <input type='hidden' name='City' value='" . $row['City'] . "'>
                      <input type='hidden' name='T_price' value='" . $row['T_price'] . "'>
                      <input type='hidden' name='arrival_date' value='" . $row['arrival_date'] . "'>
                      <input type='hidden' name='departure_date' value='" . $row['departure_date'] . "'>
                      <input type='hidden' name='arrival_time' value='" . $row['arrival_time'] . "'>
                      <input type='hidden' name='departure_time' value='" . $row['departure_time'] . "'>";
    
            if ($_SESSION['user_id'] == 0) {
                echo "<td>
                            <li><a href='../html/autorization.html'>If you want to order ticket you must log in first</a></li>

                    </td>";
            } else {
                echo "<button type='submit'>Order</button>";
            }
    
            echo "</form>
            </td>";
    
            echo "</tr>";
        }
    
        echo "</table>";
    }
    

    public function closeConnection() {
        $this->mysqli->close();
    }
}

$_SESSION['user_id'];
$_SESSION['admin_id'];
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'airflightsdatabase';

$isAdmin = ($_SESSION['admin_id'] == 1);
$tableManager = new FlightTableManager($host, $user, $password, $database);

if (isset($_POST['delete'])) {
    $tableManager->deleteRecord($_POST['delete']);
}

$tableManager->displayTable($isAdmin);
$tableManager->closeConnection();
?>
