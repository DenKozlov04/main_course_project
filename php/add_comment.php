<?php
// данные из сесии
session_start();
$user_id = $_SESSION['user_id'];
$admin_id = $_SESSION['admin_id'];
$username = $_SESSION['username'];
$comment = $_POST['comment'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'dbconfig.php';
// подключение кбд
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    header("Location: ../php/user_comments.php");
    exit();
}

$comments = []; 

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
