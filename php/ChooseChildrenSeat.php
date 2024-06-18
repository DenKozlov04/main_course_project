<?php

include 'dbconfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cardType']) && isset($_POST['id'] ) && isset($_POST['plusPrice2']) && isset($_POST['cardType']) && isset($_POST['class']) && isset($_POST['LuggageСabin']) && isset($_POST['LuggageСompartment'])) {

    $id = $_POST['id'];
    $PricePlusQuant= $_POST['plusPrice2'];
    $cardType = $_POST['cardType'];
    $class = $_POST['class'];
    $LuggageСabin = isset($_POST['LuggageСabin']) && !empty($_POST['LuggageСabin']) ? $_POST['LuggageСabin'] : 1;
    $LuggageСompartment = isset($_POST['LuggageСompartment']) && !empty($_POST['LuggageСompartment']) ? $_POST['LuggageСompartment'] : 1;
    

    $_SESSION['id'] = $id;
    $_SESSION['PricePlusQuant'] = $PricePlusQuant;
    $_SESSION['cardType'] = $cardType;
    $_SESSION['class'] = $class;
    $_SESSION['LuggageСabin'] = $LuggageСabin;
    $_SESSION['LuggageСompartment'] = $LuggageСompartment;


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
            $arrival_date = $row['arrival_date'];
            $departure_date = $row['departure_date'];
            $dateObject = new DateTime($departure_date);
            $dateObject2 = new DateTime2($arrival_date);
            $formattedDepartDate = $dateObject->format('j M');
            $formattedArrivalDate = $dateObject2->format('j M');
            $arrival_time = date('H:i', strtotime($row['arrival_time']));
            $departure_time = date('H:i', strtotime($row['departure_time']));
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
            $_SESSION['arrival_date'] = $row['arrival_date'];
            $_SESSION['departure_date'] = $row['departure_date'];
            $dateObject = new DateTime($_SESSION['departure_date']);
            $_SESSION['formattedDepartDate'] = $dateObject->format('j M');
 

    }
}

class AddInfo {
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

    
    public function DeleteChildren() {
        if (isset($_POST['DeleteChildren']) && isset($_POST['child_id'])) {
            $user_id = $_SESSION['user_id']; 
            $child_id = $_POST['child_id']; 
            $sql = "DELETE FROM children WHERE user_id = $user_id AND children_id = $child_id"; 
            $result = $this->mysqli->query($sql);
        }
    }
    ///------------------------adding information about the child ----------------------------------
    public function AddChildInfo() {
        if (isset($_POST['AddChildrenBtn'])) {
            $user_id = $_SESSION['user_id']; 
            $child_name = $_POST['AddChildrenName'];
            $child_surname = $_POST['AddChildrenSurname'];
            $child_gender = $_POST['AddChildrenGender'];
            $child_nationality = $_POST['AddChildrenNationality'];
            $passport_number = $_POST['AddChildrenPassNumber'];
            $passport_issued_date = $_POST['AddChildrenpassIssuedDate'];
            $passport_expiration_date = $_POST['AddChildrenpassExpirationDate'];
            $price = $_POST['AddChildrenPrice'];
            $seat = $_POST['AddChildrenPlaceName'];
            $airlines_id = $_SESSION['id'] ;

            $alert = ''; 

            if (mb_strlen($child_name) < 1 || mb_strlen($child_name) > 255) {
                $alert = 'Incorrect child name';
            } elseif (mb_strlen($child_surname) < 1 || mb_strlen( $child_surname) > 255) {
                $alert = 'Incorrect child surname';
            } elseif (mb_strlen($child_nationality) < 1 || mb_strlen($child_nationality) > 255) {
                $alert = 'Incorrect child nationality';
            } elseif (mb_strlen($passport_number) < 5 || mb_strlen($passport_number) > 17) {
                $alert = 'Incorrect passport_number length (from 5 to 17 symbols)';
            }

            if (empty($alert)) {
                $sql_check_passport = "SELECT Passport_number FROM children WHERE Passport_number = ?";
                $stmt_check_passport = $this->mysqli->prepare($sql_check_passport);
                $stmt_check_passport->bind_param("s", $passport_number);
                $stmt_check_passport->execute();
                $result_check_passport = $stmt_check_passport->get_result();
                if ($result_check_passport->num_rows > 0) {
                    $alert = "This passport number already exists";
                } else {
                    
                    $stmt = $this->mysqli->prepare("INSERT INTO children (user_id, airline_id, Name, Surname, Gender, Nationality, Passport_number, passportIssuedDate, passportExpirationDate, seat, seatprice) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("iisssssssss", $user_id, $airlines_id, $child_name, $child_surname, $child_gender, $child_nationality, $passport_number, $passport_issued_date, $passport_expiration_date, $seat, $price);
                                        
                    
                    
                    if ($stmt->execute()) {
                        
                    } else {
                        echo "Error: " . $this->mysqli->error;
                    }
                }
        }

        if ($alert) {
            echo "<meta http-equiv='refresh' content='0;url=ticketСonfirmation.php?alert=" . urlencode($alert) . "'>";
            exit();
        }
    }
}



    public function displayChildInfo() {
        $childInfo = array();
    
        $sql = "SELECT children_id, Name, Surname, Gender, Nationality, seat, seatprice, Passport_number, passportIssuedDate, passportExpirationDate FROM children WHERE user_id = {$_SESSION['user_id']}";
        $result = $this->mysqli->query($sql);
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $child = array(
                    'children_id' => $row['children_id'],
                    'Name' => $row['Name'],
                    'Surname' => $row['Surname'],
                    'Gender' => $row['Gender'],
                    'Nationality' => $row['Nationality'],
                    'seat' => $row['seat'],
                    'seatprice' => $row['seatprice'],
                    'PassportNumber' => $row['Passport_number'],
                    'PassportIssuedDate' => $row['passportIssuedDate'],
                    'PassportExpirationDate' => $row['passportExpirationDate']
                );
                $childInfo[] = $child;
            }
        } else {
            $childInfo = array();
        }
    
        return $childInfo;
    }

}

?>