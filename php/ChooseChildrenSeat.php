<?php

include 'dbconfig.php';


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
    public function AddChildrenSeat() {
        if (isset($_POST['ChooseSeat'])) {
            $user_id = $_SESSION['user_id']; 
            $price = $_POST['Price'];
            $Seat = $_POST['PlaceName'];
            
           
            // error_log("Price: $price, Seat: $Seat");
            
          
        } 
    }
    
    public function DeleteChildren() {
        if (isset($_POST['DeleteChildren'])) {
            $user_id = $_SESSION['user_id']; 
            $sql = "DELETE FROM children WHERE user_id = {$_SESSION['user_id']}";
            $result = $this->mysqli->query($sql);
        }

    }
}

?>