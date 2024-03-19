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
    <script src='../JS/givePrice.js'></script>
    <script src='../JS/OpenInfoPopUp.js'></script>
    <script src='../JS/AddRegBag.js'></script>
    <script src='../JS/PricePlusPrice.js'></script>
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
            <!-- то что берешь в самолет в салрн-->
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
                <button class='Button2' id="choose" name="Selection" value='<?= $CurrPrice ?>' onclick='PlusPrice1(this); toggleButtonColor(this)'>+8</button>
                <button class='Button3' id="choose2" name="Selection2" value='<?= $CurrPrice ?>' onclick='PlusPrice2(this); toggleButtonColor(this)'>+16</button>
                <button class='Button4' id="choose3" name="Selection3" value='<?= $CurrPrice ?>' onclick='PlusPrice3(this); toggleButtonColor(this)'>+24</button>
                <button class='Button5' id="choose4" name="Selection4" value='<?= $CurrPrice ?>' onclick='PlusPrice4(this); toggleButtonColor(this)'>+32</button>


            </div>
        </div>
        <div class='ServiceCard'>
             <!-- то что помещается в багажный отсек-->
            <div class='txt1'>Reģistrētā bagāža</div>
            <div class='txt2'>1 x 24 kg</div>
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
                    <div class='price2'>29.99€</div>
                    <div class='price3'>vienā virzienā</div>
                </div>
                <div class='BtnPlace'>
                <button class='ChooseButton2' id="choose22" name="circleSelection" value='' onclick='ButtonClick1(this)'>-</button>
                <div class='quantity'>0</div>
                <button class='ChooseButton21' id="choose33" name="circleSelection" value='' onclick='ButtonClick2(this)'>+</button>
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
    <form class='buttonForm' action="" method='POST'>
    <input type="hidden" name="id" value="<?= $id ?>">
    <input type="hidden" name="plusPrice" id="PriceField2" value="">
        <div class='ButtonBox'>
                <button class='ContinueButton' type='submit' name='cardType' value=''>Turpinat</button>
                
        </div>
    </form>
    <div class='InfoButtonField'>
        <button class='InfoButton1' onclick="openModal('modal1')">Kas ir Rokas bagāža</button>
        <button class='InfoButton2' onclick="openModal('modal2')">Kas ir Reģistrētā bagāža</button>
    </div>

    <!-- окна поп апа -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modal1')">&times;</span>
            <p>Rokas bagāža lidostā ir bagāža, ko pasažieris var ņemt līdzi lidmašīnas salonā un turēt lidojuma laikā pie rokas. Tā parasti ir neliela izmēra un svara, un to var viegli ievietot bagāžas nodalījumos virs sēdekļiem vai zem pasažiera sēdekļa.
                Rokas bagāžā ietilpst svarīgi personiski priekšmeti un vērtslietas, ko pasažieris nevēlas atstāt reģistrētajā bagāžā. Tie var būt dokumenti, nauda, atslēgas, elektroniskās ierīces, medikamenti un citas pirmās nepieciešamības lietas, kas var būt nepieciešamas lidojuma laikā vai tūlīt pēc ielidošanas.
                Atkarībā no biļetes nosacījumiem un aviosabiedrības noteikumiem pasažieriem parasti ir tiesības uz noteiktu rokas bagāžas daudzumu. Tomēr ir vērts atcerēties, ka aviosabiedrība ir noteikusi ierobežojumus rokas bagāžas izmēram un svaram, lai nodrošinātu, ka tā viegli iekļaujas bagāžas nodalījumos un nerada problēmas lidojuma laikā.</p>
        </div>
    </div>

    <div id="modal2" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modal2')">&times;</span>
            <p>Reģistrētā bagāža lidostā ir bagāža, ko pasažieris pirms izlidošanas atstāj pie reģistrācijas un kas tiek nosūtīta uz lidmašīnas bagāžas nodalījumu. Parasti tie ir lieli un smagi priekšmeti, kurus nevar ievietot rokas bagāžā vai kuri ir nepieciešami galamērķī.
                Tās var būt drēbes, apavi, personīgie priekšmeti un citi nepieciešamie priekšmeti, kurus pasažieris nevēlas pārvadāt lidmašīnas salonā. Reģistrēto bagāžu apstrādā un iekrauj lidmašīnā aviosabiedrība.
                Pasažieriem parasti ir tiesības uz noteiktu bezmaksas reģistrētās bagāžas daudzumu atkarībā no biļetes noteikumiem un pakalpojuma klases. Tomēr, ja reģistrētās bagāžas svars pārsniedz bezmaksas bagāžas limitu, pasažierim var nākties maksāt papildu maksu par lieko svaru.
                Sporta inventārs ir iekļauts lidostā reģistrētajā bagāžā, kas ir bagāža, kuru pasažieris atstāj pie reģistrācijas pirms izlidošanas un kura tiek nosūtīta uz lidmašīnas bagāžas nodalījumu. Tā ir daļa no kravas svara, par kuru tiek iekasēta maksa. Reģistrētajā bagāžā parasti ietilpst
                 lieli un smagi priekšmeti, kurus nevar ievietot rokas bagāžā vai kuri ir nepieciešami galamērķī. Tie var būt apģērbs, apavi, personīgie priekšmeti un citi nepieciešamie priekšmeti, kurus pasažieris nevēlas pārvadāt lidmašīnas salonā. Reģistrēto bagāžu apstrādā un iekrauj lidmašīnā aviosabiedrība. 
                 Pasažieriem parasti ir noteikts reģistrētās bagāžas bezmaksas daudzums atkarībā no biļetes noteikumiem un pakalpojuma klases. Tomēr, ja reģistrētās bagāžas svars pārsniedz bezmaksas bagāžas limitu, pasažierim var nākties maksāt papildu maksu par lieko svaru.</p>
        
            </div>
    </div>


</body>
</html>
