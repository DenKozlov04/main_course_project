<?php
include 'InfoOutput.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/PriceСonfirmation.css" rel="stylesheet">
    <title>Choose price</title>
    <script src='../JS/givePrice.js'></script>
</head>
<body>
<div class='rectangleHeader'>
    <div class='logorectangle'>
        <a>AVIA</a>
    </div>
    <a class='flightName'><?= "Rīga (RIX)–$City ($airport_name) ($ITADA)"; ?></a>
    <img class='CartImg' src='../images/free-icon-grocery-store-7205450.png'>
    <div class='price' id='headerPrice'><?= $price ,'€' ?></div>
    <div class='InfoBox'>
        <a class='Info'>Choose the ticket type that's right for you</a>
        <a class='Info2'>Price is per passenger</a>
    </div>
    <a class='Info3'><?="✈ Rīga – $City ($airport_name)"?></a>
    <a class='Info4'><?="$formattedDepartDate. &bull;  $departure_time - $arrival_time"?></a>
    <div class='PricePlaceBox'>
        <input type="hidden" name="originalPrice" id="OriginalPriceField" value="<?= $price ?>">
        <div class='PriceCard1'>
            <input class='ChooseButton' type="radio" id="circleSelect" name="circleSelection" value='<?= $price?>' onclick='updatePrice(this)' checked>
            <div class='Text1'><?= $class ?></div>
            <div class='Text2'>Classic</div>
            <div class='Text3'><?= $price ,'€' ?></div>
        </div>

        <div class='PriceCard2'>
            <input class='ChooseButton2' type="radio" id="chooseRadio" name="circleSelection" value='<?= $PlusPrice; ?>' onclick='updatePrice(this)'>
            <div class='Text4'><?= $class ?></div>
            <div class='Text5'>Business</div>
            <div class='Text6'><?='+', $Percents ,'€' ?></div>
            <div class='Text7'><?= $PlusPrice ,'€',' total' ?></div>
            <ul class="Text8">
                <li>Expedited security check and airport business lounge.</li>
                <li>Guaranteed personalized in-flight service from a team of flight attendants.</li>
                <li>Access to a VIP airport lounge area with comfortable seats, complimentary drinks and snacks, and high-speed Wi-Fi.</li>
                <li>Exclusive menu with a wide variety of dishes, including dietary and vegetarian options, prepared with high quality ingredients.</li>
                <li>Gifts or souvenirs for business class passengers such as cosmetic kits, travel kits or magazines.</li>
                <li>Business Class passengers have priority baggage handling at check-in and baggage claim on arrival.</li>
            </ul>
        </div>
        <div class='Text9'>Amount to pay:</div>
        <div class='Text10' id='totalPrice'><?= $price ,'€'?></div>
        <form class='buttonForm' action="BaggagePrice.php" method='POST'>
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="class" value="<?= $class ?>">
            <input type="hidden" name="plusPrice" id="PriceField" value="<?= $price ?>">
            <div class='ButtonBox'>
                <button class='ContinueButton' type='submit' name='cardType' value=''>Continue</button> 
            </div>
        </form>
        <div class='input-main-page'>
            <a href="FilteredTickets.php" class="PrevPage">← Back</a>
        </div>
    </div>
</div>
</body>
</html>

