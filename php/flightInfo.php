<?php
session_start();

include 'dbconfig.php';

if ($mysqli->connect_error) {
    die("Ошибка подключения: " . $mysqli->connect_error);
}

$airline_id = $_POST['airline_id'];

// подготовленный запрос для избежания sql-инъекций
$stmt = $mysqli->prepare("SELECT `City`, `T_price`, `googleMapsLink` FROM `airports/airlines` WHERE `id` = ?");
$stmt->bind_param("i", $airline_id);
$stmt->execute();
$stmt->bind_result($city, $t_price, $google_maps_link);


if ($stmt->fetch()) {


    
    $stmt->close();

    
    $stmt2 = $mysqli->prepare("SELECT `flight_image`, `description` FROM `airflight_description` WHERE `flight_id` = ?");
    $stmt2->bind_param("i", $airline_id);
    $stmt2->execute();
    $stmt2->bind_result($flight_image, $description);

  
    if ($stmt2->fetch()) {

    } else {
        echo "Дополнительные данные не найдены.";
    }

    $stmt2->close();
} else {
    echo "Данные для указанного airline_id не найдены.";
}


// нерабочий алерт


// if(isset($_GET['buttonValue'])) {

//     $buttonValue = $_GET['buttonValue'];
//     if($buttonValue == 0){
//         echo '<script>
//             const urlParams = new URLSearchParams(window.location.search);
//             const alertMessage = urlParams.get("alert");
        
//             if (alertMessage) {
//                 swal({
//                     title: "Error!",
//                     text: decodeURIComponent(alertMessage),
//                     icon: "error",
//                     button: "OK"
//                 });
//             }
//         </script>';
//     }
// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight to any point on the globe.</title>
    <link rel="stylesheet" type="text/css" href="../css/flightInfo.css">
    <script src="../JS/Bcolor.js"></script>
    <script src="../JS/sweetalert.min.js"></script>
    <script src="../php/alertscripts.php"></script>
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
        // проверка открыта ли страница со страницы /php/FilteredTickets.php
        $prevPage = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
        $filteredTicketsPage = '/php/FilteredTickets.php';

        if (strpos($prevPage, $filteredTicketsPage) !== false) {
            // Если открыта со страницы /php/FilteredTickets.php, то ссылка меняется
            echo '<div class="PrevPage"><a href="../php/FilteredTickets.php">← Back to page</a></div>';
        } else {
            // ссылка не меняется
            echo '<div class="PrevPage"><a href="../php/Buy_Tickets.php">← Back to page</a></div>';
        }
    ?>
    <div class="Image">
        <img src="data:image/jpeg;base64,<?php echo base64_encode($flight_image); ?>" alt="Dubai Image">
    </div>
    <div class="text1"><?php echo $city; ?></div>
    <div class="text2"><?php echo $description; ?></div>
    <form id="orderForm" method='POST' action='OrderUserData.php'>
    <button class="button1" type='submit'>Order</button>
</form>


</div>
<div class="custom-rectangle2L">
    <div class="CommentsPlace">
        <div class="text3">Choosing a seat on the plane</div>
        <div class="text4">Lorem Ipsum is simply dummy text of the printing and typesetting industry.(описание того что на картинке)</div>
        <div class="Image2">
            <img src="../images/planeSeats.png " alt="Plane places">
            <div id="selectedValue"></div>
            <div class="buttonBox1 colorButton" method="post">
                <button type="submit" name="seat" value="F1">F1</button>
                <button type="submit" name="seat" value="F2">F2</button>
                <button type="submit" name="seat" value="F3">F3</button>
                <button type="submit" name="seat" value="F4">F4</button>
                <button type="submit" name="seat" value="E1">E1</button>
                <button type="submit" name="seat" value="E2">E2</button>
                <button type="submit" name="seat" value="E3">E3</button>
                <button type="submit" name="seat" value="E4">E4</button>
        </div>
        <div class="buttonBox2 colorButton" method="post">
            <button type="submit" name="seat" value="B1">B1</button>
            <button type="submit" name="seat" value="B2">B2</button>
            <button type="submit" name="seat" value="B3">B3</button>
            <button type="submit" name="seat" value="B4">B4</button>
            <button type="submit" name="seat" value="A1">A1</button>
            <button type="submit" name="seat" value="A2">A2</button>
            <button type="submit" name="seat" value="A3">A3</button>
            <button type="submit" name="seat" value="A4">A4</button>
        </div>
        <div class="buttonBox3 colorButton" method="post">
            
            <button type="submit" name="seat" value="F7">F7</button>
            <button type="submit" name="seat" value="F8">F8</button>
            <button type="submit" name="seat" value="F9">F10</button>
            <button type="submit" name="seat" value="F10">F11</button>
            <button type="submit" name="seat" value="E7">E7</button>
            <button type="submit" name="seat" value="E8">E8</button>
            <button type="submit" name="seat" value="E10">E10</button>
            <button type="submit" name="seat" value="E11">E11</button>
            <button type="submit" name="seat" value="D7">D7</button>
            <button type="submit" name="seat" value="D8">D8</button>
            <button type="submit" name="seat" value="D10">D10</button>
            <button type="submit" name="seat" value="D11">D11</button>
        </div>
        <div class="buttonBox4 colorButton" method="post">
            <button type="submit" name="seat" value="C7">C7</button>
            <button type="submit" name="seat" value="C8">C8</button>
            <button type="submit" name="seat" value="C10">C10</button>
            <button type="submit" name="seat" value="C11">C11</button>
            <button type="submit" name="seat" value="B7">B7</button>
            <button type="submit" name="seat" value="B8">B8</button>
            <button type="submit" name="seat" value="B10">B10</button>
            <button type="submit" name="seat" value="B11">B11</button>
            <button type="submit" name="seat" value="A7">A7</button>
            <button type="submit" name="seat" value="A8">A8</button>
            <button type="submit" name="seat" value="A10">A10</button>
            <button type="submit" name="seat" value="A11">A11</button>
        </div>
        <div class="buttonBox5 colorButton" method="post">
            <button type="submit" name="seat" value="F12">F12</button>
            <button type="submit" name="seat" value="F14">F14</button>
            <button type="submit" name="seat" value="F15">F15</button>
            <button type="submit" name="seat" value="F20">F20</button>
            <button type="submit" name="seat" value="E12">E12</button>
            <button type="submit" name="seat" value="E14">E14</button>
            <button type="submit" name="seat" value="E15">E15</button>
            <button type="submit" name="seat" value="E20">E20</button>
            <button type="submit" name="seat" value="D12">D12</button>
            <button type="submit" name="seat" value="D14">D14</button>
            <button type="submit" name="seat" value="D15">D15</button>
            <button type="submit" name="seat" value="D20">D20</button>
        </div>
        <div class="buttonBox6 colorButton"method="post">
            <button type="submit" name="seat" value="C12">C12</button>
            <button type="submit" name="seat" value="C14">C14</button>
            <button type="submit" name="seat" value="C15">C15</button>
            <button type="submit" name="seat" value="C20">C20</button>
            <button type="submit" name="seat" value="B12">B12</button>
            <button type="submit" name="seat" value="B14">B14</button>
            <button type="submit" name="seat" value="B15">B15</button>
            <button type="submit" name="seat" value="B20">B20</button>
            <button type="submit" name="seat" value="A12">A12</button>
            <button type="submit" name="seat" value="A14">A14</button>
            <button type="submit" name="seat" value="A15">A15</button>
            <button type="submit" name="seat" value="A20">A20</button>
        </div>
        <div class="buttonBox7 colorButton" method="post">
            <button type="submit" name="seat" value="F21">F21</button>
            <button type="submit" name="seat" value="F22">F22</button>
            <button type="submit" name="seat" value="F23">F23</button>
            <button type="submit" name="seat" value="F24">F24</button>
            <button type="submit" name="seat" value="F25">F25</button>
            <button type="submit" name="seat" value="F26">F26</button>
            <button type="submit" name="seat" value="F27">F27</button>
            <button type="submit" name="seat" value="F28">F28</button>
            <button type="submit" name="seat" value="F29">F29</button>
            <button type="submit" name="seat" value="F30">F30</button>
            <button type="submit" name="seat" value="F31">F31</button>
            <button type="submit" name="seat" value="F32">F32</button>
            <button type="submit" name="seat" value="F34">F34</button>
            <button type="submit" name="seat" value="F35">F35</button>
            <button type="submit" name="seat" value="F36">F36</button>
            <button type="submit" name="seat" value="F37">F37</button>
            <button type="submit" name="seat" value="F38">F38</button>
            <button type="submit" name="seat" value="E21">E21</button>
            <button type="submit" name="seat" value="E22">E22</button>
            <button type="submit" name="seat" value="E23">E23</button>
            <button type="submit" name="seat" value="E24">E24</button>
            <button type="submit" name="seat" value="E25">E25</button>
            <button type="submit" name="seat" value="E26">E26</button>
            <button type="submit" name="seat" value="E27">E27</button>
            <button type="submit" name="seat" value="E28">E28</button>
            <button type="submit" name="seat" value="E29">E29</button>
            <button type="submit" name="seat" value="E30">E30</button>
            <button type="submit" name="seat" value="E31">E31</button>
            <button type="submit" name="seat" value="E32">E32</button>
            <button type="submit" name="seat" value="E33">E34</button>
            <button type="submit" name="seat" value="E35">E35</button>
            <button type="submit" name="seat" value="E36">E36</button>
            <button type="submit" name="seat" value="E37">E37</button>
            <button type="submit" name="seat" value="E38">E38</button>
            <button type="submit" name="seat" value="D21">D21</button>
            <button type="submit" name="seat" value="D22">D22</button>
            <button type="submit" name="seat" value="D23">D23</button>
            <button type="submit" name="seat" value="D24">D24</button>
            <button type="submit" name="seat" value="D25">D25</button>
            <button type="submit" name="seat" value="D26">D26</button>
            <button type="submit" name="seat" value="D27">D27</button>
            <button type="submit" name="seat" value="D28">D28</button>
            <button type="submit" name="seat" value="D29">D29</button>
            <button type="submit" name="seat" value="D30">D30</button>
            <button type="submit" name="seat" value="D31">D31</button>
            <button type="submit" name="seat" value="D32">D32</button>
            <button type="submit" name="seat" value="D34">D34</button>
            <button type="submit" name="seat" value="D35">D35</button>
            <button type="submit" name="seat" value="D36">D36</button>
            <button type="submit" name="seat" value="D37">D37</button>
            <button type="submit" name="seat" value="D38">D38</button>
        </div>
        <div class="buttonBox8 colorButton" method="post">
            <button type="submit" name="seat" value="C21">C21</button>
            <button type="submit" name="seat" value="C22">C22</button>
            <button type="submit" name="seat" value="C23">C23</button>
            <button type="submit" name="seat" value="C24">C24</button>
            <button type="submit" name="seat" value="C25">C25</button>
            <button type="submit" name="seat" value="C26">C26</button>
            <button type="submit" name="seat" value="C27">C27</button>
            <button type="submit" name="seat" value="C28">C28</button>
            <button type="submit" name="seat" value="C29">C29</button>
            <button type="submit" name="seat" value="C30">C30</button>
            <button type="submit" name="seat" value="C31">C31</button>
            <button type="submit" name="seat" value="C32">C32</button>
            <button type="submit" name="seat" value="C34">C34</button>
            <button type="submit" name="seat" value="C35">C35</button>
            <button type="submit" name="seat" value="C36">C36</button>
            <button type="submit" name="seat" value="C37">C37</button>
            <button type="submit" name="seat" value="C38">C38</button>
            <button type="submit" name="seat" value="B21">B21</button>
            <button type="submit" name="seat" value="B22">B22</button>
            <button type="submit" name="seat" value="B23">B23</button>
            <button type="submit" name="seat" value="B24">B24</button>
            <button type="submit" name="seat" value="B25">B25</button>
            <button type="submit" name="seat" value="B26">B26</button>
            <button type="submit" name="seat" value="B27">B27</button>
            <button type="submit" name="seat" value="B28">B28</button>
            <button type="submit" name="seat" value="B29">B29</button>
            <button type="submit" name="seat" value="B30">B30</button>
            <button type="submit" name="seat" value="B31">B31</button>
            <button type="submit" name="seat" value="B32">B32</button>
            <button type="submit" name="seat" value="B34">B34</button>
            <button type="submit" name="seat" value="B35">B35</button>
            <button type="submit" name="seat" value="B36">B36</button>
            <button type="submit" name="seat" value="B37">B37</button>
            <button type="submit" name="seat" value="B38">B38</button>
            <button type="submit" name="seat" value="A21">A21</button>
            <button type="submit" name="seat" value="A22">A22</button>
            <button type="submit" name="seat" value="A23">A23</button>
            <button type="submit" name="seat" value="A24">A24</button>
            <button type="submit" name="seat" value="A25">A25</button>
            <button type="submit" name="seat" value="A26">A26</button>
            <button type="submit" name="seat" value="A27">A27</button>
            <button type="submit" name="seat" value="A28">A28</button>
            <button type="submit" name="seat" value="A29">A29</button>
            <button type="submit" name="seat" value="A30">A30</button>
            <button type="submit" name="seat" value="A31">A31</button>
            <button type="submit" name="seat" value="A32">A32</button>
            <button type="submit" name="seat" value="A34">A34</button>
            <button type="submit" name="seat" value="A35">A35</button>
            <button type="submit" name="seat" value="A36">A36</button>
            <button type="submit" name="seat" value="A37">A37</button>
            <button type="submit" name="seat" value="A38">A38</button>
        </div>
        </div>
        <div class="text5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
    </div>
    
</div>

<?php
$stmt3 = $mysqli->prepare("SELECT `name`,`comment` FROM `comments` WHERE `comment_category` = (SELECT `Airline` FROM `airports/airlines` WHERE `id` = ?)");
// привязывает параметр
$stmt3->bind_param("i", $airline_id);
$stmt3->execute();
$result = $stmt3->get_result();


echo '<div class="custom-rectangle2L">';
echo '    <div class="CommentsPlace">';
echo '        <div class="text3">Travel reviews</div>';

while ($row = $result->fetch_assoc()) {
    // Выводит только блок BestComment внутри цикла
    echo '        <div class="BestComment">';
    echo '            <img src="../images/user_foto.png" alt="Plane places" width="80" height="80">';
    echo '            <div class="CommText">';
    echo '                <h1>' . $row['name'] . '</h1>';
    echo '                <div class="textSize">';
    echo '                    <a>' . $row['comment'] . '</a>';
    echo '                    <div class="rectangle4"></div>';
    echo '                </div>';
    echo '            </div>';
    echo '        </div>';
}
echo '    </div>';
echo '</div>';

$stmt3->close();
$result->close();
?>



</div>

</body>
</html>