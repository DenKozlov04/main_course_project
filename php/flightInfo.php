<?php
session_start();

include 'dbconfig.php';

if ($mysqli->connect_error) {
    die("Connection ERROR: " . $mysqli->connect_error);
}

$airline_id = $_POST['airline_id'];


$stmt = $mysqli->prepare("SELECT `Airline`,`City`, `T_price`, `googleMapsLink` FROM `airports/airlines` WHERE `id` = ?");
$stmt->bind_param("i", $airline_id);
$stmt->execute();
$stmt->bind_result($Airline,$city, $t_price, $google_maps_link);

if ($stmt->fetch()) {
    $_SESSION['Airline'] = $Airline; 

    $stmt->close();

    $stmt2 = $mysqli->prepare("SELECT `flight_image`, `description` FROM `airflight_description` WHERE `flight_id` = ?");
    $stmt2->bind_param("i", $airline_id);
    $stmt2->execute();
    $stmt2->bind_result($flight_image, $description);

    if ($stmt2->fetch()) {

    } else {
        echo "No data";
    }

    $stmt2->close();
} else {
    echo "No data";
}



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
<div class='rectangleHeader'>
    <div class='logorectangle'>
        <a>AVIA</a>
    </div>
    
    <div class='ButtonRect'>
         <a href="">Familiarize yourself with your arrival location .</a>
      
    </div> 
  
    <div class="custom-rectangle">
        <div class="custom-rectangle2"></div>
        <iframe class="GoogleMap" src="<?= $google_maps_link; ?>"
        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </iframe>
    <?php
        
        $prevPage = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
        $filteredTicketsPage = '/php/FilteredTickets.php';

        if (strpos($prevPage, $filteredTicketsPage) !== false) {
            
            echo '<div class="PrevPage"><a href="../php/FilteredTickets.php">← Back to page</a></div>';
        } else {
   
        }
    ?>
    <div class="Image">
        <img src="data:image/jpeg;base64,<?=  base64_encode($flight_image); ?>" alt="Dubai Image">
    </div>
    <div class="text1"><?= $city; ?></div>
    <div class="text2"><?= $description; ?></div>

<form id="orderForm" method='POST' action='aviability.php'>
    <input type="hidden" id="airline_id" name="airline_id" value="<?= $airline_id ?>">
    <button class="button1" type='submit'>Order</button>
</form>
<script src="../JS/SavedID.js"></script>



</div>

</div>
<div class="text3">Travel reviews</div>
<?php
$stmt3 = $mysqli->prepare("SELECT `name`,`comment` FROM `comments` WHERE `comment_category` = (SELECT `Airline` FROM `airports/airlines` WHERE `id` = ?)");

$stmt3->bind_param("i", $airline_id);
$stmt3->execute();
$result = $stmt3->get_result();


echo '<div class="scrollable-box">';

while ($row = $result->fetch_assoc()) {
    
    echo '        <div class="comment-container">';
    echo '            <img class="UserImg2" src="../images/user_foto.png" alt="Plane places">';
    echo '            <div class="name2">';
    echo '                <a>' . $row['name'] . '</a>';
    echo '            </div>';
    echo '            <div class="comment-text">';
    echo '                <a>' . $row['comment'] . '</a>';
    echo '            </div>';
    echo '        </div>';
}

echo '</div>';


$stmt3->close();
$result->close();
?>



</div>
<footer>
    <div class="footer-content">
        <p>&copy; 2023 AVIA. All rights reserved..</p>
        <p>Follow us on social media:</p>
        <ul class="social-links">
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Instagram</a></li>
        </ul>
    </div>
</footer>
</body>
</html>