<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/FilteredTickets.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600&family=Poppins:ital,wght@1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src='../JS/OpenInfoPopUp2.js'></script>
    <title>Filtered tickets</title>
</head>
<body>
    <div class='rectangleHeader'>
        <div class='logorectangle'>
            <a>AVIA</a>
        </div> 
        <div class='ButtonRect'>
            <a>Find the perfect flights for your trip.</a>
        </div>  
    <a class='BackButton' href='index.php'>← Back</a>
    <!-- <button class="toggle-button">
        <img src='../images/free-icon-funnel-tool-4052123.png' alt="Toggle Image">
        <script src="../JS/togglebutton.js"></script>
    </button> -->
    <div class="sidebar">
        <div class='sidebarText1'>Price,€,$</div>
        <p class='CurrentValue'><span id="sliderValue">0</span></p>
        <p class='equal'>-</p>
        <p class='MaxValue'>100</p>
        <input type="range" min="0" max="100" value="0" class="slider" id="mySlider">
        <script src="../JS/slider.js"></script>
    </div>

    <div class='search_place'>
        <div class="search">
            <form method="GET" action="../php/FilteredTickets.php">
                <div class="box1-input" style="border-radius: 50px 0 0 50px;">
                    <div class="input-data">
                        <input type="text" id="input" name="SearchRoute" placeholder="Riga-Paris">
                        <label for="input-field">Enter the route:</label>
                    </div>
                </div>
                <div class="box1-input">
                    <div class="input-data">
                        <input type="text" name="SearchCountry" placeholder="France">
                        <label for="input-field">Choose country:</label>
                    </div>
                </div>
                <div class="box1-input">
                    <div class="input-data">
                        <input type="date" id="date" name="SearchArrival_date">
                        <label for="input-field">Set your arrival date:</label>
                    </div>
                </div>
                <div class="box1-input">
                    <div class="input-data">
                        <input type="date" name="SearchDeparture_date">
                        <label for="input-field">Set your departure date:</label>
                    </div>
                </div>
                <div class="box1-input" style="border-radius: 0 50px 50px 0;">
                    <div class="input-data">
                        <button class="Search_button" type="submit" name="passenger_number" placeholder="for example: 1">Search Tickets</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class='Ticket_box'>
        
        <?php
        session_start();
        include 'dbconfig.php';

        if ($mysqli->connect_error) {
            die("Ошибка подключения: " . $mysqli->connect_error);
        }

        if ($_SESSION['user_id'] == 0 && $_SESSION['admin_id'] != 1) {
            header("Location: ../html/autorization.html");
            exit();
        }
        if ($_SESSION['user_id'] == 0 && $_SESSION['admin_id'] == 1) {
            $visibility = 'visible';
        } else {
            $visibility = 'hidden';
        }
        $SearchRoute = isset($_GET['SearchRoute']) ? $_GET['SearchRoute'] : '';
        $searchCountry = isset($_GET['SearchCountry']) ? $_GET['SearchCountry'] : '';
        $SearchArrival_date = isset($_GET['SearchArrival_date']) ? $_GET['SearchArrival_date'] : '';
        $SearchDeparture_date = isset($_GET['SearchDeparture_date']) ? $_GET['SearchDeparture_date'] : '';

        $sql_airports = "SELECT id, City, country, airport_name, T_price FROM `airports/airlines` WHERE id IN (SELECT MIN(id) FROM `airports/airlines` GROUP BY City)";

        if ($SearchRoute != '') {
            $searchRouteLower = strtolower($SearchRoute);
            $sql_airports .= " AND LOWER(Airline) LIKE '%$searchRouteLower%'";
        }

        if ($searchCountry != '') {
            $searchCountryLower = strtolower($searchCountry);
            $sql_airports .= " AND LOWER(country) LIKE '%$searchCountryLower%'";
        }

        if ($SearchArrival_date != '') {
            $sql_airports .= " AND arrival_date = '$SearchArrival_date'";
        }

        if ($SearchDeparture_date != '') {
            $sql_airports .= " AND departure_date = '$SearchDeparture_date'";
        }

        $result_airports = $mysqli->query($sql_airports);

        if ($result_airports) {
            while ($row_airports = $result_airports->fetch_assoc()) {
                $stmt = $mysqli->prepare("SELECT flight_image FROM airflight_description WHERE flight_id = ?");
                $stmt->bind_param("i", $row_airports['id']);
                $stmt->execute();
                $stmt->bind_result($flight_image);
                $stmt->fetch();
                $stmt->close();
                // $row_airports['id'] .
                echo "
                <div class='Ticket_card'>
                    <div class='InfoName1'>
                        <button onclick=\"openModal(this, 'modal1')\" class='changebtn1' data-id='" . $row_airports['id'] . "' style='visibility: " . $visibility . "'>✎</button>
                        <button onclick=\"openModal(this, 'modal2')\" class='changebtn1' data-id='" . $row_airports['id'] . "' style='visibility: " . $visibility . "'>Delete</button>
                    </div>
                    <img src='data:image/jpeg;base64," . base64_encode($flight_image) . "'> 
                    <div class='text1'>" . $row_airports["country"] . "</div> 
                    <div class='text2'>Direct flight</div>
                    <div class='text3'>" . $row_airports["City"] . " (" . $row_airports["airport_name"] . ")</div>
                    <div class='rectangle1'>
                        <div class='text4'>One direction</div>
                        <div class='text5'>" . $row_airports["T_price"] . "</div>
                        <div class='text6'>per person</div>
                        <div class='text7'>from</div>
                    </div>
                    <div class='BookingBtn'>
                        <form method='POST' action='../php/flightInfo.php'>
                            <input type='hidden' name='airline_id' value='" . $row_airports['id'] . "'>
                            <button type='submit' class='BookingBtnA'>Book a ticket now</button>
                        </form>
                    </div>
                </div>";
            }
        } else {
            echo "Query Execution Error: " . $mysqli->error;
        }

        if(isset($_POST['deleteFlight'])) {
            $id = $_POST['deleteFlight'];
        
           
            $sql_airports = $mysqli->prepare("DELETE FROM `airports/airlines` WHERE id = ?");
            $sql_airports->bind_param("i", $id); 
            $result_airports = $sql_airports->execute();
        
        
            $sql_description = $mysqli->prepare("DELETE FROM `airflight_description` WHERE flight_id = ?");
            $sql_description->bind_param("i", $id); 
            $result_description = $sql_description->execute();

            echo "<meta http-equiv='refresh' content='0;url=FilteredTickets.php'>";
        }
        

        $mysqli->close();
       
        

        ?>
        
    </div>

  
    <div id='modal1' class='modal'>
        <div class='modal-content'>
            <span class='close' onclick="closeModal('modal1')" style='cursor: pointer;'>&times;</span>
            <div class='id-placeholder'></div>
            <div class='text'>Are you sure you want to edit your flight?</div>
            <form class='RedForm' action="edit_record.php" method='POST'>
                <input type='hidden' name='flight_id' id="flightIdInputEdit" >
                <button name='RedBtn' type='submit' class="cancel-btn">Edit</button>
            </form>
        </div>
    </div>
    <div id='modal2' class='modal'>
        <div class='modal-content'>
            <span class='close' onclick="closeModal('modal2')" style='cursor: pointer;'>&times;</span>
            <div class='text'>Are you sure you want to delete a flight?</div>
            <div class='id-placeholder'></div>
            <form class='DelForm' action="FilteredTickets.php" method='POST'>
                <input type='hidden' name='deleteFlight' id="flightIdInputDelete">
                <button name='DeleteBtn' type='submit' class="cancel-btn">Delete</button>
            </form>
        </div>
    </div>
</body>
</html>
