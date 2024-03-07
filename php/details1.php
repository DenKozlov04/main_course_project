<?php
include 'priceCalculation.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../css/details1.css" rel="stylesheet">
    
</head>
<body>
    
<div class='rectangleHeader'>
    <div class='logorectangle'>
        <a>AVIA</a>
    </div>
    <a class='flightName'><?= "Rīga (RIX)–$City ($airport_name) ($ITADA)"; ?></a>
    <div class='InfoBox'>
        <a class='Info'>Izvēlies sev piemērotāko biļetes veidu</a>
        <a class='Info2'>Cena norādīta vienam pasažierim</a>
    </div>
    <a class='Info3'><?="✈ Rīga – $City ($airport_name)"?></a>
    <a class='Info4'><?="$formattedDepartDate. &bull;  $departure_time - $arrival_time"?></a>
</div>
<div class='offerBox'>
    <div class = 'OfferRect'>
        <div class="parallelogram1" style="background-color: #cd7f32;"></div>
        <div class="parallelogram2"></div>

        <div class="parallelogram3" style="background-color: #cd7f32;"></div>
        <div class="parallelogram4"></div>
        
        <div class='txt1' data-text='Bronze'>Bronze</div>
        <div class='Grayrect'></div>
        <div class='CalcPrice'><?php  echo $result1?>€</div>
        <div class='textBlock'>
            <div class='Buffs'>1 rokas soma + 1 personīgā manta (8kg kopā)</div>
            <div class='Buffs'>1 rokas soma </div>
        </div>
        <div class='textBlock2'>
            <div class='Buffs'>1 rokas soma + 1 personīgā manta (8kg kopā)</div>
            <div class='Buffs'>1 rokas soma </div>
        </div>
        <form class='buttonForm' action='' method='POST'>
            <div class='ButtonPlace'>
                <button class='ContinueButton'>Turpinat</button>
            </div>
        </form>
    </div>
    <div class = 'OfferRect'>
    <div class="parallelogram1" style="background-color: #a6b6c3;"></div>
        <div class="parallelogram2"></div>

        <div class="parallelogram3" style="background-color: #a6b6c3;"></div>
        <div class="parallelogram4"></div>
        
        <div class='txt1' data-text='Silver'>Silver</div>
        <div class='Grayrect'></div>
        <div class='CalcPrice'><?php  echo $result2?>€</div>
        <div class='textBlock'>
            <div class='Buffs'>1 rokas soma + 1 personīgā manta (8kg kopā)</div>
            <div class='Buffs'>1 rokas soma </div>
        </div>
        <div class='textBlock2'>
            <div class='Buffs'>1 rokas soma + 1 personīgā manta (8kg kopā)</div>
            <div class='Buffs'>1 rokas soma </div>
        </div>
        <form class='buttonForm' action='' method='POST'>
            <div class='ButtonPlace'>
                <button class='ContinueButton'>Turpinat</button>
            </div>
        </form>
    </div>
    <div class = 'OfferRect'>
    <div class="parallelogram1" style="background-color: #edcf5e;"></div>
        <div class="parallelogram2" ></div>

        <div class="parallelogram3" style="background-color: #edcf5e;"></div>
        <div class="parallelogram4"></div>
        
        <div class='txt1' data-text='Gold'>Gold</div>
        <div class='Grayrect'></div>
        <div class='CalcPrice'><?php  echo $result3?>€</div>
        <div class='textBlock'>
            <div class='Buffs'>1 rokas soma + 1 personīgā manta (8kg kopā)</div>
            <div class='Buffs'>1 rokas soma </div>
        </div>
        <div class='textBlock2'>
            <div class='Buffs'>1 rokas soma + 1 personīgā manta (8kg kopā)</div>
            <div class='Buffs'>1 rokas soma </div>
        </div>
        <form class='buttonForm' action='' method='POST'>
            <div class='ButtonPlace'>
                <button class='ContinueButton'>Turpinat</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
