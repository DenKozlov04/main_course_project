<?php 
    // include 'download_pdf.php';
    include 'UserInfoOutput.php';
    include 'ChooseChildrenSeat.php';
    include 'BigPopUpOutput.php';

    $Childdelete = new AddInfo();
    $userBookings = new UserBookings();
    $flightInfo = $userBookings->displayFlightInfo();
    $userInfo = $userBookings->displayUserInfo();
    $userPhone = $userBookings->displayUserPhone();
    $userOutput = $userBookings->deleteProfile();
    $AddChildInfo = $userBookings->AddChildInfo();
    $childInfo = $userBookings->displayChildInfo();
    $DeleteChild = $Childdelete->DeleteChildren();
    $DenieFlight = $userBookings->DenieFlight();

    $userBookings->ChangeUserInfo();
    $userBookings->DenieFlight();
    $userBookings->displayChildInfo();

    // displayUserInfo
    $userInfo = $userBookings->displayUserInfo();
    $userPhone = $userBookings->displayUserPhone();
    $childInfo = $userBookings->displayChildInfo();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/user_info.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='../JS/OpenInfoPopUp.js'></script>
    <script src="../JS/sweetalert.min.js"></script>
    <title>profile</title>
</head>
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
<body>

    <div class='rectangleHeader'>
        <div class='logorectangle'>
            <a>AVIA</a>
        </div>
        <div class='greyRect1'></div>
        <div class='rectangleHeader2'></div>
        <div class='greyRect1'></div>
        <div class='ButtonRect2'>
                <a href="">Meals on the plane</a>
                <a href="">Pets on the move</a>
                <a href="">Seats on board</a>
                <a href="">Baggage</a>
                <a href="">Need Help?</a>
        </div>
    </div>
    <div class='BigBox'>
        <div class='BoxTitle1'>My profile</div>
        <div class='InfoBox1'>
            <div class='Info1'>My contact details</div>
            <div class='InfoBoxSmall'>
                <div class='InfoName'>Username:</div>
                <div class='InfoNumber'>User phone:</div>
                <div class='InfoPost'>User Email:</div>
                <div class='InfoPassword'>Password:</div>
            </div>
            
            <div class='InfoBoxSmallOutput'>
            <div class='InfoName1'>
                <?= $userInfo['username'] ?> 
                <button onclick="openModal('modal3')" class='changebtn1'style="visibility: <?= $userInfo['visibility']?>">✎</button>
            </div>

                <div class="InfoNumberInfo"><?=$userPhone['Phone_number']?>
                    <button id="editButton" onclick="openModal('modal4')" class='changebtn2' style="visibility: <?= $flightInfo['visibility']?>" >✎</button>
                </div>
                <div class='InfoPost1'>
                    <?=$userInfo['email']?>
                    <button onclick="openModal('modal5')" class='changebtn3' style="visibility: <?= $userInfo['visibility']?>">✎</button>
                </div>

                <div class="InfoPassword1">
                    <input type="password" value="<?= htmlspecialchars($userInfo['password']) ?>">
                    <button onclick="openModal('modal6')" class='changebtn4' style="visibility: <?= $userInfo['visibility']?>">✎</button>
                </div>
                <button onclick="openModal('modal9')" class='changebtn5' style="visibility: <?= $userInfo['visibility']?>">✎</button>

            </div>
            <a class='BackBtn3' href='adminPage.php'style="visibility: <?= $userInfo['visibility2']?>">Open Admin page</a>
        </div>
        
        <div class='BoxTitle2'>My reservations</div>
        <div class='InfoBox2'>
        <table class="UserTables_table2">
            <tr>
                <th>Reiss</th>
                <th>Place</th>
                <th>Price</th>
                <th>Departure date</th>
                <th>Arrival date</th>
                <th>Departure time</th>
                <th>Arrival time</th>
                <th>Actions</th>
            </tr>
            <tr>
                <td><?= $flightInfo['airline'] ?></td>
                <td><?= $flightInfo['seat']?></td>
                <td><?= $flightInfo['price'].'€'?></td>
                <td><?= $flightInfo['departure_date']?></td>
                <td><?= $flightInfo['arrival_date']?></td>
                <td><?= $flightInfo['departure_time']?></td>
                <td><?= $flightInfo['arrival_time']?></td>
                <td>
                    <button class="denieBtn" onclick="openModal('modal8')" style="visibility: <?= $flightInfo['visibility']?>">Cancel</button>
                    <button id="downloadBtn" class="downloadBtn" style="visibility: <?= $flightInfo['visibility']?>">Save as PDF</button>
                </td>
            </tr>
        </table>
        <div class='BoxTitle3'>History(here you can see your flight history)</div>
            <table class="UserTable">
                <tr>
                    <th>Reiss</th>
                    <th>Place</th>
                    <th>Price</th>
                    <th>Departure date</th>
                    <th>Arrival date</th>
                    <th>AtLaiks</th>
                    <th>IerLaiks</th>
                    <th>Save as PDF</th>
                </tr>
                <tr>
                    <td>Riga-Paris</td>
                    <td>F31</td>
                    <td>120$</td>
                    <td>2022/10/10</td>
                    <td>2022/10/11</td>
                    <td>10:30</td>
                    <td>12:30</td>
                    <td><button class="downloadBtn2" style="visibility: <?= $userInfo['visibility']?>">Save as PDF</button></td>

                </tr>
                </table>
            </div>

           

        <div class='BoxTitle21'>Various functions</div>
        <div class='InfoBox3'>
        <div class='RezBox3'>
                <div class='GreyPlc'>
                    <div class='Infotxt1'>Deleting profiles</div>
                </div>              
                    <div class='policy'>  If you want to delete a profile  <button class='policyBtn'onclick="openModal('modal2')" style="visibility: <?= $userInfo['visibility']?>">Click here.</button> 
                </div>
            </div>
            <div class='RezBox4'>
                <div class='GreyPlc'>
                <div class='Infotxt1'>Privacy Policy</div>
                </div>
                <div class='policy'>  Here you can find <button class='policyBtn'onclick="openModal('modal1')">Privacy Policy.</button> </div>
            </div>
            <div class='RezBox5'>
                <div class='GreyPlc'>
                <div class='Infotxt1'>Children and youth registration (2-16 years)</div>
                </div>
                <form class='AddChildrenForm' action="user_info.php" method='POST'>
                    <input type='hidden' name='AddChild'>
                    <label for="AddChildrenName">Child's name</label>
                    <input name='AddChildrenName' value="" placeholder='Bērna vārds'><br>

                    <label for="AddChildrenSurname">Surname of child</label>
                    <input name='AddChildrenSurname' value="" placeholder='Bērna uzvārds'><br>

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
                        <input type="text" id="passportIssuedDate" name="AddChildrenpassIssuedDate" placeholder="YYYY-MM-DD"><br>

                        <label for="AddChildrenpassExpirationDate">Date of withdrawal</label>
                        <input type="text" id="passportExpirationDate" name="AddChildrenpassExpirationDate" placeholder="YYYY-MM-DD"><br>

                        
                        <!-- <input type="text" id="AddChildrenPrice" name="AddChildrenPrice" readonly>                      
                        <input type="text" id="AddChildrenPlaceName" name="AddChildrenPlaceName" readonly> -->
                        <input type="hidden" id="AddChildrenPrice" name="AddChildrenPrice" readonly>
                        <input type="hidden" id="AddChildrenPlaceName" name="AddChildrenPlaceName" readonly>



                        <button name='AddChildrenBtn' type='submit' class="add-btn" style="visibility: <?= $flightInfo['visibility']?>">Add Child</button>
                    </div>
                </form>

            </div>
            <button name='Btn'onclick="openModal('modal7')" type='submit' class="downloadBtn3" style="visibility: <?= $flightInfo['visibility']?>">Choose a seat</button>
            <div class='BigBox2'>
            <!-- <div class='BoxTitle3'>Children:</div> -->
            <div class=ScrollBox>
            <table class="table1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Gender</th>
                    <th>Nationality</th>
                    <th>Seat</th>
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
                        <td>
                            <form class='DeleteForm' action="user_info.php" method='POST'>
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
  
        </div>
    </div>
    <!-- окна поп апа -->

    <div id="modal1" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modal1')"style="cursor: pointer;">&times;</span>
            <p>Protocol

Thank you for using our website. Congratulations on using our services! Please read these terms and conditions before continuing to use our website. 

1. Information about the service provider: 
   Our website provides services for purchasing and booking airline tickets. We are an intermediary between customers and airlines.

2: 
   We highly respect your privacy. All your personal data provided to us will be protected in accordance with our privacy policy.

3: 
   All airline ticket reservations made through our website are binding and mandatory. We make every effort to provide accurate flight information and to ensure a correct booking process.

4. Cancellation and Refund Policy: 
   Cancellation and refund policies may vary depending on the flight selected and the airline's policies. Please check the cancellation policy before booking.

5: 
   We accept no liability for any problems associated with the use of airline tickets, including flight delays, cancellations or other flight related problems.

6:
   We reserve the right to change these terms and conditions at any time at our sole discretion and without prior notice. Please check our website regularly for any changes.

7:
   If you have any questions or comments about our services or terms, please contact us using the contact details provided on our website. 

Thank you for trusting our services!</p>
        </div>
    </div>
    <div id="modal2" class="modal">
        <div class="modal-content">
        <span class="close" onclick="closeModal('modal2')" style="cursor: pointer;">&times;</span>

            <p>Are you sure you want to delete your profile?</p>
            <form class='DelForm' action="user_info.php" method='POST'>
                <input type='hidden' name='deleteUser'>
                <button name='DeleteBtn' type='submit' class="cancel-btn">Delete</button>
            </form>

            </div>
    </div>
    <div id="modal3" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal3')" style="cursor: pointer;">&times;</span>
        <p>Do you want to edit your username?</p>
        <form class='ChangeUserForm' action="user_info.php" method='POST'>
            <input name='ChangeUser' value="<?= $userInfo['username'] ?>">
            <button name='ChangeUserBtn' type='submit' class="cancel-btn">Edit</button>
        </form>
    </div>
</div>
<div id="modal4" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal4')" style="cursor: pointer;">&times;</span>
        <p>Want to edit your phone?</p>
        <form class='ChangePhoneForm' action="user_info.php" method='POST'>
            <input name='ChangePhone' value="<?= $userPhone['Phone_number'] ?>">
            <button name='ChangePhoneBtn' type='submit' class="cancel-btn">Edit</button>
        </form>
    </div>
</div>
<div id="modal5" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal5')" style="cursor: pointer;">&times;</span>
        <p>Do you want to edit your email?</p>
        <form class='ChangeEmailForm' action="user_info.php" method='POST'>
            <input name='ChangeEmail' value="<?= $userInfo['email'] ?>">
            <button name='ChangeEmailBtn' type='submit' class="cancel-btn">Edit</button>
        </form>
    </div>
</div>

    <div id="modal6" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modal6')"style="cursor: pointer;">&times;</span>
            <p>Do you want to edit your password?</p>
            <form class='ChangePasswordForm' action="user_info.php" method='POST'>
                <input name='ChangePassword' value="" placeholder='jauna parole'>
                <button name='ChangePasswordBtn' type='submit' class="cancel-btn">Edit</button>
            </form>
        </div>
    </div>
    <div id="modal8" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modal8')"style="cursor: pointer;">&times;</span>
            <p>Are you sure you want to cancel your ticket? Canceling your ticket will result in the loss of your reservation and refunds may be partial according to the airline's terms and conditions. Please confirm your decision.</p>
            <form class='DenieFlightForm' action="user_info.php" method='POST'>
                <input type='hidden' name='DenieFlight' value="">
                <button name='DenieFlightBtn' type='submit' class="cancel-btn">Delete</button>
            </form>
        </div>
    </div>
    <div id="modal9" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modal9')"style="cursor: pointer;">&times;</span>
            <div class="upload">
                    <form action="upload.php" method="POST" enctype="multipart/form-data">
                            <input type="file" name="image" accept="image/*">
                            <input type="submit" value="Upload image" name="submit">
                        </form>
                </div>
        </div>
    </div>
</body>
</html>


