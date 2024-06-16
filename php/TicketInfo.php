<?php
include 'TicketInfoCode.php';

$displayInfo = new TicketInfo();
$Info = $displayInfo->displayInfo();


?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/TicketInfo.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='../JS/OpenInfoPopUp.js'></script>

    <title>Your ticket details</title>
</head>

<body>

<div class="a4-ticket">
        <div class="header">
            <h1 class="bp" >BOARDING PASS</h1>
            <h1 class="avia">AVIA</h1>
        </div>
        <div class="ticket-info">
            <p><strong>TICKET CODE: <?=$Info['TicketInfo']['code']; ?></strong></p>
        <h2>FLIGHT DATA</h2>
        </div>
        <div class="Blackline">
        </div>
        <div class="flight-data">
            <table class="table1">
                <thead>
                    <tr>
                        <th>Passenger Name:</th>
                        <th>Surname:</th>
                        <th>Nationality:</th>
                        <th>Passport Number:</th>
                        <th>Total price:</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?=$Info['userInfo']['Name']; ?></td>
                        <td><?=$Info['userInfo']['Surname']; ?></td>
                        <td><?=$Info['userInfo']['Nationality']; ?></td>
                        <td><?=$Info['userInfo']['Passport_number']; ?></td>
                        <td><?=$Info['TicketInfo']['price']; ?></td>
                    </tr>
                </tbody>
            </table>
            <table class="table2">
            <thead>
                <tr>
                    <th>Children Name:</th>
                    <th>Surname:</th>
                    <th>Passport Number:</th>
                    <th>Child seat:</th>
                    <th>Included price:</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Info['ChildrenInfo'] as $child): ?>
                    <tr>
                        <td><?=$child['Name']; ?></td>
                        <td><?=$child['Surname']; ?></td>
                        <td><?=$child['Passport_number']; ?></td>
                        <td><?=$child['seat']; ?></td>
                        <td><?=$child['seatprice']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        </div>

        <div class="route-info">
            <h2>ROUTE INFORMATION</h2>
        </div>
        <div class="Blackline2">
        </div>
        <div class="flight-data2">
        <table class="table3">
            <tbody>
                <tr>
                    <td><strong>Class:</strong></td>
                    <td><?=$_SESSION['class']; ?></td>
                    <td><strong>Flight:</strong></td>
                    <td><?=$Info['AirlineInfo']['Airline']; ?></td>
                </tr>
                <tr>
                    <td><strong>Seat:</strong></td>
                    <td><?=$Info['TicketInfo']['Seat']; ?></td>
                    <td><strong>City:</strong></td>
                    <td><?=$Info['AirlineInfo']['City']; ?></td>
                </tr>
                <tr>
                    <td><strong>Luggage Compartment:</strong></td>
                    <td><?= $_SESSION['LuggageСompartment'],' x 24kg' ?></td> 
                    <td><strong>Airport:</strong></td>
                    <td><?=$Info['AirlineInfo']['airport_name']; ?></td>
                </tr>
                <tr>
                    <td><strong>Luggage Cabin:</strong></td>
                    <td><?= $_SESSION['LuggageСabin'],' x 8kg' ?></td> 
                    <td><strong>ITADA:</strong></td>
                    <td><?=$Info['AirlineInfo']['ITADA']; ?></td>
                </tr>
                <tr>
                    <td><strong>Departure date:</strong></td>
                    <td><?=$Info['TicketInfo2']['departure_date']; ?></td>
                    <td><strong>Arrival date:</strong></td>
                    <td><?=$Info['TicketInfo2']['arrival_date']; ?></td>

                </tr>
                <tr>
                    <td><strong>Departure Time:</strong></td>
                    <td><?=$Info['TicketInfo2']['departure_time']; ?></td>
                    <td><strong>Arrival Time:</strong></td>
                    <td><?=$Info['TicketInfo2']['arrival_time']; ?></td>
                </tr>


            </tbody>
        </table>


    <div class="class-info">
            <h2>CLASS INFORMATION</h2>
        </div>
        <div class="Blackline3">
        </div>
        <div class="classDiv">
            <h1 class="class" ><?=$_SESSION['class']; ?></h1>
        </div>
        <?=$TicketBuff; ?>
</div>
<div class="LastText">
            <p class='StrokeText'>Please remember to bring the following with you:</p>
            <p>
            <a class='StrokeText'>1)</a> Identification (passport).
            <a class='StrokeText'>2)</a> Printed ticket.
            <a class='StrokeText'>3)</a> Child's documents (birth certificate if the child is under 14 years old).
            <a class='StrokeText'>4)</a> Authorization for the child to travel if they are traveling with another accompanying person.
            <a class='StrokeText'>5)</a> Visa, if required for the destination country.
            <a class='StrokeText'>6)</a> We wish you a pleasant flight!
            </p>
</div>

    </div>
</body>
</html>