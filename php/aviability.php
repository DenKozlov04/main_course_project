<?php
include "aviabilitycode.php";
$ChooseFlight = new ChooseFlight();

// $flightInfo = $ChooseFlight->AddFlightInfo();
$admin_id = $_SESSION['admin_id'];
// $ChooseFlight->AddFlightInfo();
if ($admin_id != 0){
    $visibility = 'visible';
} else {
    $visibility = 'hidden';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="../css/aviability.css" rel="stylesheet">
<script src='../JS/PopUP.js'></script>
<script src='../JS/ChooseTicket.js'></script>
<script src='../JS/giveData.js'></script>
<script src="../JS/sweetalert.min.js"></script>
<script src="../JS/SavedID.js"></script>
<title>Select available flights</title>
</head>
<body>
    
<div class='rectangleHeader'>
    <div class='logorectangle'>
        <a>AVIA</a>
    </div>
</div>
<script>
    const urlParams = new URLSearchParams(window.location.search);
    const alertMessage = urlParams.get('alert');

    if (alertMessage) {
        swal({
            title: 'Error!',
            text: decodeURIComponent(alertMessage),
            icon: 'error',
            button: 'OK'
        });
    }
</script>
<div class='infoText'>
    <a class='Info1'>Choose your flight dates</a>
    <a class='Info2'>Choose dates to see flights and prices</a>
</div>

<div class="scrollable-box">
    <form method="POST">
        <div class="calendar">
            <?php
                $chooseFlight->generateCalendar();
            ?>
        </div>
    </form>
   
</div>
<div class='greyRectangle'></div>
<div class='greyRectangle2'></div>
<div class='greyRectangle3'>
</div>
<div class='input-main-page'>
    <a href="FilteredTickets.php" class="PrevPage">← Back</a>
</div>   
<div class='ticketPlace'>
<div id="popup">
    <div id="popupContent"></div>
</div>
<div id="overlay" onclick="closePopup()"></div>

<?php


// $Airline = $_SESSION['Airline'];

// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['showDate'])) {
//     $selectedDate = $_POST['showDate'];
//     // $_SESSION['selected_ticket_price'] = $T_price;
//     // $_SESSION['selected_ticket_id'] = $id;
//     echo "<div class='ChosenDate'>" . date('d.m.Y', strtotime($selectedDate)) . "</div>";
//     include 'dbconfig.php';



//     // $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);


//     // if ($conn->connect_error) {
//     //     die("Connection failed: " . $conn->connect_error);
//     // }

//     $sql = "SELECT `Airline`, `airport_name`, `ITADA`, `City`, `country`, `T_price`, `arrival_date`, `departure_date`, `arrival_time`, `departure_time`,`id` 
//     FROM `airports/airlines` 
//     WHERE `departure_date` = ? AND `Airline` = ?";
//     $stmt = $conn->prepare($sql);


//     if ($stmt) {
 
//         $stmt->bind_param("ss", $selectedDate, $Airline);
//         $stmt->execute();

 
//         $result = $stmt->get_result();




//         if ($result) {
         
//             if ($result->num_rows > 0) {
                
//                 while ($row = $result->fetch_assoc()) {


//                     // $Airline = $row['Airline'];
//                     $id = $row['id'];
//                     $airport_name = $row['airport_name'];
//                     $ITADA = $row['ITADA'];
//                     $City = $row['City'];
//                     $country = $row['country'];
//                     $T_price = $row['T_price'];
//                     $arrival_date = $row['arrival_date'];
//                     $departure_date = $row['departure_date'];
//                     $arrival_time = date('H:i', strtotime($row['arrival_time']));
//                     $departure_time = date('H:i', strtotime($row['departure_time']));
                    
//    //передаю данные в поп ап      //(country, City, airport_name, ITADA, departure_date, arrival_date, departureTime, arrivalTime, price )
//                 echo "<div class='ticketForm' style='cursor: pointer;' data-price='$T_price' data-id='$id'>
//                 <div class='time'>
//                     <div class='departTime'>$departure_time</div>
//                     <div class='timeGap'></div>
//                     <div class='arrivTime'>$arrival_time</div>
//                 </div>
//                 <div class='ITADA'>
//                     <div class='departITADA'>RIX</div>
//                     <div class='ITADAGap'></div>
//                     <div class='arrivITADA'>$ITADA</div>
//                 </div>
//                 <div class='NOPrice'>no</div>
//                 <div class='Price'>$T_price</div>
//                 <div class='direction'>Tiešais reiss</div>
//                 <a class='allParts' style='cursor: pointer;' onclick='openPopup(\"$country\", \"$City\", \"$airport_name\", \"$ITADA\" , \"$departure_date\" , \"$arrival_date\" , \"$departure_time\" , \"$arrival_time\" , \"$T_price\")'>Lidojuma detaļas</a>
//                 <div class='wayTime'>";
                
//                 $arrival_time_obj = new DateTime($arrival_time);
//                 $departure_time_obj = new DateTime($departure_time);
//                 $difference = $arrival_time_obj->diff($departure_time_obj);
//                 echo $difference->format('%Hh %Imin');

//                 echo "</div>
//                 <div class='line2'></div>
//                 <div class='StyleRect'>
//                     <!-- <div class='grey1'></div> -->
//                     <div class='line1'></div>
//                     <!-- <div class='grey2'></div> -->
//                 </div>
//                 </div>";
//                 }
//                 echo "<a class='flightName'>Rīga (RIX) – $City ($airport_name) ($ITADA)</a>";
//                 echo "<div class='Info3'>Lidojums uz: {$City} ({$ITADA})</div>";
//                 echo "<form class='buttonForm' action='details1.php' method='POST'>
//                         <div class='ButtonPlace'>
//                                 <button class='ContinueButton'>Turpinat</button>
//                                 <div id='price' class='PricePlace'></div>
//                                 <div id='id' class='id'></div>
//                             </div>
//                      </form>";
//                 // echo "<div class='Info3'>Lidojums uz: $City ($ITADA)</div>";
//             } else {
//                 echo "There are no flights on that date:(";
//                 // echo $Airline;
//             }
//         } else {
            
//             echo "ERROR in request " . $stmt->error;
//         }

//         $stmt->close();
//     } else {

//         echo "ERROR in preparing " . $conn->error;
//     }
   

//     $conn->close();
// }

    $chooseFlight->OutputFlight();


?>

</div>

</div>

<div class='AddInfoBox' style="visibility: <?= $visibility ?>">

    <form class='infoForm' action="aviability.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" id="airline_id" name="airline_id" value="<?= isset($_SESSION['airline_id']) ? $_SESSION['airline_id'] : '' ?>">
        <div class='changes'>
            <div class='InfoText5'>
                <a> Add new flights on different dates on the calendar.</a>
            </div>
            <div class='departure_date'>
                <div class='input-departure_date'>
                    <input type="text" id="departure_date" name="departure_date" placeholder="Departure date for example: 2024-01-01">
                </div>
            </div>

            <div class='arrival_date'>
                <div class='input-arrival_date'>
                    <input type="text" id="arrival_date" name="arrival_date" placeholder="Arrival date for example: 2024-02-01">
                </div>
            </div>

            <div class='departure_time'>
                <div class='input-departure_time'>
                    <input type="text" id="departure_time" name="departure_time" placeholder="Departure time for example: 12:30">
                </div>
            </div>

            <div class='arrival_time'>
                <div class='input-arrival_time'>
                    <input type="text" id="arrival_time" name="arrival_time" placeholder="Arrival time for example: 09:00">
                </div>
            </div>

            <div class='price'>
                <div class='input-price'>
                    <input type="text" id="price" name="price" placeholder="Price for example: 100">
                </div>
            </div>
            <div class='upload_changes'>
                <div class='input-create-profile'>
                    <button type="submit" id="submit" name="sumbitflight">Add</button>
                </div>
            </div>
        </div>
    </form>
</div>


</body>
</html>


