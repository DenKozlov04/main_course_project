<?php
    session_start();
    echo "<h1>Welcome, {$_SESSION['username']}</h1>";
    echo "<h1>Your user ID is {$_SESSION['user_id']}</h1>";
    echo "<p>Your email is {$_SESSION['email']}</p>";
   
    // Подключаемся к базе данных
    $mysqli = new mysqli("localhost", "root", "", "airflightsdatabase");
    
    if ($mysqli->connect_error) {
      die("Connection failed: " . $mysqli->connect_error);
    }
    
    // Получаем данные из таблицы booking
    $sql = "SELECT bookings.booking_id, bookings.user_id, bookings.flight_id, bookings.booking_date, bookings.seat_number 
        FROM bookings
        INNER JOIN users ON bookings.user_id = users.user_id
        WHERE bookings.user_id = {$_SESSION['user_id']}";
    
    // Datu dzēšana no tabulas un datubāzes
    if (isset($_POST['delete'])) {
        $id = $_POST['delete'];
        $mysqli->query("DELETE FROM `bookings` WHERE `user_id`= {$_SESSION['user_id']}") or die($mysqli->error());

    }

    $result = $mysqli->query($sql);
    
    if ($result->num_rows > 0) {
      // Выводим данные из таблицы
      while($row = $result->fetch_assoc()) {
        echo "Booking ID: " . $row["booking_id"]. " - User ID: " . $row["user_id"]. " - Flight ID: " . $row["flight_id"]. " - Booking Date: " . $row["booking_date"]. " - Seat Number: " . $row["seat_number"]. "<br>";
        echo "<form method='POST' action='user_info.php'>
                <input type='hidden' name='delete' value='".$row["user_id"]."'>
                <button type='submit'>Denie</button>
              </form>";
      }
    } else {
        echo "No bookings found, add booking: <li><a href='../php/Buy_Tickets.php'>ADD</a></li>";

    }
    echo "<li><a href='../php/index.php'>php\index.php</a></li>";
    $mysqli->close();
    ?>

