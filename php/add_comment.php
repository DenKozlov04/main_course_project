<?php
class CommentManager {
    private $pdo;

    public function __construct() {
        $this->pdo = new PDO('mysql:host=localhost;dbname=airflightsdatabase', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function addComment($name, $email, $comment) {
        $created_at = date('Y-m-d H:i:s');
        $stmt = $this->pdo->prepare('INSERT INTO comments (name, email, comment, created_at) VALUES (?, ?, ?, ?)');
        $stmt->execute([$name, $email, $comment, $created_at]);
    }

    public function getComments() {
        $stmt = $this->pdo->query('SELECT * FROM comments ORDER BY created_at DESC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteComment($comment_id) {
        $stmt = $this->pdo->prepare('DELETE FROM comments WHERE id = ?');
        $stmt->execute([$comment_id]);
    }
}

$commentManager = new CommentManager();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];
    $commentManager->addComment($name, $email, $comment);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

if (isset($_GET['id'])) {
    $comment_id = $_GET['id'];
    $commentManager->deleteComment($comment_id);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

$comments = $commentManager->getComments();
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

        <label for="email">Your email:</label>
        <input type="email" id="email" name="email" required>

        <label for="comment">Your comment:</label>
        <textarea id="comment" name="comment" required></textarea>

        <button type="submit">Submit</button>
    </form>

    <!-- Добавляем кнопку удаления к каждому комментарию -->
    <ul class="comments-list">
        <?php foreach ($comments as $comment): ?>
        <li class="comment">
            <h3><?= $comment['name'] ?></h3>
            <small><?= $comment['email'] ?></small>
            <p><?= $comment['comment'] ?></p>
            <small><?= $comment['created_at'] ?></small>
            
            <a href="<?= $_SERVER['PHP_SELF'] ?>?id=<?= $comment['id'] ?>">Delete</a>
        </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
