<?php
class Database {
    private $servername = "localhost";
    private $dbusername = "root";
    private $dbpassword = "";
    private $dbname = "airflightsdatabase";
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->dbusername, $this->dbpassword, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getUser($username) {
        $stmt = $this->conn->prepare("SELECT user_id, username, email, password FROM users WHERE username=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function close() {
        $this->conn->close();
    }
}

class Auth {
    public static function login($username, $password) {
        $db = new Database();
        $user = $db->getUser($username);

    
        if ($user && md5($password . "356ads34749ad9s") === $user['password']) {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['email'] = $user['email'];
            header("Location: index.php");
            exit();
        } else {
            echo "Неверное имя пользователя или пароль";
        }

        $db->close();
    }
}
session_start();
class AdminAuthentication {
    public static function authenticate($username, $password) {
        if ($username === 'admin' && $password === 'Admin292020') {
            header("Location: adminPage.php");
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $user['email'];
            $_SESSION['user_id'] = $_SESSION['admin_id'];
            $_SESSION['email'] = 'admin@gmail.com';
            session_start();
            $_SESSION['admin_id'] = 1;
            exit();
        } else {
            $_SESSION['admin_id'] = 0;
        }
    }
}



// Использование класса для аутентификации
$username = $_POST['username'];
$password = $_POST['password'];

AdminAuthentication::authenticate($username, $password);

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    Auth::login($username, $password);
}

?>
