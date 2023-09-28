
<!DOCTYPE html>
<html>
<head>
<title>Air travel throughout the Baltics</title>
<meta charset='utf-8' />
<link rel="stylesheet" href="../css/index.css">
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600&family=Poppins:ital,wght@1,600&display=swap" rel="stylesheet">
</head>
<nav>
  <ul >
    <div class ='pict1'>
      <p><img src="../images/avia.png"  width="60" height="30"></p>
    </div>
    <li><a href="../html/AboutUs.html">About us</a></li>
    <li><a href="">Some page</a></li>
     <li><a href="../html/reviews.html">service reviews</a></li>
     <li><a href="../php/Buy_Tickets.php">buy tickets</a></li>
     <li><a  href="..\html\autorization.html" class="custom-btn LogIn" >LOG IN</a></li> 
    <li><a href="../html/registration.html" class="custom-btn LogIn">Sign up</a> </li>
  </ul>
  <div class ='pict5'>
      <p><a href="user_info.php"><img src="../images/user_foto.png"  width="100" height="100"></a></p>
  </div>


</nav>
<body bgcolor="#e9a2a2">
  <p class="txt1">EXPLORE THE WORLD WITH US</p>
  
 <div class ='search' method="GET" action="SearchAirlines.php">
  <a href="SearchAirlines.php"  action="SearchAirlines.php"class="search-link" name="search_button"></a>
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
<div class="gallery-grid">
  <div class="gallery-item">
    <!-- первая карточка -->
    <div class="grid-item__inner">
    <img src="../images/paris.png" class="grid-item__img" width="400" height="400">
      <div class="place1">
        <span>Riga -</span>
      </div>
      <div class="place2">
        <span>Paris</span>
      </div>
      <div class="grid-item_title">
        <div>
            <span class="price">From 55⁰⁰€</span>
        </div>
          <button class="Buy" onclick="window.location.href = 'registration.html'">Buy tickets</button>
      </div>
    </div>
<!-- вторая карточка -->
    <div class="grid-item__inner1">
      <img src="../images/tokio.png" class="grid-item__img" width="400" height="400" >
      <div class="place1">
        <span>Riga -</span>
      </div>
      <div class="place2">
        <span >Tokio</span>
      </div>
      <div class="grid-item_title">
        <div>
            <span class="price">From 55⁰⁰€</span>
        </div>
        <button class="Buy">Buy tickets</button>
      </div>
    </div> 

</div>
<!-- третая карточка -->
  <div class="gallery-item">
    <div class="grid-item__inner">
      <img src="../images/dubai.png" class="grid-item__img" width="400" height="400" >
      <div class="place1">
        <span>Riga -</span>
      </div>
      <div class="place2">
        <span>Dubai</span>
      </div>
      <div class="grid-item_title">
        <div>
            <span class="price">From 120⁰⁰€</span>
        </div>
        <button class="Buy">Buy tickets</button>
      </div>
    </div>
<!-- четвертая карточка -->
    <div class="grid-item__inner1">
      <img src="../images/reikjavik.png" class="grid-item__img" width="400" height="400" >
      <div class="place1">
        <span>Riga -</span>
      </div>
      <div class="place2">
        <span >Reykjavik</span>
      </div>
      <div class="grid-item_title">
        <div>
            <span class="price">From 100⁰⁰€</span>
        </div>
        <button class="Buy">Buy tickets</button>
      </div>
    </div> 

</div>
<!-- пятая карточка карточка -->
<div class="gallery-item">
  <div class="grid-item__inner">
    <img src="../images/SharmElSeih.png" class="grid-item__img" width="400" height="400" >
    <div class="place1">
      <span>Riga -</span>
    </div>
    <div class="place3">
      <span >Sharm el-Sheikh</span>
    </div>
    <div class="grid-item_title">
      <div>
          <span class="price">From 75⁰⁰€</span>
      </div>
      <button class="Buy">Buy tickets</button>
    </div>
  </div> 
<!-- шестая  карточка -->
  <div class="grid-item__inner1">
    <img src="../images/athens.png" class="grid-item__img" width="400" height="400" >
    <div class="place1">
      <span>Riga -</span>
    </div>
    <div class="place2">
      <span >Athens</span>
    </div>
    <div class="grid-item_title">
      <div>
          <span class="price">From 65⁰⁰€</span>
      </div>
      <button class="Buy">Buy tickets</button>
    </div>
  </div>  
<div class="pict3"><img src="../images/emirates-airlanes.jpg"></div>
<div class=rect1></div>
<div class=rect2></div>
<div class="pict4"><img src="../images/bgSales.png"></div>
 <style>

</style>
</body>


</html>
