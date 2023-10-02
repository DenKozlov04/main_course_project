<?php
session_start();

class ImageUploader {
    private $mysqli;

    public function __construct() {
        $this->initializeDatabase();
    }

    private function initializeDatabase() {
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'airflightsdatabase';

        $this->mysqli = new mysqli($host, $user, $password, $database);

        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }
    }

    public function uploadImage() {
        if (isset($_POST['submit'])) {
            $fileName = $_FILES['image']['name'];
            $fileTmpName = $_FILES['image']['tmp_name'];
            $fileType = $_FILES['image']['type'];

            $imageData = file_get_contents($fileTmpName);

            $sql = "INSERT INTO profile_images (user_id, profile_image, image_type) VALUES (?, ?, ?)";
            $stmt = $this->mysqli->prepare($sql);

            if ($stmt) {
                $stmt->bind_param("iss", $_SESSION['user_id'], $imageData, $fileType);

                if ($stmt->execute()) {
                    echo "Изображение успешно загружено и сохранено в базе данных.";
                    header("Location: user_info.php");
                    exit();
                } else {
                    echo "Ошибка при загрузке изображения: " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "Ошибка при подготовке SQL-запроса: " . $this->mysqli->error;
            }
        }
    }

    public function closeDatabaseConnection() {
        $this->mysqli->close();
    }
}

$imageUploader = new ImageUploader();
$imageUploader->uploadImage();
$imageUploader->closeDatabaseConnection();
?>

