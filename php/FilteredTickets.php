<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/FilteredTickets.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600&family=Poppins:ital,wght@1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Filtered tickets</title>
</head>
<body>
    <a class='BackButton' href='index.php'>Back</a>
<button class="toggle-button">
        <img src='../images/free-icon-funnel-tool-4052123.png' alt="Toggle Image">
        <script src="../JS/togglebutton.js"></script>
    </button>
    <div class="sidebar">
    <div class='sidebarText1'>Price,€,$</div>
    <p class='CurrentValue'><span id="sliderValue">0</span></p>
    <p class='equal'>-</p>
    <p class='MaxValue'>100</p>
    <input type="range" min="0" max="100" value="0" class="slider" id="mySlider">
    <script src="../JS/slider.js"></script>
</div>

    
    <!-- <a href="https://www.flaticon.com/ru/free-icons/" title="">Воронка иконки от smashingstocks - Flaticon</a> -->

<div class='search_place'>
<div class="search">
    <form method="GET" action="../php/FilteredTickets.php">
        <div class="box1-input" style="border-radius: 50px 0 0 50px;">
            <div class="input-data">
                <input type="text" id="input" name="SearchRoute" placeholder="Riga-Paris">
                <label for="input-field">Enter the route:</label>
            </div>
        </div>
        <div class="box1-input">
            <div class="input-data">
                <input type="text" name="SearchCountry" placeholder="France">
                <label for="input-field">Choose country:</label>
            </div>
        </div>
        <div class="box1-input">
            <div class="input-data">
                <input type="date" id="date" name="SearchArrival_date">
                <label for="input-field">Set your arrival date:</label>
            </div>
        </div>
        <div class="box1-input">
            <div class="input-data">
                <input type="date" name="SearchDeparture_date">
                <label for="input-field">Set your departure date:</label>
            </div>
        </div>
        <div class="box1-input" style="border-radius: 0 50px 50px 0;">
            <div class="input-data">
                <button class="Search_button" type="submit" name="passenger_number" placeholder="for example: 1">Search Tickets🔍</button>
            </div>
        </div>
    </form>
</div>
</div>
</body>
</html>

<?php
session_start();
// echo $_SESSION['user_id']; 
// echo $_SESSION['admin_id']; 
include 'dbconfig.php';

// Проверяем соединение
if ($mysqli->connect_error) {
    die("Ошибка подключения: " . $mysqli->connect_error);
}
if ($_SESSION['user_id'] == 0 && $_SESSION['admin_id'] != 1) {
    header("Location: ../html/autorization.html");
    exit();
} 



$SearchRoute = isset($_GET['SearchRoute']) ? $_GET['SearchRoute'] : '';
$searchCountry = isset($_GET['SearchCountry']) ? $_GET['SearchCountry'] : '';
$SearchArrival_date = isset($_GET['SearchArrival_date']) ? $_GET['SearchArrival_date'] : '';
$SearchDeparture_date = isset($_GET['SearchDeparture_date']) ? $_GET['SearchDeparture_date'] : '';



$sql_airports = "SELECT id, City, country, airport_name, T_price FROM `airports/airlines` WHERE 1";

// если параметры переданы
if ($SearchRoute != '') {
    $searchRouteLower = strtolower($SearchRoute);
    $sql_airports .= " AND LOWER(Airline) LIKE '%$searchRouteLower%'";
}

if ($searchCountry != '') {
    $searchCountryLower = strtolower($searchCountry);
    $sql_airports .= " AND LOWER(country) LIKE '%$searchCountryLower%'";
}

if ($SearchArrival_date != '') {
    $sql_airports .= " AND arrival_date = '$SearchArrival_date'";
}

if ($SearchDeparture_date != '') {
    $sql_airports .= " AND departure_date = '$SearchDeparture_date'";
}

$result_airports = $mysqli->query($sql_airports);



// Проверяем успешность выполнения запроса
if ($result_airports) {
    // Выводим данные из таблицы airports в карточках
    echo "<div class='Ticket_box'>";
    while ($row_airports = $result_airports->fetch_assoc()) {
         
         $stmt = $mysqli->prepare("SELECT flight_image FROM airflight_description WHERE flight_id = ?");
         $stmt->bind_param("i", $row_airports['id']);
         $stmt->execute();
         $stmt->bind_result($flight_image);
         $stmt->fetch();
         $stmt->close();
        
         $airline_id = $row_airports['id'];

         echo "
         <div class='Ticket_card'>
             <img src='data:image/jpeg;base64," . base64_encode($flight_image) . "'> <!-- Замените это на путь, где у вас хранятся изображения -->
             <div class='text1'>" . $row_airports["country"] . $row_airports['id'] ."</div> 
             <div class='text2'>Direct flight</div>
             <div class='text3'>" . $row_airports["City"] . " (" . $row_airports["airport_name"] . ")</div>
             <div class='rectangle1'>
                 <div class='text4'>One direction</div>
                 <div class='text5'>" . $row_airports["T_price"] . "</div>
                 <div class='text6'>per person</div>
                 <div class='text7'>from</div>
             </div>
             <div class='BookingBtn'>
             <form method='POST' action='../php/flightInfo.php'>
                 <input type='hidden' name='airline_id' value='" . $row_airports['id'] . "'>
                 <button type='submit' class='BookingBtnA'>Book a ticket now</button>
             </form>
         </div>
         </div>";
    }
    echo "</div>";
} else {
    
    echo "Query Execution Error: " . $mysqli->error;
}


$mysqli->close();
?>


