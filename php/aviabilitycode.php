<?php
session_start();
include 'dbconfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['airline_id'])) {
    $_SESSION['airline_id'] = $_POST['airline_id'];

}



class ChooseFlight {
    private $mysqli;
    private $airline_id;

    public function __construct() {
        $this->initializeDatabase();
        $this->airline_id = isset($_SESSION['airline_id']) ? $_SESSION['airline_id'] : null;
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

            $alert = ''; 

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
        $latvianHolidays = [
            '01-01' => 'New Year\'s Day',
            '04-18' => 'Good Friday',
            '04-20' => 'Second Easter Day',
            '05-01' => 'Labour Day',
            '05-04' => 'Restoration of Independence of Latvia',
            '06-23' => 'Midsummer Eve',
            '06-24' => 'Midsummer Day',
            '11-18' => 'Proclamation Day of the Republic of Latvia',
            '12-24' => 'Christmas Eve',
            '12-25' => 'Christmas Day',
            '12-26' => 'Second Christmas Day',
            '12-31' => 'New Year\'s Eve'
        ];
    
        $currentMonth = date('n');
        $currentYear = date('Y');
        $currentDay = date('j');
        $today = strtotime(date('Y-m-d')); 
    
        $months = [];
        for ($i = 0; $i < 12; $i++) {
            $month = ($currentMonth + $i - 1) % 12 + 1;
            $year = $currentYear + intdiv($currentMonth + $i - 1, 12);
            $months[] = [
                'month' => $month,
                'year' => $year,
                'daysInMonth' => cal_days_in_month(CAL_GREGORIAN, $month, $year)
            ];
        }
    
        foreach ($months as $m) {
            $monthName = date('F Y', mktime(0, 0, 0, $m['month'], 1, $m['year']));
            echo "<div class='month'>";
            echo "<h3>$monthName</h3>";
            echo "<div class='days'>";
    
            for ($i = 1; $i <= $m['daysInMonth']; $i++) {
                $dayOfWeek = date('N', strtotime("{$m['year']}-{$m['month']}-$i"));
                $isWeekend = ($dayOfWeek == 6 || $dayOfWeek == 7);
                $isCurrentDay = ($m['month'] == date('n') && $m['year'] == date('Y') && $i == $currentDay);
                $dateKey = sprintf("%02d-%02d", $m['month'], $i);
                $isHoliday = isset($latvianHolidays[$dateKey]);
                $holidayName = $isHoliday ? $latvianHolidays[$dateKey] : '';
    
                $date = strtotime("{$m['year']}-{$m['month']}-$i");
    
                if ($date < $today) {
                    echo "<div class='day past' title='$holidayName'>$i</div>";
                } else {
                    echo "<form method='POST' class='day-form'>";
                    echo "<input type='hidden' name='showDate' value='{$m['year']}-" . sprintf("%02d", $m['month']) . "-" . sprintf("%02d", $i) . "'>";
                    if ($isCurrentDay) {
                        echo "<button type='submit' class='day current' title='$holidayName'>$i</button>";
                    } elseif ($isWeekend) {
                        echo "<button type='submit' class='day weekend' title='$holidayName'>$i</button>";
                    } elseif ($isHoliday) {
                        echo "<button type='submit' class='day holiday' title='$holidayName'>$i</button>";
                    } else {
                        echo "<button type='submit' class='day'>$i</button>";
                    }
                    echo "</form>";
                }
            }
    
            echo "</div></div>";
        }
    }
    
    
    
    
    

    public function OutputFlight() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['showDate'])) {

            $selectedDate = $_POST['showDate'];
            $airline_id = $this->airline_id;
            echo "<div class='ChosenDate'>" . date('d.m.Y', strtotime($selectedDate)) . "</div>";
    
            
            $sql2 = "SELECT ITADA, City, country, Airline, airport_name, id
                     FROM `airports/airlines`
                     WHERE id = ?";
            
           
            $stmt2 = $this->mysqli->prepare($sql2);
            if ($stmt2 === false) {
                die("Prepare failed: " . $this->mysqli->error);
            }
            $stmt2->bind_param("i", $airline_id);
            if ($stmt2->execute()) {
                $result2 = $stmt2->get_result();
                if ($result2) {
                    if ($result2->num_rows > 0) {
                        while ($row = $result2->fetch_assoc()) {
                            $country = $row['country'];
                            $City = $row['City'];
                            $airport_name = $row['airport_name'];
                            $ITADA = $row['ITADA'];
                            $Airline = $row['Airline'];
                        }
                    }
                }
            } else {
                echo "Execute failed: " . $stmt2->error;
            }
           
            $stmt2->close();
            
        
            $sql = "SELECT departure_date, arrival_date, arrival_time, departure_time, airline_id, price
                    FROM `acessabledata`
                    WHERE departure_date = ? AND airline_id = ?";
            
       
            $stmt = $this->mysqli->prepare($sql);
            if ($stmt === false) {
                die("Prepare failed: " . $this->mysqli->error);
            }
            $stmt->bind_param("si", $selectedDate, $airline_id);
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
                            $departure = new DateTime($departure_time);
                            $arrival = new DateTime($arrival_time);
                            $interval = $departure->diff($arrival);
                            $flight_duration = $interval->format('%hh %imin');
                          
                            echo "<div class='ticketForm' style='cursor: pointer;' data-price='$T_price' data-id='$airline_id'>
                                    <div class='time'>
                                        <div class='departTime'>$departure_time</div>
                                        <div class='timeGap'></div>
                                        <div class='arrivTime'>$arrival_time</div>
                                    </div>
                                    <div class='ITADA'>
                                        <div class='departITADA'>RIX</div>
                                        <div class='ITADAGap'></div>
                                        <div class='arrivITADA'>$ITADA</div>
                                    </div>
                                    <div class='NOPrice'>From</div>
                                    <div class='Price'>$T_price €</div>
                                    <div class='direction'>Direct flight</div>
                                    <a class='allParts' style='cursor: pointer;' onclick='openPopup(\"$country\", \"$City\", \"$airport_name\", \"$ITADA\", \"$departure_date\", \"$arrival_date\", \"$departure_time\", \"$arrival_time\", \"$T_price\")'>Flight details</a>
                                    <div class='wayTime'>$flight_duration</div>
                                    <div class='line2'></div>
                                    <div class='StyleRect'>
                                        <div class='line1'></div>
                                    </div>
                                  </div>";
                        }
                        echo "<a class='flightName'>Rīga (RIX) – $City ($airport_name) ($ITADA)</a>";
                        echo "<div class='Info3'>Flight to: $City ($ITADA)</div>";
                        echo "<form class='buttonForm' action='details1.php' method='POST'>
                                <div class='ButtonPlace'>
                                    <button class='ContinueButton'>Continue</button>
                                    <div id='price' class='PricePlace'></div>
                                    <a class='eurosign'>€</a>
                                    <div id='id' class='id'></div>
                                </div>
                              </form>";
                    } else {
                        echo "There are no flights on that date:(";
                    }
                } else {
                    echo "ERROR in request " . $stmt->error;
                }
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


