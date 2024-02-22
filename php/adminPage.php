<?php
session_start();
// если сессия админа
if (isset($_SESSION['admin_id'])) {
    // echo $_SESSION['admin_id'];

    include 'dbconfig.php';

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $result = $mysqli->query("SELECT booking_id, user_id, flight_id, booking_date, seat_number FROM `bookings`");

    $data = array(); 
// пока значения есть-выводить их
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row; 
        }
    } else {
        echo "No bookings from users";
    }
} else {
    echo "Admin ID is not set in session.";
}
?>

<table action="SubmitInfo_php">
  <tr>
    <th>booking ID</th>
    <th>user ID</th>
    <th>flight id</th>
    <th>booking_date </th>
    <th>seat_number </th>
  </tr>

  <?php
    // data содержит все строки из результата запроса
    foreach ($data as $row) {
        $booking_id = $row['booking_id'];
        $user_id = $row['user_id'];
        $flight_id = $row['flight_id'];
        $booking_date = $row['booking_date'];
        $seat_number = $row['seat_number'];
        
        // Вывод данных 
        echo "<tr>";
        echo "<td>" . $booking_id . "</td>";
        echo "<td>" . $user_id . "</td>";
        echo "<td>" . $flight_id . "</td>";
        echo "<td>" . $booking_date . "</td>";
        echo "<td>" . $seat_number . "</td>";
        echo "</tr>";
    }
  ?>

</table>
<li><a href="" action="" name="delete">delete</a></li>
</body>
</html> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="..\css\adminPage.css" rel="stylesheet">
    <title>Admin page</title>
</head>
<body>

<form action="../php/admin.php" method="POST" enctype="multipart/form-data">
    <div class='changes'>
        <div class='Airline'>
            <div class='input-Airline'>
                <input type="text" id="Airline" name="Airline" placeholder="Airline name for example: Riga - Paris">
            </div>
        </div>

        <div class='airport_name'>
            <div class='input-airport_name'>
                <input type="text" id="airport_name" name="airport_name" placeholder="Write airport name for example: Moscov (Vnukovo)">
            </div>
        </div>

        <div class='ITADA'>
            <div class='input-ITADA'>
                <input type="text" id="ITADA" name="ITADA" placeholder="Write ITADA code for example: VKO">
            </div>
        </div>

        <div class='City'>
            <div class='input-City'>
                <input type="text" id="City" name="City" placeholder="Write airport City for example: Moscov">
            </div>
        </div>

        <div class='country'>
            <div class='input-country'>
                <input type="text" id="country" name="country" placeholder="Write airport country for example: Russia">
            </div>
        </div>

        <div class='T_price'>
            <div class='input-T_price'>
                <input type="text" id="T_price" name="T_price" placeholder="Write ticket price for example: 500 euro">
            </div>
        </div>

        <div class='arrival_date'>
            <div class='input-arrival_date'>
                <input type="text" id="arrival_date" name="arrival_date" placeholder="Write arrival date for example: 2023-05-01">
            </div>
        </div>

        <div class='departure_date'>
            <div class='input-departure_date'>
                <input type="text" id="departure_date" name="departure_date" placeholder="Write departure date for example: 2023-04-01">
            </div>
        </div>

        <div class='arrival_time'>
            <div class='input-arrival_date'>
                <input type="text" id="arrival_time" name="arrival_time" placeholder="Write arrival time for example: 12:30:00">
            </div>
        </div>

        <div class='departure_time'>
            <div class='input-arrival_date'>
                <input type="text" id="departure_time" name="departure_time" placeholder="Write departure time for example: 12:30:00">
            </div>
        </div>
        <div class='googleMapsLink'>
            <div class='input-googleMapsLink'>
                <input type="text" id="googleMapsLink" name="googleMapsLink" placeholder="Insert a link to the location on Google Maps (you can obtain it by opening the Google Maps website, clicking on the link/code, and selecting the code (!!copy only the link itself!!) without additional code.">
            </div>
        </div>
        <div class='description' >
            <div class='input-description'>
                <textarea id="description" name="description" placeholder="Write your description here...!!!DON'T USE THESE ( ' ) SIGN" ></textarea>
            </div>
        </div>
        <input type="file" id="image1" name="image1">

        <div class='upload_changes'>
            <div class='input-create-profile'>
                <button type="submit" id="submit" name="submit">UPLOAD CHANGES</button>
            </div>
        </div>
        <div class='main_page'>
    <div class='input-main-page'>
        <a href="index.php" class="main-page-link">GO TO THE MAIN PAGE</a>
    </div>
</div>
        </div>
    </div>
</form>

<!-- форма добавления скидки -->
<form class="city-form" action="../php/addCard.php" method="POST" enctype="multipart/form-data">
    <label for="city-name">The name of the city of departure:</label>
    <input type="text" id="city-name" name="city">

    <label for="arrival-city-name">Name of the city of arrival:</label>
    <input type="text" id="arrival-city-name" name="arrival_city">

    <label for="price">Price:$,€,₽,¥.</label>
    <input type="text" id="price" name="price">

    <label for="image">Image(max 2mb):</label>
    <input type="file" id="image" name="image">

    <input type="submit" value="Добавить">

</form>




