<?php
session_start();
$user_id = $_SESSION['user_id'];
$admin_id = $_SESSION['admin_id'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];

if ($user_id === 0 && $admin_id === 0) {
    header('Location: ../html/registration.html');
    exit;
}

include 'dbconfig.php';

// Обработка отправки формы комментария
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['edit_comment'])) {

        $edit_comment_id = $_POST['edit_comment_id'];
        $edit_comment = $_POST['edit_comment'];
        
        $sql = "UPDATE comments SET comment = ? WHERE id = ? AND (user_id = ? OR ? = 1)";
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param('siii', $edit_comment, $edit_comment_id, $user_id, $admin_id);

            if ($stmt->execute()) {
                // После успешного обновления, перенаправляет пользователя на эту же страницу
                header('Location: ' . $_SERVER['PHP_SELF']);
                exit();
            } else {
                echo "Error while executing the query: " . $stmt->error;
            }

            $stmt->close();
        }
    }


    if (isset($_POST['delete_comment'])) {
        $comment_id = $_POST['delete_comment_id'];

        // Проверка на то, что комментарий принадлежит текущему пользователю или админу
        $sql = "DELETE FROM comments WHERE id = ? AND (user_id = ? OR ? = 1)";
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param('iii', $comment_id, $user_id, $admin_id);

            if ($stmt->execute()) {
                // После успешного удаления, перенаправляет пользователя на эту же страницу
                header('Location: ' . $_SERVER['PHP_SELF']);
                exit();
            } else {
                echo "Error while executing the query: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Ошибка при подготовке запроса: " . $mysqli->error;
        }
    } elseif (isset($_POST['add_comment'])) {
        $comment = $_POST['comment'];
        $created_at = date('Y-m-d H:i:s');

        // Проверка на то, пустой ли комментарий
        if (!empty($comment)) {
            $sql = "INSERT INTO comments (name, email, user_id, comment, created_at) VALUES (?, ?, ?, ?, ?)";

            if ($stmt = $mysqli->prepare($sql)) {
                $stmt->bind_param('sssss', $username, $email, $user_id, $comment, $created_at);

                if ($stmt->execute()) {
                    // После успешной вставки, перенаправляет пользователя на эту же страницу
                    header('Location: ' . $_SERVER['PHP_SELF']);
                    exit();
                } else {
                    echo "Error while executing the query: " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "An error in the preparation of the request: " . $mysqli->error;
            }
        } else {
            echo "Please enter a comment.";
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['flightname']) && isset($_POST['comment_id'])) {
            $flightname = $_POST['flightname'];
            $comment_id = $_POST['comment_id'];
    
            // Запрос на обновление 
            $update_sql = "UPDATE comments SET comment_category = '$flightname' WHERE id = $comment_id";
            
            if ($conn->query($update_sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    }
}

// получаем комментарии в массив
$comments = array();

$sql = "SELECT id, name, comment, created_at, user_id FROM comments ORDER BY created_at DESC";
if ($result = $mysqli->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $comments[] = $row;
    }
    $result->free();
}

$mysqli->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Comments</title>
    <link href="../css/review.css" rel="stylesheet" type="text/css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <h1>Comments</h1>

    <h2>Add comment</h2>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
       <label for="name">Name: <?php echo $username; ?></label>
       <label for="email">Email: <?php echo $email; ?></label>

        <label for="comment">Your comment:</label><br>
        <textarea name="comment" id="comment" cols="30" rows="10"></textarea><br>
        <script src="../JS/troggleButtonInRevews.js"></script>
        <input type="submit" value="Submit" name="add_comment">
    </form>

    <h2>Comments</h2>
<li><a href="index.php">On the main page</a></li>
<?php foreach ($comments as $comment): ?>
    <div class="comment-container">
        <div class="comment-header">
            <strong><?php echo $comment['name']; ?>:</strong>
        </div>
        <div class="comment-text">
            <?php echo $comment['comment']; ?>
        </div>
        <div class="comment-timestamp">
            <small><?php echo $comment['created_at']; ?></small>
        </div>
        <?php if ($comment['user_id'] == $user_id || $admin_id != 0): ?>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="hidden" name="delete_comment_id" value="<?php echo $comment['id']; ?>">
                <input type="submit" value="Delete" name="delete_comment">

            </form>
            <button onclick="ShowEdit(<?php echo $comment['id']; ?>)">Edit comment</button>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" id="editForm<?php echo $comment['id']; ?>" style="display: none;">
                <input type="hidden" name="edit_comment_id" value="<?php echo $comment['id']; ?>">
                <input type="submit" value="Edit" name="edit_comment">
                <textarea name="edit_comment" id="edit_comment" cols="30" rows="10"><?php echo $comment['comment']; ?></textarea><br>
            </form>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                    <?php
                    if ($admin_id != 0 && $user_id == 0) {
                        $sql = "SELECT Airline FROM `airports/airlines` ";
                        $result = $conn->query($sql);

                        // Вывод данных
                        if ($result->num_rows > 0) {
                            echo '<select id="flightname" name="flightname">';
                            echo '<option value="None" selected>None</option>'; // Значение None по умолчанию
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row["Airline"] . '">' . $row["Airline"] . '</option>';
                            }
                            echo '</select>';
                        } else {
                            echo "0 results";
                        }
                    }
                    echo '<input type="hidden" name="comment_id" value="' . $comment['id'] . '">';
                    ?>
                    <button type="submit">Add</button>
            </form>
        <?php endif; ?>
    </div>
<?php endforeach; ?>


</body>
</html>

