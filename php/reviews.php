<?php
session_start();
$user_id = $_SESSION['user_id'];
$admin_id = $_SESSION['admin_id'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];

if ($user_id === 0) {
    header('Location: ../html/registration.html');
    exit;
}

$mysqli = new mysqli('localhost', 'root', '', 'airflightsdatabase');

// Обработка отправки формы комментария
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

// Получение комментариев из базы данных
$comments = array();

$sql = "SELECT name, comment, created_at FROM comments ORDER BY created_at DESC";
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

        <input type="submit" value="Submit">
    </form>

    <h2>Comments</h2>
    <ul>
        <?php foreach ($comments as $comment): ?>
            <li>
                <strong><?php echo $comment['name']; ?>:</strong>
                <?php echo $comment['comment']; ?><br>
                <small><?php echo $comment['created_at']; ?></small>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>

