<?php
class InfoTable {
    private $mysqli;

    public function __construct() {
        $this->initializeDatabase();
    }

    private function initializeDatabase() {
        $this->mysqli = new mysqli(DatabaseConfig::$servername, DatabaseConfig::$dbusername, DatabaseConfig::$dbpassword, DatabaseConfig::$dbname);

        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }
    }

    public function showUsers() {
        $stmt = $this->mysqli->prepare("SELECT * FROM users");

        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<table border='1'>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>";

                while ($row = $result->fetch_assoc()) {
                    if ($row['user_id'] == 57) {
                        continue; // Пропустить строку с id 57
                    }
                    echo "<tr>
                            <td>" . $row['user_id'] . "</td>
                            <td>" . $row['username'] . "</td>
                            <td>" . $row['email'] . "</td>
                            <td>" . $row['password'] . "</td>
                            <td>" . $row['created_at'] . "</td>
                            <td>
                                <form method='POST' action='adminPage.php' >
                                    <input type='hidden'  name='DeleteUser' value='" . $row['user_id'] . "'>
                                    <button type='submit'>Delete</button>
                                </form>
                            </td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "No users found.";
            }

            $result->free();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }

    public function deleteUsers() {
      if (isset($_POST['DeleteUser'])) {
          $user_id = $_POST['DeleteUser'];
  
          $stmt_users = $this->mysqli->prepare("DELETE FROM `users` WHERE `user_id` = ?");
          $stmt_users->bind_param("i", $user_id);
          
          $stmt_details = $this->mysqli->prepare("DELETE FROM `user_details` WHERE `user_id` = ?");
          $stmt_details->bind_param("i", $user_id);
  
          if ($stmt_users->execute()) {
             
              // echo "User with ID $user_id deleted successfully from users table.";

              if ($stmt_details->execute()) {

                  if ($stmt_details->affected_rows > 0) {
                      // echo "User details for ID $user_id also deleted from user_details table.";
                  } else {
                      // echo "No user details found for ID $user_id in user_details table.";
                  }
              } else {
                  echo $stmt_details->error;
              }
          } else {
              echo $stmt_users->error;
          }

          $stmt_users->close();
          $stmt_details->close();
      }
  }
  
}

$infoTable = new InfoTable();
$infoTable->deleteUsers(); 
$infoTable->showUsers(); 
?>
