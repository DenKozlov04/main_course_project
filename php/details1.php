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
    <script src="../JS/sweetalert.min.js"></script>
   
</head>
<body>
  
<div class='rectangleHeader'>
    <div class='logorectangle'>
        <a>AVIA</a>
    </div>
    <a class='flightName'><?= "Rīga (RIX)–$City ($airport_name) ($ITADA)"; ?></a>
    <img class='CartImg'src='../images/free-icon-grocery-store-7205450.png'>
    <div class='InfoBox'>
        <a class='Info'>Choose the ticket type that's right for you</a>
        <a class='Info2'>Price is per passenger</a>
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
        <div class='CalcPrice'><?= $result1?>€</div>
        <div class='textBlock'>
            <div class='Buffs'>1 hand bag + 1 personal item (8kg total)</div>
            <div class='Buffs'>1 hand bag  </div>
        </div>
        <div class='textBlock2'>
            <div class='Buffs'>1 hand bag + 1 personal item (8kg total)</div>
            <div class='Buffs'>1 hand bag  </div>
        </div>
        <form class='buttonForm' action="PriceСonfirmation.php" method='POST'>
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="hidden" name="class" value="BRONZE">
        <input type="hidden" name="price" value="<?= $result1 ?>">
            <div class='ButtonPlace'>
                <button class='ContinueButton'  type='submit'  name='cardType' value='BRONZE'>Continue</button>
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
        <div class='CalcPrice'><?= $result2?>€</div>
        <div class='textBlock'>
            <div class='Buffs'>1 hand bag + 1 personal item (8kg total)</div>
            <div class='Buffs'>1 hand bag </div>
        </div>
        <div class='textBlock2'>
            <div class='Buffs'>1 hand bag + 1 personal item (8kg total)</div>
            <div class='Buffs'>1 hand bag </div>
        </div>
        <form class='buttonForm' action="PriceСonfirmation.php" method='POST'>
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="hidden" name="class" value="SILVER">
        <input type="hidden" name="price" value="<?= $result2 ?>">
            <div class='ButtonPlace'>
                <button class='ContinueButton' type='submit' name='cardType' value='SILVER'>Continue</button>
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
            <div class='Buffs'>1 hand bag + 1 personal item (8kg total)</div>
            <div class='Buffs'>1 hand bag </div>
        </div>
        <div class='textBlock2'>
            <div class='Buffs'>1 hand bag + 1 personal item (8kg total)</div>
            <div class='Buffs'>1 hand bag </div>
        </div>
        <form class='buttonForm' action="PriceСonfirmation.php" method='POST'>
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="hidden" name="class" value="GOLD">
        <input type="hidden" name="price" value="<?= $result3 ?>">
            <div class='ButtonPlace'>
                <button class='ContinueButton' type='submit' name='cardType' value='GOLD'>Continue</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>