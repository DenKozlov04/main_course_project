<?php
session_start();
$user_id = $_SESSION['user_id'];
$admin_id = $_SESSION['admin_id'];
$username = $_SESSION['username'];
$comment = $_POST['comment'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Обработка отправки формы
    // Добавление комментария в базу данных
    // Перенаправление на другую страницу
    include 'dbconfig.php';

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Вставьте код для вставки комментария в базу данных здесь

    // После успешной вставки перенаправьте пользователя на другую страницу
    header("Location: ../php/user_comments.php");
    exit();
}

// Здесь отображаем комментарии
$comments = []; // Получите комментарии из базы данных

?>

<!DOCTYPE html>
<html>
<head>
    <link href="../css/review.css" rel="stylesheet">
    <title>Comments</title>
</head>
<body>
    <h1>Comments</h1>

    <h2>Add a Comment</h2>

    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <label for="name">Your name:</label>
        <input type="text" id="name" name="name" required>

        <label for="comment">Your comment:</label>
        <textarea id="comment" name="comment" required></textarea>

        <button type="submit">Submit</button>
    </form>

    Добавляем кнопку удаления к каждому комментарию
    <ul class="comments-list">
        <?php foreach ($comments as $comment): ?>
        <li class="comment">
            <h3><?= $comment['name'] ?></h3>
            <small><?= $comment['email'] ?></small>
            <p><?= $comment['comment'] ?></p>
            <small><?= $comment['created_at'] ?></small>
            
            <?php if ($comment['user_id'] == $user_id): ?>
                <a href="<?= $_SERVER['PHP_SELF'] ?>?id=<?= $comment['id'] ?>">Delete</a>
            <?php endif; ?>
        </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
