<?php 
    include 'UserInfoOutput.php';
    
    $userBookings = new UserBookings();
    $flightInfo = $userBookings->displayFlightInfo();
    $userInfo = $userBookings->displayUserInfo();
    $userOutput = $userBookings->deleteProfile();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/user_info.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='../JS/OpenInfoPopUp.js'></script>
    <title>profile</title>
</head>
<body>

    <div class='rectangleHeader'>
        <div class='logorectangle'>
            <a>AVIA</a>
        </div>
        <div class='greyRect1'></div>
        <div class='rectangleHeader2'></div>
        <div class='greyRect1'></div>
        <div class='ButtonRect2'>
                <a href="">Ēdieni lidmašīnā</a>
                <a href="">Mājdzīvnieki ceļā</a>
                <a href="">Sēdvietas lidmašīnā</a>
                <a href="">Bagāža</a>
                <a href="">Vajag Palidzība?</a>
        </div>
    </div>
    <div class='BigBox'>
        <div class='BoxTitle1'>Māns profils</div>
        <div class='InfoBox1'>
            <div class='Info1'>Māna kontaktinformācija</div>
            <div class='InfoBoxSmall'>
                <div class='InfoName'>Lietotajvārds:</div>
                <div class='InfoNumber'>Lietotāja tālrunis:</div>
                <div class='InfoPost'>Lietotāja E-pasts:</div>
                <div class='InfoPassword'>Parole:</div>
            </div>
            
            <div class='InfoBoxSmallOutput'>
                <div class='InfoName1'><?=$_SESSION['username']?>
                    <button class='changebtn1'>✎</button>
                </div>
                <div class="InfoNumberInfo"><?=$userInfo['phone']?>
                    <button class='changebtn2'>✎</button>
                </div>
                <div class='InfoPost1'><?=$_SESSION['email']?>
                    <button class='changebtn3'>✎</button>
                </div>
                <div class="InfoPassword1">
                    <input type="password" value="<?= htmlspecialchars($userInfo['password']) ?>">
                    <button class='changebtn4'>✎</button>
                </div>


            </div>
            
        </div>
        <div class='BoxTitle2'>Mānas rezervācijas</div>
        <div class='InfoBox2'>
            <!-- <div class='Info1'>Māna kontaktinformācija</div> -->
            <div class='RezBox'>
                <div class='GreyLine'></div>
                <div class='GreyLine2'></div>
                <div class='GreyLine3'></div>
                <div class='GreyLine4'></div>
                <div class='GreyLine5'></div>
                <div class='GreyPlc'></div>
                <div class='RezInfo'>
                    <div class='RezInfoText1'>Reiss </div>
                    <div class='RezInfoText2'>Vieta</div>
                    <div class='RezInfoText3'>Cena</div>
                    <div class='RezInfoText4'>Atiešanas datums</div>
                    <div class='RezInfoText5'>Ierašanas datums</div>
                    <button class='CopyBtn'>Kopēt visu </button>
                </div>
                <div class='RezInfo2'>
                <div class='Reiss'><?= $flightInfo['airline'] ?></div>
                    <div class='Vieta'><?= $flightInfo['seat']?></div>
                    <div class='Cena'><?= $flightInfo['price'].'€'?></div>
                    <div class='Atiešanas_datums'><?= $flightInfo['departure_date']?></div>
                    <div class='Ierašanas_datums'><?= $flightInfo['arrival_date']?></div>
                </div>
                <button class='downloadBtn'>Saglabāt kā PDF </button>
                <div class='TimeInfo1'>
                    <div class='AtLaiks'><?= $flightInfo['departure_time']?></div>
                    <div class='IerLaiks'><?= $flightInfo['arrival_time']?></div>
                </div>
            </div>
            <div class='BoxTitle3'>Vēsture</div>
            <div class=ScrollBox>
            <div class='RezBox2'>
                <div class='GreyLine'></div>
                <div class='GreyLine2'></div>
                <div class='GreyLine3'></div>
                <div class='GreyLine4'></div>
                <div class='GreyLine5'></div>
                <div class='GreyPlc'></div>
                <div class='RezInfo'>
                    <div class='RezInfoText1'>Reiss</div>
                    <div class='RezInfoText2'>Vieta</div>
                    <div class='RezInfoText3'>Cena</div>
                    <div class='RezInfoText4'>Atiešanas datums</div>
                    <div class='RezInfoText5'>Ierašanas datums</div>
                    <button class='CopyBtn'>Kopēt visu </button>
                </div>
                <div class='RezInfo2'>
                    <div class='Reiss'>Rīga-Parize</div>
                    <div class='Vieta'>F31</div>
                    <div class='Cena'>120$</div>
                    <div class='Atiešanas_datums'>2022/10/10</div>
                    <div class='Ierašanas_datums'>2022/10/11</div>
                </div>
                <button class='downloadBtn2'>Saglabāt kā PDF </button>
                <div class='TimeInfo1'>
                    <div class='AtLaiks'>10:30</div>
                    <div class='IerLaiks'>12:30</div>
                </div>
            </div>
        </div>
        </div>
        <div class='BoxTitle21'>Dažādas funkcijas</div>
        <div class='InfoBox3'>
        <div class='RezBox3'>
                <div class='GreyPlc'>
                    <div class='Infotxt1'>Profilu dzēšana</div>
                </div>              
                    <div class='policy'>  Ja vēlaties dzēst profilu  <button class='policyBtn'onclick="openModal('modal2')">Spiediet šeit.</button> 
                </div>
            </div>
            <div class='RezBox4'>
                <div class='GreyPlc'>
                <div class='Infotxt1'>Privātuma politika</div>
                </div>
                <div class='policy'>  Šeit Jus varat iepazīties ar vietnes <button class='policyBtn'onclick="openModal('modal1')">Privātuma politiku.</button> </div>
            </div>
            <div class='RezBox5'>
                <div class='GreyPlc'>
                <div class='Infotxt1'>Bērnu un jauniešu reģistrācija (2-16 gadi)</div>
                </div>
            </div>
        </div>
    </div>
    <!-- окна поп апа -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modal1')"style="cursor: pointer;">&times;</span>
            <p>Protokols

Pateicoties, ka izmantojat mūsu mājas lapu. Apsveicam jūs ar mūsu pakalpojumu izmantošanu! Lūdzu, lasiet šos noteikumus un nosacījumus, pirms turpināt lietot mūsu mājas lapu. 

1. Informācija par pakalpojumu sniedzēju: 
   Mūsu mājas lapā sniedz pakalpojumus aviobiļešu pirkšanai un rezervēšanai. Mēs esam starpnieks starp klientiem un aviokompānijām.

2. Privātuma politika: 
   Mēs ļoti cienām jūsu privātumu. Visas jūsu personas dati, kas tiek sniegti mums, tiks aizsargāti saskaņā ar mūsu privātuma politiku.

3. Rezervācijas noteikumi: 
   Visas aviobiļetes rezervācijas, kas tiek veiktas caur mūsu mājas lapu, ir saistīgas un obligātas. Mēs sniedzam visus centienus, lai nodrošinātu precīzu informāciju par lidojumu un nodrošinātu pareizu rezervāciju procesu.

4. Atcelšanas un refundācijas politika: 
   Atcelšanas un refundācijas noteikumi var atšķirties atkarībā no izvēlētā lidojuma un aviokompānijas noteikumiem. Lūdzu, pārbaudiet atcelšanas nosacījumus, pirms veicat rezervāciju.

5. Atbildība: 
   Mēs neuzņemamies atbildību par jebkādām nepatikšanām, kas saistītas ar aviobiļešu izmantošanu, ieskaitot lidojuma kavējumus, atcelšanu vai citas ar lidojumu saistītas problēmas.

6. Autoritātes:
   Mēs paturam tiesības mainīt šos noteikumus un nosacījumus jebkurā laikā pēc saviem ieskatiem un bez iepriekšējas brīdināšanas. Lūdzu, regulāri pārbaudiet mūsu mājas lapu, lai uzzinātu par jebkādām izmaiņām.

7. Kontaktinformācija:
   Ja jums ir kādi jautājumi vai komentāri par mūsu pakalpojumiem vai noteikumiem, lūdzu, sazinieties ar mums, izmantojot norādīto kontaktinformāciju mūsu mājas lapā. 

Pateicamies par uzticību mūsu pakalpojumiem!</p>
        </div>
    </div>
    <div id="modal2" class="modal">
        <div class="modal-content">
        <span class="close" onclick="closeModal('modal2')" style="cursor: pointer;">&times;</span>

            <p>Vai tiešām vēlaties dzēst savu profilu?</p>
            <form class='DelForm' action="user_info.php" method='POST'>
                <input type='hidden' name='deleteUser'>
                <button name='DeleteBtn' type='submit' class="cancel-btn">Dzēst</button>
            </form>

            </div>
    </div>
</body>
</html>


