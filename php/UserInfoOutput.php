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
///------------------------Данные о билете---------------------------------- 
    public function AddChildrenSeat() {
        if (isset($_POST['ChooseSeat'])) {
            $user_id = $_SESSION['user_id']; 
            $price = $_POST['Price'];
            $Seat = $_POST['PlaceName'];
            
        
            // error_log("Price: $price, Seat: $Seat");
            
        
        } 
    }
///------------------------добавления информации ребенке ----------------------------------
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
            
            $alert = ''; // Инициализируем переменную $alert

            if (mb_strlen($child_name) < 1 || mb_strlen($child_name) > 255) {
                $alert = 'Incorrect child name';
            } elseif (mb_strlen($child_surname) < 1 || mb_strlen( $child_surname) > 255) {
                $alert = 'Incorrect child surname';
            } elseif (mb_strlen($child_nationality) < 1 || mb_strlen($child_nationality) > 255) {
                $alert = 'Incorrect child nationality';
            } elseif (mb_strlen($passport_number) < 5 || mb_strlen($passport_number) > 17) {
                $alert = 'Incorrect passport_number length (from 5 to 17 symbols)';
            }

            // Проверяем, существует ли паспортный номер в базе данных
            if (empty($alert)) {
                $sql_check_passport = "SELECT Passport_number FROM children WHERE Passport_number = ?";
                $stmt_check_passport = $this->mysqli->prepare($sql_check_passport);
                $stmt_check_passport->bind_param("s", $passport_number);
                $stmt_check_passport->execute();
                $result_check_passport = $stmt_check_passport->get_result();
                if ($result_check_passport->num_rows > 0) {
                    $alert = "This passport number already exists";
                } else {
                    // Подготавливаем и выполняем запрос на вставку новой записи
                    $stmt = $this->mysqli->prepare("INSERT INTO children (user_id, Name, Surname, Gender, Nationality, Passport_number, passportIssuedDate, passportExpirationDate) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("isssssss", $user_id, $child_name, $child_surname, $child_gender, $child_nationality, $passport_number, $passport_issued_date, $passport_expiration_date);
                    if ($stmt->execute()) {
                        
                    } else {
                        echo "Error: " . $this->mysqli->error;
                    }
                }
            }

            // Выводим алерт, если есть ошибка
            if ($alert) {
                echo "<meta http-equiv='refresh' content='0;url=user_info.php?alert=" . urlencode($alert) . "'>";
                exit();
            }
        }
    }

///------------------------вывод информации ребенке ----------------------------------
    public function displayChildInfo() {
        // Инициализируем массив для хранения данных
        $childInfo = array();

        // Выполняем SQL запрос для получения данных о детях пользователя
        $sql = "SELECT Name, Surname, Gender, Nationality, Passport_number, passportIssuedDate, passportExpirationDate FROM children WHERE user_id = {$_SESSION['user_id']}";
        $result = $this->mysqli->query($sql);

        // Проверяем, есть ли результаты запроса
        if ($result->num_rows > 0) {
            // Извлекаем данные из результата запроса
            $row = $result->fetch_assoc();

            // Сохраняем полученные данные в массив
            $childInfo['Name'] = $row['Name'];
            $childInfo['Surname'] = $row['Surname'];
            $childInfo['Gender'] = $row['Gender'];
            $childInfo['Nationality'] = $row['Nationality'];
            $childInfo['PassportNumber'] = $row['Passport_number'];
            $childInfo['PassportIssuedDate'] = $row['passportIssuedDate'];
            $childInfo['PassportExpirationDate'] = $row['passportExpirationDate'];
        } else {
            // Если данные о детях не найдены, устанавливаем значения по умолчанию
            $childInfo['Name'] = '';
            $childInfo['Surname'] = '';
            $childInfo['Gender'] = '';
            $childInfo['Nationality'] = '';
            $childInfo['PassportNumber'] = '';
            $childInfo['PassportIssuedDate'] = '';
            $childInfo['PassportExpirationDate'] = '';
        }

        // Возвращаем массив данных о детях
        return $childInfo;
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
///------------------------Функция омены полета ----------------------------------
    public function DenieFlight(){
        if (isset($_POST['DenieFlight'])) {
            $user_id = $_SESSION['user_id']; 

            // Удаляем из таблицы tickets
            $sql_tickets = "DELETE FROM tickets WHERE user_id = $user_id";
            $result_tickets = $this->mysqli->query($sql_tickets);
            
            // Удаляем из таблицы children (если она не пустая)
            $sql_children = "DELETE FROM children WHERE user_id = $user_id";
            $result_children = $this->mysqli->query($sql_children);

            // Проверяем успешность выполнения обоих запросов
            if ($result_tickets !== false || $result_children !== false) {
                echo "<meta http-equiv='refresh' content='0;url=user_info.php'>";
                exit();
            } else {
                // Обработка ошибки, если не удалось выполнить один из запросов
            }
        }
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
