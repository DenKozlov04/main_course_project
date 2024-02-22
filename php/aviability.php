<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>documment</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f8f8f8;
    }
    .calendar {
        display: flex;
        flex-direction: column; 
        padding: 20px;
        width: 300px; 
        margin-left: 20px; 
    }
    .month {
        background-color: #ffffff;
        margin-bottom: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .month h3 {
        background-color: #f0f0f0;
        padding: 10px;
        margin: 0;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        text-align: center;
    }
    .days {
        padding: 10px;
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 5px;
    }
    .day {
        padding: 5px;
        text-align: center;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .day:hover {
        background-color: lightgreen;
    }
    .scrollable-box {
        width: 400px;
        height: 1000px;
        overflow: auto; /* или overflow: scroll; */
        border: 1px solid #ccc;
        padding: 10px;
    }
</style>
</head>
<body>
<div class="scrollable-box">
    <div class="calendar">
        <?php
        $months = [
            "January", "February", "March", "April",
            "May", "June", "July", "August",
            "September", "October", "November", "December"
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

</head>
</body>
</html>
