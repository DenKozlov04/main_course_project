<?php
include 'dbconfig.php';

class Database {
    private $mysqli;

    public function __construct() {
        $this->mysqli = new mysqli(DatabaseConfig::$servername, DatabaseConfig::$dbusername, DatabaseConfig::$dbpassword, DatabaseConfig::$dbname);

        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }
    }

    public function getUser($username) {
        $stmt = $this->mysqli->prepare("SELECT user_id, username, email, password FROM users WHERE username=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }
    public function close() {
        $this->mysqli->close();
    }
}

class Auth {
    public static function login($username, $password) {
        $db = new Database();
        $user = $db->getUser($username);
        $alert = '';

        if ($user && md5($password . "356ads34749ad9s") === $user['password']) {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['email'] = $user['email'];
            header("Location: ../php/index.php");
            exit();
        } else {
            $alert = "Incorrect username or password";
            header("Location: ../html/autorization.html?alert=" . urlencode($alert));
            exit();
        }

        $db->close();
    }
}


class AdminAuthentication {
    public static function authenticate($username, $password) {
        $db = new Database();

        if ($username === 'admin' && $password === 'Admin292020') {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $user['email']; 
            $_SESSION['user_id'] = $_SESSION['admin_id'];
            $_SESSION['email'] = 'admin@gmail.com';
            $_SESSION['admin_id'] = 1;
            header("Location: adminPage.php");
            exit();
        } else {
            $_SESSION['admin_id'] = 0;
        }

        $db->close();
    }
}




$username = $_POST['username'];
$password = $_POST['password'];

AdminAuthentication::authenticate($username, $password);

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    Auth::login($username, $password);
}

?>
