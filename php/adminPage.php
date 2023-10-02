<?php
session_start();

  echo $_SESSION['admin_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="..\css\adminPage.css" rel="stylesheet">
    <title>Admin page</title>
</head>
<body>

<form action="../php/admin.php" method="POST">
    <div class='changes'>
        <div class='Airline'>
            <div class='input-Airline'>
                <input type="text" id="Airline" name="Airline" placeholder="Airline name for example: Riga - Paris">
            </div>
        </div>

        <div class='airport_name'>
            <div class='input-airport_name'>
                <input type="text" id="airport_name" name="airport_name" placeholder="Write airport name for example: Moscov (Vnukovo)">
            </div>
        </div>

        <div class='ITADA'>
            <div class='input-ITADA'>
                <input type="text" id="ITADA" name="ITADA" placeholder="Write ITADA code for example: VKO">
            </div>
        </div>

        <div class='City'>
            <div class='input-City'>
                <input type="text" id="City" name="City" placeholder="Write airport City for example: Moscov">
            </div>
        </div>

        <div class='country'>
            <div class='input-country'>
                <input type="text" id="country" name="country" placeholder="Write airport country for example: Russia">
            </div>
        </div>

        <div class='T_price'>
            <div class='input-T_price'>
                <input type="text" id="T_price" name="T_price" placeholder="Write ticket price for example: 500 euro">
            </div>
        </div>

        <div class='arrival_date'>
            <div class='input-arrival_date'>
                <input type="text" id="arrival_date" name="arrival_date" placeholder="Write arrival date for example: 2023-05-01">
            </div>
        </div>

        <div class='departure_date'>
            <div class='input-departure_date'>
                <input type="text" id="departure_date" name="departure_date" placeholder="Write departure date for example: 2023-04-01">
            </div>
        </div>

        <div class='arrival_time'>
            <div class='input-arrival_date'>
                <input type="text" id="arrival_time" name="arrival_time" placeholder="Write arrival time for example: 12:30:00">
            </div>
        </div>

        <div class='departure_time'>
            <div class='input-arrival_date'>
                <input type="text" id="departure_time" name="departure_time" placeholder="Write departure time for example: 12:30:00">
            </div>
        </div>

        <div class='upload_changes'>
            <div class='input-create-profile'>
                <button type="submit" id="submit" name="submit">UPLOAD CHANGES</button>
            </div>
        </div>
    </div>
</form>


<form class="city-form" action="../php/addCard.php" method="POST" enctype="multipart/form-data">
    <label for="city-name">Название города:</label>
    <input type="text" id="city-name" name="city">

    <label for="price">Цена:</label>
    <input type="number" id="price" name="price">

    <label for="image">Изображение:</label>
    <input type="file" id="image" name="image">

    <input type="submit" value="Добавить">
</form>

</body>
</html>


