<?php
session_start();

class ImageUploader {
    private $mysqli;

    public function __construct() {
        $this->initializeDatabase();
    }

    private function initializeDatabase() {
        include 'dbconfig.php';

        $this->mysql = new mysqli(DatabaseConfig::$servername, DatabaseConfig::$dbusername, DatabaseConfig::$dbpassword, DatabaseConfig::$dbname);

        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }
    }

    public function uploadImage() {
        if (isset($_POST['submit'])) {
            // Проверяю, существует ли у пользователя изображение в бд
            $userId = $_SESSION['user_id'];
            $checkQuery = "SELECT user_id FROM profile_images WHERE user_id = ?";
            $checkStmt = $this->mysqli->prepare($checkQuery);

            if ($checkStmt) {
                $checkStmt->bind_param("i", $userId);
                $checkStmt->execute();
                $checkStmt->store_result();

                // Если у пользователя уже есть изображение, удаляем его
                if ($checkStmt->num_rows > 0) {
                    $deleteQuery = "DELETE FROM profile_images WHERE user_id = ?";
                    $deleteStmt = $this->mysqli->prepare($deleteQuery);

                    if ($deleteStmt) {
                        $deleteStmt->bind_param("i", $userId);
                        if (!$deleteStmt->execute()) {
                            echo "Error when deleting an existing image: " . $deleteStmt->error;
                        }
                        $deleteStmt->close();
                    } else {
                        echo "Error while preparing SQL query for deletion: " . $this->mysqli->error;
                    }
                }

                $checkStmt->close();
            } else {
                echo "Error when preparing an SQL query to check if an image is available: " . $this->mysqli->error;
            }

            $fileTmpName = $_FILES['image']['tmp_name'];
            $fileType = $_FILES['image']['type'];

            // Путь к папке, где будут храниться изображения
            $uploadDir = '../images/UserAvatar_Images/';

            // Имя файла
            $fileName = basename($_FILES['image']['name']);

            // Полный путь к загружаемому файлу
            $uploadPath = $uploadDir . $fileName;

            // перемещаю изображение в папку
            if (move_uploaded_file($fileTmpName, $uploadPath)) {
                $imageData = file_get_contents($uploadPath);
            // так же перемещаю изображение в бд
                $sql = "INSERT INTO profile_images (user_id, profile_image, image_type) VALUES (?, ?, ?)";
                $stmt = $this->mysqli->prepare($sql);

                if ($stmt) {
                    $stmt->bind_param("iss", $userId, $imageData, $fileType);

                    if ($stmt->execute()) {
                        echo "The image has been successfully uploaded and saved in the database.";
                        header("Location: user_info.php");
                        exit();
                    } else {
                        echo "Error when uploading an image: " . $stmt->error;
                    }

                    $stmt->close();
                } else {
                    echo "An error during SQL query preparation: " . $this->mysqli->error;
                }
            } else {
                echo "Error when moving a file to the UserAvatar_Images folder.";
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
