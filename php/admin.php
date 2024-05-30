<?php
include 'dbconfig.php';
class FlightDataValidator {
    
    private $data;
    private $mysqli;

    public function __construct($data) {
        $this->data = $data;
        $this->initializeDatabase();
        
    }

    private function initializeDatabase() {
        $this->mysqli = new mysqli(DatabaseConfig::$servername, DatabaseConfig::$dbusername, DatabaseConfig::$dbpassword, DatabaseConfig::$dbname);

        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }
    }

    public function validate() {
        $this->sanitizeData();

        $Airline = $this->data['Airline'];
        $airport_name = $this->data['airport_name'];
        $ITADA = $this->data['ITADA'];
        $City = $this->data['City'];
        $country = $this->data['country'];
        $T_price = $this->data['T_price'];
        $departure_date = $this->data['departure_date'];
        $arrival_date = $this->data['arrival_date'];
        $arrival_time = $this->data['arrival_time'];
        $departure_time = $this->data['departure_time'];

        if (mb_strlen($Airline) < 3 || mb_strlen($Airline) > 255) {
            $alert = "Incorrect airline length";
        } elseif (mb_strlen($airport_name) < 3 || mb_strlen($airport_name) > 255) {
            $alert = "Incorrect airport name length";
        } elseif (mb_strlen($ITADA) !== 3) {
            $alert = "Incorrect ITADA length";
        } elseif (mb_strlen($T_price) < 2 || mb_strlen($T_price) > 8) {
            $alert = "Incorrect airport name length";
        } elseif (mb_strlen($departure_date) !== 10) {
            $alert = "Incorrect airport name length";
        } elseif (mb_strlen($arrival_date) !== 10) {
            $alert = "Incorrect airport name length";
        } elseif (mb_strlen($City) < 2 || mb_strlen($City) > 255) {
            $alert = "Incorrect city length (from 2 to 255 symbols)";
        } elseif (mb_strlen($arrival_time) < 5 || mb_strlen($arrival_time) > 8) {
            $alert = "Incorrect city length (from 5 to 8 symbols)";
        } elseif (mb_strlen($departure_time) < 5 || mb_strlen($departure_time) > 8) {
            $alert = "Incorrect city length (from 5 to 8 symbols)";
        }

        if (isset($alert)) {
            header('Location: FilteredTickets.php?alert=' . urlencode($alert));
            exit();
        } else {
            $this->addToDatabase();
            header('Location: FilteredTickets.php');
        }
    }

    private function sanitizeData() {
        foreach ($this->data as $key => $value) {
            $this->data[$key] = htmlspecialchars(filter_var(trim($value), FILTER_SANITIZE_STRING));
        }
    }

    private function addToDatabase() {
        $stmt1 = $this->mysqli->prepare("INSERT INTO `airports/airlines` (`Airline`, `airport_name`, `ITADA`, 
            `City`, `country`, `T_price`, `departure_date`, `arrival_date`,
            `arrival_time`, `departure_time`, `googleMapsLink`, `created_at`) 
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, now())");
    
        if ($stmt1 === false) {
            die("Prepare failed: " . $this->mysqli->error);
        }

        $stmt1->bind_param("sssssssssss", $this->data['Airline'], $this->data['airport_name'], $this->data['ITADA'],
            $this->data['City'], $this->data['country'], $this->data['T_price'], $this->data['departure_date'],
            $this->data['arrival_date'], $this->data['arrival_time'], $this->data['departure_time'], $this->data['googleMapsLink']);
    
        $stmt1->execute();
    
        $flight_id = $stmt1->insert_id;
    
        $stmt1->close();
    
        if (!empty($this->data['description']) || (isset($_FILES['image1']) && $_FILES['image1']['error'] == 0)) {
            $stmt2 = $this->mysqli->prepare("INSERT INTO `airflight_description` (`flight_id`, `description`, `flight_image`) VALUES (?, ?, ?)");
            if ($stmt2 === false) {
                die("Prepare failed: " . $this->mysqli->error);
            }

            $image1 = null;
            if (isset($_FILES['image1']) && $_FILES['image1']['error'] == 0) {
                $image1 = file_get_contents($_FILES['image1']['tmp_name']);
                $maxFileSize = 2 * 1024 * 1024; 
                if (strlen($image1) > $maxFileSize) {
                    echo "Error: The file size exceeds the allowable limit (2 MB).";
                    header('Location: adminPage.php');
                    exit();
                }
            }

            $stmt2->bind_param("iss", $flight_id, $this->data['description'], $image1);
            $stmt2->execute();
    
            $stmt2->close();
        }
    
        $this->mysqli->close();
    }

    public function ShowUsers() {
        $stmt = $this->mysqli->prepare("SELECT * FROM users");

        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<table border='1'>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['id'] . "</td>
                            <td>" . $row['username'] . "</td>
                            <td>" . $row['email'] . "</td>
                            <td>" . $row['password'] . "</td>
                            <td>" . $row['created_at'] . "</td>
                            <td>
                                <form method='POST' action='delete_user.php' onsubmit='return confirm(\"Are you sure you want to delete this user?\");'>
                                    <input type='hidden' name='user_id' value='" . $row['id'] . "'>
                                    <button type='submit'>Delete</button>
                                </form>
                            </td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "No users found.";
            }

            $result->free();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
        $this->mysqli->close();
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $flightData = [
        'Airline' => $_POST['Airline'],
        'airport_name' => $_POST['airport_name'],
        'ITADA' => $_POST['ITADA'],
        'City' => $_POST['City'],
        'country' => $_POST['country'],
        'T_price' => $_POST['T_price'],
        'departure_date' => $_POST['departure_date'],
        'arrival_date' => $_POST['arrival_date'],
        'arrival_time' => $_POST['arrival_time'],
        'departure_time' => $_POST['departure_time'],
        'googleMapsLink' => $_POST['googleMapsLink'],
        'description' => $_POST['description'],
    ];

    $validator = new FlightDataValidator($flightData);
    $validator->validate();
}
?>
