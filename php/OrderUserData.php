<?php
include "InfoOutput4.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalize your reservation</title>
    <link rel="stylesheet" type="text/css" href="../css/OrderUserData.css">
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
    <div class='price'><?= $_SESSION['LastPrice'] .'€'  ?></div>
 
    <div class='InfoBox'>
        <a class='Info'>Choose the ticket type that's right for you</a>
        <a class='Info2'>Price is per passenger</a>
    </div>
    <a class='Info3'><?="✈ Rīga – {$_SESSION['City']} ({$_SESSION['country']})"?></a>
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
    <form action='' method='POST'>
        <div class='FormRectangle'>
            <div class = 'Formtext1'>Finalize your reservation</div>
            <div class = 'Formtext2'>Please complete the form below to finalize your 
                reservation and guarantee your seat on the flight. Your personal data 
                is required to create your airline ticket 
                and to ensure the wholehearted security of your flight. We ensure the privacy and security of your 
                data by following all standards and requirements. It will only take a 
                few minutes to fill out the form and then you can easily pay for your chosen services. </div>
                <div class = 'UserDataForm'>
                    <div class = 'Formtext3'>Thank you for your attention and we look forward to seeing you on board!</div>
                    <div class = 'Formtext4'>1.Information about passenger:</div>
                    <div id="user-info-form">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" placeholder="Your real name">

                        <label for="surname">Surname</label>
                        <input type="text" id="surname" name="surname" placeholder="Your real surname">

                        <label for="gender">Gender</label>
                        <select id="gender" name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="N/M">N/M</option>
                        </select>

                        <label for="nationality">Nationality</label>
                        <input type="text" id="nationality" name="nationality" placeholder="Latvian">
                    </div>

                    <div class = 'Formtext6'>2.Contact information:</div>

                    <div id="user-info-form2">
                        <label for="name">Email</label>
                        <input type="text" id="Email" name="Email" value=<?= $email ?> placeholder="user email">

                        <label for="surname">Phone Number</label>
                        <input type="text" id="Phone_Number" name="Phone_Number"  placeholder="user phone number">
                    </div>

                    <div class = 'Formtext7'>3.Passport details:</div>

                    <div id="user-info-form3">
                        <label for="name">Passport number</label>
                        <input type="text" id="Passport_number" name="Passport_number" placeholder="XXXXXXX (The length of the passport number may vary depending on the country of issue)" style="width: 640px;">


                        <div id="user-info-form3-lined">
                            <div class="form-group">
                                <label for="passportIssuedDate">Passport Issued Date:</label>
                                <input type="date" id="passportIssuedDate" name="passportIssuedDate" placeholder="YYYY-MM-DD">
                            </div>

                            <div class="form-group">
                                <label for="passportExpirationDate">Passport Expiration Date:</label>
                                <input type="date" id="passportExpirationDate" name="passportExpirationDate" placeholder="YYYY-MM-DD">
                            </div>
                            </div>

                        
                        <label for="surname">Country that issued the passport</label>
                        <input type="text" id="Issued_country_passport" name="Issued_country_passport" placeholder="Latvija">

                    </div>

                    <form class='buttonForm' method='POST' action=''>
                    <input type="hidden" name="Name" value="<?= $_SESSION['Name']; ?>">
                    <input type="hidden" name="Surname" value="<?= $_SESSION['Surname']; ?>">
                    <input type="hidden" name="Nationality" value="<?= $_SESSION['Nationality']; ?>">
                    <input type="hidden" name="Gender" value="<?= $_SESSION['Gender']; ?>">
                    <input type="hidden" name="Email" value="<?= $_SESSION['Email']; ?>">
                    <input type="hidden" name="Phone_Number" value="<?= $_SESSION['Phone_Number']; ?>">
                    <input type="hidden" name="Passport_number" value="<?= $_SESSION['Passport_number']; ?>">
                    <input type="hidden" name="passportIssuedDate" value="<?= $_SESSION['passportIssuedDate']; ?>">  
                    <input type="hidden" name="passportExpirationDate" value="<?= $_SESSION['passportExpirationDate']; ?>">
                    <input type="hidden" name="country" value="<?= $_SESSION['Issued_country_passport']; ?>">
                    <input type="hidden" name="condition" value="<?= $_SESSION['condition']; ?>">
                    <input type="hidden" name="ticketCode" value="<?= $_SESSION['ticketCode']; ?>">

                    <input type="hidden" name="id2" value="<?= $_SESSION['id']; ?>">
                    <input type="hidden" name="plusPrice3" id="PriceField3" value="<?= $_SESSION['LastPrice'] ?>">
                    <input type="hidden" name="SeatPlace" id="SeatPlace" value="<?= $_SESSION['seat'] ?>">
                    <input type="hidden" name="class" value="<?= $_SESSION['class'] ?>">
                    <input type="hidden" name="LuggageСabin" value="<?= $_SESSION['LuggageСabin'] ?>">
                    <input type="hidden" name="LuggageСompartment" value="<?= $_SESSION['LuggageСompartment'] ?>">
                        <button class="submitButton" type='submit' name='cardType2'>Continue</button>
                    </form>
                    <p class="infotext">!!! Please do not enter real data, this site is only a project and not a real place to buy tickets !!!</p>
 
                </div>
        </div>
    </form>

   
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