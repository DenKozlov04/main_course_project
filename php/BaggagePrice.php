<?php
include 'InfoOutput2.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/BaggagePrice.css" rel="stylesheet">
    <title>Additional services</title>
    <script src='../JS/givePrice.js'></script>
    <script src='../JS/OpenInfoPopUp.js'></script>
    <script src='../JS/AddRegBag.js'></script>
    <!-- <script src='../JS/PricePlusPrice.js'></script> -->
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
        <a class='Info'>Choose the ticket type that's right for you</a>
        <a class='Info2'>Price is per passenger</a>
    </div>
    <a class='Info3'><?="✈ Rīga – $City ($airport_name)"?></a>
    <a class='Info4'><?="$formattedDepartDate. &bull;  $departure_time - $arrival_time"?></a>
    <div class='ServiceBox'>
        <div class='ServiceCard'>
            <!-- то что берешь в самолет в салрн-->
            <div class='txt1'>Hand luggage</div>
            <div class='txt2'>1 x 8 kg</div>
            <div class='textrect'>
                <div class='txt3'>Included </div>
            </div>
            <div class='greyRect'></div>
            <div class='ImgBox'>
                <img class='img' src='../images/5beb4031dde8677a6866a1e2.png'>
            </div>
            <div class='PriceBox'>
                <div class='PricePlc'>
                    <div class='price1'>from</div>
                    <div class='price2'>12.99€</div>
                    <div class='price3'>one direction</div>
                </div>
                <button class='Button2' id="choose" name="Selection" value='<?= $CurrPrice ?>' onclick='PlusPrice1(this); toggleButtonColor(this)'>+8</button>
                <button class='Button3' id="choose2" name="Selection2" value='<?= $CurrPrice ?>' onclick='PlusPrice2(this); toggleButtonColor(this)'>+16</button>
                <button class='Button4' id="choose3" name="Selection3" value='<?= $CurrPrice ?>' onclick='PlusPrice3(this); toggleButtonColor(this)'>+24</button>
                <!-- <button class='Button5' id="choose4" name="Selection4" value='<?= $CurrPrice ?>' onclick='PlusPrice4(this); toggleButtonColor(this)'>+32</button> -->
<!-- ОБЩАЯ СУММА С УЧЕТОМ ВСЕХ ЦЕН ВСЕ ЕЩЕ НЕ РАБОТАЕТ ПРАВИЛЬНО ( НЕ ДОБАВЛЯЕТ В) -->

            </div>
        </div>
        <div class='ServiceCard'>
             <!-- то что помещается в багажный отсек-->
            <div class='txt1'>Checked baggage</div>
            <div class='txt2'>1 x 24 kg</div>
            <div class='textrect'>
                <div class='txt3'>Included</div>
            </div>
            <div class='greyRect'></div>
            <div class='ImgBox'>
                <img class='img' src='../images/5beb4031dde8677a6866a1e2.png'>
            </div>
            <div class='PriceBox'>
                <div class='PricePlc'>
                    <div class='price1'>from</div>
                    <div class='price2'>29.99€</div>
                    <div class='price3'>one direction</div>
                </div>
                <div class='BtnPlace'>
                <button class='ChooseButton2' id="choose22" name="circleSelection" value='<?= $CurrPrice ?>' onclick='ButtonClick1(this)'>-</button>
                <div class='quantity'>0</div>
                <button class='ChooseButton21' id="choose33" name="circleSelection" value='<?= $CurrPrice ?>' onclick='ButtonClick2(this)'>+</button>
                <div class='txt9'></div>

                </div>
        </div>
    </div>
    <!-- <div id="Open" class="Open">       ; OpenPlace("Open")
        <div class="OpenWindow">
        <div class='txt9'>1 x 24 kg</div>
        <button class='KgBtn' id="KgBtnId" value='' onclick='KgBtnClick(this)'>+9 kg</button>
            </div>
    </div> -->
    <form class='buttonForm' action="SeatChoose.php" method='POST'>
    <input type="hidden" name="id" value="<?= $id ?>">
    <input type="hidden" name="plusPrice2" id="PriceField2" value="<?= $CurrPrice ?>">
        <div class='ButtonBox'>
                <button class='ContinueButton' type='submit' name='cardType' value=''>Continue</button>
                
        </div>
    </form>
    <div class='InfoButtonField'>
        <button class='InfoButton1' onclick="openModal('modal1')">What is Hand Luggage</button>
        <button class='InfoButton2' onclick="openModal('modal2')">What is Checked Baggage</button>
    </div>

    <!-- окна поп апа -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modal1')">&times;</span>
            <p>Hand baggage at the airport is baggage that a passenger can take into the cabin of the aircraft and keep on his/her person during the flight. It is usually small in size and weight and can be easily placed in the over-seat or under-seat compartments.
                Hand luggage includes important personal items and valuables that the passenger does not want to leave in checked baggage. These may include documents, money, keys, electronic devices, medicines and other essentials that may be needed during the flight or immediately after arrival.
                Depending on the conditions of the ticket and the airline's rules, passengers are usually entitled to a certain amount of hand luggage. However, it is worth remembering that the airline has set limits on the size and weight of hand luggage to ensure that it fits easily in the hold and does not cause problems during the flight.</p>
        </div>
    </div>

    <div id="modal2" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modal2')">&times;</span>
            <p>Checked baggage at the airport is baggage that a passenger leaves at check-in before departure and is sent to the aircraft's baggage hold. These are usually large and heavy items that cannot be put in hand luggage or are needed at the final destination.
                These can be clothes, shoes, personal items and other necessities that the passenger does not want to carry in the cabin. Checked baggage is handled and loaded onto the aircraft by the airline.
                Passengers are usually entitled to a certain amount of free checked-in baggage, depending on the ticket conditions and class of service. However, if the weight of the checked baggage exceeds the free baggage allowance, the passenger may have to pay an extra fee for the excess weight.
                Sports equipment is included in checked-in baggage, which is the baggage that a passenger leaves at check-in before departure and is sent to the aircraft's baggage hold. It is part of the weight of the cargo for which a fee is charged. Checked baggage usually includes
                 large and heavy items that cannot be carried in hand luggage or are needed at the final destination. This can include clothes, shoes, personal items and other necessities that the passenger does not want to carry in the cabin. Checked baggage is handled and loaded onto the aircraft by the airline. 
                 Passengers are usually allowed a certain amount of free checked baggage, depending on the ticket conditions and class of service. However, if the weight of the checked baggage exceeds the free baggage allowance, the passenger may have to pay an extra fee for the excess weight.</p>
        
            </div>
    </div>


</body>
</html>
