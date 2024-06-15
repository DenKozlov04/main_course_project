<?php
include 'ChooseChildrenSeat.php';
include 'BigPopUpOutput.php';

$Childdelete = new AddInfo();

$AddChildInfo = $Childdelete->AddChildInfo();
$childInfo = $Childdelete->displayChildInfo();
$DeleteChild = $Childdelete->DeleteChildren();

$Childdelete->displayChildInfo();

$childInfo = $Childdelete->displayChildInfo();



if (isset($_SESSION['Name']) && isset($_SESSION['Surname']) && isset($_SESSION['Nationality']) &&
    isset($_SESSION['Gender']) && isset($_SESSION['Email']) && isset($_SESSION['Phone_Number']) &&
    isset($_SESSION['Passport_number']) && isset($_SESSION['passportIssuedDate']) &&
    isset($_SESSION['passportExpirationDate']) && isset($_SESSION['Issued_country_passport']) &&
    isset($_SESSION['condition']) && isset($_SESSION['ticketCode']) && isset($_SESSION['LuggageСabin']) && isset($_SESSION['LuggageСompartment'])) {

    $name = $_SESSION['Name'];
    $surname = $_SESSION['Surname'];
    $nationality = $_SESSION['Nationality'];
    $gender = $_SESSION['Gender'];
    $Email = $_SESSION['Email'];
    $Phone_Number = $_SESSION['Phone_Number'];
    $Passport_number = $_SESSION['Passport_number'];
    $passportIssuedDate = $_SESSION['passportIssuedDate'];
    $passportExpirationDate = $_SESSION['passportExpirationDate'];
    $country = $_SESSION['Issued_country_passport'];
    $condition = $_SESSION['condition'];
    $ticketCode = $_SESSION['ticketCode'];
    $LuggageСabin = $_SESSION['LuggageСabin'];
    $LuggageСompartment = $_SESSION['LuggageСompartment'];
  
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmTicket'])) {
    $user_id = $_SESSION['user_id'];
    $airlines_id = $_SESSION['id'];
    $seat = $_SESSION['seat'];
    $totalPrice = $_SESSION['LastPrice']; 
    foreach ($childInfo as $child): 
        $additionalPrice = (!empty($child['seatprice'])) ? str_replace('€', '', $child['seatprice']) : 0;
        $totalPrice += $additionalPrice; 
    endforeach; 

    $condition = $_SESSION['condition'];
    $code = $_SESSION['ticketCode'];

    $stmt = $mysqli->prepare("INSERT INTO `tickets` (`user_id`, `airlines_id`, `Seat`, `price`, `сondition`, `code`) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iisdss", $user_id, $airlines_id, $seat, $totalPrice , $condition, $code);
    $stmt->execute();

    $stmt = $mysqli->prepare("INSERT INTO `user_details` (`Name`, `Surname`, `Nationality`, `Gender`, `Phone_number`, `Passport_number`, `Passport_issued_date`, `Passport_expiration_date`, `Issued_country_passport`, `user_id`, `created_at`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, now())");
    $stmt->bind_param("sssssssssi", $name, $surname, $nationality, $gender, $Phone_Number, $Passport_number, $passportIssuedDate, $passportExpirationDate, $country, $user_id);
    $stmt->execute();

    $stmt = $mysqli->prepare("UPDATE `users` SET `email` = ? WHERE `user_id` = ?");
    $stmt->bind_param("si", $Email, $user_id);
    $stmt->execute();

    echo "<meta http-equiv='refresh' content='0;url=index.php?'>";
    exit();
}

?>
<?php 
    $totalPrice = $_SESSION['LastPrice']; 
    foreach ($childInfo as $child): 
        $additionalPrice = (!empty($child['seatprice'])) ? str_replace('€', '', $child['seatprice']) : 0;
        $totalPrice += $additionalPrice; 
    endforeach; 
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm your ticket</title>
    <link rel="stylesheet" type="text/css" href="../css/ticketСonfirmation.css">
    <script src="../JS/sweetalert.min.js"></script>
    <script src="../php/alertscripts.php"></script>
    <script src='../JS/OpenInfoPopUp.js'></script>
</head>
<body>

<div class='rectangleHeader'>
    <div class='logorectangle'>
        <a>AVIA</a>
    </div>
    <a class='flightName'><?= "Rīga (RIX) – {$_SESSION['City']} ({$_SESSION['airport_name']}) ({$_SESSION['ITADA']})"; ?></a>

    <img class='CartImg'src='../images/free-icon-grocery-store-7205450.png'>
    <div class='price'><?=  $totalPrice  .'€'  ?></div>    


    <div class='InfoBox'>
        <a class='Info'>Verify your ticket before purchasing.</a>
        <a class='Info2'>Add a child if necessary.</a>
    </div>
    <a class='Info3'><?="✈ Rīga – {$_SESSION['City']} ({$_SESSION['airport_name']})"?></a>
    <a class='Info4'><?="{$_SESSION['formattedDepartDate'] }. &bull;  {$_SESSION['departure_time']} - {$_SESSION['arrival_time']}"?></a>
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
    </script>
    <div class="AcceptBox">
    <h2>Confirm Your Ticket</h2>
    <div class="ticket-info">
   
        <p>Ticket type: <?= $_SESSION['class'] ?></p>
        <p>Flight: <?= $_SESSION['City'] ?> (<?= $_SESSION['airport_name'] ?>) - Rīga (RIX)</p>
        <p>Departure date: <?= $_SESSION['departure_date'] ?></p>
        <p>Arrival date: <?= $_SESSION['arrival_date'] ?></p>
        <p>Departure Time: <?= $_SESSION['departure_time'] ?></p>
        <p>Arrival Time: <?= $_SESSION['arrival_time'] ?></p>
        <p>Seat: <?= $_SESSION['seat'] ?></p>
        <p>Price: <?= $totalPrice ?>€</p>
        <p>Luggage Cabin: <?= $_SESSION['LuggageСabin'], ' x 8kg' ?></p>
        <p>Luggage Compartment: <?= $_SESSION['LuggageСompartment'], ' x 24kg'?></p>
        <p>Children:</p>
    </div>
    <form method="POST" action="">
        <input type="hidden" name="class" value="<?= $_SESSION['class'] ?>">
        <input type="hidden" name="LuggageСabin" value="<?= $_SESSION['LuggageСabin'] ?>">
        <input type="hidden" name="LuggageСompartment" value="<?= $_SESSION['LuggageСompartment'] ?>">
        <button class="accept-btn" name="confirmTicket" id="confirmTicketButton">Confirm your ticket</button>
    </form>
</div>
    <div class='RezBox5'>
                <div class='GreyPlc'>
                <div class='Infotxt1'>Children and youth registration (2-16 years)A separate ticket for an adult child</div>
                </div>
                <form class='AddChildrenForm' action="ticketСonfirmation.php" method='POST'>
                    <input type='hidden' name='AddChild'>
                    <label for="AddChildrenName">Child's name</label>
                    <input name='AddChildrenName' value="" placeholder="Child's name"><br>

                    <label for="AddChildrenSurname">Child's surname</label>
                    <input name="AddChildrenSurname" value="<?= htmlspecialchars($surname) ?>" placeholder="Child's surname"><br>
                    <label for="AddChildrenGender">Gender</label>
                    <select id="gender" name="AddChildrenGender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="N/M">N/M</option>
                    </select><br>

                    <label for="AddChildrenNationality">Nationality</label>
                    <input type="text" id="nationality" name="AddChildrenNationality" placeholder="Latvian"><br>
                    <div class='AddChildrenDiv'>
                        <label for="AddChildrenPassNumber">Passport number</label>
                        <input type="text" id="Passport_number" name="AddChildrenPassNumber" placeholder="XXXXXXX (The length of the passport number may vary depending on the country of issue)" style="width: 640px;"><br>

                        <label for="AddChildrenpassIssuedDate">Date of issue of the passport</label>
                        <input type="date" id="passportIssuedDate" name="AddChildrenpassIssuedDate" placeholder="YYYY-MM-DD"><br>

                        <label for="AddChildrenpassExpirationDate">Date of withdrawal</label>
                        <input type="date" id="passportExpirationDate" name="AddChildrenpassExpirationDate" placeholder="YYYY-MM-DD"><br>

                        <input type="hidden" id="AddChildrenPrice" name="AddChildrenPrice" readonly>
                        <input type="hidden" id="AddChildrenPlaceName" name="AddChildrenPlaceName" readonly>



                        <button name='AddChildrenBtn' type='submit' class="add-btn" style="visibility: <?= $flightInfo['visibility']?>">Add Child</button>
                    </div>
                </form>
                    <div class=ScrollBox>
                                <table class="table1">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Gender</th>
                                        <th>Nationality</th>
                                        <th>Seat</th>
                                        <th>Seat Price</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($childInfo as $child): ?>
                                        
                                        <tr>
                                            <td><?= $child['Name'] ?></td>
                                            <td><?= $child['Surname'] ?></td>
                                            <td><?= $child['Gender'] ?></td>
                                            <td><?= $child['Nationality'] ?></td>
                                            <td><?= $child['seat'] ?></td>
                                            <td><?= $child['seatprice'] ?></td>
                                            <td>
                                                <form class='DeleteForm' action="ticketСonfirmation.php" method='POST'>
                                                    <input type='hidden' name='DeleteChildren'>
                                                    <input type='hidden' name='child_id' value='<?= $child['children_id'] ?>'> 
                                                    <button name='DeleteChildrenBtn' type='submit' class="downloadBtn2" style="visibility: <?= $userInfo['visibility']?>">Delete</button>
                                                </form> 
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                </div>
                </div>
            <button name='Btn'onclick="openModal('modal7')" type='submit' class="downloadBtn3" style="visibility: <?= $flightInfo['visibility']?>">Open the seat selection.</button>
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