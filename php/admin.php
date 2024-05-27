<?php
class FlightDataValidator {
    private $data;

    public function __construct($data) {
        $this->data = $data;
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
            echo "<script>alert(\"Incorrect airline length\");</script>";
            exit();
        } elseif (mb_strlen($airport_name) < 3 || mb_strlen($airport_name) > 255) {
            echo "<script>alert(\"Incorrect airport name length\");</script>";
            exit();
        } elseif (mb_strlen($ITADA) !== 3) {
            echo "<script>alert(\"Incorrect ITADA length\");</script>";
            exit();
        } elseif (mb_strlen($T_price) < 2 || mb_strlen($T_price) > 8) {
            echo "<script>alert(\"Incorrect airport name length\");</script>";
            exit();
        } elseif (mb_strlen($departure_date) !== 10) {
            echo "<script>alert(\"Incorrect airport name length\");</script>";
            exit();
        } elseif (mb_strlen($arrival_date) !== 10) {
            echo "<script>alert(\"Incorrect airport name length\");</script>";
            exit();
        } elseif (mb_strlen($City) < 2 || mb_strlen($City) > 255) {
            echo "<script>alert(\"Incorrect city length (from 2 to 255 symbols)\");</script>";
            exit();
        } elseif (mb_strlen($arrival_time) < 5 || mb_strlen($arrival_time) > 8) {
            echo "<script>alert(\"Incorrect city length (from 5 to 8 symbols)\");</script>";
            exit();
        } elseif (mb_strlen($departure_time) < 5 || mb_strlen($departure_time) > 8) {
            echo "<script>alert(\"Incorrect city length (from 5 to 8 symbols)\");</script>";
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
        include 'dbconfig.php';
    

        $stmt1 = $mysql->prepare("INSERT INTO `airports/airlines` (`Airline`, `airport_name`, `ITADA`, 
            `City`, `country`, `T_price`, `departure_date`, `arrival_date`,
            `arrival_time`, `departure_time`, `googleMapsLink`, `created_at`) 
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, now())");
    
        $stmt1->bind_param("sssssssssss", $this->data['Airline'], $this->data['airport_name'], $this->data['ITADA'],
            $this->data['City'], $this->data['country'], $this->data['T_price'], $this->data['departure_date'],
            $this->data['arrival_date'], $this->data['arrival_time'], $this->data['departure_time'], $this->data['googleMapsLink']);
    
        $stmt1->execute();
    
        // Получаю id добавленной записи в airports/airlines
        $flight_id = $stmt1->insert_id;
    
        $stmt1->close();
    
        // добавления описания и изоражения
        if (!empty($this->data['description']) || isset($_FILES['image1']) && $_FILES['image1']['error'] == 0) {
            $stmt2 = $mysql->prepare("INSERT INTO `airflight_description` (`flight_id`, `description`, `flight_image`) VALUES (?, ?, ?)");
            $stmt2->bind_param("iss", $flight_id, $this->data['description'], $image1);
    
            
            if (isset($_FILES['image1']) && $_FILES['image1']['error'] == 0) {
                $image1 = file_get_contents($_FILES['image1']['tmp_name']);
    
               
                $maxFileSize = 2 * 1024 * 1024; 
                if (strlen($image1) <= $maxFileSize) {
                    $stmt2->execute();
                    echo "The data has been successfully added to the tables.";
                } else {
                    echo "Error: The file size exceeds the allowable limit (2 MB).";
                }
            } else {
                // Если изображение не было загружено
                $stmt2->execute();
                echo "Data successfully added to tables (no image)";
            }
    
            $stmt2->close();
        }
    
        $mysql->close();
    }
    

    private function addDescription($flight_id, $description) {
        include 'dbconfig.php';
        $stmt = $mysql->prepare("INSERT INTO `airflight_description` (`flight_id`, `description`) VALUES (?, ?)");
        $stmt->bind_param("is", $flight_id, $description);
        $stmt->execute();
        $stmt->close();
        $mysql->close();
    }

    private function addImageToDatabase($flight_id, $image1) {
        include 'dbconfig.php';

        // подготавливаю безопасный запрос для бд
        $stmt = $mysql->prepare("INSERT INTO airflight_description (`flight_id`, `flight_image`) VALUES (?, ?)");
        $stmt->bind_param("is", $flight_id, $image1);

        if ($stmt->execute()) {
            echo "The image has been successfully added to the table.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $mysql->close();
    }
    public function ShowUsers() {

        $stmt = $mysql->prepare("SELECT * FROM users");

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
        $mysql->close();
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

