
<!DOCTYPE html>
<html>
<head>
<title>Air travel throughout the Baltics</title>
<meta charset='utf-8' />
<link rel="stylesheet" type="text/css" href="../css/index.css">
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600&family=Poppins:ital,wght@1,600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script src="../JS/translateScript.js"></script>
    <script src="../JS/sweetalert.min.js"></script>
</head>
<script>
        document.addEventListener("DOMContentLoaded", function() {
            const urlParams = new URLSearchParams(window.location.search);
            const alertMessage = urlParams.get('alert');

            if (alertMessage) {
               
                swal({
                title: "Attention!",
                text: decodeURIComponent(alertMessage),
                icon: "warning",
                button: 'OK'
            });
            }
        });
    </script>
<div class='rectangleHeader'>
    <div class='logorectangle'>
        <a>AVIA</a>
    </div>


    <div class='ButtonRect'>
  
        <a href="">Airline Partners</a>

        <a href="">About us</a>
        <a href="">Travel Tips</a> 
        <a href="../php/reviews.php">Reviews</a>
        <?php
          session_start();

        ?>
    </div>   

  <div class='greyRect1'></div>
  <div class='rectangleHeader2'></div>
  <div class='greyRect1'></div>
  <div class='ButtonRect2'>
        <a href="">Meals on the plane</a>
        <a href="">Pets on the move</a>
        <a href="">Seats on board</a>
        <a href="">Baggage</a>
        <a href="">Need Help?</a>
  </div>
</div>

  <?php

   
    if (!isset($_SESSION['page_opened']) || !$_SESSION['page_opened'] || !isset($_SERVER['HTTP_REFERER']) || empty($_SERVER['HTTP_REFERER'])) {
        $_SESSION['page_opened'] = true; 
        $_SESSION['user_id'] = 0; 
        $_SESSION['admin_id'] = 0; 
    }

    $user_id = $_SESSION['user_id'];
    $admin_id = $_SESSION['admin_id'];

    $sql = "SELECT * FROM profile_images WHERE user_id = $user_id";

    include 'dbconfig.php';

    $result = $mysqli->query($sql);

    if ($_SESSION['admin_id'] == 1) {
      echo '<div class="UserImgBox" onclick="location.href=\'user_info.php\';">
                <div class="TextElemment">Hello Admin</div>
                <img src="../images/user_foto.png" width="70" height="70">
            </div>';
  } elseif ($_SESSION['user_id'] == 0) {
      echo '<div class="UserImgBox" onclick="location.href=\'../html/autorization.html\';">
                <div class="TextElemment">Log in/Register</div>
                <img src="../images/user_foto.png" width="70" height="70">
            </div>';
  } elseif ($result && $result->num_rows > 0) {
      $row = $result->fetch_array();
      $profile_image = $row['profile_image'];
      echo '<div class="UserImgBox2" onclick="location.href=\'user_info.php\';">
                <div class="TextElemment">Your profile</div>
                <div class = "imgdiv"style="width: 45px; height: 45px; border-radius: 50%; overflow: hidden; display: flex; justify-content: center; align-items: center; ">
                    <img src="data:image/jpeg;base64,' . base64_encode($profile_image) . '" width="70" height="65">
                </div>
            </div>';
  } else {
      echo '<div class="UserImgBox3" onclick="location.href=\'user_info.php\';">
                <div class="TextElemment">Your profile</div>
                <img src="../images/user_foto.png" width="70" height="70">
            </div>';
  }
  
    $mysqli->close();

?>

    
  </div>

<div class='SearchBox'>
    <div class="search">
        <form method="GET" action="../php/FilteredTickets.php">
            <div class="box1-input" style="">
                <div class="input-data">
                    <label for="input-field">Enter the route:</label>
                    <select id="flightname" name="SearchRoute">
                            <option value="">Select Airline</option>
                            <?php
                            
                            include 'dbconfig.php';
                            $sql_airline = "SELECT DISTINCT Airline FROM `airports/airlines`";
                            $result_airlines = $mysqli->query($sql_airline);
                            if ($result_airlines->num_rows > 0) {
                                while ($row = $result_airlines->fetch_assoc()) {
                                    echo '<option value="' . $row["Airline"] . '">' . $row["Airline"] . '</option>';
                                }
                            } else {
                                echo '<option value="">No Airlines Available</option>';
                            }
                            ?>
                        </select>

                </div>
            </div>
            <div class="box2-input">
                <div class="input-data">
                    <label for="input-field">Choose country:</label>
                    <select name="SearchCountry">
                            <option value="">Select Country</option>
                            <?php
                           
                            $sql_country = "SELECT DISTINCT country FROM `airports/airlines`";
                            $result_countries = $mysqli->query($sql_country);
                            if ($result_countries->num_rows > 0) {
                                while ($row = $result_countries->fetch_assoc()) {
                                    echo '<option value="' . $row["country"] . '">' . $row["country"] . '</option>';
                                }
                            } else {
                                echo '<option value="">No Countries Available</option>';
                            }
                            ?>
                        </select>

                </div>
            </div>
            <div class="box3-input">
                <div class="input-data">
                    <input type="date" id="date" name="SearchArrival_date">
                    <label for="input-field">Set your arrival date:</label>
                </div>
            </div>
            <div class="box4-input">
                <div class="input-data">
                    <input type="date" name="SearchDeparture_date">
                    <label for="input-field">Set your departure date:</label>
                </div>
            </div>
            <div class="box5-input" style="">
                <div class="input-data">
                    <button class="Search_button" type="submit" name="passenger_number" placeholder="plc1">
                      <p class='InfoText2'>To</p>
                      <p class='InfoText1'>Search for tickets</p>
                    </button>
                </div>
            </div>
        </form>
    </div>
  <div class='DepartBox'>
      <p class='InfoText3'>From </p>
      <p class='InfoText4'>RIX</p>
      <p class='InfoText5'>Rīga</p>
  </div>
</div>
<div class="swiper sample-slider2">
        <div class="swiper-wrapper">
            <div class="swiper-slide" ><a ><img src="../images\airplane-seats-2570438_1920.jpg"></a>
          
            </div>
            <div class="swiper-slide"><a ><img src="../images\architecture-3337988_1920.jpg"></a>
   
          </div>
            <div class="swiper-slide"><a ><img src="../images\pexels-maria-tyutina-249581 (1).jpg"></a>
      
          </div>
            <div class="swiper-slide"><a ><img src="../images\pexels-tanathip-rattanatum-2026324.jpg"></a>
      
          </div>
            <div class="swiper-slide"><a ><img src="../images\pexels-victor-freitas-1381415.jpg"></a>
     
          </div>
            <div class="swiper-slide"><a ><img src="../images\travel-5219496_1920.jpg"></a>
    
          </div>
        </div>
        <div class="swiper-pagination2"></div>

    </div>
    <script src="../JS/BigSwiper.js"></script>
<div class='GreyRect'></div>

<div class=rect1></div>

 <style>
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>


<div class="swiper sample-slider" style="margin-top: 850px;">
        <div class="swiper-wrapper">
            <div class="swiper-slide" ><a href=""><img src="../images/1card.png"></a>
            <div class="text-overlay">How to register luggage</div>
            </div>
            <div class="swiper-slide"><a href=""><img src="../images\2card.png"></a>
            <div class="text-overlay">Seat selection</div>
          </div>
            <div class="swiper-slide"><a href=""><img src="../images\3card.png"></a>
            <div class="text-overlay">Luggage weight</div>
          </div>
            <div class="swiper-slide"><a href=""><img src="../images\4card.png"></a>
            <div class="text-overlay">Pets during travel</div>
          </div>
            <div class="swiper-slide"><a href=""><img src="../images\5card.png"></a>
            <div class="text-overlay">Discount offers</div>
          </div>
            <div class="swiper-slide"><a href=""><img src="../images\6card.png"></a>
            <div class="text-overlay">Ticket cancellation</div>
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
        <p>&copy; 2023 AVIA. All rights reserved..</p>
        <p>Follow us on social media:</p>
        <ul class="social-links">
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Instagram</a></li>
        </ul>
    </div>
</footer>


</html>


