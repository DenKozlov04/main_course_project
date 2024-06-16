<?php
session_start();
include 'dbconfig.php';

class UserBookings {
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

///------------------------Code for displaying user information---------------------------------- 
public function displayUserInfo() {
    $userInfo = array();

    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM users WHERE user_id = $user_id";

    $result = $this->mysqli->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        $userInfo['username'] = $row['username'];
        $userInfo['email'] = $row['email'];
        $userInfo['password'] = $row['password'];
        $userInfo['visibility'] = 'visible';
        $userInfo['visibility2'] = 'hidden';
    } else {
        $userInfo['username'] = 'Admin';
        $userInfo['email'] = 'Admin';
        $userInfo['password'] = 'Admin';
        $userInfo['visibility'] = 'hidden';
        $userInfo['visibility2'] = 'visible';
    }

    return $userInfo;
}


    public function displayUserPhone() {
        $userPhone = array();
    
        $user_id = $_SESSION['user_id'];

        $sql = "SELECT Phone_number FROM user_details WHERE user_id = $user_id";
    
        $result = $this->mysqli->query($sql);
    
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
            $userPhone['Phone_number'] = $row['Phone_number'];

        } else {
            $userPhone['Phone_number'] = 'Your phone number will be displayed when your ticket is issued.';

        } 

    
        return $userPhone;
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
        $airlines_id = null; 

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

      
        $sql_airlines_id = "SELECT `airlines_id` FROM `tickets` WHERE `user_id` = ?";
        $stmt_airlines_id = $this->mysqli->prepare($sql_airlines_id);
        $stmt_airlines_id->bind_param("i", $user_id);
        $stmt_airlines_id->execute();
        $result_airlines_id = $stmt_airlines_id->get_result();
        if ($row_airlines_id = $result_airlines_id->fetch_assoc()) {
            $airlines_id = $row_airlines_id['airlines_id'];
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
            echo "<meta http-equiv='refresh' content='0;url=user_info.php?alert=" . urlencode($alert) . "'>";
            exit();
        }
    }
}



    public function displayChildInfo() {
        $childInfo = array();
    
        $sql = "SELECT children_id, Name, Surname, Gender, Nationality, seat, Passport_number, passportIssuedDate, passportExpirationDate,seatprice FROM children WHERE user_id = {$_SESSION['user_id']}";
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
                    'PassportNumber' => $row['Passport_number'],
                    'PassportIssuedDate' => $row['passportIssuedDate'],
                    'PassportExpirationDate' => $row['passportExpirationDate'],
                    'seatprice' => $row['seatprice']
                );
                $childInfo[] = $child;
            }
        } else {
            
            $childInfo = array();
        }
    
        return $childInfo;
    }
    

///------------------------Profile deletion code ----------------------------------       
    public function deleteProfile() {
        if (isset($_POST['deleteUser'])) {
            $user_id = $_SESSION['user_id']; 
            if (!is_numeric($user_id)) {
                return; 
            }
    
           
            $this->deleteFromTable('users', $user_id);
            $this->deleteFromTable('user_details', $user_id);
            $this->deleteFromTable('tickets', $user_id);
            $this->deleteFromTable('profile_images', $user_id);
    
 
            session_destroy();
    
         
            echo "<meta http-equiv='refresh' content='0;url=index.php'>";
            exit();
        }
    }

///------------------------Code for deleting all user data ----------------------------------    
    private function deleteFromTable($tableName, $userId) {
        $delsql = "DELETE FROM `$tableName` WHERE `user_id` = $userId";
        $result = $this->mysqli->query($delsql);
        if (!$result) {
            
        }
    }

///------------------------Display of user ticket and flight information ----------------------------------
    public function displayFlightInfo() {
        
        $flightInfo = array();
    
      
        $sql_tickets = "SELECT Seat, price, airlines_id FROM tickets WHERE user_id = {$_SESSION['user_id']}";
        $result_tickets = $this->mysqli->query($sql_tickets);
    
    
        if ($result_tickets->num_rows > 0) {
            
            $row = $result_tickets->fetch_assoc();
            $airlines_id = $row['airlines_id'];
    
           
            $sql_airlines = "SELECT Airline, arrival_date, departure_date, arrival_time, departure_time FROM `airports/airlines` WHERE id = $airlines_id";
            $result_airlines = $this->mysqli->query($sql_airlines);
    
        
            if ($result_airlines->num_rows > 0) {
           
                $row_airlines = $result_airlines->fetch_assoc();
    
                
                $flightInfo['seat'] = $row['Seat'];
                $flightInfo['price'] = $row['price'];
                $flightInfo['airline'] = $row_airlines['Airline'];
                $flightInfo['arrival_date'] = $row_airlines['arrival_date'];
                $flightInfo['departure_date'] = $row_airlines['departure_date'];
                $flightInfo['arrival_time'] = date('H:i', strtotime($row_airlines['arrival_time']));
                $flightInfo['departure_time'] = date('H:i', strtotime($row_airlines['departure_time']));
                $flightInfo['visibility'] = 'visible';
            } else {

            }
        } else {
            $flightInfo['seat'] = 'None';
            $flightInfo['price'] = 'None';
            $flightInfo['airline'] = 'biļešu nav.';
            $flightInfo['arrival_date'] = 'None';
            $flightInfo['departure_date'] = 'None';
            $flightInfo['arrival_time'] = 'None';
            $flightInfo['departure_time'] = 'None';
            $flightInfo['visibility'] = 'hidden';
        }
    
       
        return $flightInfo;
    }
///------------------------Flight denie function ----------------------------------
    public function DenieFlight(){
        if (isset($_POST['DenieFlight'])) {
            $user_id = $_SESSION['user_id']; 

         
            $sql_tickets = "DELETE FROM tickets WHERE user_id = $user_id";
            $result_tickets = $this->mysqli->query($sql_tickets);
            
          
            $sql_children = "DELETE FROM children WHERE user_id = $user_id";
            $result_children = $this->mysqli->query($sql_children);

            $sql_children = "DELETE FROM user_details WHERE user_id = $user_id";
            $result_children = $this->mysqli->query($sql_children);

            if ($result_tickets !== false || $result_children !== false) {
                echo "<meta http-equiv='refresh' content='0;url=user_info.php'>";
                exit();
            } else {
               
            }
        }
    }



///------------------------Information changhe function ----------------------------------

public function ChangeUserInfo() {
    if (isset($_POST['ChangeUserBtn'])) {
        $newUsername = htmlspecialchars(filter_var(trim($_POST['ChangeUser']), FILTER_SANITIZE_STRING));
        $user_id = $_SESSION['user_id']; 

        if (!is_numeric($user_id)) {
            return; 
        }

        if (mb_strlen($newUsername) < 4 || mb_strlen($newUsername) > 90) {
            $alert1 = 'Incorrect username length';
            echo "<meta http-equiv='refresh' content='0;url=user_info.php?alert=" . urlencode($alert1) . "'>";
            return;
        }

        $sqlTest = "SELECT * FROM `users` WHERE `username` = '$newUsername'";
        $result = $this->mysqli->query($sqlTest);
        if ($result->num_rows > 0) {
            $alert1 = 'Username already exists';
            echo "<meta http-equiv='refresh' content='0;url=user_info.php?alert=" . urlencode($alert1) . "'>";
            return;
        }

        $sql = "UPDATE `users` SET `username` = '$newUsername' WHERE `user_id` = $user_id";
        $result = $this->mysqli->query($sql);

        if ($result) {
            echo "<meta http-equiv='refresh' content='0;url=user_info.php'>";
            exit();
        }
    }

    if (isset($_POST['ChangePhoneBtn'])) {
        $newPhone = htmlspecialchars(filter_var(trim($_POST['ChangePhone']), FILTER_SANITIZE_STRING));
        $user_id = $_SESSION['user_id']; 

        if (!is_numeric($user_id)) {
            return; 
        }

        if (mb_strlen($newPhone) !== 12) {
            $alert2 = 'Incorrect phone length';
            echo "<meta http-equiv='refresh' content='0;url=user_info.php?alert=" . urlencode($alert2) . "'>";
            return;
        }

        $sqlTest = "SELECT * FROM `user_details` WHERE `Phone_number` = '$newPhone'";
        $result = $this->mysqli->query($sqlTest);
        if ($result->num_rows > 0) {
            $alert2 = 'Phone number already exists';
            echo "<meta http-equiv='refresh' content='0;url=user_info.php?alert=" . urlencode($alert2) . "'>";
            return;
        }

        $sql = "UPDATE `user_details` SET `Phone_number` = '$newPhone' WHERE `user_id` = $user_id";
        $result = $this->mysqli->query($sql);

        if ($result) {
            echo "<meta http-equiv='refresh' content='0;url=user_info.php'>";
            exit();
        }
    }

    if (isset($_POST['ChangeEmailBtn'])) {
        $newEmail = htmlspecialchars(filter_var(trim($_POST['ChangeEmail']), FILTER_SANITIZE_STRING));
        $user_id = $_SESSION['user_id']; 

        if (!is_numeric($user_id)) {
            return; 
        }

        if (mb_strlen($newEmail) < 5 || mb_strlen($newEmail) > 90) {
            $alert3 = 'Incorrect email length';
            echo "<meta http-equiv='refresh' content='0;url=user_info.php?alert=" . urlencode($alert3) . "'>";
            return;
        }

        $sqlTest = "SELECT * FROM `users` WHERE `email` = '$newEmail'";
        $result = $this->mysqli->query($sqlTest);
        if ($result->num_rows > 0) {
            $alert3 = 'Email already exists';
            echo "<meta http-equiv='refresh' content='0;url=user_info.php?alert=" . urlencode($alert3) . "'>";
            return;
        }

        $sql = "UPDATE `users` SET `email` = '$newEmail' WHERE `user_id` = $user_id";
        $result = $this->mysqli->query($sql);

        if ($result) {
            echo "<meta http-equiv='refresh' content='0;url=user_info.php'>";
            exit();
        }
    }

    if (isset($_POST['ChangePasswordBtn'])) {
        $newPassword = $_POST['ChangePassword']; 
        $hashedPassword = md5($newPassword . "356ads34749ad9s");
        $user_id = $_SESSION['user_id']; 

        if (!is_numeric($user_id)) {
            return; 
        }

        if (mb_strlen($newPassword) < 8 || mb_strlen($newPassword) > 90) {
            $alert4 = 'Incorrect password length';
            echo "<meta http-equiv='refresh' content='0;url=user_info.php?alert=" . urlencode($alert4) . "'>";
            return;
        }

        $sqlTest = "SELECT * FROM `user_details` WHERE `password` = '$hashedPassword'";
        $result = $this->mysqli->query($sqlTest);
        if ($result->num_rows > 0) {
            $alert4 = 'Password already exists';
            echo "<meta http-equiv='refresh' content='0;url=user_info.php?alert=" . urlencode($alert4) . "'>";
            return;
        }

        $sql = "UPDATE `users` SET `password` = '$hashedPassword' WHERE `user_id` = $user_id";
        $result = $this->mysqli->query($sql);

        if ($result) {
            echo "<meta http-equiv='refresh' content='0;url=user_info.php'>";
            exit();
        }
    }
}



 ///------------------------Closing a connection to the database ----------------------------------
    public function closeDatabaseConnection() {
        $this->mysqli->close();
    }

///------------------------Display user/admin picture ----------------------------------
    public function displayUserProfileImage() {
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM profile_images WHERE user_id = $user_id";
        $result = $this->mysqli->query($sql);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_array();
            $profile_image = $row['profile_image'];
            echo '<div class="AvatharImgBox1" style="width: 280px; height: 280px; border-radius: 50%; overflow: hidden; display: flex; justify-content: center; align-items: center;  ">';
            echo '<img src="data:image/jpeg;base64,' . base64_encode($profile_image) . '" width="280" height="280" />';
            echo '</div>';
            

        } else {
            echo '<div class="AvatharImgBox2" style="width: 400px; height: 400px; border-radius: 50%; overflow: hidden; display: flex; justify-content: center; align-items: center;  ">';
            echo '<img src="../images/user_foto.png" width="400" height="400" />';
            echo '</div>';
        }
    }
}

$userBookings = new UserBookings();
$userBookings->displayUserInfo();

$userBookings->displayUserProfileImage();

echo "<a class='BackBtn' href='../php/index.php'>← Back</a>";

      
echo '<form action="logout.php" method="POST">
        <button class="BackBtn2"type="submit">Log out</button>
     </form>';

      
ob_start(); 
?>
