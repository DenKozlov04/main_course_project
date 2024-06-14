<?php

include 'dbconfig.php';

$user_id = $_SESSION['user_id'];
$admin_id = $_SESSION['admin_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cardType']) && isset($_POST['id'] ) && isset($_POST['plusPrice2']) && isset($_POST['seat'])) {
    $id2 = $_POST['id'];
    $LastPrice= $_POST['plusPrice2'];
    $SeatPlace=$_POST['seat'];
    $sql = "SELECT `Airline`, `airport_name`, `ITADA`, `City`, `country`, `T_price`, `arrival_date`, `departure_date`, `arrival_time`, `departure_time`,`id` 
    FROM `airports/airlines` 
    WHERE  `id` = ?";


    $stmt = $mysqli->prepare($sql);


    if ($stmt) {

        $stmt->bind_param("s", $id2);
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

class ChidInfo {
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

    public function AddChildInfo() {
        
        if (isset($_POST['AddChildrenBtn'])) {
           
            if (isset($_POST['AddChildrenName'], $_POST['AddChildrenSurname'], $_POST['AddChildrenGender'], $_POST['AddChildrenNationality'], $_POST['AddChildrenPassNumber'], $_POST['AddChildrenpassIssuedDate'], $_POST['AddChildrenpassExpirationDate'], $_POST['AddChildrenPrice'], $_POST['AddChildrenPlaceName'])) {
                
                $_SESSION['childInfo'] = [
                    'child_name' => $_POST['AddChildrenName'],
                    'child_surname' => $_POST['AddChildrenSurname'],
                    'child_gender' => $_POST['AddChildrenGender'],
                    'child_nationality' => $_POST['AddChildrenNationality'],
                    'passport_number' => $_POST['AddChildrenPassNumber'],
                    'passport_issued_date' => $_POST['AddChildrenpassIssuedDate'],
                    'passport_expiration_date' => $_POST['AddChildrenpassExpirationDate'],
                    'seat' => $_POST['AddChildrenPlaceName'],
                    'seatprice' => $_POST['AddChildrenPrice'],
                   
                ];
    
              
               
                exit();
            } else {
               
                echo "Error: Not all child information provided.";
            }
        }
    }
    
    public function displayChildInfo() {
       
        if (isset($_SESSION['childInfo'])) {
            $childInfo = $_SESSION['childInfo'];
    ?>
            <table class="UserTables_table2">
                <tr>
                    <th>Child's Name</th>
                    <th>Surname</th>
                    <th>Gender</th>
                    <th>Nationality</th>
                    <th>Passport Number</th>
                    <th>Passport Issued Date</th>
                    <th>Passport Expiration Date</th>
                    <th>Seat</th>
                    <th>Seatprice</th>
                    
                </tr>
                <tr>
                    <td><?= $childInfo['child_name'] ?></td>
                    <td><?= $childInfo['child_surname'] ?></td>
                    <td><?= $childInfo['child_gender'] ?></td>
                    <td><?= $childInfo['child_nationality'] ?></td>
                    <td><?= $childInfo['passport_number'] ?></td>
                    <td><?= $childInfo['passport_issued_date'] ?></td>
                    <td><?= $childInfo['passport_expiration_date'] ?></td>
                    <td><?= $childInfo['seat'] ?></td>
                    <td><?= $childInfo['seatprice'] ?></td>
                    
                </tr>
            </table>
    <?php
        }
    }
    
    
    
}