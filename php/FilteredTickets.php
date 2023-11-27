<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "airflightsdatabase");

// Проверяем соединение
if ($mysqli->connect_error) {
    die("Ошибка подключения: " . $mysqli->connect_error);
}

// Выполняем SQL-запрос для выбора данных из таблицы airports
$sql_airports = "SELECT id, City, country, airport_name, T_price FROM `airports/airlines`";
$result_airports = $mysqli->query($sql_airports);

// Проверяем успешность выполнения запроса
if ($result_airports) {
    // Выводим данные из таблицы airports в карточках
    echo "<div class='Ticket_box'>";
    while ($row_airports = $result_airports->fetch_assoc()) {
        // Выполняем запрос для получения flight_image из airflight_description
        $stmt = $mysqli->prepare("SELECT flight_image FROM airflight_description WHERE flight_id = ?");
        $stmt->bind_param("i", $row_airports['id']);
        $stmt->execute();
        $stmt->bind_result($flight_image);
        $stmt->fetch();
        $stmt->close();

        echo "
        <div class='Ticket_card'>
            <img src='data:image/jpeg;base64," . base64_encode($flight_image) . "'> <!-- Замените это на путь, где у вас хранятся изображения -->
            <div class='text1'>" . $row_airports["country"] . "</div>
            <div class='text2'>Direct flight</div>
            <div class='text3'>" . $row_airports["City"] . " (" . $row_airports["airport_name"] . ")</div>
            <div class='rectangle1'>
                <div class='text4'>One direction</div>
                <div class='text5'>" . $row_airports["T_price"] . "</div>
                <div class='text6'>per person</div>
                <div class='text7'>from</div>
            </div>
            <div class='BookingBtn'><a class='BookingBtnA'>Book a ticket now</a></div>
        </div>";
    }
    echo "</div>";
} else {
    // В случае ошибки выводим сообщение
    echo "Ошибка выполнения запроса: " . $mysqli->error;
}

// Закрываем соединение
$mysqli->close();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/FilteredTickets.css">
    <title>Filtered tickets</title>
</head>
<body>

<!-- <div class="img1">
    <img src="../images/pexels-tanathip-rattanatum-2026324.jpg">
</div> -->
<!-- <div class="Ticket_box">
    <div class="Ticket_card">
        <img src="../images/2000.jpeg">
        <div class="text1">France</div>
        <div class="text2">Direct flight</div>
        <div class="text3">Paris(Paris-Charles-de-Gaulle)</div>
        <div class="rectangle1">
            <div class="text4">One direction</div>
            <div class="text5">22$</div>
            <div class="text6">per person</div>
            <div class="text7">from</div>
        </div>
        <div class="BookingBtn"><a class="BookingBtnA">Book a ticket now</a></div>
    </div>
</div>
</div> -->
</body>
</html>