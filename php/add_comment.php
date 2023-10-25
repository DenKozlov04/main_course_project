<?php
session_start();
$user_id = $_SESSION['user_id'];
$admin_id = $_SESSION['admin_id'];
$username = $_SESSION['username'];
$comment = $_POST['comment'];

// $sql = "SELECT username,email  FROM users WHERE user_id = $user_id";
$sql = "SELECT user_id, comment, email, name, created_at FROM comments WHERE id=?";
$mysqli = new mysqli('localhost', 'root', '', 'airflightsdatabase');

if ($stmt = $mysqli->prepare($sql)) {
    // Привязываем параметр к запросу
    $stmt->bind_param('i', $comment_id); // 'i' означает integer, можно использовать 's' для строк

    // Устанавливаем значение параметра
    $comment_id = $_GET['id'];

    // Выполняем запрос
    $stmt->execute();

    // Получаем результат
    $result = $stmt->get_result();
    
    // Здесь вы можете обработать результат запроса
    // Например, получить данные из $result
    // ...

    // Закрываем запрос
    $stmt->close();
} else {
    echo "Ошибка при подготовке запроса: " . $mysqli->error;
}

// Далее обрабатывайте результат запроса, когда это необходимо


// $email = $_SESSION['email'];

// class CommentManager {
//     private $pdo;

//     public function __construct() {
//         $this->pdo = new PDO('mysql:host=localhost;dbname=airflightsdatabase', 'root', '');
//         $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     }

//     public function addComment($name, $email, $comment) {
//         $created_at = date('Y-m-d H:i:s');
//         $stmt = $this->pdo->prepare('INSERT INTO comments (name, email, comment, created_at, user_id) VALUES (?, ?, ?, ?, ?)');
//         $stmt->execute([$name, $email, $comment, $created_at, $user_id]);
//     }

//     public function getComments() {
//         $stmt = $this->pdo->query('SELECT comments.*, users.username FROM comments JOIN users ON comments.user_id = users.id ORDER BY created_at DESC');
//         return $stmt->fetchAll(PDO::FETCH_ASSOC);
//     }

//     public function deleteComment($comment_id) {
//         $stmt = $this->pdo->prepare('DELETE FROM comments WHERE id = ?');
//         $stmt->execute([$comment_id]);
//     }
// }

// $commentManager = new CommentManager();

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $name = $_POST['name'];
//     $email = $email; // Используем email из сессии
//     $comment = $_POST['comment'];
//     $commentManager->addComment($name, $email, $comment);
//     header('Location: ' . $_SERVER['PHP_SELF']);
//     exit;
// }

// if (isset($_GET['id'])) {
//     $comment_id = $_GET['id'];
//     $commentManager->deleteComment($comment_id);
//     header('Location: ' . $_SERVER['PHP_SELF']);
//     exit;
// }

// $comments = $commentManager->getComments();
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
