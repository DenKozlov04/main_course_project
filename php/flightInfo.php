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
    <script src="../JS/Bcolor.js"></script>
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
    <form method='POST' action='Order.php'>
        <button class="button1" type='submit'>Order</button>
    </form>
</div>
<div class="custom-rectangle2L">
    <div class="CommentsPlace">
        <div class="text3">Choosing a seat on the plane</div>
        <div class="text4">Lorem Ipsum is simply dummy text of the printing and typesetting industry.(описание того что на картинке)</div>
        <div class="Image2">
            <img src="../images/planeSeats.png " alt="Plane places">

            <div class="buttonBox1 colorButton">
                <button value="F1">F1</button>
                <button value="F2">F2</button>
                <button value="F3">F3</button>
                <button value="F4">F4</button>
                <button value="E1">E1</button>
                <button value="E2">E2</button>
                <button value="E3">E3</button>
                <button value="E4">E4</button>
        </div>
        <div class="buttonBox2 colorButton">
            <button value="B1">B1</button>
            <button value="B2">B2</button>
            <button value="B3">B3</button>
            <button value="B4">B4</button>
            <button value="A1">A1</button>
            <button value="A2">A2</button>
            <button value="A3">A3</button>
            <button value="A4">A4</button>
        </div>
        <div class="buttonBox3 colorButton">
            
            <button value="F7">F7</button>
            <button value="F8">F8</button>
            <button value="F9">F10</button>
            <button value="F10">F11</button>
            <button value="E7">E7</button>
            <button value="E8">E8</button>
            <button value="E10">E10</button>
            <button value="E11">E11</button>
            <button value="D7">D7</button>
            <button value="D8">D8</button>
            <button value="D10">D10</button>
            <button value="D11">D11</button>
        </div>
        <div class="buttonBox4 colorButton">
            <button value="C7">C7</button>
            <button value="C8">C8</button>
            <button value="C10">C10</button>
            <button value="C11">C11</button>
            <button value="B7">B7</button>
            <button value="B8">B8</button>
            <button value="B10">B10</button>
            <button value="B11">B11</button>
            <button value="A7">A7</button>
            <button value="A8">A8</button>
            <button value="A10">A10</button>
            <button value="A11">A11</button>
        </div>
        <div class="buttonBox5 colorButton">
            <button value="F12">F12</button>
            <button value="F14">F14</button>
            <button value="F15">F15</button>
            <button value="F20">F20</button>
            <button value="E12">E12</button>
            <button value="E14">E14</button>
            <button value="E15">E15</button>
            <button value="E20">E20</button>
            <button value="D12">D12</button>
            <button value="D14">D14</button>
            <button value="D15">D15</button>
            <button value="D20">D20</button>
        </div>
        <div class="buttonBox6 colorButton">
            <button value="C12">C12</button>
            <button value="C14">C14</button>
            <button value="C15">C15</button>
            <button value="C20">C20</button>
            <button value="B12">B12</button>
            <button value="B14">B14</button>
            <button value="B15">B15</button>
            <button value="B20">B20</button>
            <button value="A12">A12</button>
            <button value="A14">A14</button>
            <button value="A15">A15</button>
            <button value="A20">A20</button>
        </div>
        <div class="buttonBox7 colorButton">
            <button value="F21">F21</button>
            <button value="F22">F22</button>
            <button value="F23">F23</button>
            <button value="F24">F24</button>
            <button value="F25">F25</button>
            <button value="F26">F26</button>
            <button value="F27">F27</button>
            <button value="F28">F28</button>
            <button value="F29">F29</button>
            <button value="F30">F30</button>
            <button value="F31">F31</button>
            <button value="F32">F32</button>
            <button value="F34">F34</button>
            <button value="F35">F35</button>
            <button value="F36">F36</button>
            <button value="F37">F37</button>
            <button value="F38">F38</button>
            <button value="E21">E21</button>
            <button value="E22">E22</button>
            <button value="E23">E23</button>
            <button value="E24">E24</button>
            <button value="E25">E25</button>
            <button value="E26">E26</button>
            <button value="E27">E27</button>
            <button value="E28">E28</button>
            <button value="E29">E29</button>
            <button value="E30">E30</button>
            <button value="E31">E31</button>
            <button value="E32">E32</button>
            <button value="E33">E34</button>
            <button value="E35">E35</button>
            <button value="E36">E36</button>
            <button value="E37">E37</button>
            <button value="E38">E38</button>
            <button value="D21">D21</button>
            <button value="D22">D22</button>
            <button value="D23">D23</button>
            <button value="D24">D24</button>
            <button value="D25">D25</button>
            <button value="D26">D26</button>
            <button value="D27">D27</button>
            <button value="D28">D28</button>
            <button value="D29">D29</button>
            <button value="D30">D30</button>
            <button value="D31">D31</button>
            <button value="D32">D32</button>
            <button value="D34">D34</button>
            <button value="D35">D35</button>
            <button value="D36">D36</button>
            <button value="D37">D37</button>
            <button value="D38">D38</button>
        </div>
        <div class="buttonBox8 colorButton">
            <button value="C21">C21</button>
            <button value="C22">C22</button>
            <button value="C23">C23</button>
            <button value="C24">C24</button>
            <button value="C25">C25</button>
            <button value="C26">C26</button>
            <button value="C27">C27</button>
            <button value="C28">C28</button>
            <button value="C29">C29</button>
            <button value="C30">C30</button>
            <button value="C31">C31</button>
            <button value="C32">C32</button>
            <button value="C34">C34</button>
            <button value="C35">C35</button>
            <button value="C36">C36</button>
            <button value="C37">C37</button>
            <button value="C38">C38</button>
            <button value="B21">B21</button>
            <button value="B22">B22</button>
            <button value="B23">B23</button>
            <button value="B24">B24</button>
            <button value="B25">B25</button>
            <button value="B26">B26</button>
            <button value="B27">B27</button>
            <button value="B28">B28</button>
            <button value="B29">B29</button>
            <button value="B30">B30</button>
            <button value="B31">B31</button>
            <button value="B32">B32</button>
            <button value="B34">B34</button>
            <button value="B35">B35</button>
            <button value="B36">B36</button>
            <button value="B37">B37</button>
            <button value="B38">B38</button>
            <button value="A21">A21</button>
            <button value="A22">A22</button>
            <button value="A23">A23</button>
            <button value="A24">A24</button>
            <button value="A25">A25</button>
            <button value="A26">A26</button>
            <button value="A27">A27</button>
            <button value="A28">A28</button>
            <button value="A29">A29</button>
            <button value="A30">A30</button>
            <button value="A31">A31</button>
            <button value="A32">A32</button>
            <button value="A34">A34</button>
            <button value="A35">A35</button>
            <button value="A36">A36</button>
            <button value="A37">A37</button>
            <button value="A38">A38</button>
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