<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="../css/aviability.css" rel="stylesheet">
<script src='../JS/PopUP.js'></script>

<title>documment</title>
</head>
<body>
    
<div class='rectangleHeader'>
    <div class='logorectangle'>
        <a>AVIA</a>
    </div>
    <!-- <a class='flightName'>Rīga (RIX)–Parīze (Charles de Gaulle) (CDG)</a>  -->
</div>
<div class='infoText'>
    <a class='Info1'>Izvēlies lidojumu datumus</a>
    <a class='Info2'>Izvēlies datumus, lai apskatītu lidojumus un cenas</a>
</div>

<div class="scrollable-box">
    <form method="POST">
        <div class="calendar">
            <?php
            session_start();
            $Airline = $_SESSION['Airline'];
            $months = [
                "January 2024", "February 2024", "March 2024", "April 2024",
                "May 2024", "June 2024", "July 2024", "August 2024",
                "September 2024", "October 2024", "November 2024", "December 2024"
            ];

            foreach ($months as $month) {
                echo "<div class='month'>";
                echo "<h3>$month</h3>";
                echo "<div class='days'>";
                $daysInMonth = cal_days_in_month(CAL_GREGORIAN, array_search($month, $months) + 1, 2024);
                for ($i = 1; $i <= $daysInMonth; $i++) {
                    echo "<button type='submit' class='day' name='showDate' value='2024-" . sprintf("%02d", array_search($month, $months) + 1) . "-" . sprintf("%02d", $i) . "'>$i</button>";
                }
                echo "</div></div>";
            }
            ?>
        </div>
    </form>
   
</div>

<div class='greyRectangle'></div>
<div class='greyRectangle2'></div>

<!-- <div class='Info3'>Lidojums uz: Parīze (CDG)</div> -->
<div class='greyRectangle3'>
</div>
<div class='ticketPlace'>

<!-- <div id="popup">
    
    <button onclick="closePopup()">Close</button>
    
    <div id="popupContent">

    </div>
    <div id="overlay" onclick="closePopup()"></div>
</div> -->
<div id="popup">
    <!-- <button onclick="closePopup() class='CloseButton'">X</button> -->
    <div id="popupContent"></div>
</div>
<div id="overlay" onclick="closePopup()"></div>

<?php
$Airline = $_SESSION['Airline'];

// echo $Airline;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['showDate'])) {
    $selectedDate = $_POST['showDate'];
    echo "<div class='ChosenDate'>" . date('d.m.Y', strtotime($selectedDate)) . "</div>";
    include 'dbconfig.php';



    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT `Airline`, `airport_name`, `ITADA`, `City`, `country`, `T_price`, `arrival_date`, `departure_date`, `arrival_time`, `departure_time`,`id` 
    FROM `airports/airlines` 
    WHERE `departure_date` = ? AND `Airline` = ?";
    $stmt = $conn->prepare($sql);


    if ($stmt) {
 
        $stmt->bind_param("ss", $selectedDate, $Airline);
        $stmt->execute();

 
        $result = $stmt->get_result();




        if ($result) {
         
            if ($result->num_rows > 0) {
                
                while ($row = $result->fetch_assoc()) {


                    // $Airline = $row['Airline'];
                    $id = $row['id'];
                    $airport_name = $row['airport_name'];
                    $ITADA = $row['ITADA'];
                    $City = $row['City'];
                    $country = $row['country'];
                    $T_price = $row['T_price'];
                    $arrival_date = $row['arrival_date'];
                    $departure_date = $row['departure_date'];
                    $arrival_time = date('H:i', strtotime($row['arrival_time']));
                    $departure_time = date('H:i', strtotime($row['departure_time']));
                    
   //передаю данные в поп ап      //(country, City, airport_name, ITADA, departure_date, arrival_date, departureTime, arrivalTime, price )
                echo "<div class='ticketForm' style='cursor: pointer;' data-price='$T_price' data-id='$id'>
                <div class='time'>
                    <div class='departTime'>$departure_time</div>
                    <div class='timeGap'></div>
                    <div class='arrivTime'>$arrival_time</div>
                </div>
                <div class='ITADA'>
                    <div class='departITADA'>RIX</div>
                    <div class='ITADAGap'></div>
                    <div class='arrivITADA'>$ITADA</div>
                </div>
                <div class='NOPrice'>no</div>
                <div class='Price'>$T_price</div>
                <div class='direction'>Tiešais reiss</div>
                <a class='allParts' style='cursor: pointer;' onclick='openPopup(\"$country\", \"$City\", \"$airport_name\", \"$ITADA\" , \"$departure_date\" , \"$arrival_date\" , \"$departure_time\" , \"$arrival_time\" , \"$T_price\")'>Lidojuma detaļas</a>
                <div class='wayTime'>";
                
                $arrival_time_obj = new DateTime($arrival_time);
                $departure_time_obj = new DateTime($departure_time);
                $difference = $arrival_time_obj->diff($departure_time_obj);
                echo $difference->format('%Hh %Imin');

                echo "</div>
                <div class='line2'></div>
                <div class='StyleRect'>
                    <!-- <div class='grey1'></div> -->
                    <div class='line1'></div>
                    <!-- <div class='grey2'></div> -->
                </div>
                </div>";

                }
                echo "<a class='flightName'>Rīga (RIX) – $City ($airport_name) ($ITADA)</a>";
                echo "<div class='Info3'>Lidojums uz: {$City} ({$ITADA})</div>";
                echo "<div class='ButtonPlace'>
                        <button class='ContinueButton'>Turpinat</button>
                        <div id='PricePlace'class='PricePlace'></div>
                        <div id='idPlace'class='id'></div>
                    </div>";
                // echo "<div class='Info3'>Lidojums uz: $City ($ITADA)</div>";
            } else {
                echo "There are no flights on that date:(";
                // echo $Airline;
            }
        } else {
            
            echo "ERROR in request " . $stmt->error;
        }

        $stmt->close();
    } else {

        echo "ERROR in preparing " . $conn->error;
    }


    $conn->close();
}
?>



<!-- <div class = 'ticketForm'>
<div class='time'>
        <div class='departTime'>12:30</div>
        <div class='timeGap'></div>
        <div class='arrivTime'>14:30</div>
    </div>
    <div class='ITADA'>
        <div class = 'departITADA'>RIX</div>
        <div class='ITADAGap'></div>
        <div class = 'arrivITADA'>CMN</div>
    </div>
    <div class = 'NOPrice'>no</div>
    <div class = 'Price'>219.99$</div>
    <div class = 'direction'>Tiešais reiss</div>
     <div class = 'allParts'>Lidojuma detaļas</div> -->
    <!-- <div class = 'wayTime'>16h 05min</div>
    <div class = 'line2'></div>
    <div class = 'StyleRect'> -->
            <!-- <div class = 'grey1'></div> -->
            <!-- <div class = 'line1'></div> -->
            <!-- <div class = 'grey2'></div> -->
    <!-- </div>  -->

</div>

</div>



</body>
</html>


