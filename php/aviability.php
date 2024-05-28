<?php
include "aviabilitycode.php";
$ChooseFlight = new ChooseFlight();

// $flightInfo = $ChooseFlight->AddFlightInfo();
$admin_id = $_SESSION['admin_id'];
$user_id = $_SESSION['user_id'];
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


