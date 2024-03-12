<?php
include 'InfoOutput.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/PriceСonfirmation.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div class='rectangleHeader'>
    <div class='logorectangle'>
        <a>AVIA</a>
    </div>
    <a class='flightName'><?= "Rīga (RIX)–$City ($airport_name) ($ITADA)"; ?></a>
    <img class='CartImg'src='../images/free-icon-grocery-store-7205450.png'>
    <div class='price'><?= $price ,'€' ?></div>
    <div class='InfoBox'>
        <a class='Info'>Izvēlies sev piemērotāko biļetes veidu</a>
        <a class='Info2'>Cena norādīta vienam pasažierim</a>
    </div>
    <a class='Info3'><?="✈ Rīga – $City ($airport_name)"?></a>
    <a class='Info4'><?="$formattedDepartDate. &bull;  $departure_time - $arrival_time"?></a>
    <div class='PricePlaceBox'>
    <div class='PriceCard1'>
        <input class='ChooseButton' type="radio" id="circleSelect" name="circleSelection" checked>
        <div class='Text1'>SILVER</div>
        <div class='Text2'>Classic</div>
        <div class='Text3'><?= $price ,'€' ?></div>
    </div>

    <div class='PriceCard2'>
        <input class='ChooseButton' type="radio" id="chooseRadio" name="circleSelection"></input>
        <div class='Text4'>SILVER</div>
        <div class='Text5'>Business</div>
        <div class='Text6'>+350.00€</div>
        <div class='Text7'>743.99€ kopā</div>
        <ul class="Text8">
            <li>Sēdvieta Biznesa klasē un garda maltīte lidmašīnā</li>
            <li>Ātrā drošības kontrole un lidostas biznesa zāles apmeklējums</li>
            <li>Lidojuma maiņa un naudas atgriešana jebkurā laikā</li>
            <li>Sēdvieta Biznesa klasē un garda maltīte lidmašīn</li>
            <li>Ātrā drošības kontrole un lidostas biznesa zāles apmeklējum</li>
            <li>Ātrā drošības kontrole un lidostas biznesa zāles apmeklējum</li>
        </ul>

    </div>
    <div class='Text9'>Summa apmaksai:</div>
    <div class='Text10'>145.00€</div>
    <div class='ButtonBox'>
            <button class='ContinueButton' type='submit' name='' value=''>Turpinat</button>
            <button class='BackButton' type='submit' name='' value=''>Atpakaļ</button>
    </div>
</div>

</body>
</html>
<!-- border: 1px solid #ccc; -->
 