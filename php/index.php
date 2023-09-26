
<!DOCTYPE html>
<html>
<head>
<title>Air travel throughout the Baltics</title>
<meta charset='utf-8' />
<link href="index.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600&family=Poppins:ital,wght@1,600&display=swap" rel="stylesheet">
</head>
<nav>
  <ul >
    <div class ='pict1'>
      <p><img src="images\thtrhrth.png"  width="60" height="30"></p>
    </div>
    <li><a href="AboutUs.html">About us</a></li>
    <li><a href="">Some page</a></li>
     <li><a href="reviews.html">service reviews</a></li>
     <li><a href="Html\Buy_Tickets.php">buy tickets</a></li>
     <li><a  href="html\autorization.html" class="custom-btn LogIn" >LOG IN</a></li> 
    <li><a href="registration.html" class="custom-btn LogIn">Sign up</a> </li>
  </ul>
  <div class ='pict5'>
      <p><a href="user_info.php"><img src="images\user_foto.png"  width="100" height="100"></a></p>
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
      <img src="images\fdhfsdh.png" class="grid-item__img" width="400" height="400" >
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
      <img src="images\image.png" class="grid-item__img" width="400" height="400" >
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
      <img src="images\пвыпыфвп.png" class="grid-item__img" width="400" height="400" >
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
      <img src="images\reikjavik.png" class="grid-item__img" width="400" height="400" >
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
    <img src="images\dsgdsg.png" class="grid-item__img" width="400" height="400" >
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
    <img src="images\afini.png" class="grid-item__img" width="400" height="400" >
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
<div class="pict3"><img src="images\wp2291551-emirates-airline-wallpapers.jpg"></div>
<div class=rect1></div>
<div class=rect2></div>
<div class="pict4"><img src="images\bgSales.png"></div>
 <style>
.search-link {
  
  width: 100px;
  height: 100px;
  background-image: url('images/search.png');
  background-size: cover;
  text-indent: -9999px;
}
  ::placeholder {
    color:#cacaca;
   }
  .txt1{
    right: 30%;
    top:93%;
    position: relative;
    display: flex; 
    justify-content: center;
    justify-content: space-evenly;
    position: absolute;
    color:#FFFFFF;
    /* font-family: 'Nunito Sans', sans-serif;  */
    font-family: 'Poppins', sans-serif;
    /* font-family: 'Monas Grotesk Extra Bold Italic'; */
    /* font-style: italic; */
    font-weight: 800;
    font-size: 40px;
    line-height: 116px;
    letter-spacing: 0.145em;
  }
  .pict4{
  position: relative;
  display: flex; 
  justify-content: center;
  justify-content: space-evenly;
  z-index: -3;
  width: 1000%;
  height: 100px;
  top:-235%;
  right:585%;
  }
.pict3{
  right:355%;
  top:-107%;
  position: relative;
  display: flex; 
  justify-content: center;
  justify-content: space-evenly;
  z-index: -4;
  width: 1650px;
  height: 1042px;
}
.rect2{
  right:700%;
  top: -273%;
  width: 1200%;
  height: 7%;
  z-index: -3;
  background-color: #666666;
  position: relative;
  display: flex; 
  justify-content: space-between;
  justify-content: space-evenly;
}
.rect1{
  top: -109%;
  z-index: -3;
  bottom: 20px;
  position: relative;
  display: flex; 
  right:300%;
  justify-content: space-between;
  justify-content: space-evenly;
  width: 470%;
  height: 120%;
  background-color: rgba(0,0,0,0.5) 
}
 .search {

  max-width: 1920px;
  width: 1000%;
    justify-content: space-between;
    justify-content: space-evenly;
    display: flex; 
    position: relative;
    align-items: center;
    flex-direction: row;
    height: 900px;
    justify-content: center;
     right: 1%; 
}  
  
    .box1-input {
    display: flex;
    flex-direction: column;
    margin-bottom: 20px;
    width: 250px;
    height: 25px;
    font-family: 'Nunito Sans', sans-serif;
    padding: 30px;
    background-color: #FFFFFF;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  
  .box1-input label {
    color: #c0c0c0;
    left:0;
    pointer-events: none;
  }
  .box1-input .input-data{
    height: 50%;
    width: 100%;
  }
  .box1-input .input-data input{
    height: 100%;
    width: 100%;

  }
  .box1-input .input-data label{
    bottom: 20px;

  }
  .box1-input input[type="text"] {
    border: none;
    background-color: #ffffff;
    color: rgba(87, 17, 17, 0.671);
    font-size: 16px;
    border-radius: 0px; 
    border:none; 
    border-bottom: 2px solid silver;
    
  } 
  
  /* .box1-input input[type="text"]:focus {

    box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
  }  */

  .gallery-grid{
    display: flex;
    flex-wrap: wrap;
    max-width: 1140px;
    margin: 0 auto;
    z-index: 1;
  }
   .gallery-grid,
  .gallery-grid * {
    box-sizing: border-box;
  } 
  .gallery-item{
    width: 33.33%; 
    margin: 15px 0;
    padding: 0 40px; 
  }
  .grid-item__inner{
    position: relative;
    display: flex;
    cursor:pointer;
  }
  .grid-item__inner:hover::before{
    opacity: 1;

  }
  .grid-item__img{
    width: 120%;
    height: 120%;
    object-fit: cover;

  }
  .grid-item_title{
    position: absolute;
    left: 7px;
    bottom: 15px;
    font-family: 'Nunito Sans', sans-serif;
    color: #FFFFFF;
    font-size: 20px;
    overflow: hidden;
  }
  .grid-item_title > button{
    display: block;
    transform: translateY(45px);
    transition: transform .4s ease;
    background: #DE6A6A;
    border-radius: 50px;
    width: 350px;
    height: 43px;
    border:#DE6A6A;
    color: rgb(255, 255, 255);
    font-size: 20px;
  }
  .grid-item__inner:hover .grid-item_title > button{
    transform: translateY(0);
  }
  .place1{
    position: absolute;
    font-family: 'Nunito Sans', sans-serif;
    color: #FFFFFF;
    font-size: 36px;
    top: 45%;
    left: 7px;

  }
  .place2{
    position: absolute;
    font-family: 'Nunito Sans', sans-serif;
    color: #FFFFFF;
    font-size: 50px;
    top: 55%;
    left: 7px;

  }
  .place3{
    position: absolute;
    font-family: 'Nunito Sans', sans-serif;
    color: #FFFFFF;
    font-size: 38px;
    top: 58%;
    left: 7px;
  }

  .grid-item__inner1{
    top: 20px;
    position: relative;
    display: flex;
    cursor:pointer;
  }
  .grid-item__inner1:hover::before{
    opacity: 1;

  }
  .grid-item__inner1:hover .grid-item_title > button{
    transform: translateY(0);
  }

  

</style>
</body>


</html>
