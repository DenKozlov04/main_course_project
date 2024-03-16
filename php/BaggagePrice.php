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
            </div>
        </div>
        <div class='ServiceCard'>
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
        </div>
    </div>
    
</body>
</html>
