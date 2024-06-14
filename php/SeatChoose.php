<?php
include "InfoOutput3.php";

echo '<script>';
echo 'var flightId = ' . json_encode($id) . ';';
echo '</script>';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/SeatChoose.css" rel="stylesheet">
    <script src="../JS/Bcolor.js"></script>
    <title>Choose the right place</title>
</head>
<body>
<script>
    const urlParams = new URLSearchParams(window.location.search);
    const alertMessage = urlParams.get('alert');

    if (alertMessage) {
        swal({
            title: 'Error!',
            text: decodeURIComponent(alertMessage),
            icon: 'error',
            button: 'OK'
        });
    }
</script>
<div class='rectangleHeader'>
    <div class='logorectangle'>
        <a>AVIA</a>
    </div>
    <a class='flightName'><?= "Rīga (RIX)–$City ($airport_name) ($ITADA)"; ?></a>
    <img class='CartImg'src='../images/free-icon-grocery-store-7205450.png'>
    <div class='price'><?= $PricePlusQuant ,'€' ?></div>
 
    <div class='InfoBox'>
        <a class='Info'>Choose the ticket type that's right for you</a>
        <a class='Info2'>Price is per passenger</a>
    </div>
    <a class='Info3'><?="✈ Rīga – $City ($airport_name)"?></a>
    <a class='Info4'><?="$formattedDepartDate. &bull;  $departure_time - $arrival_time"?></a>
</div>
<div class='PlaneCabinRectangle'>
    <div class='infoBox'>
        <div class='InfoTr'></div>
        <div class='InfoTextTr'>Aircraft entry/exit designator.</div>
        <div class='InfoWCSign'>WC</div>
        <div class='InfoTextWC'>Aircraft lavatory designation.</div>
        <div class='InfoRow'>1</div>
        <div class='InfoTextRow'>Queue number.</div>
        <div class='InfoColumn'>A</div>
        <div class='InfoTextColumn'>Seat row designation.</div>
    </div>
    <div class='WCSign'>WC</div>
    <div class='WCSign2'>WC</div>
    <div class='WCSign3'>WC</div>
    <div class = 'RowNumbers1'>
        <div class= 'RowNumber'>1</div>
        <div class= 'RowNumber'>2</div>
        <div class= 'RowNumber'>3</div>
        <div class= 'RowNumber'>4</div>
    </div>
    <div class = 'RowNumbers2'>
        <div class= 'RowNumber'>5</div>
        <div class= 'RowNumber'>6</div>
        <div class= 'RowNumber'>7</div>
        <div class= 'RowNumber'>8</div>
        <div class= 'RowNumber'>9</div>
        <div class= 'RowNumber1'>10</div>
        <div class= 'RowNumber1'>11</div>
        <div class= 'RowNumber1'>12</div>
        <div class= 'RowNumber1'>13</div>
        <div class= 'RowNumber1'>14</div>
        <div class= 'RowNumber1'>15</div>
        <div class= 'RowNumber1'>16</div>
        <div class= 'RowNumber1'>17</div>
        <div class= 'RowNumber1'>18</div>
    </div>
    <div class="triangle"></div>
    <div class="triangle2"></div>
    <div class="triangle3"></div>
    <div class="triangle4"></div>
    <div class="triangle5"></div>
    <div class="triangle6"></div>
    <div class='RectRect'>
        <div class='Greyrect1'></div>
        <div class='Greyrect2'></div>
    </div>
    <div class ='RowLettersAll'>
        <div class='RowLetters1'>
            <a class='Letter'>A</a>
            <a class='Letter'>B</a>
        </div>
        <div class='RowLetters2'>
            <a class='Letter'>E</a>
            <a class='Letter'>F</a>
        </div>
    </div>
    <div class ='RowLettersAll2'>
        <div class='RowLetters3'>
            <a class='Letter'>A</a>
            <a class='Letter'>B</a>
            <a class='Letter'>C</a>
        </div>
        <div class='RowLetters4'>
            <a class='Letter'>D</a>
            <a class='Letter'>E</a>
            <a class='Letter'>F</a>
        </div>
    </div>
    <!-- A -->
    <div class='ButtonRect1'>

    <button class='PlaceButton' id="Seat1" name="PlaceSelection" data-clicked="false" data-extra-value="A1" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice(this); toggleButtonColor(this) '>
        <div class='PricePlace'>29.99€</div>
    </button>

    <button class='PlaceButton' id="Seat2" name="PlaceSelection" data-clicked="false" data-extra-value="A2" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice(this); toggleButtonColor(this) '>
        <div class='PricePlace'>29.99€</div>
    </button>

    <button class='PlaceButton' id="Seat3" name="PlaceSelection" data-clicked="false" data-extra-value="A3" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>29.99€</div>
    </button>

    <button class='PlaceButton' id="Seat4" name="PlaceSelection" data-clicked="false" data-extra-value="A4" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>29.99€</div>
    </button>


    </div>

  
    <!-- потом убрать -->
     <!-- B -->
    <div class='ButtonRect2'>

        <button class='PlaceButton' id="Seat5" name="PlaceSelection" data-clicked="false" data-extra-value="B1" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice2(this); toggleButtonColor(this)'>
            <div class='PricePlace'>19.99€</div>
        </button>

        <button class='PlaceButton' id="Seat6" name="PlaceSelection" data-clicked="false" data-extra-value="B2" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice2(this); toggleButtonColor(this)'>
            <div class='PricePlace'>19.99€</div>
        </button>

        <button class='PlaceButton' id="Seat7" name="PlaceSelection" data-clicked="false" data-extra-value="B3" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice2(this); toggleButtonColor(this)'>
            <div class='PricePlace'>19.99€</div>
        </button>

        <button class='PlaceButton' id="Seat8" name="PlaceSelection" data-clicked="false" data-extra-value="B4" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice2(this); toggleButtonColor(this)'>
            <div class='PricePlace'>19.99€</div>
        </button>

    </div>
     <!-- E -->
    <div class='ButtonRect3'>

        <button class='PlaceButton' id="Seat9" name="PlaceSelection" data-clicked="false" data-extra-value="E1" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice2(this); toggleButtonColor(this)'>
            <div class='PricePlace'>19.99€</div>
        </button>

        <button class='PlaceButton' id="Seat10" name="PlaceSelection" data-clicked="false" data-extra-value="E2" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice2(this); toggleButtonColor(this)'>
            <div class='PricePlace'>19.99€</div>
        </button>

        <button class='PlaceButton' id="Seat11" name="PlaceSelection" data-clicked="false" data-extra-value="E3" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice2(this); toggleButtonColor(this)'>
            <div class='PricePlace'>19.99€</div>
        </button>

        <button class='PlaceButton' id="Seat12" name="PlaceSelection" data-clicked="false" data-extra-value="E4" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice2(this); toggleButtonColor(this)'>
            <div class='PricePlace'>19.99€</div>
        </button>

    </div>
    <!-- F -->
    <div class='ButtonRect4'>
        <button class='PlaceButton' id="Seat13" name="PlaceSelection" data-clicked="false" data-extra-value="F1" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice(this); toggleButtonColor(this)'>
            <div class='PricePlace'>29.99€</div>
        </button>

        <button class='PlaceButton' id="Seat14" name="PlaceSelection" data-clicked="false" data-extra-value="F2" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice(this); toggleButtonColor(this)'>
            <div class='PricePlace'>29.99€</div>
        </button>

        <button class='PlaceButton' id="Seat15" name="PlaceSelection" data-clicked="false" data-extra-value="F3" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice(this); toggleButtonColor(this)'>
            <div class='PricePlace'>29.99€</div>
        </button>

        <button class='PlaceButton' id="Seat16" name="PlaceSelection" data-clicked="false" data-extra-value="F4" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice(this); toggleButtonColor(this)'>
            <div class='PricePlace'>29.99€</div>
        </button>
    </div>
    <!-- A2 -->
    <div class='ButtonRect5'>

        <button class='PlaceButton' id="Seat17" name="PlaceSelection" data-clicked="false" data-extra-value="A5" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice3(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
        </button>

        <button class='PlaceButton' id="Seat18" name="PlaceSelection" data-clicked="false" data-extra-value="A6" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice3(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
        </button>

        <button class='PlaceButton' id="Seat19" name="PlaceSelection" data-clicked="false" data-extra-value="A7" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice3(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
        </button>

        <button class='PlaceButton' id="Seat20" name="PlaceSelection" data-clicked="false" data-extra-value="A8" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice3(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
        </button>

        <button class='PlaceButton' id="Seat21" name="PlaceSelection" data-clicked="false" data-extra-value="A9" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice3(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
        </button>

        <button class='PlaceButton' id="Seat22" name="PlaceSelection" data-clicked="false" data-extra-value="A10" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice3(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
        </button>

        <button class='PlaceButton' id="Seat23" name="PlaceSelection" data-clicked="false" data-extra-value="A11" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice3(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
        </button>

        <button class='PlaceButton' id="Seat24" name="PlaceSelection" data-clicked="false" data-extra-value="A12" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice3(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
        </button>

        <button class='PlaceButton' id="Seat25" name="PlaceSelection" data-clicked="false" data-extra-value="A13" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice3(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
        </button>

        <button class='PlaceButton' id="Seat26" name="PlaceSelection" data-clicked="false" data-extra-value="A14"value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice3(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
        </button>

        <button class='PlaceButton' id="Seat27" name="PlaceSelection" data-clicked="false" data-extra-value="A15" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice3(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
        </button>

        <button class='PlaceButton' id="Seat28" name="PlaceSelection" data-clicked="false" data-extra-value="A16"value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice3(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
        </button>

        <button class='PlaceButton' id="Seat29" name="PlaceSelection" data-clicked="false" data-extra-value="A17"value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice3(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
        </button>

        <button class='PlaceButton' id="Seat30" name="PlaceSelection" data-clicked="false" data-extra-value="A18" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice3(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
        </button>

    </div>
     <!-- B2 -->
    <div class='ButtonRect6'>

        <button class='PlaceButton' id="Seat31" name="PlaceSelection" data-clicked="false" data-extra-value="B5" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat32" name="PlaceSelection" data-clicked="false" data-extra-value="B6" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat33" name="PlaceSelection" data-clicked="false" data-extra-value="B7" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat34" name="PlaceSelection" data-clicked="false" data-extra-value="B8" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat35" name="PlaceSelection" data-clicked="false" data-extra-value="B9" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat36" name="PlaceSelection" data-clicked="false" data-extra-value="B10" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat37" name="PlaceSelection" data-clicked="false" data-extra-value="B11" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat38" name="PlaceSelection" data-clicked="false" data-extra-value="B12" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat39" name="PlaceSelection" data-clicked="false" data-extra-value="B13" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat40" name="PlaceSelection" data-clicked="false" data-extra-value="B14" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat41" name="PlaceSelection" data-clicked="false" data-extra-value="B15" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat42" name="PlaceSelection" data-clicked="false" data-extra-value="B16" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat43" name="PlaceSelection" data-clicked="false" data-extra-value="B17" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat44" name="PlaceSelection" data-clicked="false" data-extra-value="B18" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

    </div>
     <!-- C -->
    <div class='ButtonRect7'>

        <button class='PlaceButton' id="Seat45" name="PlaceSelection" data-clicked="false" data-extra-value="C1" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat46" name="PlaceSelection" data-clicked="false" data-extra-value="C2" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat47" name="PlaceSelection" data-clicked="false" data-extra-value="C3" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat48" name="PlaceSelection" data-clicked="false" data-extra-value="C4" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat49" name="PlaceSelection" data-clicked="false" data-extra-value="C5" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat50" name="PlaceSelection" data-clicked="false" data-extra-value="C6" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat51" name="PlaceSelection" data-clicked="false" data-extra-value="C7" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat52" name="PlaceSelection" data-clicked="false" data-extra-value="C8" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat53" name="PlaceSelection" data-clicked="false" data-extra-value="C9" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat54" name="PlaceSelection" data-clicked="false" data-extra-value="C10" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat55" name="PlaceSelection" data-clicked="false" data-extra-value="C11" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat56" name="PlaceSelection" data-clicked="false" data-extra-value="C12" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat57" name="PlaceSelection" data-clicked="false" data-extra-value="C13" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat58" name="PlaceSelection" data-clicked="false" data-extra-value="C14" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>
    </div>
     <!-- F2 -->
    <div class='ButtonRect8'>
       
    <button class='PlaceButton' id="Seat59" name="PlaceSelection" data-clicked="false" data-extra-value="F5" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice3(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
        </button>

        <button class='PlaceButton' id="Seat60" name="PlaceSelection" data-clicked="false" data-extra-value="F6" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice3(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
        </button>

        <button class='PlaceButton' id="Seat61" name="PlaceSelection" data-clicked="false" data-extra-value="F7" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice3(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
        </button>

        <button class='PlaceButton' id="Seat62" name="PlaceSelection" data-clicked="false" data-extra-value="F8" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice3(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
        </button>

        <button class='PlaceButton' id="Seat63" name="PlaceSelection" data-clicked="false" data-extra-value="F9" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice3(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
        </button>

        <button class='PlaceButton' id="Seat64" name="PlaceSelection" data-clicked="false" data-extra-value="F10" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice3(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
        </button>

        <button class='PlaceButton' id="Seat65" name="PlaceSelection" data-clicked="false" data-extra-value="F11" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice3(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
        </button>

        <button class='PlaceButton' id="Seat66" name="PlaceSelection" data-clicked="false" data-extra-value="F12" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice3(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
        </button>

        <button class='PlaceButton' id="Seat67" name="PlaceSelection" data-clicked="false" data-extra-value="F13" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice3(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
        </button>

        <button class='PlaceButton' id="Seat68" name="PlaceSelection" data-clicked="false" data-extra-value="F14" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice3(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
        </button>

        <button class='PlaceButton' id="Seat69" name="PlaceSelection" data-clicked="false" data-extra-value="F15" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice3(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
        </button>

        <button class='PlaceButton' id="Seat70" name="PlaceSelection" data-clicked="false" data-extra-value="F16" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice3(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
        </button>

        <button class='PlaceButton' id="Seat71" name="PlaceSelection" data-clicked="false" data-extra-value="F17" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice3(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
        </button>

        <button class='PlaceButton' id="Seat72" name="PlaceSelection" data-clicked="false" data-extra-value="F18" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice3(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
        </button>
    </div>
     <!-- E2 -->
    <div class='ButtonRect9'>

        <button class='PlaceButton' id="Seat73" name="PlaceSelection" data-clicked="false" data-extra-value="E5" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat74" name="PlaceSelection" data-clicked="false" data-extra-value="E6" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat75" name="PlaceSelection" data-clicked="false" data-extra-value="E7" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat76" name="PlaceSelection" data-clicked="false" data-extra-value="E8" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat77" name="PlaceSelection" data-clicked="false" data-extra-value="E9" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat78" name="PlaceSelection" data-clicked="false" data-extra-value="E10" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat79" name="PlaceSelection" data-clicked="false" data-extra-value="E11" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat80" name="PlaceSelection" data-clicked="false" data-extra-value="E12" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat81" name="PlaceSelection" data-clicked="false" data-extra-value="E13" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat82" name="PlaceSelection" data-clicked="false" data-extra-value="E14" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat83" name="PlaceSelection" data-clicked="false" data-extra-value="E15" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat84" name="PlaceSelection" data-clicked="false" data-extra-value="E16" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat85" name="PlaceSelection" data-clicked="false" data-extra-value="E17" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat86" name="PlaceSelection" data-clicked="false" data-extra-value="E18" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>
    </div>
     <!-- D -->
    <div class='ButtonRect10'>
        <button class='PlaceButton' id="Seat87" name="PlaceSelection" data-clicked="false" data-extra-value="D1" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat88" name="PlaceSelection" data-clicked="false" data-extra-value="D2" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat89" name="PlaceSelection" data-clicked="false" data-extra-value="D3" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat90" name="PlaceSelection" data-clicked="false" data-extra-value="D4" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat91" name="PlaceSelection" data-clicked="false" data-extra-value="D5" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat92" name="PlaceSelection" data-clicked="false" data-extra-value="D6" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat93" name="PlaceSelection" data-clicked="false" data-extra-value="D7" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat94" name="PlaceSelection" data-clicked="false" data-extra-value="D8" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat95" name="PlaceSelection" data-clicked="false" data-extra-value="D9" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat96" name="PlaceSelection" data-clicked="false" data-extra-value="D10" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat97" name="PlaceSelection" data-clicked="false" data-extra-value="D11" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat98" name="PlaceSelection" data-clicked="false" data-extra-value="D12" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat99" name="PlaceSelection" data-clicked="false" data-extra-value="D13" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

        <button class='PlaceButton' id="Seat100" name="PlaceSelection" data-clicked="false" data-extra-value="D14" value='<?= $PricePlusQuant ?>' onclick='PlusSeatPrice4(this); toggleButtonColor(this)'>
            <div class='PricePlace'>6.99€</div>
        </button>

    </div>

</div>
</body>
    <form class='buttonForm' action="OrderUserData.php" method='POST'  >
        <input type="hidden" name="class" value="<?= $class ?>">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="hidden" name="plusPrice2" id="PriceField2" value="<?= $PricePlusQuant ?> ">
        <input type="hidden" name="seat" id="seat" value="<?= $extraValue ?>">
        <input type="hidden" name="LuggageСabin" value="<?= $LuggageСabin ?>">
        <input type="hidden" name="LuggageСompartment" value="<?= $LuggageСompartment ?>">
            <div class='ButtonBox'>
                    <button class='ContinueButton' type='submit' name='cardType' value=''>Continue</button>
                    
            </div>
        </form>

</html>