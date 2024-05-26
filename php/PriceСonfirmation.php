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
    <img class='CartImg'src='../images/free-icon-grocery-store-7205450.png'>
    <div class='price'><?= $price ,'€' ?></div>
    <div class='InfoBox'>
        <a class='Info'>Choose the ticket type that's right for you</a>
        <a class='Info2'>Price is per passenger</a>
    </div>
    <a class='Info3'><?="✈ Rīga – $City ($airport_name)"?></a>
    <a class='Info4'><?="$formattedDepartDate. &bull;  $departure_time - $arrival_time"?></a>
    <div class='PricePlaceBox'>
    <input type="hidden" name="originalPrice" id="OriginalPriceField" value="<?= $price ?>">
    <div class='PriceCard1'>
        <input class='ChooseButton' type="radio" id="circleSelect" name="circleSelection" value='<?= $price?>' onclick='ButtonClick2(this)' checked>
        <div class='Text1'><?= $class ?></div>
        <div class='Text2'>Classic</div>
        <div class='Text3'><?= $price ,'€' ?></div>
    </div>

    <div class='PriceCard2'>
        <!-- <input class='ChooseButton2' type="radio" id="chooseRadio" name="circleSelection" value='' onclick='ButtonClick(this)'></input> -->
        <input class='ChooseButton2' type="radio" id="chooseRadio" name="circleSelection" value='<?= $PlusPrice; ?>' onclick='ButtonClick(this)'>
        <div class='Text4'><?= $class ?></div>
        <div class='Text5'>Business</div>
        <div class='Text6'><?='+', $Percents ,'€' ?></div>
        <div class='Text7'><?= $PlusPrice ,'€',' total' ?></div>
        <ul class="Text8">
            <li>Business Class seat and a delicious meal on board</li>
            <li>Fast-track security and visit to the airport business lounge</li>
            <li>Flight changes and refunds at any time</li>
            <li>Business Class seat and a delicious meal on board</li>
            <li>Fast-track security and airport business lounge</li>
            <li>Fast-track security and airport business lounge</li>
        </ul>

    </div>
    <div class='Text9'>Amount to pay:</div>
    <div class='Text10'><?= $price ,'€'?></div>
    <form class='buttonForm' action="BaggagePrice.php" method='POST'>
        
    <input type="hidden" name="id" value="<?= $id ?>">
    <input type="hidden" name="plusPrice" id="PriceField" value="<?= $price ?>">
        <div class='ButtonBox'>
                <button class='ContinueButton' type='submit' name='cardType' value=''>Continue</button>
                
        </div>
    </form>
    <!-- <button class='BackButton' type='submit' name='' value=''>Back</button> -->
    <a href="FilteredTickets.php" class="BackButton">Back</a>

</div>

</body>
</html>
<!-- border: 1px solid #ccc; -->
