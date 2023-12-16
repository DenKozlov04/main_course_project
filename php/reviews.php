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

$mysqli = new mysqli('localhost', 'root', '', 'airflightsdatabase');

// Обработка отправки формы комментария
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['edit_comment'])) {

        $edit_comment_id = $_POST['edit_comment_id'];
        $edit_comment = $_POST['edit_comment'];
        
        $sql = "UPDATE comments SET comment = ? WHERE id = ? AND (user_id = ? OR ? = 1)";
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param('siii', $edit_comment, $edit_comment_id, $user_id, $admin_id);

            if ($stmt->execute()) {
                // После успешного обновления, перенаправляем пользователя на эту же страницу
                header('Location: ' . $_SERVER['PHP_SELF']);
                exit();
            } else {
                echo "Ошибка при выполнении запроса: " . $stmt->error;
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
                // После успешного удаления, перенаправляем пользователя на эту же страницу
                header('Location: ' . $_SERVER['PHP_SELF']);
                exit();
            } else {
                echo "Ошибка при выполнении запроса: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Ошибка при подготовке запроса: " . $mysqli->error;
        }
    } elseif (isset($_POST['add_comment'])) {
        $comment = $_POST['comment'];
        $created_at = date('Y-m-d H:i:s');

        // Проверка на пустой комментарий
        if (!empty($comment)) {
            $sql = "INSERT INTO comments (name, email, user_id, comment, created_at) VALUES (?, ?, ?, ?, ?)";

            if ($stmt = $mysqli->prepare($sql)) {
                $stmt->bind_param('sssss', $username, $email, $user_id, $comment, $created_at);

                if ($stmt->execute()) {
                    // После успешной вставки, перенаправляем пользователя на эту же страницу
                    header('Location: ' . $_SERVER['PHP_SELF']);
                    exit();
                } else {
                    echo "Ошибка при выполнении запроса: " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "Ошибка при подготовке запроса: " . $mysqli->error;
            }
        } else {
            echo "Пожалуйста, введите комментарий.";
        }
    }
}

// Получение комментариев из базы данных
$comments = array();

$sql = "SELECT id, name, comment, created_at, user_id FROM comments ORDER BY created_at DESC";
if ($result = $mysqli->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $comments[] = $row;
    }
    $result->free();
}

$mysqli->close();
// ДОБАВИТЬ РЕДАКТИРОВАНИЕ КОММЕНТАРИЕВ ДЛЯ ПОЛЬЗОВАТЕЛЯ И АДМИНА
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
            <button onclick="ShowEdit(<?php echo $comment['id']; ?>)">Edit your comment</button>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" id="editForm<?php echo $comment['id']; ?>" style="display: none;">
                <input type="hidden" name="edit_comment_id" value="<?php echo $comment['id']; ?>">
                <input type="submit" value="Edit" name="edit_comment">
                <textarea name="edit_comment" id="edit_comment" cols="30" rows="10"><?php echo $comment['comment']; ?></textarea><br>
            </form>
        <?php endif; ?>
    </div>
<?php endforeach; ?>

</body>
</html>

