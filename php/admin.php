
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
            header('Location: Buy_Tickets.php');
        }
    }

    private function sanitizeData() {
        foreach ($this->data as $key => $value) {
            $this->data[$key] = htmlspecialchars(filter_var(trim($value), FILTER_SANITIZE_STRING));
        }
    }

    private function addToDatabase() {
        $mysql = new mysqli('localhost', 'root', '', 'airflightsdatabase');

        // Используйте подготовленные запросы для защиты от SQL-инъекций
        $stmt = $mysql->prepare("INSERT INTO `airports/airlines` (`Airline`, `airport_name`, `ITADA`, 
        `City`, `country`, `T_price`, `departure_date`, `arrival_date`,
        `arrival_time`, `departure_time`, `googleMapsLink`, `created_at`) 
        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, now())");
    
    $stmt->bind_param("sssssssssss", $this->data['Airline'], $this->data['airport_name'], $this->data['ITADA'],
        $this->data['City'], $this->data['country'], $this->data['T_price'], $this->data['departure_date'],
        $this->data['arrival_date'], $this->data['arrival_time'], $this->data['departure_time'], $this->data['googleMapsLink']);
    

        $stmt->execute();

        $stmt->close();
        $mysql->close();
    }
}

// Использование класса
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
        'googleMapsLink' => $_POST['googleMapsLink'], // Добавлено поле googleMapsLink
    ];

    $validator = new FlightDataValidator($flightData);
    $validator->validate();
}
?>

