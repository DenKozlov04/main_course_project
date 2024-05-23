
<?php
session_start();
include 'dbconfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['airline_id'])) {
    $airline_id = $_POST['airline_id'];
    setcookie('airline_id', $airline_id, time() + 86400, "/");

}

//   else {
//     $_SESSION['airline_id'] = null;
// }

class ChooseFlight {
    private $mysqli;
    private $airline_id;

    public function __construct() {
        $this->initializeDatabase();
        $this->airline_id = isset($_COOKIE['airline_id']) ? $_COOKIE['airline_id'] : null;

    }

    private function initializeDatabase() {
        $this->mysqli = new mysqli(DatabaseConfig::$servername, DatabaseConfig::$dbusername, DatabaseConfig::$dbpassword, DatabaseConfig::$dbname);

        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }
    } 

    public function AddFlightInfo() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sumbitflight'])) {
            $airline_id = $_SESSION['airline_id'];
            $departure_date = $_POST['departure_date'];
            $arrival_date = $_POST['arrival_date'];
            $departure_time = $_POST['departure_time'];
            $arrival_time = $_POST['arrival_time'];
            $price = $_POST['price'];

            $alert = ''; // alert перем.

            if (mb_strlen($departure_date) < 1 || mb_strlen($departure_date) > 11) {
                $alert = 'Incorrect departure date';
            } elseif (mb_strlen($arrival_date) < 1 || mb_strlen($arrival_date) > 11) {
                $alert = 'Incorrect arrival date';
            } elseif (mb_strlen($departure_time) < 1 || mb_strlen($departure_time) > 11) {
                $alert = 'Incorrect departure time';
            } elseif (mb_strlen($arrival_time) < 5 || mb_strlen($arrival_time) > 17) {
                $alert = 'Incorrect arrival time';
            } elseif (mb_strlen($price) < 2 || mb_strlen($price) > 5) {
                $alert = 'Incorrect price';
            }

            if (!$alert) {
                $stmt = $this->mysqli->prepare("INSERT INTO acessabledata (airline_id, departure_date, arrival_date, departure_time, arrival_time, price) VALUES (?, ?, ?, ?, ?, ?)");
                if ($stmt === false) {
                    die("Prepare failed: " . $this->mysqli->error);
                }

                $stmt->bind_param("isssss", $airline_id, $departure_date, $arrival_date, $departure_time, $arrival_time, $price);

                if ($stmt->execute()) {
                    header('Location: aviability.php?success=1');
                    exit();
                } else {
                    echo "Error: " . $stmt->error;
                }

                $stmt->close();
            } else {
                header('Location: aviability.php?alert=' . urlencode($alert));
                exit();
            }
        }
    }
    public function generateCalendar() {
        $months = [
            "January 2024", "February 2024", "March 2024", "April 2024",
            "May 2024", "June 2024", "July 2024", "August 2024",
            "September 2024", "October 2024", "November 2024", "December 2024"
        ];
    
        foreach ($months as $month) {
            echo "<div class='month'>";
            echo "<h3>$month</h3>";
            echo "<div class='days'>";
            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, array_search($month, $months) + 1, 2024);
            for ($i = 1; $i <= $daysInMonth; $i++) {
                
                echo "<form method='POST' class='day-form'>";
                echo "<input type='hidden' name='showDate' value='2024-" . sprintf("%02d", array_search($month, $months) + 1) . "-" . sprintf("%02d", $i) . "'>";
                echo "<button type='submit' class='day'>$i</button>";
                echo "</form>";
            }
            echo "</div></div>";
        }
    }
    
    public function OutputFlight() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['showDate'])) {
            $selectedDate = $_POST['showDate'];
            $airline_id = $this->airline_id;
            echo "<div class='ChosenDate'>" . date('d.m.Y', strtotime($selectedDate)) . "</div>";
           
            $sql = "SELECT departure_date, arrival_date, arrival_time, departure_time, airline_id, price
            FROM `acessabledata`
            WHERE departure_date = ? AND airline_id = ?";
    
            $stmt = $this->mysqli->prepare($sql);
            if ($stmt === false) {
                die("Prepare failed: " . $this->mysqli->error);
            }
    
            $stmt->bind_param("si", $selectedDate,$airline_id);
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if ($result) {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $airline_id = $row['airline_id']; 
                            $T_price = $row['price'];
                            $arrival_date = $row['arrival_date'];
                            $departure_date = $row['departure_date'];
                            $arrival_time = date('H:i', strtotime($row['arrival_time']));
                            $departure_time = date('H:i', strtotime($row['departure_time']));
    
                            // Вывод информации о рейсе
                            echo "<div class='ticketForm' style='cursor: pointer;' data-price='$T_price' data-id='$airline_id'>
                                    <div class='time'>
                                        <div class='departTime'>$departure_time</div>
                                        <div class='timeGap'></div>
                                        <div class='arrivTime'>$arrival_time</div>
                                    </div>
                                    <div class='ITADA'>
                                        <div class='departITADA'>None</div>
                                        <div class='ITADAGap'></div>
                                        <div class='arrivITADA'>None</div>
                                    </div>
                                    <div class='NOPrice'>no</div>
                                    <div class='Price'>$T_price €</div>
                                    <div class='direction'>Tiešais reiss</div>
                                    <a class='allParts' style='cursor: pointer;' onclick='openPopup(\"None\", \"None\", \"None\", \"None\" , \"$departure_date\" , \"$arrival_date\" , \"$departure_time\" , \"$arrival_time\" , \"$T_price\")'>Lidojuma detaļas</a>
                                    <div class='wayTime'></div>
                                    <div class='line2'></div>
                                    <div class='StyleRect'>
                                        <div class='line1'></div>
                                    </div>
                                  </div>";
                        }
                        echo "<a class='flightName'>Rīga (RIX) – None (None) (None)</a>";
                        echo "<div class='Info3'>Lidojums uz: None (None)</div>";
                        echo "<form class='buttonForm' action='details1.php' method='POST'>
                                <div class='ButtonPlace'>
                                    <button class='ContinueButton'>Turpinat</button>
                                    <div id='price' class='PricePlace'></div>
                                    <div id='id' class='id'></div>
                                </div>
                              </form>";
                    } else {
                        echo "There are no flights on that date:(";
                    }
                } else {
                    echo "ERROR in request " . $stmt->error;
                }
                $result->close();
            } else {
                echo "Execute failed: " . $stmt->error;
            }
            $stmt->close();
        }
    }
    
    
    
    
}

$chooseFlight = new ChooseFlight();
$chooseFlight->AddFlightInfo();

?>

