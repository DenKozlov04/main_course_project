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

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    Auth::login($username, $password);
}
?>
