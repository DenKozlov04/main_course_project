<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/some_page.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600&family=Poppins:ital,wght@1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">


    <title>Document</title>
</head>
<body>
<div class="boxtickets">
        <div class="TicketRectangle">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="InsideBoxTicketUP">
            <div class="text1">Riga-Paris</div>
            <div class="text2">Arrival airport:Charles de Gaulle</div>
            <div class="DepartTime">12:30:00</div>
            <div class="ArrivTime">12:30:00</div>
            <div class="containerWithRectangles">
                <div class="rectange3"></div>
                <div class="rectangle4"></div>
                <div class="line3"></div>
                <div class="text3">On the road: 16ч05м</div>
                <div class="ItadArriv">RIX</div>
                <div class="ItadaDepart">PRS</div>
            </div>
            <div class="PlaneIcons">
                <i class="fas fa-plane-departure" style='color: #848484;'></i>
                <i class='fas fa-plane-arrival' style='color: #848484; margin-left: 215px;'></i>
            </div>
                <div class="text4">Riga</div>
                <div class="text5">Paris</div>
                <div class="date1">2023-04-11</div>
                <div class="date2">2023-05-11</div> 
        </div>
        <div class="InsideBoxTicketDOWN">
            <div class="text1">Riga-Paris</div>
            <div class="text2">Arrival airport:Rigas airports</div>
            <div class="DepartTime">12:30:00</div>
            <div class="ArrivTime">12:30:00</div>
            <div class="containerWithRectangles">
                <div class="rectange3"></div>
                <div class="rectangle4"></div>
                <div class="line3"></div>
                <div class="text3">On the road: 16ч05м</div>
                <div class="ItadArriv">RIX</div>
                <!-- здесь в итада арив вписывать департ и наоборот -->
                <div class="ItadaDepart">PRS</div>
            </div>
            <div class="PlaneIcons">
                <i class="fas fa-plane-departure" style='color: #848484;'></i>
                <i class='fas fa-plane-arrival' style='color: #848484; margin-left: 215px;'></i>
            </div>
                <div class="text4">Paris</div>
                <div class="text5">Riga</div>
                <div class="date1">2023-05-11</div>
                <div class="date2">2023-06-11</div> 
        </div>
        
        <div class="Price">606$</div>
        <button class="button1">Buy</button>
        </div>
        
    </div>
</body>
</html>
<!-- <div class="boxtickets">
        <div class="TicketRectangle">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="InsideBoxTicketUP">
            <div class="text1">. $row["Airline"] .</div>
            <div class="text2">Arrival airport:. $row["airport_name"] .</div>
            <div class="DepartTime">. $row["departure_date"] .</div>
            <div class="ArrivTime">. $row["arrival_time"] .</div>
            <div class="containerWithRectangles">
                <div class="rectange3"></div>
                <div class="rectangle4"></div>
                <div class="line3"></div>
                <div class="text3">В пути: 16ч05м</div>
                <div class="ItadArriv">RIX</div>
                <div class="ItadaDepart">. $row["ITADA"] .</div>
            </div>
            <div class="PlaneIcons">
                <i class="fas fa-plane-departure" style='color: #848484;'></i>
                <i class='fas fa-plane-arrival' style='color: #848484; margin-left: 215px;'></i>
            </div>
                <div class="text4">Riga</div>
                <div class="text5">. $row["City"] .</div>
                <div class="date1">. $row["arrival_date"] .</div>
                <div class="date2">. $row["departure_date"] .</div> 
        </div>
        <div class="InsideBoxTicketDOWN">
            <div class="text1">Riga-Paris</div>
            <div class="text2">Arrival airport:Rigas airports</div>
            <div class="DepartTime">12:30:00</div>
            <div class="ArrivTime">12:30:00</div>
            <div class="containerWithRectangles">
                <div class="rectange3"></div>
                <div class="rectangle4"></div>
                <div class="line3"></div>
                <div class="text3">В пути: 16ч05м</div>
                <div class="ItadArriv">RIX</div>
                 здесь в итада арив вписывать департ и наоборот 
                <div class="ItadaDepart">PRS</div>
            </div>
            <div class="PlaneIcons">
                <i class="fas fa-plane-departure" style='color: #848484;'></i>
                <i class='fas fa-plane-arrival' style='color: #848484; margin-left: 215px;'></i>
            </div>
                <div class="text4">Paris</div>
                <div class="text5">Riga</div>
                <div class="date1">2023-05-11</div>
                <div class="date2">2023-06-11</div> 
        </div>
        
        <div class="Price">. $row["T_price"] .</div>
        <button class="button1">Buy</button>
        </div>
        
    </div> -->