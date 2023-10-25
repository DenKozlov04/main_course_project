<?php
session_start();
$user_id = $_SESSION['user_id'];
$admin_id = $_SESSION['admin_id'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];

$mysqli = new mysqli('localhost', 'root', '', 'airflightsdatabase');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comment = $_POST['comment'];
    $created_at = date('Y-m-d H:i:s'); // Получаем текущее время
    
    // Используйте подготовленный запрос с плейсхолдерами для безопасности и правильной вставки данных
    $sql = "INSERT INTO comments (name, email, user_id, comment, created_at) VALUES (?, ?, ?, ?, ?)";
    
    if ($stmt = $mysqli->prepare($sql)) {
        // Привязываем параметры к запросу
        $stmt->bind_param('sssss', $username, $email, $user_id, $comment, $created_at);
        
        // Выполняем запрос
        if ($stmt->execute()) {
            echo "Запись успешно добавлена.";
        } else {
            echo "Ошибка при выполнении запроса: " . $stmt->error;
        }
        
        // Закрываем запрос
        $stmt->close();
    } else {
        echo "Ошибка при подготовке запроса: " . $mysqli->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Comments</title>
    <link href="../css/review.css" rel="stylesheet" type="text/css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Comments</h1>

    <h2>Add comment</h2>
    <form action="../php/reviews.php" method="post">
        <label for="name">Name: <?php echo $username; ?></label>
        <label for="email">Email: <?php echo $email; ?></label>

        <label for="comment">Your comment:</label><br>
        <textarea name="comment" id="comment" cols="30" rows="10"></textarea><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
