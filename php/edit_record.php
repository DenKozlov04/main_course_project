
<?php

session_start();
include 'dbconfig.php';

if(isset($_POST['flight_id'])) {
    
    $id = $_POST['flight_id'];
    
} 
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
            $description = $_POST['description'];
            $googleMapsLink = $_POST['googleMapsLink'];
    
            if (isset($_FILES['image']) && !empty($_FILES['image']['tmp_name'])) {
                $fileTmpName = $_FILES['image']['tmp_name'];
                $imageData = file_get_contents($fileTmpName);
                $this->updateImg($id, $imageData);
            }
            
    
            $sql = "UPDATE `airports/airlines` SET `Airline`=?, `airport_name`=?, 
                `ITADA`=?, `City`=?, `country`=?, `T_price`=?, `arrival_date`=?, 
                `departure_date`=?, `arrival_time`=?, `departure_time`=?, `googleMapsLink`=? WHERE `id`=?";
            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param("sssssssssssi", $airline, $airport_name, $itada, $city, $country, $t_price, $arrival_date, $departure_date, $arrival_time, $departure_time, $googleMapsLink, $id);
            $stmt->execute() or die($stmt->error);
    
            $sql2 = "UPDATE `airflight_description` SET `description`=? WHERE `flight_id`=?";
            $stmt = $this->mysqli->prepare($sql2);
            $stmt->bind_param("si", $description, $id);
            $stmt->execute() or die($stmt->error);
    
           
            header('Location: FilteredTickets.php');
            exit();
        }
    }
    

    
    
    public function getRecordForEditing() {
        if (isset($_POST['flight_id'])) {
            $id = $_POST['flight_id'];
            $result = $this->mysqli->query("SELECT * FROM `airports/airlines` WHERE `id`='$id'") or die($this->mysqli->error);

            if ($result->num_rows == 1) {
                $row = $result->fetch_array();
                return $row;
            }
        }

        return null;
    }
    public function getDescriptionForEditing() {
        if (isset($_POST['flight_id'])) {
            $id = $_POST['flight_id'];
            $result = $this->mysqli->query("SELECT * FROM `airflight_description` WHERE `flight_id`='$id'") or die($this->mysqli->error);

            if ($result->num_rows == 1) {
                $row = $result->fetch_array();
                return $row;
            }
        }

        return null;
    }

    public function updateImg($id, $imageData) {
        $stmt = $this->mysqli->prepare("UPDATE `airflight_description` SET `flight_image`=? WHERE `flight_id`=?");
        $stmt->bind_param("si", $imageData, $id);
        $stmt->execute() or die($stmt->error);
    }
    
    public function closeDatabaseConnection() {
        $this->mysqli->close();
    }
}



$editor = new FlightDataEditor();
$recordForEditing = $editor->getRecordForEditing();
$recordForDescriptionEditing = $editor->getDescriptionForEditing();
// $recordForEditing = $editor->updateImg();

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
    $googleMapsLink = $recordForEditing['googleMapsLink'];
    $Description = $recordForDescriptionEditing['description'];
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
<div class='rectangleHeader'>
    <div class='logorectangle'>
        <a>AVIA</a>
    </div>
  
    <div class='ButtonRect'>
        <a>Admin edit record page</a>
    </div>   
    <a class="backBtn" href="../php/FilteredTickets.php">Go back</a>

    <div class='editform'>
        <div class='inner-element'>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="update" value="<?= $recordForEditing['id']; ?>">
                <label>Airline:</label><br>
                <input type="text" name="airline" value="<?= $airline; ?>"><br>
                <label>Airport Name:</label><br>
                <input type="text" name="airport_name" value="<?= $airport_name; ?>"><br>
                <label>ITADA Code:</label><br>
                <input type="text" name="itada" value="<?= $itada; ?>"><br>
                <label>City:</label><br>
                <input type="text" name="city" value="<?= $city; ?>"><br>
                <label>Country:</label><br>
                <input type="text" name="country" value="<?= $country; ?>"><br>
                <label>Ticket Price:</label><br>
                <input type="text" name="t_price" value="<?= $t_price; ?>"><br>
                <label>Arrival Date:</label><br>
                <input type="date" name="arrival_date" value="<?= $arrival_date; ?>"><br>
                <label>Departure Date:</label><br>
                <input type="date" name="departure_date" value="<?= $departure_date; ?>"><br>
                <label>Arrival time:</label><br>
                <input type="text" name="arrival_time" value="<?= $arrival_time; ?>"><br>
                <label>Departure time:</label><br>
                <input type="text" name="departure_time" value="<?= $departure_time; ?>"><br>
                <label class='label2'>Description:</label><br>
                <textarea class='textarea' name="description" id="description" cols="30" rows="10"><?= $Description; ?></textarea><br>
                <label class='label3'>Link to google maps:</label><br>
                <textarea class='textarea2' name="googleMapsLink" id="googleMapsLink" cols="30" rows="10"><?= $googleMapsLink; ?></textarea><br>
                <label class='label4'>Add a new photo of the flight if necessary:</label><br>
                <div class="uploadImg">
                    <input type="file" name="image" accept="image/*">
                </div>
                <button type="submit" name="submit">Update</button>
            </form>
        </div>
    </div>
</body>
</html>
