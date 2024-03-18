<?php
include 'InfoOutput2.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/BaggagePrice.css" rel="stylesheet">
    <title>additional services</title>
</head>
<body>
<div class='rectangleHeader'>
    <div class='logorectangle'>
        <a>AVIA</a>
    </div>
    <a class='flightName'><?= "Rīga (RIX)–$City ($airport_name) ($ITADA)"; ?></a>
    <img class='CartImg'src='../images/free-icon-grocery-store-7205450.png'>
    <div class='price'><?= $CurrPrice ,'€' ?></div>
    <div class='InfoBox'>
        <a class='Info'>Izvēlies sev piemērotāko biļetes veidu</a>
        <a class='Info2'>Cena norādīta vienam pasažierim</a>
    </div>
    <a class='Info3'><?="✈ Rīga – $City ($airport_name)"?></a>
    <a class='Info4'><?="$formattedDepartDate. &bull;  $departure_time - $arrival_time"?></a>
    <div class='ServiceBox'>
        <div class='ServiceCard'>
            <!-- то что берешь в самолет в салрн-->
            <div class='txt1'>Rokas bagāža</div>
            <div class='txt2'>1 x 8 kg</div>
            <div class='textrect'>
                <div class='txt3'>Iekļauts cenā</div>
            </div>
            <div class='greyRect'></div>
            <div class='ImgBox'>
                <img class='img' src='../images/5beb4031dde8677a6866a1e2.png'>
            </div>
            <div class='PriceBox'>
                <div class='PricePlc'>
                    <div class='price1'>no</div>
                    <div class='price2'>12.99€</div>
                    <div class='price3'>vienā virzienā</div>
                </div>
                
                <button class='Button2' id="choose" name="Selection" value='<?= '' ?>' onclick='PlusPrice1(this)'>+8</button>
                <button class='Button3' id="choose" name="Selection2" value='<?= '' ?>' onclick='PlusPrice2(this)'>+16</button>
                <button class='Button4' id="choose" name="Selection3" value='<?= '' ?>' onclick='PlusPrice3(this)'>+32</button>
                <button class='Button5' id="choose" name="Selection4" value='<?= '' ?>' onclick='PlusPrice4(this)'>+64</button>
            </div>
        </div>
        <div class='ServiceCard'>
             <!-- то что помещается в багажный отсек-->
            <div class='txt1'>Reģistrētā bagāža</div>
            <div class='txt2'>1 x 8 kg</div>
            <div class='textrect'>
                <div class='txt3'>Iekļauts cenā</div>
            </div>
            <div class='greyRect'></div>
            <div class='ImgBox'>
                <img class='img' src='../images/5beb4031dde8677a6866a1e2.png'>
            </div>
            <div class='PriceBox'>
                <div class='PricePlc'>
                    <div class='price1'>no</div>
                    <div class='price2'>12.99€</div>
                    <div class='price3'>vienā virzienā</div>
                </div>
                <div class='BtnPlace'>
                    <input class='ChooseButton2' type="radio" id="chooseRadio" name="circleSelection" value='<?= 1; ?>' onclick='ButtonClick(this)'>-</input>
                    <div class='quantity'>0</div>
                    <input class='ChooseButton2' type="radio" id="chooseRadio" name="circleSelection" value='<?= 1; ?>' onclick='ButtonClick(this)'>+</input>
                </div>
        </div>
    </div>
    
</body>
</html>
