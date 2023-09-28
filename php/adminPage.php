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
    <link href="admin.css" rel="stylesheet">
    <title>Admin page</title>
</head>
<body>

<form action="php\admin.php" method="post"></form>
    <div class ='changes'>
      <form action="php\admin.php" method="post">
        <div class = 'Airline'>
          <div class = 'input-Airline'>
            <input type="text" id="input" name="Airline" placeholder="Airline name for example: Riga - Paris"> 

          </div>
        </div>

        <div class = 'airport_name'>
            <div class = 'input-airport_name'>
              <input type="text" id="input" name="airport_name" placeholder="Write airport name for example: Moscov (Vnukovo)"> 

            </div>
          </div>

          <div class = 'ITADA'>
            <div class = 'input-ITADA'>
              <input type="text" id="input" name="ITADA" placeholder="Write ITADA code for example: VKO"> 
 
            </div>
          </div>

          <div class = 'City'>
            <div class = 'input-City'>
              <input type="text" id="input" name="City" placeholder="Write airport City for example: Moscov"> 
              <!-- <label for="input-field">Create your password</label> -->
            </div>

            <div class = 'country'>
            <div class = 'input-country'>
                <input type="text" id="input" name="country" placeholder="Write airport country for example: Russia"> 
                <!-- <label for="input-field">Create your password</label> -->
              </div>
            </div>
            <div class = 'T_price'>
                <div class = 'input-T_price'>
                    <input type="text" id="input" name="T_price" placeholder="Write ticket price for example: 500 euro"> 
                    <!-- <label for="input-field">Create your password</label> -->
                  </div>
                </div>
                <div class = 'arrival_date'>
                    <div class = 'input-arrival_date'>
                        <input type="text" id="input" name="arrival_date" placeholder="Write arrival date for example: 2023-05-01"> 
                        <!-- <label for="input-field">Create your password</label> -->
                        </div>
                    </div>
                <div class = 'departure_date'>
                  <div class = 'input-departure_date'>
                      <input type="text" id="input" name="departure_date" placeholder="Write departure date for example: 2023-04-01"> 
                      <!-- <label for="input-field">Create your password</label> -->
                    </div>
                  </div>
                  <div class = 'arrival_time'>
                    <div class = 'input-arrival_date'>
                        <input type="text" id="input" name="arrival_time" placeholder="Write arrival time for example: 12:30:00"> 
                        <!-- <label for="input-field">Create your password</label> -->
                        </div>
                    </div>
                    <div class = 'departure_time'>
                      <div class = 'input-arrival_date'>
                          <input type="text" id="input" name="departure_time" placeholder="Write departure time for example: 12:30:00"> 
                          <!-- <label for="input-field">Create your password</label> -->
                          </div>
                      </div>
            <div class = 'upload_changes'>
                <div class = 'input-create-profile'>
                    <button type="text" id="input" name="input" placeholder=""> UPLOAD CHANGES</button>
                </div>

          </div>
        </form>
    </div>
</div>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление города</title>
</head>
<body>
    <form action="Html\addCard.php" method="POST" enctype="multipart/form-data">
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