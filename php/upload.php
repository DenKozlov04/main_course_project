<?php
session_start();

class ImageUploader {
    private $mysqli;

    public function __construct() {
        $this->initializeDatabase();
    }

    private function initializeDatabase() {
        include 'dbconfig.php';

        $this->mysqli = new mysqli(DatabaseConfig::$servername, DatabaseConfig::$dbusername, DatabaseConfig::$dbpassword, DatabaseConfig::$dbname);

        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }
    }

    public function uploadImage() {
        if (isset($_POST['submit'])) {
            $userId = $_SESSION['user_id'];
            $checkQuery = "SELECT user_id FROM profile_images WHERE user_id = ?";
            $checkStmt = $this->mysqli->prepare($checkQuery);

            if ($checkStmt) {
                $checkStmt->bind_param("i", $userId);
                $checkStmt->execute();
                $checkStmt->store_result();

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
            $imageData = file_get_contents($fileTmpName); 

           
            $sql = "INSERT INTO profile_images (user_id, profile_image, image_type) VALUES (?, ?, ?)";
            $stmt = $this->mysqli->prepare($sql);

            if ($stmt) {
                $stmt->bind_param("iss", $userId, $imageData, $fileType);

                try {
                    if ($stmt->execute()) {
                        echo "The image has been successfully uploaded and saved in the database.";
                        header("Location: user_info.php");
                        exit();
                    } else {
                        echo "Error when uploading an image: " . $stmt->error;
                    }
                } catch (mysqli_sql_exception $e) {
                   
                    echo "Error: The uploaded image exceeds the maximum allowed size.";
                    header("Location: user_info.php");
                }

                $stmt->close();
            } else {
                echo "An error during SQL query preparation: " . $this->mysqli->error;
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
