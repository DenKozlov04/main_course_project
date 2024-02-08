
<?php

session_start();
include 'dbconfig.php';

class FlightDataEditor {
    private $mysqli;

    public function __construct() {
        $this->initializeDatabase();
    }

    private function initializeDatabase() {
        $this->mysqli = new mysqli(DatabaseConfig::$servername, DatabaseConfig::$dbusername, DatabaseConfig::$dbpassword, DatabaseConfig::$dbname);

        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }
    }

    public function updateRecord() {
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

            $query = "UPDATE `airports/airlines` SET `Airline`='$airline', `airport_name`='$airport_name', 
                `ITADA`='$itada', `City`='$city', `country`='$country', `T_price`='$t_price', `arrival_date`='$arrival_date', 
                `departure_date`='$departure_date', `arrival_time`='$arrival_time', `departure_time`='$departure_time' WHERE `id`='$id'";

            $this->mysqli->query($query) or die($this->mysqli->error);

            header('Location: Buy_Tickets.php');
            exit();
        }
    }

    public function getRecordForEditing() {
        if (isset($_POST['edit'])) {
            $id = $_POST['edit'];
            $result = $this->mysqli->query("SELECT * FROM `airports/airlines` WHERE `id`='$id'") or die($this->mysqli->error);

            if ($result->num_rows == 1) {
                $row = $result->fetch_array();
                return $row;
            }
        }

        return null;
    }

    public function closeDatabaseConnection() {
        $this->mysqli->close();
    }
}

$editor = new FlightDataEditor();
$recordForEditing = $editor->getRecordForEditing();

if ($recordForEditing !== null) {
    $airline = $recordForEditing['Airline'];
    $airport_name = $recordForEditing['airport_name'];
    $itada = $recordForEditing['ITADA'];
    $city = $recordForEditing['City'];
    $country = $recordForEditing['country'];
    $t_price = $recordForEditing['T_price'];
    $arrival_date = $recordForEditing['arrival_date'];
    $departure_date = $recordForEditing['departure_date'];
    $arrival_time = $recordForEditing['arrival_time'];
    $departure_time = $recordForEditing['departure_time'];
}

$editor->updateRecord();
$editor->closeDatabaseConnection();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/edit_record.css" rel="stylesheet">
    <title>Edit Record</title>
</head>

<body>
    <li><a class="" href="../php/Buy_Tickets.php">Go back</a></li>
    <div class='editformtop'>
            <a>Edit Record</a>
        </div>
    <div class='editform'>
        <div class='inner-element'>
            <form action="" method="POST">
                <input type="hidden" name="update" value="<?php echo $recordForEditing['id']; ?>">
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
                <label>Arrival time:</label><br>
                <input type="text" name="arrival_time" value="<?php echo $arrival_time; ?>"><br>
                <label>Departure time:</label><br>
                <input type="text" name="departure_time" value="<?php echo $departure_time; ?>"><br>
                <button type="submit" name="submit">Update</button>
            </form>
        </div>
    </div>
</body>
</html>
