<?php
session_start();
include 'dbconfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmTicket']) && isset($_POST['LuggageСompartment']) && isset($_POST['LuggageСabin']) && isset($_POST['class'])) {
    $_SESSION['LuggageСompartment'] = $_POST['LuggageСompartment'];
    $_SESSION['class'] = $_POST['class'];
    $_SESSION['LuggageСabin'] = $_POST['LuggageСabin'];
  
}

if ($_SESSION['class'] == 'BASIC') {
    $TicketBuff = "
        <ul class='Buffs'>
            <li>1 hand luggage (up to 8 kg)</li>
            <li>Free access to water on board</li>
            <li>Standard boarding</li>
            <li>Access to basic entertainment on board (music, movies)</li>
        </ul>";
} elseif ($_SESSION['class'] == 'BRONZE') {
    $TicketBuff = "
        <ul class='Buffs'>
            <li>1 hand baggage + 1 personal item (total weight up to 16 kg)</li>
            <li>Free Wi-Fi access (30 minutes)</li>
            <li>Free drinks on board (water, juices, tea, coffee)</li>
            <li>Personal entertainment kit (headphones, plaid, sleep mask)</li>
        </ul>";
} elseif ($_SESSION['class'] == 'SILVER') {
    $TicketBuff = "
        <ul class='Buffs'>
            <li>1 hand baggage + 1 personal item (total weight up to 24 kg)</li>
            <li>1 checked baggage (up to 24 kg)</li>
            <li>Free Wi-Fi access (1 hour)</li>
            <li>Free drinks and snacks on board (including sandwiches and snacks)</li>
            <li>Priority boarding</li>
            <li>Access to digital library (movies, music, magazines)</li>
        </ul>";
} elseif ($_SESSION['class'] == 'GOLD') {
    $TicketBuff = "
        <ul class='Buffs'>
            <li>1 hand baggage + 1 personal item (total weight up to 32 kg)</li>
            <li>2 checked baggage (up to 36 kg each)</li>
            <li>Unlimited free access to Wi-Fi</li>
            <li>Hot meals on board (multi-course choice)</li>
            <li>Priority boarding and disembarkation</li>
            <li>Access to premium lounge</li>
            <li>Complimentary drinks and snacks on board, including alcoholic beverages</li>
            <li>Free access to additional services (e.g. express security check, personal concierge service)</li>
        </ul>";
}
class TicketInfo {
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

    public function displayInfo() {
        $userInfo = array();
        $ChildrenInfo = array();
        $TicketInfo = array();
        $TicketInfo2 = array();
        $AirlineInfo = array();

        $user_id = $_SESSION['user_id'];

        $sql = "SELECT * FROM user_details WHERE user_id = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $userInfo = $result->fetch_assoc();
        }

        $sql = "SELECT * FROM children WHERE user_id = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $ChildrenInfo = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $ChildrenInfo[] = array(
                'Name' => 'None',
                'Surname' => 'None',
                'Passport_number' => 'None',
                'seat' => 'None',
                'seatprice' => 'None'
            );
        }

        $sql = "SELECT * FROM tickets WHERE user_id = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $TicketInfo = $result->fetch_assoc();
            $airlines_id = $TicketInfo['airlines_id'];
        }

        $sql = "SELECT * FROM acessabledata WHERE airline_id = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("i", $airlines_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $TicketInfo2 = $result->fetch_assoc();
        }

        $sql = "SELECT * FROM `airports/airlines` WHERE id = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("i", $airlines_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $AirlineInfo = $result->fetch_assoc();
        }

        return array(
            'userInfo' => $userInfo,
            'ChildrenInfo' => $ChildrenInfo,
            'TicketInfo' => $TicketInfo,
            'TicketInfo2' => $TicketInfo2,
            'AirlineInfo' => $AirlineInfo
        );
    }
}
?>
