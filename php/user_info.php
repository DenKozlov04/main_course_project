<?php 
    include 'UserInfoOutput.php';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/user_info.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <div class='InfoName1'><?=$_SESSION['username']?></div>
                <div class='InfoPost1'><?=$_SESSION['email']?></div>
                <!-- <div class='InfoPassword1'>
                    <input></input>
                </div> -->
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
                <button class='downloadBtn'>Saglabāt kā PDF </button>
                <div class='TimeInfo1'>
                    <div class='AtLaiks'>10:30</div>
                    <div class='IerLaiks'>12:30</div>
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
            </div>
            <div class='RezBox4'>
                <div class='GreyPlc'>
                <div class='Infotxt1'>Privātuma politika</div>
                </div>
            </div>
            <div class='RezBox5'>
                <div class='GreyPlc'>
                <div class='Infotxt1'>Bērnu un jauniešu reģistrācija (2-16 gadi)</div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>


