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
        <div class="parallelogram1" style="background-color: rgb(227, 227, 227);"></div>
        <div class="parallelogram2"></div>

        <div class="parallelogram3" style="background-color: rgb(227, 227, 227);"></div>
        <div class="parallelogram4"></div>
        
        <div class='txt1' data-text='Basic'>Basic</div>
        <div class='Grayrect'></div>
        <div class='CalcPrice'><?= $result0?>€</div>

        <div class='textBlock2'>
            <ul class='Buffs'>
                <li>1 hand luggage (up to 8 kg)</li>
                <li>Free access to water on board</li>
                <li>Standard boarding</li>
                <li>Access to basic entertainment on board (music, movies)</li>
            </ul>
        </div>
        <form class='buttonForm' action="PriceСonfirmation.php" method='POST'>
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="hidden" name="class" value="BASIC">
        <input type="hidden" name="price" value="<?= $result0 ?>">
            <div class='ButtonPlace'>
                <button class='ContinueButton'  type='submit'  name='cardType' value='BASIC'>Continue</button>
            </div>
        </form>
    </div>
    <div class = 'OfferRect'>
        <div class="parallelogram1" style="background-color: #cd7f32;"></div>
        <div class="parallelogram2"></div>

        <div class="parallelogram3" style="background-color: #cd7f32;"></div>
        <div class="parallelogram4"></div>
        
        <div class='txt1' data-text='Bronze'>Bronze</div>
        <div class='Grayrect'></div>
        <div class='CalcPrice'><?= $result1?>€</div>

        <div class='textBlock4'>
            <ul class='Buffs'>
                <li>1 hand baggage + 1 personal item (total weight up to 16 kg)</li>
                <li>Free Wi-Fi access (30 minutes)</li>
                <li>Free drinks on board (water, juices, tea, coffee)</li>
                <li>Personal entertainment kit (headphones, plaid, sleep mask)</li>
            </ul>
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

        <div class='textBlock3'>
            <ul class='Buffs'>
                <li>1 hand baggage + 1 personal item (total weight up to 24 kg)</li>
                <li>1 checked baggage (up to 24 kg)</li>
                <li>Free Wi-Fi access (1 hour)</li>
                <li>Free drinks and snacks on board (including sandwiches and snacks)</li>
                <li>Priority boarding</li>
                <li>Access to digital library (movies, music, magazines)</li>
            </ul>
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
        <div class='textBlock3'>
            <ul class='Buffs'>
                <li>1 hand baggage + 1 personal item (total weight up to 32 kg)</li>
                <li>2 checked baggage (up to 36 kg each)</li>
                <li>Unlimited free access to Wi-Fi</li>
                <li>Hot meals on board (multi-course choice)</li>
                <li>Priority boarding and disembarkation</li>
                <li>Access to premium lounge</li>
                <li>Complimentary drinks and snacks on board, including alcoholic beverages</li>
                <li>Free access to additional services (e.g. express security check, personal concierge service)</li>
            </ul>
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