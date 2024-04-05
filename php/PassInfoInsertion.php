<?php
// include 'dbconfig.php';

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     try {
//         $PassportDataInput = new PassportDataInput();
//         $PassportDataInput->CheckAndSubmit(
//             $_POST['name'],
//             $_POST['surname'],
//             $_POST['nationality'],
//             $_POST['gender'],
//             $_POST['Email'],
//             $_POST['Phone_Number'],
//             $_POST['Passport_number'],
//             $_POST['passportIssuedDate'],
//             $_POST['passportExpirationDate'],
//             $_POST['country']
//         );
//     } catch (Exception $e) {
//         echo $e->getMessage();
//     }
// }

// class PassportDataInput
// {
//     public function CheckAndSubmit($name, $surname, $nationality, $gender, $Email, $Phone_Number, $Passport_number, $passportIssuedDate, $passportExpirationDate, $country)
//     {
//         $name = htmlspecialchars(filter_var(trim($name), FILTER_SANITIZE_STRING));
//         $surname = htmlspecialchars(filter_var(trim($surname), FILTER_SANITIZE_STRING));
//         $nationality = htmlspecialchars(filter_var(trim($nationality), FILTER_SANITIZE_STRING));
//         $gender = htmlspecialchars(filter_var(trim($nationality), FILTER_SANITIZE_STRING));
//         $Email = htmlspecialchars(filter_var(trim($Email), FILTER_SANITIZE_STRING));
//         $Phone_Number = htmlspecialchars(filter_var(trim($Phone_Number), FILTER_SANITIZE_STRING));
//         $Passport_number = htmlspecialchars(filter_var(trim($Passport_number), FILTER_SANITIZE_STRING));
//         $passportIssuedDate = htmlspecialchars(filter_var(trim($passportIssuedDate), FILTER_SANITIZE_STRING));
//         $passportExpirationDate = htmlspecialchars(filter_var(trim($passportExpirationDate), FILTER_SANITIZE_STRING));
//         $country = htmlspecialchars(filter_var(trim($country), FILTER_SANITIZE_STRING));


//         $alert = ''; // Инициализируем переменную $alert

//         if (mb_strlen($name) < 1 || mb_strlen($name) > 255) {
//             $alert = 'Name is too short or long';
//         } elseif (mb_strlen($Email) < 2 || mb_strlen($Email) > 90) {
//             $alert = 'Incorrect email length';
//         } elseif (mb_strlen($Phone_Number) !== 12) {
//             $alert = 'Incorrect phone length';
//         } elseif (mb_strlen($nationality) < 1 || mb_strlen($nationality) > 255) {
//             $alert = 'Incorrect nationality length ';
//         } elseif (mb_strlen($surname) < 1 || mb_strlen($surname) > 255) {
//             $alert = 'Incorrect surname length ';
//         } elseif (mb_strlen($Passport_number) < 6 || mb_strlen($Passport_number) > 20) {
//             $alert = 'Incorrect Passport number length';
//         } elseif (mb_strlen($passportIssuedDate) !== 10) {
//             $alert = 'Incorrect date number length';
//         } elseif (mb_strlen($passportExpirationDate) !== 10) {
//             $alert = 'Incorrect date number length';
//         } elseif (mb_strlen($country) < 1 || mb_strlen($country) > 200) {
//             $alert = 'Incorrect date number length';
//         } 

//         if ($alert) {
//             header("Location: ../php/OrderUserData.php?alert=" . urlencode($alert));
//             exit();
//         }
//         header('Location: ');

    
//         $this->addPassportDataToDatabase($name, $surname, $nationality, $gender, $Email, $Phone_Number, $Passport_number, $passportIssuedDate, $passportExpirationDate, $country, $_SESSION['user_id']);
    
//     }

//     private function addPassportDataToDatabase($name, $surname, $nationality, $gender, $Email, $Phone_Number, $Passport_number, $passportIssuedDate, $passportExpirationDate, $country, $user_id)
//     {
//         global $conn;
//         $stmt = $conn->prepare("INSERT INTO `user_details` (`Name`, `Surname`, `Nationality`, `Gender`, `Email`, `Phone_number`, `Passport_number`, `Passport_issued_date`, `Passport_expiration_date`, `Issued_country_passport`, `user_id`, `created_at`) 
//             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, now())");
//         $stmt->bind_param("sssssssssss", $name, $surname, $nationality, $gender, $Email, $Phone_Number, $Passport_number, $passportIssuedDate, $passportExpirationDate, $country, $user_id);
//         $stmt->execute();
//     }
// }
?>
