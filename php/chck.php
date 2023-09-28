<?php

class Registration {
    private $mysql;

    public function __construct() {
        $this->mysql = new mysqli('localhost', 'root', '', 'airflightsdatabase');

        if ($this->mysql->connect_error) {
            die("Connection failed: " . $this->mysql->connect_error);
        }
    }

    public function validateAndRegister($login, $email, $phone, $con_password) {
        $login = htmlspecialchars(filter_var(trim($login), FILTER_SANITIZE_STRING));
        $email = htmlspecialchars(filter_var(trim($email), FILTER_SANITIZE_STRING));
        $phone = htmlspecialchars(filter_var(trim($phone), FILTER_SANITIZE_STRING));
        $con_password = htmlspecialchars(filter_var(trim($con_password), FILTER_SANITIZE_STRING));

        if (mb_strlen($login) < 5 || mb_strlen($login) > 90) {
            echo "<script>alert(\"Incorrect username length\");</script>";
            exit();
        } elseif (mb_strlen($email) < 2 || mb_strlen($email) > 90) {
            echo "<script>alert(\"Incorrect email length\");</script>";
            exit();
        } elseif (mb_strlen($phone) !== 12) {
            echo "<script>alert(\"Incorrect phone length\");</script>";
            exit();
        } elseif (mb_strlen($con_password) < 8 || mb_strlen($con_password) > 32) {
            echo "<script>alert(\"Incorrect password length (from 8 to 32 symbols)\");</script>";
            exit();
        } else {
            // Хэшируем пароль и добавляем к нему дополнительный ключ
            $con_password = md5($con_password . "356ads34749ad9s");

            // Проверяем, существует ли пользователь с таким же именем
            if ($this->isUserExists('username', $login)) {
                echo "<script>alert(\"This username already exists\");</script>";
                exit();
            }

            // Проверяем, существует ли пользователь с таким же email
            if ($this->isUserExists('email', $email)) {
                echo "<script>alert(\"This email already exists\");</script>";
                exit();
            }

            // Проверяем, существует ли пользователь с таким же номером телефона
            if ($this->isUserExists('phone', $phone)) {
                echo "<script>alert(\"This phone already exists\");</script>";
                exit();
            }

            // Добавляем пользователя в базу данных
            $this->addUserToDatabase($login, $email, $phone, $con_password);

            // Закрываем соединение с базой данных
            $this->mysql->close();

            // Перенаправляем пользователя на страницу авторизации
            header('Location: ../php/index.php');
        }
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
    $registration = new Registration();
    $registration->validateAndRegister($_POST['username'], $_POST['email'], $_POST['phone'], $_POST['con-password']);
}
echo "PHP is working!";
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

