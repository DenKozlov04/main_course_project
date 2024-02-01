<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Buy_Tickets.css">

    <title>ticket purchase</title>
</head>
<body>
<li><a class="MainPageBtn" href="../php/index.php">On the main page</a></li>
<!-- hot resort offers и картинку отдыхающего человека на шизлонге вставить -->
</body>
</html>

<?php
session_start();

class FlightTableManager {
    private $mysqli;

    public function __construct($host, $user, $password, $database) {
        $this->mysqli = new mysqli($host, $user, $password, $database);
        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }
    }

    public function deleteRecord($id) {
        $id = $this->mysqli->real_escape_string($id);
        $this->mysqli->query("DELETE FROM `airports/airlines` WHERE `id` = $id") or die($this->mysqli->error);
    }

    public function getRecords() {
        $result = $this->mysqli->query("SELECT * FROM `airports/airlines`");
        $records = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $records[] = $row;
            }
        }

        return $records;
    }

    public function displayTable($isAdmin) {
        $records = $this->getRecords();   
        if ($_SESSION['user_id'] != 0) {
        }else{echo"
                   ";
        }
        
        echo "";
    
        foreach ($records as $row) {
            echo "<div class='boxtickets'>
            <div class='TicketRectangle'>
                <div class='line1'></div>
                <div class='line2'></div>
                <div class='card-separator'></div>
                <div class='InsideBoxTicketUP'>
                    <div class='text1'>" . $row["Airline"] . "</div>
                    <div class='text2'>Arrival airport: " . $row["airport_name"] . "</div>
                    <div class='DepartTime'>" . $row["departure_date"] . "</div>
                    <div class='ArrivTime'>" . $row["arrival_time"] . "</div>
                    <div class='containerWithRectangles'>
                        <div class='rectange3'></div>
                        <div class='rectangle4'></div>
                        <div class='line3'></div>
                        <div class='text3'>В пути: 16ч05м</div>
                        <div class='ItadArriv'>RIX</div>
                        <div class='ItadaDepart'>" . $row["ITADA"] . "</div>
                    </div>
                    <div class='PlaneIcons'>
                        <i class='fas fa-plane-departure' style='color: #848484;'></i>
                        <i class='fas fa-plane-arrival' style='color: #848484; margin-left: 215px;'></i>
                    </div>
                    <div class='text4'>Riga</div>
                    <div class='text5'>" . $row["City"] . "</div>
                    <div class='date1'>" . $row["arrival_date"] . "</div>
                    <div class='date2'>" . $row["departure_date"] . "</div>
                </div>
                <div class='InsideBoxTicketDOWN'>
                    <div class='text1'>Riga-Paris</div>
                    <div class='text2'>Arrival airport: Rigas airports</div>
                    <div class='DepartTime'>12:30:00</div>
                    <div class='ArrivTime'>12:30:00</div>
                    <div class='containerWithRectangles'>
                        <div class='rectange3'></div>
                        <div class='rectangle4'></div>
                        <div class='line3'></div>
                        <div class='text3'>В пути: 16ч05м</div>
                        <div class='ItadArriv'>PRS</div>
                        <div class='ItadaDepart'>" . $row["ITADA"] . "</div>
                    </div>
                    <div class='PlaneIcons'>
                        <i class='fas fa-plane-departure' style='color: #848484;'></i>
                        <i class='fas fa-plane-arrival' style='color: #848484; margin-left: 215px;'></i>
                    </div>
                    <div class='text4'>Paris</div>
                    <div class='text5'>Riga</div>
                    <div class='date1'>2023-05-11</div>
                    <div class='date2'>2023-06-11</div>
                </div>
                <div class='Price'>" . $row["T_price"] ;
                if ($_SESSION['user_id'] != 0) {
                    echo "";   
                }
                
                if ($isAdmin) {
                    echo "<form method='POST' action='edit_record.php'>
                        <input type='hidden' name='edit' value='" . $row['id'] . "'>
                        <button class='button2' type='submit'>Edit</button>
                    </form>
                    <form method='POST' action='Buy_Tickets.php'>
                        <input type='hidden' name='delete' value='" . $row['id'] . "'>
                        <button class='button3' type='submit'>Delete</button>
                    </form>";
                }
                
                if ($_SESSION['user_id'] == 0) {
                    echo "<a class='button4' href='../html/autorization.html'>Log in first</a>";
                    echo "<div class='element1'>___</div>
                        <div class='element2'>___</div>";
                } else {
                    echo "<form method='POST' action='Booking.php'>
                        <input type='hidden' name='Order' value='" . $row['id'] . "'> 
                        <input type='hidden' name='airline_id' value='" . $row['id'] . "'>
                        <input type='hidden' name='Airline' value='" . $row['Airline'] . "'>
                        <input type='hidden' name='airport_name' value='" . $row['airport_name'] . "'>
                        <input type='hidden' name='ITADA' value='" . $row['ITADA'] . "'>
                        <input type='hidden' name='City' value='" . $row['City'] . "'>
                        <input type='hidden' name='T_price' value='" . $row['T_price'] . "'>
                        <input type='hidden' name='arrival_date' value='" . $row['arrival_date'] . "'>
                        <input type='hidden' name='departure_date' value='" . $row['departure_date'] . "'>
                        <input type='hidden' name='arrival_time' value='" . $row['arrival_time'] . "'>
                        <input type='hidden' name='departure_time' value='" . $row['departure_time'] . "'>
                        <button class='button3' type='submit'>Order</button>
                    </form>";
                    
                    echo "<form method='POST' action='flightInfo.php'>
                        <input type='hidden' name='Order' value='" . $row['id'] . "'> 
                        <input type='hidden' name='airline_id' value='" . $row['id'] . "'>
                        <button class='button3' type='submit'>Order2</button>
                    </form>";
                }
                

                        echo "</form>";
                        

    
    echo "</div><div class='card-separator2'></div>";
    "</div>
</div>";

    }

}
    
    public function closeConnection() {
        $this->mysqli->close();
    }
}

$_SESSION['user_id'];
$_SESSION['admin_id'];

include 'dbconfig.php';

$isAdmin = ($_SESSION['admin_id'] == 1);
$tableManager = new FlightTableManager($host, $user, $password, $database);

if (isset($_POST['delete'])) {
    $tableManager->deleteRecord($_POST['delete']);
}

$tableManager->displayTable($isAdmin);
$tableManager->closeConnection();
?>
