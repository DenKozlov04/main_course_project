<?php
session_start();
include 'dbconfig.php';

$user_id = $_SESSION['user_id'];
$admin_id = $_SESSION['admin_id'];

$stmt4 = $mysqli->prepare("SELECT `email` FROM users WHERE user_id = ?");
$stmt4->bind_param("i", $user_id);
$stmt4->execute();
$stmt4->bind_result($email);
$stmt4->fetch();
$stmt4->close();



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cardType2']) && isset($_POST['id2'] ) && isset($_POST['plusPrice3']) && isset($_POST['SeatPlace'])) {
    $id = $_POST['id2'];
    $_SESSION['id2'] = $_POST['id2'];
    $_SESSION['LastPrice'] = $_POST['plusPrice3']; 
    $SeatPlace=$_POST['SeatPlace'];
    $_SESSION['SeatPlace'] = $_POST['SeatPlace']; 
    $condition = 'active';
    $prefix = 'Y4Y'; 
    $ticketCode = $prefix . uniqid(); 



}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cardType']) && isset($_POST['id'] ) && isset($_POST['plusPrice2']) && isset($_POST['seat']) && isset($_POST['LuggageСabin']) && isset($_POST['LuggageСompartment'])&& isset($_POST['class'])) {

    $id = $_POST['id'];
    $_SESSION['class'] = $_POST['class'];
    $_SESSION['LuggageСabin'] = $_POST['LuggageСabin'];
    $_SESSION['LuggageСompartment'] = $_POST['LuggageСompartment'];
    $_SESSION['LastPrice'] = $_POST['plusPrice2']; 
    $SeatPlace=$_POST['seat'];
    $_SESSION['seat'] = $_POST['seat'];
    $sql = "SELECT `Airline`, `airport_name`, `ITADA`, `City`, `country`, `T_price`, `arrival_date`, `departure_date`, `arrival_time`, `departure_time`,`id` 
    FROM `airports/airlines` 
    WHERE  `id` = ?";


    $stmt = $mysqli->prepare($sql);


    if ($stmt) {

        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
    }
    
    while ($row = $result->fetch_assoc()) {
        $_SESSION['id'] = $row['id'];
        $_SESSION['airport_name'] = $row['airport_name'];
        $_SESSION['ITADA'] = $row['ITADA'];
        $_SESSION['City'] = $row['City'];
        $_SESSION['country'] = $row['country'];
        $_SESSION['T_price'] = $row['T_price'];
    }

    $sql2 = "SELECT `departure_date`,arrival_date, `departure_time`, `arrival_time` 
    FROM `acessabledata` 
    WHERE  `airline_id` = ?";

    $stmt = $mysqli->prepare($sql2);


    if ($stmt) {

        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
    }
    while ($row = $result->fetch_assoc()) {
            $_SESSION['arrival_date'] = $row['arrival_date'];
            $_SESSION['departure_date'] = $row['departure_date'];
            $dateObject = new DateTime($_SESSION['departure_date']);
            $_SESSION['formattedDepartDate'] = $dateObject->format('j M');
            $_SESSION['arrival_time'] = date('H:i', strtotime($row['arrival_time']));
            $_SESSION['departure_time'] = date('H:i', strtotime($row['departure_time'])); 

    }

} elseif ($_SERVER["REQUEST_METHOD"] == "POST") { 
    try {
        $PassportDataInput = new PassportDataInput();
        $PassportDataInput->CheckAndSubmit(
            $_POST['name'],
            $_POST['surname'],
            $_POST['nationality'],
            $_POST['gender'],
            $_POST['Email'],
            $_POST['Phone_Number'],
            $_POST['Passport_number'],
            $_POST['passportIssuedDate'],
            $_POST['passportExpirationDate'],
            $_POST['Issued_country_passport']

        );
    } catch (Exception $e) {
        echo $e->getMessage();
    }

} 
     

class PassportDataInput
{
    public function CheckAndSubmit($name, $surname, $nationality, $gender, $Email, $Phone_Number, $Passport_number, $passportIssuedDate, $passportExpirationDate, $country2)
    {
        $name = htmlspecialchars(filter_var(trim($name), FILTER_SANITIZE_STRING));
        $surname = htmlspecialchars(filter_var(trim($surname), FILTER_SANITIZE_STRING));
        $nationality = htmlspecialchars(filter_var(trim($nationality), FILTER_SANITIZE_STRING));
        $gender = htmlspecialchars(filter_var(trim($gender), FILTER_SANITIZE_STRING));
        $Email = htmlspecialchars(filter_var(trim($Email), FILTER_SANITIZE_STRING));
        $Phone_Number = htmlspecialchars(filter_var(trim($Phone_Number), FILTER_SANITIZE_STRING));
        $Passport_number = htmlspecialchars(filter_var(trim($Passport_number), FILTER_SANITIZE_STRING));
        $passportIssuedDate = htmlspecialchars(filter_var(trim($passportIssuedDate), FILTER_SANITIZE_STRING));
        $passportExpirationDate = htmlspecialchars(filter_var(trim($passportExpirationDate), FILTER_SANITIZE_STRING));
        $country2 = htmlspecialchars(filter_var(trim($country2), FILTER_SANITIZE_STRING));

        $alert = '';

        if (mb_strlen($name) < 1 || mb_strlen($name) > 255) {
            $alert = 'Name is too short or long';
        } elseif (mb_strlen($Email) < 2 || mb_strlen($Email) > 90) {
            $alert = 'Incorrect email length';
        } elseif (mb_strlen($Phone_Number) !== 12) {
            $alert = 'Incorrect phone length';
        } elseif (mb_strlen($nationality) < 1 || mb_strlen($nationality) > 255) {
            $alert = 'Incorrect nationality length ';
        } elseif (mb_strlen($surname) < 1 || mb_strlen($surname) > 255) {
            $alert = 'Incorrect surname length ';
        } elseif (mb_strlen($Passport_number) < 6 || mb_strlen($Passport_number) > 20) {
            $alert = 'Incorrect Passport number length';
        } elseif (mb_strlen($passportIssuedDate) !== 10) {
            $alert = 'Incorrect date number length';
        } elseif (mb_strlen($passportExpirationDate) !== 10) {
            $alert = 'Incorrect date number length';
        } elseif (mb_strlen($country2) < 1 || mb_strlen($country2) > 200) {
            $alert = 'Incorrect country length';
        }

        if ($alert) {
            header("Location: ../php/OrderUserData.php?alert=" . urlencode($alert));
            exit(); 
        }

       
        $_SESSION['Name'] = $name;
        $_SESSION['Surname'] = $surname;
        $_SESSION['Nationality'] = $nationality;
        $_SESSION['Gender'] = $gender;
        $_SESSION['Email'] = $Email;
        $_SESSION['Phone_Number'] = $Phone_Number;
        $_SESSION['Passport_number'] = $Passport_number;
        $_SESSION['passportIssuedDate'] = $passportIssuedDate;
        $_SESSION['passportExpirationDate'] = $passportExpirationDate;
        $_SESSION['Issued_country_passport'] = $country2;

      
        $this->addPassportDataToDatabase($name, $surname, $nationality, $gender, $Email, $Phone_Number, $Passport_number, $passportIssuedDate, $passportExpirationDate, $country2, $_SESSION['user_id']);
    }

    private function addPassportDataToDatabase($name, $surname, $nationality, $gender, $Email, $Phone_Number, $Passport_number, $passportIssuedDate, $passportExpirationDate, $country2, $user_id)
    {
        global $mysqli;

        $id = $_POST['id2'];
        $_SESSION['id2'] = $_POST['id2'];
        $LastPrice = $_POST['plusPrice3'];
        $_SESSION['LastPrice'] = $_POST['plusPrice3'];
        $SeatPlace = $_POST['SeatPlace'];
        $_SESSION['SeatPlace'] = $_POST['SeatPlace'];
        $prefix = 'Y4Y';
        $condition = 'active';
        $ticketCode = $prefix . uniqid();

        $_SESSION['condition'] = $condition;
        $_SESSION['ticketCode'] = $ticketCode;

        header('Location: ../php/ticketСonfirmation.php');
        exit(); 
    }
}



?>




           