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

///------------------------Код вывода информации о пользователе---------------------------------- 
    public function displayUserInfo() {
        $userInfo = array();
    
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM users WHERE user_id = $user_id";
    
        $result = $this->mysqli->query($sql);
    
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
            $userInfo['username'] = $row['username'];
            $userInfo['email'] = $row['email'];
            $userInfo['phone'] = $row['phone'];
            $userInfo['password'] = $row['password'];
        }
    
        return $userInfo;
    }
///------------------------Вывод/добавления информации ребенке ----------------------------------
    public function displayAddChildInfo() {

    }
///------------------------Код удаления профиля ----------------------------------       
    public function deleteProfile() {
        if (isset($_POST['deleteUser'])) {
            $user_id = $_SESSION['user_id']; 
            if (!is_numeric($user_id)) {
                // echo "Ошибка: Некорректный ID пользователя";
                return; 
            }
    
            // Подготавливаем и выполняем запросы на удаление информации о пользователе
            $this->deleteFromTable('users', $user_id);
            $this->deleteFromTable('user_details', $user_id);
            $this->deleteFromTable('tickets', $user_id);
            $this->deleteFromTable('profile_images', $user_id);
    
 
            session_destroy();
    
         
            echo "<meta http-equiv='refresh' content='0;url=index.php'>";
            exit();
        }
    }

///------------------------Код удаления всех данных о пользователе ----------------------------------    
    private function deleteFromTable($tableName, $userId) {
        $delsql = "DELETE FROM `$tableName` WHERE `user_id` = $userId";
        $result = $this->mysqli->query($delsql);
        if (!$result) {
            
            // echo "Ошибка при удалении из таблицы $tableName: " . $this->mysqli->error;
        }
    }

///------------------------Вывод информации о билете пользователя и полете ----------------------------------
    public function displayFlightInfo() {
        // Инициализируем массив для хранения данных
        $flightInfo = array();
    
      
        $sql_tickets = "SELECT Seat, price, airlines_id FROM tickets WHERE user_id = {$_SESSION['user_id']}";
        $result_tickets = $this->mysqli->query($sql_tickets);
    
    
        if ($result_tickets->num_rows > 0) {
            // Извлечение данных из результата первого запроса
            $row = $result_tickets->fetch_assoc();
            $airlines_id = $row['airlines_id'];
    
            // Выполнение второго SQL запроса
            $sql_airlines = "SELECT Airline, arrival_date, departure_date, arrival_time, departure_time FROM `airports/airlines` WHERE id = $airlines_id";
            $result_airlines = $this->mysqli->query($sql_airlines);
    
            // Проверка наличия результатов второго запроса
            if ($result_airlines->num_rows > 0) {
           
                $row_airlines = $result_airlines->fetch_assoc();
    
                // Сохранение полученных данных в массив
                $flightInfo['seat'] = $row['Seat'];
                $flightInfo['price'] = $row['price'];
                $flightInfo['airline'] = $row_airlines['Airline'];
                $flightInfo['arrival_date'] = $row_airlines['arrival_date'];
                $flightInfo['departure_date'] = $row_airlines['departure_date'];
                $flightInfo['arrival_time'] = date('H:i', strtotime($row_airlines['arrival_time']));
                $flightInfo['departure_time'] = date('H:i', strtotime($row_airlines['departure_time']));
            } else {

            }
        } else {
            $flightInfo['seat'] = '';
            $flightInfo['price'] = '';
            $flightInfo['airline'] = 'biļešu nav.';
            $flightInfo['arrival_date'] = '';
            $flightInfo['departure_date'] = '';
            $flightInfo['arrival_time'] = '';
            $flightInfo['departure_time'] = '';
        }
    
       
        return $flightInfo;
    }
    
///------------------------Функция смены информации ----------------------------------

public function ChangeUserInfo(){
    if (isset($_POST['ChangeUserBtn'])) {
        $newUsername = $_POST['ChangeUser']; 
        $user_id = $_SESSION['user_id']; 
      
        if (!is_numeric($user_id)) {
          
            return; 
        }
      
        $sql = "UPDATE `users` SET `username` = '$newUsername' WHERE `user_id` = $user_id";
        $result = $this->mysqli->query($sql);
       
        if ($result) {

            echo "<meta http-equiv='refresh' content='0;url=user_info.php'>";
            exit();
        } else {

        }
    }

  
    if (isset($_POST['ChangePhoneBtn'])) {
        $newPhone = $_POST['ChangePhone']; 
        $user_id = $_SESSION['user_id']; 
   
        if (!is_numeric($user_id)) {
          
            return; 
        }

        $sql = "UPDATE `users` SET `phone` = '$newPhone' WHERE `user_id` = $user_id";
        $result = $this->mysqli->query($sql);
    
        if ($result) {

            echo "<meta http-equiv='refresh' content='0;url=user_info.php'>";
            exit();
        } else {

        }
    }


    if (isset($_POST['ChangeEmailBtn'])) {
        $newEmail = $_POST['ChangeEmail']; 
        $user_id = $_SESSION['user_id']; 
      
        if (!is_numeric($user_id)) {
        
            return; 
        }

        $sql = "UPDATE `users` SET `email` = '$newEmail' WHERE `user_id` = $user_id";
        $result = $this->mysqli->query($sql);
      
        if ($result) {

            echo "<meta http-equiv='refresh' content='0;url=user_info.php'>";
            exit();
        } else {

        }
    }
    if (isset($_POST['ChangePasswordBtn'])) {
        $newPassword = $_POST['ChangePassword']; 
        $hashedPassword = md5($newPassword . "356ads34749ad9s");
        $user_id = $_SESSION['user_id']; 
      
        if (!is_numeric($user_id)) {
        
            return; 
        }

        $sql = "UPDATE `users` SET `password` = '$hashedPassword' WHERE `user_id` = $user_id";
        $result = $this->mysqli->query($sql);
      
        if ($result) {

            echo "<meta http-equiv='refresh' content='0;url=user_info.php'>";
            exit();
        } else {

        }
    }
}


///------------------------Функция получения данных из таблицы Booking ПОТОМ УДАЛИТЬ ----------------------------------

    public function getUserBookings() {////переделать 
        $sql = "SELECT bookings.booking_id, bookings.user_id, bookings.flight_id, bookings.booking_date, bookings.seat_number 
                FROM bookings
                INNER JOIN users ON bookings.user_id = users.user_id
                WHERE bookings.user_id = {$_SESSION['user_id']}";
    
        $result = $this->mysqli->query($sql);
    
        if ($_SESSION['admin_id'] != 0) {
            echo "Hello admin
            <li><a href='adminPage.php'>Go to the admin page</a></li>";

        } else {
            if ($result->num_rows > 0) {
                // echo '<div id="bookings-list">';
                // данные из таблицы
    
                // echo '<table id="bookings-table">';
                // echo '<tr>';
                // echo '<th>Booking ID</th>';
                // echo '<th>User ID</th>';
                // echo '<th>Flight ID</th>';
                // echo '<th>Booking Date</th>';
                // echo '<th>Seat Number</th>';
                // echo '</tr>';
    
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row["booking_id"] . '</td>';
                    echo '<td>' . $row["user_id"] . '</td>';
                    echo '<td>' . $row["flight_id"] . '</td>';
                    echo '<td>' . $row["booking_date"] . '</td>';
                    echo '<td>' . $row["seat_number"] . '</td>';
                    echo '</tr>';  
    
                    echo "<form method='POST' action='user_info.php'>
                            <input type='hidden' name='delete' value='" . $row["user_id"] . "'>
                            <button  type='submit'>Deny</button>
                          </form>";
                } 
                echo '</table>';
            } else {
                echo "No bookings found, add booking: <li><a href='../php/Buy_Tickets.php'>ADD</a></li>";
            }
        }
    }
    
 ///------------------------Функция удаления данных из таблицы Booking ПОТОМ УДАЛИТЬ ----------------------------------
    public function deleteBooking() {
        if (isset($_POST['delete'])) {
            $id = $_POST['delete'];
            $this->mysqli->query("DELETE FROM `bookings` WHERE `user_id`= {$_SESSION['user_id']}") or die($this->mysqli->error);
        }
    }

 ///------------------------Закрытие подключения к бд ----------------------------------
    public function closeDatabaseConnection() {
        $this->mysqli->close();
    }

///------------------------Вывод картинки пользователя/админа ----------------------------------
    public function displayUserProfileImage() {
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM profile_images WHERE user_id = $user_id";
        // $sql = "SELECT * FROM users WHERE user_id = $user_id";
        $result = $this->mysqli->query($sql);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_array();
            $profile_image = $row['profile_image'];//вывод аватара пользователя
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
// $userBookings->deleteProfile(); // Вызов метода для удаления профиля
$userBookings->deleteBooking();
$userBookings->displayUserProfileImage();

echo "<a class='BackBtn' href='../php/index.php'>Atpakaļ</a>";
echo '<form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/*">
        <input type="submit" value="Upload image" name="submit">
      </form>';
      
echo '<form action="logout.php" method="POST">
        <button class="BackBtn2"type="submit">Iziet no profila</button>
     </form>';
      $userBookings->getUserBookings();
      
ob_start(); // Начать буферизацию вывода
?>
