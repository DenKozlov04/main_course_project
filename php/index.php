
<!DOCTYPE html>
<html>
<head>
<title>Air travel throughout the Baltics</title>
<meta charset='utf-8' />
<link rel="stylesheet" type="text/css" href="../css/index.css">
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600&family=Poppins:ital,wght@1,600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="../JS/deleteCard.js"></script>
</head>

<nav>
  <input type="checkbox" id="check">
  <label for="check" class="checkbtn"> 
    <i class="fas fa-align-justify"></i> 
  </label>
  <div class='boxdiv'>
    <ul>
      <label class='pict1'>
        AVIA
      </label>
      <li><a href="../php/Buy_Tickets.php">buy tickets</a></li>
      <li><a href="../html/AboutUs.html">About us</a></li>
      <li><a href="../php/some page.php">Some page</a></li>
      <li><a href="../php/reviews.php">service reviews</a></li>
      <?php
        session_start();
        if ($_SESSION['user_id'] === 0 || ($_SESSION['admin_id'] === 1 and $_SESSION['user_id'] === 1)) {
          echo '<li><a href="../html/autorization.html" class="custom-btn LogIn">LOG IN</a></li>';
          echo '<li><a href="../html/registration.html" class="custom-btn LogIn">Sign up</a> </li>';
        }
      ?>   
    </ul>
  </div>
  <div class='pict5'>
    <?php
      

      $user_id = $_SESSION['user_id'];
      $admin_id = $_SESSION['admin_id'];
    
    
      
      $sql = "SELECT * FROM profile_images WHERE user_id = $user_id";
    
    
      $mysqli = new mysqli('localhost', 'root', '', 'airflightsdatabase');
      $result = $mysqli->query($sql);
    
      if ($_SESSION['admin_id'] == 1) {
           echo '<p><a class="special-link" href="user_info.php"><img src="../images/user_foto.png"  width="80" height="80"></a></p>';
      } elseif ($_SESSION['user_id'] == 0) {
          echo '<p><a class="special-link" href="../html/autorization.html"><img src="../images/user_foto.png"  width="80" height="80"></a></p>';
          
      } elseif ($result && $result->num_rows > 0) {
          $row = $result->fetch_array();
    
         $profile_image = $row['profile_image'];
          echo '<div class="special-link2" style="width: 60px; height: 60px; border-radius: 50%; overflow: hidden; display: flex; justify-content: center; align-items: center;">';
          echo '<a href="user_info.php" ><img src="data:image/jpeg;base64,' . base64_encode($profile_image) . '" width="90" height="85" /></a>';
          echo '</div>';
      } else {
          echo '<p><a class="special-link" href="user_info.php"><img src="../images/user_foto.png"  width="100" height="100"></a></p>';
      }
    
    
    // Закрываем соединение
    $mysqli->close();
    ?>
    
  </div>
</nav>


<!-- <body bgcolor="#e9a2a2"> -->
<body bgcolor="FFFFFF">
<div class="pict3"><img src="../images/pexels-arina-krasnikova-5708951.jpg"></div>
<p class="txt1">EXPLORE THE WORLD WITH US</p>

 <div class ='search' method="GET" action="SearchAirlines.php">
  <!-- <a href="SearchAirlines.php"  action="SearchAirlines.php"class="search-link" name="search_button"></a> -->
    <div class = 'box1-input'style="border-radius: 50px 0 0 50px;" action="SearchAirlines.php">
      <div class = 'input-data'>
        <input type="text" id="input" name="SearchRoute"  method="GET" placeholder="Riga-Paris" > 
        <label for="input-field">Enther the route:</label>
      </div>
    </div>
    <div class = 'box1-input' action="SearchAirlines.php">
      <div class = 'input-data'>
        <input type='text' name='SearchCountry'  method="GET" placeholder="Latvia">
        <label for="input-field">Choose country:</label>
      </div>  
    </div>
    <div class = 'box1-input' action="SearchAirlines.php">
      <div class = 'input-data'>
        <!-- <input type='text' name='parol' > -->
        <input type="date" id="date" method="GET" name="SearchArrival_date">
        <label for="input-field">Set your arrival date:</label>
      </div>  
    </div>
    <div class = 'box1-input' action="SearchAirlines.php">
      <div class = 'input-data'>
        <!-- <input type='text' name='post'  > -->
        <input type="date" method="GET" name="SearchDeparture_date">
        <label for="input-field">Set your departure date:</label>
      </div>
    </div>
    <div class = 'box1-input' style="border-radius: 0 50px 50px 0;">
      <div class = 'input-data'>
        <input type='text' name='passenger_number' method="GET" placeholder="for exmple: 1" >
        <label for="input-field">Select passenger number:</label>
      </div>
    </div> 
</div>

  <?php include 'card_data.php'; ?>




<div class=rect1></div>
<div class="pict4"><img src="../images/bgSales.png"></div>
 <style>
</style>
<p class="txt2">Nepalaidiet garām karstas atlaides!!</p>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

<div class= "txt3">Ceļojiet ērti ar mums</div>
<div class="swiper sample-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide" ><a href="../html/baggage_check_in.html"><img src="../images/1card.png"></a>
            <div class="text-overlay">Kā reģistrēt bagāžu</div>
            </div>
            <div class="swiper-slide"><a href="../html/place_selection.html"><img src="../images\2card.png"></a>
            <div class="text-overlay">Vietas izvēle</div>
          </div>
            <div class="swiper-slide"><a href="../html/luggage_weight.html"><img src="../images\3card.png"></a>
            <div class="text-overlay">Bagāžas svars</div>
          </div>
            <div class="swiper-slide"><a href="../html/animals_ journey.html"><img src="../images\4card.png"></a>
            <div class="text-overlay">Dzīvnieki ceļojumā</div>
          </div>
            <div class="swiper-slide"><a href="../html/discount offers.html"><img src="../images\5card.png"></a>
            <div class="text-overlay">Atlaižu piedāvājumi</div>
          </div>
            <div class="swiper-slide"><a href="../html/Ticket_cancel.html"><img src="../images\6card.png"></a>
            <div class="text-overlay">Biļešu atcelšana</div>
          </div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
    <script src="../JS/swiper.js"></script>
</body>


<footer>
    <div class="footer-content">
        <p>&copy; 2023 AVIA. Visas tiesības aizsargātas.</p>
        <p>Подпишитесь на нас в социальных сетях:</p>
        <ul class="social-links">
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Instagram</a></li>
        </ul>
    </div>
</footer>


</html>


