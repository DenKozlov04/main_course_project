<?php
session_start();
include 'dbconfig.php';

$user_id = $_SESSION['user_id'];
$admin_id = $_SESSION['admin_id'];

// if(isset($_GET['buttonValue'])) {
//     // получаю значение из URL
//     $alert = '';
//     $buttonValue = $_GET['buttonValue'];
//     if($buttonValue === 0){
//         $alert = "test";
//     }
//     echo "Received buttonValue: " . $buttonValue;

// } 

// echo $user_id;
// echo $admin_id;




if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cardType']) && isset($_POST['id'] ) && isset($_POST['plusPrice2']) && isset($_POST['seat'])) {

    $id = $_POST['id'];
    $LastPrice= $_POST['plusPrice2'];
    $SeatPlace=$_POST['seat'];
    // echo $SeatPlace;
    // echo $id;
    // echo  $LastPrice;
    // echo $price;
   
    $sql = "SELECT `Airline`, `airport_name`, `ITADA`, `City`, `country`, `T_price`, `arrival_date`, `departure_date`, `arrival_time`, `departure_time`,`id` 
    FROM `airports/airlines` 
    WHERE  `id` = ?";

    $stmt = $conn->prepare($sql);


    if ($stmt) {

        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
    }
    while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $airport_name = $row['airport_name'];
            $ITADA = $row['ITADA'];
            $City = $row['City'];
            $country = $row['country'];
            $T_price = $row['T_price'];
            $arrival_date = $row['arrival_date'];
            $departure_date = $row['departure_date'];
            $dateObject = new DateTime($departure_date);
            $formattedDepartDate = $dateObject->format('j M');
            $arrival_time = date('H:i', strtotime($row['arrival_time']));
            $departure_time = date('H:i', strtotime($row['departure_time']));
    }
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
            $_POST['country']
        );
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

class PassportDataInput
{
    public function CheckAndSubmit($name, $surname, $nationality, $gender, $Email, $Phone_Number, $Passport_number, $passportIssuedDate, $passportExpirationDate, $country)
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
        $country = htmlspecialchars(filter_var(trim($country), FILTER_SANITIZE_STRING));


        $alert = ''; // Инициализируем переменную $alert

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
        } elseif (mb_strlen($country) < 1 || mb_strlen($country) > 200) {
            $alert = 'Incorrect date number length';
        } 

        if ($alert) {
            header("Location: ../php/OrderUserData.php?alert=" . urlencode($alert));
            exit();
        }
        header('Location: ../php/OrderUserData.php');

    
        $this->addPassportDataToDatabase($name, $surname, $nationality, $gender, $Email, $Phone_Number, $Passport_number, $passportIssuedDate, $passportExpirationDate, $country, $_SESSION['user_id']);
    
    }

    private function addPassportDataToDatabase($name, $surname, $nationality, $gender, $Email, $Phone_Number, $Passport_number, $passportIssuedDate, $passportExpirationDate, $country, $user_id)
    {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO `user_details` (`Name`, `Surname`, `Nationality`, `Gender`, `Email`, `Phone_number`, `Passport_number`, `Passport_issued_date`, `Passport_expiration_date`, `Issued_country_passport`, `user_id`, `created_at`) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, now())");
        $stmt->bind_param("sssssssssss", $name, $surname, $nationality, $gender, $Email, $Phone_Number, $Passport_number, $passportIssuedDate, $passportExpirationDate, $country, $user_id);
        $stmt->execute();
    }
}
?>



