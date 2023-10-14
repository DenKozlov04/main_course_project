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
            // Проверяем, существует ли у пользователя изображение в базе данных
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
                            echo "Ошибка при удалении существующего изображения: " . $deleteStmt->error;
                        }
                        $deleteStmt->close();
                    } else {
                        echo "Ошибка при подготовке SQL-запроса для удаления: " . $this->mysqli->error;
                    }
                }

                $checkStmt->close();
            } else {
                echo "Ошибка при подготовке SQL-запроса для проверки наличия изображения: " . $this->mysqli->error;
            }

            $fileTmpName = $_FILES['image']['tmp_name'];
            $fileType = $_FILES['image']['type'];

            // Путь к папке, где будут храниться изображения
            $uploadDir = '../images/UserAvatar_Images/';

            // Имя файла
            $fileName = basename($_FILES['image']['name']);

            // Полный путь к загружаемому файлу
            $uploadPath = $uploadDir . $fileName;

            // Перемещаем загруженное изображение в папку
            if (move_uploaded_file($fileTmpName, $uploadPath)) {
                $imageData = file_get_contents($uploadPath);

                $sql = "INSERT INTO profile_images (user_id, profile_image, image_type) VALUES (?, ?, ?)";
                $stmt = $this->mysqli->prepare($sql);

                if ($stmt) {
                    $stmt->bind_param("iss", $userId, $imageData, $fileType);

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
            } else {
                echo "Ошибка при перемещении файла в папку UserAvatar_Images.";
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
