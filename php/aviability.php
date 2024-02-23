<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="../css/aviability.css" rel="stylesheet">
<title>documment</title>
</head>
<body>
<div class='rectangleHeader'>
    <div class='logorectangle'>
        <a>AVIA</a>
    </div>
    <a class='flightName'>Rīga (RIX)–Parīze (Charles de Gaulle) (CDG)</a> 
</div>
<div class='infoText'>
    <a class='Info1'>Izvēlies lidojumu datumus</a>
    <a class='Info2'>Izvēlies datumus, lai apskatītu lidojumus un cenas</a>
</div>


<div class="scrollable-box">
    <div class="calendar">
        <?php
        $months = [
            "January 2024", "February 2024", "March 2024", "April 2024",
            "May 2024", "June 2024", "July 2024", "August 2024",
            "September 2024", "October 2024", "November 2024", "December 2024"
        ];

        foreach ($months as $month) {
            echo "<div class='month'>";
            echo "<h3>$month</h3>";
            echo "<div class='days'>";
            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, array_search($month, $months) + 1, 2024);
            for ($i = 1; $i <= $daysInMonth; $i++) {
                echo "<div class='day'>$i</div>";
            }
            echo "</div></div>";
        }
        ?>
    </div>
</div>

<div class='greyRectangle'></div>
<div class='greyRectangle2'></div>

<a class='Info3'>Lidojums uz: Parīze (CDG)</a>
<div class='greyRectangle3'>
</div>
<div class='ticketPlace'>
<div class = 'ticketForm'>
    <div class='time'>
        <div class = 'departTime'>12:30</div>
        <div class = 'arrivTime'>14:30</div>
    </div>
    <div class = 'departITADA'>RIX</div>
    <div class = 'arrivITADA'>CMN</div>
    <div class = 'direction'>Tiešais reiss</div>
    <div class = 'allParts'>Lidojuma detaļas</div>
    <div class = 'wayTime'>В пути: 16ч05м</div>
    <div class = 'StyleRect'>
            <div class = 'grey1'></div>
            <div class = 'line1'></div>
            <div class = 'grey2'></div>
    </div>
</div>

</div>
</body>
</html>
