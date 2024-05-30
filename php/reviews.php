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
if ($admin_id === 0) {
    $visibility ='hidden';
} else {
    $visibility ='visible';
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
            
            if ($mysqli->query($update_sql) === TRUE) {
                // echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $mysqli->error;
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
<div class='rectangleHeader'>
        <div class='logorectangle'>
            <a>AVIA</a>
        </div> 
        <div class='ButtonRect'>
            <a>You can leave a comment about your trip and communicate with other users</a>
        </div>  
        <a href="index.php" class="PrevPage" >← On the main page</a>
    <img class='HeadImg' ></img>
    <div class='Text1'>
    <a>Share your flight and vacation experiences with other users.</a>
</div>
<div class='GreyRect1'></div>
<div class='bigRect1'>
    <div class='Text2'>
        <a>Leave your comment </a>
    </div>
    <div class='AddCommentRect'>
        <img class='UserImg' src='../images/user_foto.png'></img>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <label class='name'for="name"> <?= $username; ?></label>
            <label class='email' for="email"> <?= $email; ?></label>

            <!-- <label for="comment">Your comment:</label><br> -->
            <textarea class='AddCommentArea' name="comment" id="comment" cols="30" rows="10" placeholder='Add a comment...'></textarea><br>
            <script src="../JS/troggleButtonInRevews.js"></script>
            <input class='inputBtn'type="submit" value="Post" name="add_comment">
        </form>
    </div>
</div>
<div class='Text3'>
    <a>User comments </a>
</div>
<div class="scrollable-box">
    <?php foreach ($comments as $comment): ?>
        <div class="comment-container">  
            <img class='UserImg2' src='../images/user_foto.png'></img>
            <div class="comment-header">
                <a class='name2'><?= $comment['name']; ?></a>
            </div>
            <div class="comment-text">
                <?= $comment['comment']; ?>
            </div>
            <div class="comment-timestamp">
                <a class='time'><?= $comment['created_at']; ?></a>
            </div>
            <?php if ($comment['user_id'] == $user_id || $admin_id != 0): ?>
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                    <input type="hidden" name="delete_comment_id" value="<?= $comment['id']; ?>">
                    <input class='DeleteBtn'type="submit" value="Delete" name="delete_comment">
                </form>
                <button class='EditBtn' onclick="ShowEdit(<?= $comment['id']; ?>)">Edit</button>
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" id="editForm<?= $comment['id']; ?>" style="display: none;">
                    <input type="hidden" name="edit_comment_id" value="<?= $comment['id']; ?>">
                    <input class='ApplyEditBtn'type="submit" value="Edit" name="edit_comment">
                    <div class='WhiteRect'>
                        <textarea class='EditCommentWindow'name="edit_comment" id="edit_comment" cols="30" rows="10"><?= $comment['comment']; ?></textarea><br>
                    </div>
                </form>
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                    <?php
                    if ($admin_id != 0 && $user_id == 0) {
                        $sql = "SELECT Airline FROM `airports/airlines` ";
                        $result = $mysqli->query($sql);

                        // Вывод данных
                        if ($result->num_rows > 0) {
                            echo '<select class="NamePlace"id="flightname" name="flightname">';
                            echo '<option value="None" selected>None</option>'; 
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
                    <button class='AddStatus' type="submit" style="visibility: <?= $visibility; ?>;">Add</button>
                </form>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>
<footer>
    <div class="footer-content">
        <p>&copy; 2023 AVIA. All rights reserved..</p>
        <p>Follow us on social media:</p>
        <ul class="social-links">
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Instagram</a></li>
        </ul>
    </div>
</footer>
</body>
</html>

