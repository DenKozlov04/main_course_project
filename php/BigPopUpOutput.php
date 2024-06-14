<?php
include "ChildSeatCheck.php";

echo '<script>';
echo 'var flightId = ' . json_encode($id) . ';';

echo '</script>';
?>

<script src="../JS/ChildSeat.js"></script>
<div id="modal7" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modal7')"style="cursor: pointer;">&times;</span>
            <p>Visas vietas</p>
            <form class='ChooseSeatForm' action="" method='POST'>
            <input type='hidden' name='ChooseSeat'>
            <input type='hidden' name='Price' id='priceField'>
            <input type='hidden' name='PlaceName' id='placeNameField'>
            <button name='ChooseSeatBtn' type='button' class="close" onclick="closeModal('modal7')">Choose a seat</button>
                <div class='ButtonRect1'>
                    <!-- type='submit' -->

    <button class='PlaceButton' id="Seat1" name="PlaceSelection" data-clicked="false" data-extra-value="A1" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>29.99€</div>
        <span class='SeatLocation'>A1</span>
    </button>

    <button class='PlaceButton' id="Seat2" name="PlaceSelection" data-clicked="false" data-extra-value="A2" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>29.99€</div>
        <span class='SeatLocation'>A2</span>
    </button>

    <button class='PlaceButton' id="Seat3" name="PlaceSelection" data-clicked="false" data-extra-value="A3" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>29.99€</div>
        <span class='SeatLocation'>A3</span>
    </button>

    <button class='PlaceButton' id="Seat4" name="PlaceSelection" data-clicked="false" data-extra-value="A4" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>29.99€</div>
        <span class='SeatLocation'>A4</span>
    </button>


    </div>
     <!-- B -->
    <div class='ButtonRect2'>

    <button class='PlaceButton' id="Seat5" name="PlaceSelection" data-clicked="false" data-extra-value="B1" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>19.99€</div>
        <span class='SeatLocation'>B1</span>
    </button>

       <button class='PlaceButton' id="Seat6" name="PlaceSelection" data-clicked="false" data-extra-value="B2" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>19.99€</div>
        <span class='SeatLocation'>B2</span>
    </button>

       <button class='PlaceButton' id="Seat7" name="PlaceSelection" data-clicked="false" data-extra-value="B3" value='' onclick='PlusSeatPrice2(this); toggleButtonColor(this)'>
        <div class='PricePlace'>19.99€</div>
        <span class='SeatLocation'>B3</span>
    </button>

   <button class='PlaceButton' id="Seat8" name="PlaceSelection" data-clicked="false" data-extra-value="B4" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
         <div class='PricePlace'>19.99€</div>
        <span class='SeatLocation'>B4</span>
    </button>

    </div>
     <!-- E -->
    <div class='ButtonRect3'>

        <button class='PlaceButton' id="Seat9" name="PlaceSelection" data-clicked="false" data-extra-value="E1" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
            <div class='PricePlace'>19.99€</div>
            <span class='SeatLocation'>E1</span>
        </button>

        <button class='PlaceButton' id="Seat10" name="PlaceSelection" data-clicked="false" data-extra-value="E2" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
            <div class='PricePlace'>19.99€</div>
            <span class='SeatLocation'>E2</span>
        </button>

        <button class='PlaceButton' id="Seat11" name="PlaceSelection" data-clicked="false" data-extra-value="E3" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
            <div class='PricePlace'>19.99€</div>
            <span class='SeatLocation'>E3</span>
        </button>

        <button class='PlaceButton' id="Seat12" name="PlaceSelection" data-clicked="false" data-extra-value="E4" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
            <div class='PricePlace'>19.99€</div>
            <span class='SeatLocation'>E4</span>
        </button>

    </div>
    <!-- F -->
    <div class='ButtonRect4'>
        <button class='PlaceButton' id="Seat13" name="PlaceSelection" data-clicked="false" data-extra-value="F1" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
            <div class='PricePlace'>29.99€</div>
            <span class='SeatLocation'>F1</span>
        </button>

        <button class='PlaceButton' id="Seat14" name="PlaceSelection" data-clicked="false" data-extra-value="F2" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
            <div class='PricePlace'>29.99€</div>
            <span class='SeatLocation'>F2</span>
        </button>

        <button class='PlaceButton' id="Seat15" name="PlaceSelection" data-clicked="false" data-extra-value="F3" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
            <div class='PricePlace'>29.99€</div>
            <span class='SeatLocation'>F3</span>
        </button>

        <button class='PlaceButton' id="Seat16" name="PlaceSelection" data-clicked="false" data-extra-value="F4" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
            <div class='PricePlace'>29.99€</div>
            <span class='SeatLocation'>F4</span>
        </button>
    </div>
    <!-- A2 -->
    <div class='ButtonRect5'>
            <button class='PlaceButton' id="Seat17" name="PlaceSelection" data-clicked="false" data-extra-value="A5" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
            <span class='SeatLocation'>A5</span>
        </button>

        <button class='PlaceButton' id="Seat18" name="PlaceSelection" data-clicked="false" data-extra-value="A6" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
            <span class='SeatLocation'>A6</span>
        </button>

        <button class='PlaceButton' id="Seat19" name="PlaceSelection" data-clicked="false" data-extra-value="A7" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
            <span class='SeatLocation'>A7</span>
        </button>

        <button class='PlaceButton' id="Seat20" name="PlaceSelection" data-clicked="false" data-extra-value="A8" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
            <span class='SeatLocation'>A8</span>
        </button>

        <button class='PlaceButton' id="Seat21" name="PlaceSelection" data-clicked="false" data-extra-value="A9" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
            <span class='SeatLocation'>A9</span>
        </button>

        <button class='PlaceButton' id="Seat22" name="PlaceSelection" data-clicked="false" data-extra-value="A10" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
            <span class='SeatLocation'>A10</span>
        </button>

        <button class='PlaceButton' id="Seat23" name="PlaceSelection" data-clicked="false" data-extra-value="A11" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
            <span class='SeatLocation'>A11</span>
        </button>

        <button class='PlaceButton' id="Seat24" name="PlaceSelection" data-clicked="false" data-extra-value="A12" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
            <span class='SeatLocation'>A12</span>
        </button>

        <button class='PlaceButton' id="Seat25" name="PlaceSelection" data-clicked="false" data-extra-value="A13" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
            <span class='SeatLocation'>A13</span>
        </button>

        <button class='PlaceButton' id="Seat26" name="PlaceSelection" data-clicked="false" data-extra-value="A14" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
            <span class='SeatLocation'>A14</span>
        </button>

        <button class='PlaceButton' id="Seat27" name="PlaceSelection" data-clicked="false" data-extra-value="A15" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
            <span class='SeatLocation'>A15</span>
        </button>

        <button class='PlaceButton' id="Seat28" name="PlaceSelection" data-clicked="false" data-extra-value="A16" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
            <span class='SeatLocation'>A16</span>
        </button>

        <button class='PlaceButton' id="Seat29" name="PlaceSelection" data-clicked="false" data-extra-value="A17" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
            <span class='SeatLocation'>A17</span>
        </button>

        <button class='PlaceButton' id="Seat30" name="PlaceSelection" data-clicked="false" data-extra-value="A18" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
            <div class='PricePlace'>9.99€</div>
            <span class='SeatLocation'>A18</span>
        </button>


    </div>
     <!-- B2 -->
    <div class='ButtonRect6'>

        <button class='PlaceButton' id="Seat31" name="PlaceSelection" data-clicked="false" data-extra-value="B5" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>B5</span>
    </button>

    <button class='PlaceButton' id="Seat32" name="PlaceSelection" data-clicked="false" data-extra-value="B6" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>B6</span>
    </button>

    <button class='PlaceButton' id="Seat33" name="PlaceSelection" data-clicked="false" data-extra-value="B7" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>B7</span>
    </button>

    <button class='PlaceButton' id="Seat34" name="PlaceSelection" data-clicked="false" data-extra-value="B8" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>B8</span>
    </button>

    <button class='PlaceButton' id="Seat35" name="PlaceSelection" data-clicked="false" data-extra-value="B9" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>B9</span>
    </button>

    <button class='PlaceButton' id="Seat36" name="PlaceSelection" data-clicked="false" data-extra-value="B10" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>B10</span>
    </button>

    <button class='PlaceButton' id="Seat37" name="PlaceSelection" data-clicked="false" data-extra-value="B11" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>B11</span>
    </button>

    <button class='PlaceButton' id="Seat38" name="PlaceSelection" data-clicked="false" data-extra-value="B12" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>B12</span>
    </button>

    <button class='PlaceButton' id="Seat39" name="PlaceSelection" data-clicked="false" data-extra-value="B13" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>B13</span>
    </button>

    <button class='PlaceButton' id="Seat40" name="PlaceSelection" data-clicked="false" data-extra-value="B14" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>B14</span>
    </button>

    <button class='PlaceButton' id="Seat41" name="PlaceSelection" data-clicked="false" data-extra-value="B15" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>B15</span>
    </button>

    <button class='PlaceButton' id="Seat42" name="PlaceSelection" data-clicked="false" data-extra-value="B16" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>B16</span>
    </button>

    <button class='PlaceButton' id="Seat43" name="PlaceSelection" data-clicked="false" data-extra-value="B17" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>B17</span>
    </button>

    <button class='PlaceButton' id="Seat44" name="PlaceSelection" data-clicked="false" data-extra-value="B18" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>B18</span>
    </button>


    </div>
     <!-- C -->
    <div class='ButtonRect7'>

        <button class='PlaceButton' id="Seat45" name="PlaceSelection" data-clicked="false" data-extra-value="C1" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>C1</span>
    </button>

    <button class='PlaceButton' id="Seat46" name="PlaceSelection" data-clicked="false" data-extra-value="C2" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>C2</span>
    </button>

    <button class='PlaceButton' id="Seat47" name="PlaceSelection" data-clicked="false" data-extra-value="C3" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>C3</span>
    </button>

    <button class='PlaceButton' id="Seat48" name="PlaceSelection" data-clicked="false" data-extra-value="C4" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>C4</span>
    </button>

    <button class='PlaceButton' id="Seat49" name="PlaceSelection" data-clicked="false" data-extra-value="C5" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>C5</span>
    </button>

    <button class='PlaceButton' id="Seat50" name="PlaceSelection" data-clicked="false" data-extra-value="C6" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>C6</span>
    </button>

    <button class='PlaceButton' id="Seat51" name="PlaceSelection" data-clicked="false" data-extra-value="C7" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>C7</span>
    </button>

    <button class='PlaceButton' id="Seat52" name="PlaceSelection" data-clicked="false" data-extra-value="C8" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>C8</span>
    </button>

    <button class='PlaceButton' id="Seat53" name="PlaceSelection" data-clicked="false" data-extra-value="C9" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>C9</span>
    </button>

    <button class='PlaceButton' id="Seat54" name="PlaceSelection" data-clicked="false" data-extra-value="C10" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>C10</span>
    </button>

    <button class='PlaceButton' id="Seat55" name="PlaceSelection" data-clicked="false" data-extra-value="C11" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>C11</span>
    </button>

    <button class='PlaceButton' id="Seat56" name="PlaceSelection" data-clicked="false" data-extra-value="C12" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>C12</span>
    </button>

    <button class='PlaceButton' id="Seat57" name="PlaceSelection" data-clicked="false" data-extra-value="C13" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>C13</span>
    </button>

    <button class='PlaceButton' id="Seat58" name="PlaceSelection" data-clicked="false" data-extra-value="C14" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>C14</span>
    </button>

    </div>
     <!-- F2 -->
    <div class='ButtonRect8'>
       
        <button class='PlaceButton' id="Seat59" name="PlaceSelection" data-clicked="false" data-extra-value="F5" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>9.99€</div>
        <span class='SeatLocation'>F5</span>
    </button>

    <button class='PlaceButton' id="Seat60" name="PlaceSelection" data-clicked="false" data-extra-value="F6" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>9.99€</div>
        <span class='SeatLocation'>F6</span>
    </button>

    <button class='PlaceButton' id="Seat61" name="PlaceSelection" data-clicked="false" data-extra-value="F7" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>9.99€</div>
        <span class='SeatLocation'>F7</span>
    </button>

    <button class='PlaceButton' id="Seat62" name="PlaceSelection" data-clicked="false" data-extra-value="F8" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>9.99€</div>
        <span class='SeatLocation'>F8</span>
    </button>

    <button class='PlaceButton' id="Seat63" name="PlaceSelection" data-clicked="false" data-extra-value="F9" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>9.99€</div>
        <span class='SeatLocation'>F9</span>
    </button>

    <button class='PlaceButton' id="Seat64" name="PlaceSelection" data-clicked="false" data-extra-value="F10" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>9.99€</div>
        <span class='SeatLocation'>F10</span>
    </button>

    <button class='PlaceButton' id="Seat65" name="PlaceSelection" data-clicked="false" data-extra-value="F11" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>9.99€</div>
        <span class='SeatLocation'>F11</span>
    </button>

    <button class='PlaceButton' id="Seat66" name="PlaceSelection" data-clicked="false" data-extra-value="F12" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>9.99€</div>
        <span class='SeatLocation'>F12</span>
    </button>

    <button class='PlaceButton' id="Seat67" name="PlaceSelection" data-clicked="false" data-extra-value="F13" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>9.99€</div>
        <span class='SeatLocation'>F13</span>
    </button>

    <button class='PlaceButton' id="Seat68" name="PlaceSelection" data-clicked="false" data-extra-value="F14" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>9.99€</div>
        <span class='SeatLocation'>F14</span>
    </button>

    <button class='PlaceButton' id="Seat69" name="PlaceSelection" data-clicked="false" data-extra-value="F15" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>9.99€</div>
        <span class='SeatLocation'>F15</span>
    </button>

    <button class='PlaceButton' id="Seat70" name="PlaceSelection" data-clicked="false" data-extra-value="F16" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>9.99€</div>
        <span class='SeatLocation'>F16</span>
    </button>

    <button class='PlaceButton' id="Seat71" name="PlaceSelection" data-clicked="false" data-extra-value="F17" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>9.99€</div>
        <span class='SeatLocation'>F17</span>
    </button>

    <button class='PlaceButton' id="Seat72" name="PlaceSelection" data-clicked="false" data-extra-value="F18" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>9.99€</div>
        <span class='SeatLocation'>F18</span>
    </button>

    </div>
     <!-- E2 -->
    <div class='ButtonRect9'>

        <button class='PlaceButton' id="Seat73" name="PlaceSelection" data-clicked="false" data-extra-value="E5" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>E5</span>
    </button>

    <button class='PlaceButton' id="Seat74" name="PlaceSelection" data-clicked="false" data-extra-value="E6" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>E6</span>
    </button>

    <button class='PlaceButton' id="Seat75" name="PlaceSelection" data-clicked="false" data-extra-value="E7" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>E7</span>
    </button>

    <button class='PlaceButton' id="Seat76" name="PlaceSelection" data-clicked="false" data-extra-value="E8" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>E8</span>
    </button>

    <button class='PlaceButton' id="Seat77" name="PlaceSelection" data-clicked="false" data-extra-value="E9" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>E9</span>
    </button>

    <button class='PlaceButton' id="Seat78" name="PlaceSelection" data-clicked="false" data-extra-value="E10" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>E10</span>
    </button>

    <button class='PlaceButton' id="Seat79" name="PlaceSelection" data-clicked="false" data-extra-value="E11" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>E11</span>
    </button>

    <button class='PlaceButton' id="Seat80" name="PlaceSelection" data-clicked="false" data-extra-value="E12" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>E12</span>
    </button>

    <button class='PlaceButton' id="Seat81" name="PlaceSelection" data-clicked="false" data-extra-value="E13" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>E13</span>
    </button>

    <button class='PlaceButton' id="Seat82" name="PlaceSelection" data-clicked="false" data-extra-value="E14" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>E14</span>
    </button>

    <button class='PlaceButton' id="Seat83" name="PlaceSelection" data-clicked="false" data-extra-value="E15" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>E15</span>
    </button>

    <button class='PlaceButton' id="Seat84" name="PlaceSelection" data-clicked="false" data-extra-value="E16" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>E16</span>
    </button>

    <button class='PlaceButton' id="Seat85" name="PlaceSelection" data-clicked="false" data-extra-value="E17" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>E17</span>
    </button>

    <button class='PlaceButton' id="Seat86" name="PlaceSelection" data-clicked="false" data-extra-value="E18" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>E18</span>
    </button>

    </div>
     <!-- D -->
    <div class='ButtonRect10'>
        <button class='PlaceButton' id="Seat87" name="PlaceSelection" data-clicked="false" data-extra-value="D1" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>D1</span>
    </button>

    <button class='PlaceButton' id="Seat88" name="PlaceSelection" data-clicked="false" data-extra-value="D2" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>D2</span>
    </button>

    <button class='PlaceButton' id="Seat89" name="PlaceSelection" data-clicked="false" data-extra-value="D3" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>D3</span>
    </button>

    <button class='PlaceButton' id="Seat90" name="PlaceSelection" data-clicked="false" data-extra-value="D4" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>D4</span>
    </button>

    <button class='PlaceButton' id="Seat91" name="PlaceSelection" data-clicked="false" data-extra-value="D5" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>D5</span>
    </button>

    <button class='PlaceButton' id="Seat92" name="PlaceSelection" data-clicked="false" data-extra-value="D6" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>D6</span>
    </button>

    <button class='PlaceButton' id="Seat93" name="PlaceSelection" data-clicked="false" data-extra-value="D7" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>D7</span>
    </button>

    <button class='PlaceButton' id="Seat94" name="PlaceSelection" data-clicked="false" data-extra-value="D8" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>D8</span>
    </button>

    <button class='PlaceButton' id="Seat95" name="PlaceSelection" data-clicked="false" data-extra-value="D9" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>D9</span>
    </button>

    <button class='PlaceButton' id="Seat96" name="PlaceSelection" data-clicked="false" data-extra-value="D10" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>D10</span>
    </button>

    <button class='PlaceButton' id="Seat97" name="PlaceSelection" data-clicked="false" data-extra-value="D11" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>D11</span>
    </button>

    <button class='PlaceButton' id="Seat98" name="PlaceSelection" data-clicked="false" data-extra-value="D12" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>D12</span>
    </button>

    <button class='PlaceButton' id="Seat99" name="PlaceSelection" data-clicked="false" data-extra-value="D13" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>D13</span>
    </button>

    <button class='PlaceButton' id="Seat100" name="PlaceSelection" data-clicked="false" data-extra-value="D14" value='' onclick='PlusChildSeatPrice(this); toggleButtonColor(this)'>
        <div class='PricePlace'>6.99€</div>
        <span class='SeatLocation'>D14</span>
    </button>


    </div>

</div>
            </form>
        </div>
    </div>