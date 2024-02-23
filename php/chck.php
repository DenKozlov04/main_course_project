<?php
require __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include 'dbconfig.php';




class Registration {
    private $mysql;

    public function __construct() {
        $this->mysql = new mysqli(DatabaseConfig::$servername, DatabaseConfig::$dbusername, DatabaseConfig::$dbpassword, DatabaseConfig::$dbname);

        if ($this->mysql->connect_error) {
            die("Connection failed: " . $this->mysql->connect_error);
        }
    }

    private function sendTheRegisterLetter($login, $email) {
        $config = include __DIR__ . '../mconfig.php';

        $mail = new PHPMailer(true);
        $isMailSent = false;

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host       = $config['smtp_host'];
            $mail->SMTPAuth   = true;
            $mail->Username   = $config['smtp_username'];
            $mail->Password   = $config['smtp_password'];
            $mail->SMTPSecure = $config['smtp_ssl'];
            $mail->Port       = $config['smtp_port'];

            //Recipients
            $mail->setFrom($config['from_email']);
            $mail->addAddress($email);

            //Content
            $mail->isHTML(false);
            $mail->Subject = "You're registered in";
            $mail->Body    = "Hello, $login!\n\nYour registration was successful. Now you can use all features of our site, view available flights, leave comments, reserve tickets, and much more.\nWe are happy to welcome you!\n\nSincerely, your BalticAvia!\n\nPlease don't answer this letter.\n\n";

            $mail->send();
            $isMailSent = true;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            $isMailSent = false;
        }

        return $isMailSent;
    }

    public function validateAndRegister($login, $email, $phone, $con_password,$password) {
        $login = htmlspecialchars(filter_var(trim($login), FILTER_SANITIZE_STRING));
        $email = htmlspecialchars(filter_var(trim($email), FILTER_SANITIZE_STRING));
        $phone = htmlspecialchars(filter_var(trim($phone), FILTER_SANITIZE_STRING));
        $con_password = htmlspecialchars(filter_var(trim($con_password), FILTER_SANITIZE_STRING));
        $password = htmlspecialchars(filter_var(trim($password), FILTER_SANITIZE_STRING));



        $alert = ''; // Инициализируем переменную $alert

        if (mb_strlen($login) < 5 || mb_strlen($login) > 90) {
            $alert = 'Incorrect username length';
        } elseif (mb_strlen($email) < 2 || mb_strlen($email) > 90) {
            $alert = 'Incorrect email length';
        } elseif (mb_strlen($phone) !== 12) {
            $alert = 'Incorrect phone length';
        } elseif (mb_strlen($con_password) < 8 || mb_strlen($con_password) > 32) {
            $alert = 'Incorrect confirm password length (from 8 to 32 symbols)';
        } elseif (mb_strlen($password) < 8 || mb_strlen($password) > 32) {
            $alert = 'Incorrect password length (from 8 to 32 symbols)';
        }
        
        // Если все проверки прошли успешно
        if ($this->isUserExists('username', $login)) {
            $alert = "This username already exists";
        }
        
        if ($this->isUserExists('email', $email)) {
            $alert = "This email already exists";
        }
        
        if ($this->isUserExists('phone', $phone)) {
            $alert = "This phone already exists";
        }
        
        if ($con_password != $password) {
            $alert = "These passwords do not match";
        }
        
        // Выводим алерт, если есть ошибка
        if ($alert) {
            header("Location: ../html/registration.html?alert=" . urlencode($alert));
            exit();
        }
        
        // Хэшируем пароль с использованием MD5
        $con_password = md5($con_password . "356ads34749ad9s");
        
        // Отправляем письмо с регистрационной информацией
        $isMailSent = $this->sendTheRegisterLetter($login, $email);

        // Если письмо успешно отправлено, добавляем пользователя в базу данных
        // if ($isMailSent) {
            $this->addUserToDatabase($login, $email, $phone, $con_password);
        // }

        // Закрываем соединение с базой данных
        $this->mysql->close();

        // Перенаправляем пользователя на страницу авторизации
        header('Location: ../php/index.php');
    }

    private function isUserExists($field, $value) {
        $stmt = $this->mysql->prepare("SELECT user_id FROM users WHERE $field = ?");
        $stmt->bind_param("s", $value);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }

    private function addUserToDatabase($login, $email, $phone, $con_password) {
        $stmt = $this->mysql->prepare("INSERT INTO `users` (`username`, `email`, `phone`, `password`, `created_at`) 
            VALUES (?, ?, ?, ?, now())");
        $stmt->bind_param("ssss", $login, $email, $phone, $con_password);
        $stmt->execute();
    }
}

if (isset($_POST['register'])) {
    try {
        $registration = new Registration();
        $registration->validateAndRegister($_POST['username'], $_POST['email'], $_POST['phone'], $_POST['con-password'],$_POST['password']);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}



echo "PHP is working!";
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

