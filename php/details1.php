<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['price']) && isset($_POST['id'])) {
    $price = $_POST['price'];
    $id = $_POST['id'];
    // echo $price;
    // echo $id;
    // Теперь у вас есть $price и $id, которые были переданы с предыдущей страницы через AJAX запрос
}
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
    <a class='flightName'>Rīga (RIX)–Parīze (Charles de Gaulle) (CDG)</a> 
</div>
<div class='offerBox'>
    <div class = 'OfferRect'>

    </div>
    <div class = 'OfferRect'>

    </div>
    <div class = 'OfferRect'>
        
    </div>
</div>
</body>
</html>