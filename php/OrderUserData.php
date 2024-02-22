<?php
session_start();


$user_id = $_SESSION['user_id'];
$admin_id = $_SESSION['admin_id'];

if(isset($_GET['buttonValue'])) {
    // получаю значение из URL
    $alert = '';
    $buttonValue = $_GET['buttonValue'];
    if($buttonValue === 0){
        $alert = "test";
    }
    echo "Received buttonValue: " . $buttonValue;

} 

echo $user_id;
echo $admin_id;
?>
   

<script>

</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalize your reservation</title>
    <link rel="stylesheet" type="text/css" href="../css/OrderUserData.css">
    <script src="../JS/sweetalert.min.js"></script>
    <script src="../php/alertscripts.php"></script>
</head>
<body>
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

                <div class = 'Formtext5'>2.Contact information:</div>

                <div id="user-info-form">
                    <label for="name">Email</label>
                    <input type="text" id="Email" name="Email" placeholder="user email">

                    <label for="surname">Phone Number</label>
                    <input type="text" id="Phone Number" name="Phone Number" placeholder="user phone number">
                </div>
                
                <div class = 'Formtext5'>3.Passport details:</div>

                <div id="user-info-form">
                    <label for="name">Passport number</label>
                    <input type="text" id="Passport number" name="Passport number" placeholder="XXXXXXX(The length of the passport number may vary depending on the country of issue)">

                    <div id="user-info-form-lined">
                        <div class="form-group">
                            <label for="passportIssuedDate">Passport Issued Date:</label>
                            <input type="text" id="passportIssuedDate" name="passportIssuedDate" placeholder="YYYY-MM-DD">
                        </div>

                        <div class="form-group">
                            <label for="passportExpirationDate">Passport Expiration Date:</label>
                            <input type="text" id="passportExpirationDate" name="passportExpirationDate" placeholder="YYYY-MM-DD">
                        </div>
                        </div>

                    
                    <label for="surname">Country that issued the passport</label>
                    <input type="text" id="Phone Number" name="Phone Number" placeholder="Latvija">

                </div>

                <form method='POST' action=''>
                    <button class="submitButton" type='submit'>Send and pay</button>
                </form>
                <p class="infotext">!!! Please do not enter real data, this site is only a project and not a real place to buy tickets !!!</p>

            </div>
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

