<?php
session_start();

class UserBookings {
    private $mysqli;

    public function __construct() {
        $this->initializeDatabase();
    }

    private function initializeDatabase() {
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'airflightsdatabase';

        $this->mysqli = new mysqli($host, $user, $password, $database);

        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }
    }

    public function displayUserInfo() {
        echo "<h1>Welcome, {$_SESSION['username']} !</h1>";
        echo "<h1>Your user ID is: {$_SESSION['user_id']}</h1>";
        echo "<p>Your email is: {$_SESSION['email']}</p>";

        
    }

    public function getUserBookings() {
        $sql = "SELECT bookings.booking_id, bookings.user_id, bookings.flight_id, bookings.booking_date, bookings.seat_number 
                FROM bookings
                INNER JOIN users ON bookings.user_id = users.user_id
                WHERE bookings.user_id = {$_SESSION['user_id']}";

        $result = $this->mysqli->query($sql);

        if ($result->num_rows > 0) {
            // Выводим данные из таблицы
            while ($row = $result->fetch_assoc()) {
                echo "Booking ID: " . $row["booking_id"] . " - User ID: " . $row["user_id"] . " - Flight ID: " . $row["flight_id"] . " - Booking Date: " . $row["booking_date"] . " - Seat Number: " . $row["seat_number"] . "<br>";
                echo "<form method='POST' action='user_info.php'>
                        <input type='hidden' name='delete' value='" . $row["user_id"] . "'>
                        <button type='submit'>Denie</button>
                      </form>";
            }
        } else {
            echo "No bookings found, add booking: <li><a href='../php/Buy_Tickets.php'>ADD</a></li>";
        }
    }

    // public function displayUserImage() {
    //     // Отображение изображения пользователя
    //     $user_id = $_SESSION['user_id'];
    //     $sql = "SELECT profile_image, image_type FROM profile_images WHERE user_id = ?";
    //     $stmt = $this->mysqli->prepare($sql);

    //     if ($stmt) {
    //         $stmt->bind_param("i", $user_id);
    //         $stmt->execute();
    //         $stmt->store_result();

    //         if ($stmt->num_rows > 0) {
    //             $stmt->bind_result($profile_image, $image_type);
    //             $stmt->fetch();
    //             $imageData = base64_encode($profile_image);
    //             $imageType = $image_type;

    //             // Отправка заголовка для корректного отображения изображения
    //             header("Content-type: $imageType");
    //             echo '<img src="data:image/' . $imageType . ';base64,' . $imageData . '" alt="User Profile Image" />';
    //         }
            
    //         $stmt->close();
    //     }
    // }
    public function deleteBooking() {
        if (isset($_POST['delete'])) {
            $id = $_POST['delete'];
            $this->mysqli->query("DELETE FROM `bookings` WHERE `user_id`= {$_SESSION['user_id']}") or die($this->mysqli->error);
        }
    }

    public function closeDatabaseConnection() {
        $this->mysqli->close();
    }
}

$userBookings = new UserBookings();
$userBookings->displayUserInfo();
$userBookings->deleteBooking();
$userBookings->getUserBookings();


echo "<li><a href='../php/index.php'>Back to main page</a></li>";
echo '<form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/*">
        <input type="submit" value="Upload image" name="submit">
      </form>';
?>
<?php
// Соединение с базой данных
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "airflightsdatabase"; // Имя вашей базы данных

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка соединения с базой данных: " . $conn->connect_error);
}

// Выполнение SQL-запроса для извлечения данных изображения и его типа
$sql = "SELECT profile_image, image_type FROM profile_images WHERE id = 12"; // Замените "id = 1" на условие выборки нужной строки
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $imageData = $row["profile_image"];
    $imageType = $row["image_type"];

    // Вывод HTTP-заголовка для указания типа контента
    header("Content-Type: $imageType");

    // Вывод данных изображения
    echo $imageData;
} else {
    echo "Изображение не найдено.";
}

// Закрытие соединения с базой данных
$conn->close();
?>

