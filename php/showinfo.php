<?php
class InfoTable {
    private $mysqli;

    public function __construct() {
        $this->initializeDatabase();
    }

    private function initializeDatabase() {
        $this->mysqli = new mysqli(DatabaseConfig::$servername, DatabaseConfig::$dbusername, DatabaseConfig::$dbpassword, DatabaseConfig::$dbname);

        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }
    }

    public function showUsers() {
        $stmt = $this->mysqli->prepare("SELECT * FROM users");

        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "
                <div class='Text6'>
                    <a>Users table</a>
                </div>
                <div class='table-container2'>
                <table class='table1'>
                        <tr>
                            <th>user id</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>";

                while ($row = $result->fetch_assoc()) {
                    if ($row['user_id'] == 57) {
                        continue; //  skipm id 57
                    }
                    echo "<tr>
                            <td>" . $row['user_id'] . "</td>
                            <td>" . $row['username'] . "</td>
                            <td>" . $row['email'] . "</td>
                            <td>" . $row['password'] . "</td>
                            <td>" . $row['created_at'] . "</td>
                            <td>
                                <form method='POST' action='adminPage.php' >
                                    <input type='hidden' name='DeleteUser' value='" . $row['user_id'] . "'>
                                    <button type='submit'>Delete</button>
                                </form>
                            </td>
                          </tr>";
                }
                echo "</table></div>";
            } else {
                echo "No users found.";
            }

            $result->free();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }

    public function showUsersChildren() {
        $stmt = $this->mysqli->prepare("SELECT * FROM children");

        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "      
                <div class='Text6'>
                    <a>Children table</a>
                </div>
                <div class='table-container'>
                <table class='table2'>
                        <tr>
                            <th>children id</th>
                            <th>user id</th>
                            <th>airline id</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Nationality</th>
                            <th>Gender</th>
                            <th>Seat</th>
                            <th>Seat price</th>
                            <th>Actions</th>
                        </tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['children_id'] . "</td>
                            <td>" . $row['user_id'] . "</td>
                            <td>" . $row['airline_id'] . "</td>
                            <td>" . $row['Name'] . "</td>
                            <td>" . $row['Surname'] . "</td>
                            <td>" . $row['Nationality'] . "</td>
                            <td>" . $row['Gender'] . "</td>
                            <td>" . $row['seat'] . "</td>
                            <td>" . $row['seatprice'] . "</td>
                            <td>
                                <form method='POST' action='adminPage.php' >
                                    <input type='hidden' name='DeleteChildren' value='" . $row['children_id'] . "'>
                                    <button type='submit'>Delete</button>
                                </form>
                            </td>
                          </tr>";
                }
                echo "</table></div>";
            } else {
                echo "No children found.";
            }

            $result->free();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }

    public function AvailableFlightsOnSpecificDates() {
        $stmt = $this->mysqli->prepare("SELECT * FROM acessabledata");

        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "
                <div class='Text6'>
                    <a>Acessable flight table</a>
                </div>
                <div class='table-container'>
                <table class='table3'>
                        <tr>
                            <th>Acessable flight ID</th>
                            <th>Airline id</th>
                            <th>Departure date</th>
                            <th>Arrival date</th>
                            <th>Departure time</th>
                            <th>Arrival time</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['id'] . "</td>
                            <td>" . $row['airline_id'] . "</td>
                            <td>" . $row['departure_date'] . "</td>
                            <td>" . $row['arrival_date'] . "</td>
                            <td>" . $row['departure_time'] . "</td>
                            <td>" . $row['arrival_time'] . "</td>
                            <td>" . $row['price'] . "</td>
                            <td>
                                <form method='POST' action='adminPage.php' >
                                    <input type='hidden' name='DeleteAcessFlight' value='" . $row['id'] . "'>
                                    <button type='submit'>Delete</button>
                                </form>
                            </td>
                          </tr>";
                }
                echo "</table></div>";
            } else {
                echo "No flights found.";
            }

            $result->free();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }

    public function deleteUsers() {
        if (isset($_POST['DeleteUser'])) {
            $user_id = $_POST['DeleteUser'];

            $stmt_users = $this->mysqli->prepare("DELETE FROM `users` WHERE `user_id` = ?");
            $stmt_users->bind_param("i", $user_id);
            $stmt_users->execute();
            $stmt_users->close();
            
            $stmt_details = $this->mysqli->prepare("DELETE FROM `user_details` WHERE `user_id` = ?");
            $stmt_details->bind_param("i", $user_id);
            $stmt_details->execute();
            $stmt_details->close();
        }
    }

    public function deleteChildren() {
        if (isset($_POST['DeleteChildren'])) {
            $children_id = $_POST['DeleteChildren'];

            $stmt_children = $this->mysqli->prepare("DELETE FROM `children` WHERE `children_id` = ?");
            $stmt_children->bind_param("i", $children_id);
            $stmt_children->execute();
            $stmt_children->close();
        }
    }

    public function deleteAcessFlights() {
        if (isset($_POST['DeleteAcessFlight'])) {
            $id = $_POST['DeleteAcessFlight'];

            $stmt_flights = $this->mysqli->prepare("DELETE FROM `acessabledata` WHERE `id` = ?");
            $stmt_flights->bind_param("i", $id);
            $stmt_flights->execute();
            $stmt_flights->close();
        }
    }
}

$infoTable = new InfoTable();
$infoTable->deleteUsers(); 
$infoTable->showUsers(); 
$infoTable->deleteChildren(); 
$infoTable->showUsersChildren(); 
$infoTable->deleteAcessFlights(); 
$infoTable->AvailableFlightsOnSpecificDates();
?>


