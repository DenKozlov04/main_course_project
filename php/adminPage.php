<?php
session_start();

if (isset($_SESSION['admin_id'])) {
    include 'dbconfig.php';

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/adminPage.css" rel="stylesheet">
    <title>Admin page</title>
</head>
<body>
<div class='rectangleHeader'>
    <div class='logorectangle'>
        <a>AVIA</a>
    </div>
    <div class='ButtonRect'>
        <a>This is your main admin page. This is where you can add Flights. Edit and delete on another page!</a>
    </div>
    <div class='input-main-page'>
        <a href="index.php" class="PrevPage">← On the main page</a>
    </div>
    <div class='Text4'>
        <a>Add flight form</a>
    </div>
    <div class='BigRect'>
        <form action="../php/admin.php" method="POST" enctype="multipart/form-data">
            <div class='changes'>
                <div class='Airline'>
                    <div class='input-Airline'>
                        <input type="text" id="Airline" name="Airline" placeholder="Airline name for example: Riga - London">
                    </div>
                </div>

                <div class='airport_name'>
                    <div class='input-airport_name'>
                        <input type="text" id="airport_name" name="airport_name" placeholder="Write airport name for example: Heathrow Airport">
                    </div>
                </div>

                <div class='ITADA'>
                    <div class='input-ITADA'>
                        <input type="text" id="ITADA" name="ITADA" placeholder="Write ITADA code for example: LHR">
                    </div>
                </div>

                <div class='City'>
                    <div class='input-City'>
                        <input type="text" id="City" name="City" placeholder="Write airport City for example: London">
                    </div>
                </div>

                <div class='country'>
                    <div class='input-country'>
                        <input type="text" id="country" name="country" placeholder="Write airport country for example: United Kingdom">
                    </div>
                </div>

                <div class='T_price'>
                    <div class='input-T_price'>
                        <input type="text" id="T_price" name="T_price" placeholder="Write ticket price for example: 200€">
                    </div>
                </div>

                <div class='departure_date'>
                    <div class='input-departure_date'>
                        <input type="text" id="departure_date" name="departure_date" placeholder="Write departure date for example: 2024-04-01">
                    </div>
                </div>

                <div class='arrival_date'>
                    <div class='input-arrival_date'>
                        <input type="text" id="arrival_date" name="arrival_date" placeholder="Write arrival date for example: 2024-05-01">
                    </div>
                </div>

                <div class='departure_time'>
                    <div class='input-arrival_date'>
                        <input type="text" id="departure_time" name="departure_time" placeholder="Write departure time for example: 12:30:00">
                    </div>
                </div>

                <div class='arrival_time'>
                    <div class='input-arrival_date'>
                        <input type="text" id="arrival_time" name="arrival_time" placeholder="Write arrival time for example: 13:30:00">
                    </div>
                </div>



                <div class='googleMapsLink'>
                    <div class='input-googleMapsLink'>
                        <textarea type="text" id="googleMapsLink" name="googleMapsLink" placeholder="Insert a link to the location on Google Maps (you can obtain it by opening the Google Maps website, clicking on the link/code, and selecting the code (!!copy only the link itself!!) without additional code."></textarea>
                    </div>
                </div>

                <div class='description'>
                    <div class='input-description'>
                        <textarea id="description" name="description" placeholder="Write your description here...!!!DON'T USE THESE ( ' ) SIGN"></textarea>
                    </div>
                </div>

                <div class='text2'>
                    <a>Add a picture of the arrival location for the airplane flight.</a>
                </div>
                <input class='AirlineImg' type="file" id="image1" name="image1">

                <div class='upload_changes'>
                    <div class='input-create-profile'>
                        <button type="submit" id="submit" name="submit">Add Flight</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class='UserTables'>
<div class='Text5'>
        <a>Info tables</a>
    </div>
    <?php include 'showinfo.php'; ?>
</div>

</body>
</html>
