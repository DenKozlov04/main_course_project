<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/user_info.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
</head>
<body>
    
</body>
</html>

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
        echo '<div id="user-info">';
        echo "<h1>Welcome, {$_SESSION['username']} !</h1>";
        echo "<h1>Your user ID is: {$_SESSION['user_id']}</h1>";
        echo "<p>Your email is: {$_SESSION['email']} </p>";
    }

    public function getUserBookings() {
        $sql = "SELECT bookings.booking_id, bookings.user_id, bookings.flight_id, bookings.booking_date, bookings.seat_number 
                FROM bookings
                INNER JOIN users ON bookings.user_id = users.user_id
                WHERE bookings.user_id = {$_SESSION['user_id']}";

        $result = $this->mysqli->query($sql);

        if ($result->num_rows > 0) {
            echo '<div id="bookings-list">';
            // Выводим данные из таблицы
            while ($row = $result->fetch_assoc()) {
                echo "Booking ID: " . $row["booking_id"] . " - User ID: " . $row["user_id"] . " - Flight ID: " . $row["flight_id"] . " - Booking Date: " . $row["booking_date"] . " - Seat Number: " . $row["seat_number"] . "<br>";
                echo "<form method='POST' action='user_info.php'>
                        <input type='hidden' name='delete' value='" . $row["user_id"] . "'>
                        <button  class='delete-button'type='submit'>Denie</button>
                      </form>";
            }
        } else {
            echo "No bookings found, add booking: <li><a href='../php/Buy_Tickets.php'>ADD</a></li>";
        }
    }

    public function deleteBooking() {
        if (isset($_POST['delete'])) {
            $id = $_POST['delete'];
            $this->mysqli->query("DELETE FROM `bookings` WHERE `user_id`= {$_SESSION['user_id']}") or die($this->mysqli->error);
        }
    }

    public function closeDatabaseConnection() {
        $this->mysqli->close();
    }

    public function displayUserProfileImage() {
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM profile_images WHERE user_id = $user_id";
        $result = $this->mysqli->query($sql);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_array();
            $profile_image = $row['profile_image'];//выводим аватар пользователя
            echo '<img src="data:image/jpeg;base64,' . base64_encode($profile_image) . '" width="200" height="200" />';
        } else {
            echo "Изображение не найдено.";
        }
    }
}

$userBookings = new UserBookings();
$userBookings->displayUserInfo();
$userBookings->deleteBooking();
$userBookings->getUserBookings();
$userBookings->displayUserProfileImage();

echo "<li><a href='../php/index.php'>Back to the main page</a></li>";
echo '<form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/*">
        <input type="submit" value="Upload image" name="submit">
      </form>';
?>
