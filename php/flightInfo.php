<?php
session_start();

$mysqli = new mysqli("localhost", "root", "", "airflightsdatabase");

if ($mysqli->connect_error) {
    die("Ошибка подключения: " . $mysqli->connect_error);
}

$airline_id = $_POST['airline_id'];

// Используем подготовленный запрос для избежания SQL-инъекций
$stmt = $mysqli->prepare("SELECT `City`, `T_price`, `googleMapsLink` FROM `airports/airlines` WHERE `id` = ?");
$stmt->bind_param("i", $airline_id);
$stmt->execute();
$stmt->bind_result($city, $t_price, $google_maps_link);

// Выводим результат
if ($stmt->fetch()) {


    // Закрываем первый запрос
    $stmt->close();

    // Теперь добавим данные из airflight_description
    $stmt2 = $mysqli->prepare("SELECT `flight_image`, `description` FROM `airflight_description` WHERE `flight_id` = ?");
    $stmt2->bind_param("i", $airline_id);
    $stmt2->execute();
    $stmt2->bind_result($flight_image, $description);

    // Выводим данные из airflight_description
    if ($stmt2->fetch()) {

    } else {
        echo "Дополнительные данные не найдены.";
    }

    $stmt2->close();
} else {
    echo "Данные для указанного airline_id не найдены.";
}


$mysqli->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight to any point on the globe.</title>
    <link rel="stylesheet" type="text/css" href="../css/flightInfo.css">
</head>
<body>
    <div class="background-video">
        <video autoplay loop muted>
            <source src="../video/istockphoto-1369067687-640_adpp_is.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <div class="custom-rectangle">
        <div class="custom-rectangle2"></div>
        <iframe class="GoogleMap" src="<?php echo $google_maps_link; ?>"
        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </iframe>
    <?php
        // Проверяем, открыта ли страница со страницы /php/FilteredTickets.php
        $prevPage = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
        $filteredTicketsPage = '/php/FilteredTickets.php';

        if (strpos($prevPage, $filteredTicketsPage) !== false) {
            // Если открыта со страницы /php/FilteredTickets.php, то меняем ссылку
            echo '<div class="PrevPage"><a href="../php/FilteredTickets.php">← Back to page</a></div>';
        } else {
            // В противном случае, используем обычную ссылку
            echo '<div class="PrevPage"><a href="../php/Buy_Tickets.php">← Back to page</a></div>';
        }
    ?>
    <div class="Image">
        <img src="data:image/jpeg;base64,<?php echo base64_encode($flight_image); ?>" alt="Dubai Image">
    </div>
    <div class="text1"><?php echo $city; ?></div>
    <div class="text2"><?php echo $description; ?></div>
    <button class="button1">Order</button>
</div>
</body>
</html>

<div class="custom-rectangle2L">
    <div class="CommentsPlace">
        <div class="text3">Choosing a seat on the plane</div>
        <div class="text4">Lorem Ipsum is simply dummy text of the printing and typesetting industry.(описание того что на картинке)</div>
        <div class="Image2">
            <img src="../images/planeSeats.png " alt="Plane places">
            <div class="buttonBox1">
                <button></button>
                <button></button>
                <button></button>
                <button></button>
                <button></button>
                <button></button>
                <button></button>
                <button></button>
        </div>
        <div class="buttonBox2">
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
        </div>
        <div class="buttonBox3">
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
        </div>
        <div class="buttonBox4">
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
        </div>
        <div class="buttonBox5">
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
        </div>
        <div class="buttonBox6">
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
        </div>
        <div class="buttonBox7">
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
        </div>
        <div class="buttonBox8">
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
        </div>
        </div>
        <div class="text5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
    </div>

</div>
<div class="custom-rectangle2L">
    <div class="CommentsPlace">
        <div class="text3">Travel reviews</div>
    </div>
</div>
</body>

</html>