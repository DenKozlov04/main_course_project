<?php
session_start();
include 'dbconfig.php';

class Comment
{
    private $mysqli;

    public function __construct()
    {
        $this->initializeDatabase();
    }

    private function initializeDatabase()
    {
        $this->mysqli = new mysqli(DatabaseConfig::$servername, DatabaseConfig::$dbusername, DatabaseConfig::$dbpassword, DatabaseConfig::$dbname);

        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }
    }

    public function editComment($edit_comment_id, $edit_comment, $user_id, $admin_id)
    {
        $sql = "UPDATE comments SET comment = ? WHERE id = ? AND (user_id = ? OR ? = 1)";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('siii', $edit_comment, $edit_comment_id, $user_id, $admin_id);

        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return "Error while executing the query: " . $this->mysqli->error;
        }
    }

    public function deleteComment($comment_id, $user_id, $admin_id)
    {
        $sql = "DELETE FROM comments WHERE id = ? AND (user_id = ? OR ? = 1)";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('iii', $comment_id, $user_id, $admin_id);

        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return "Error while executing the query: " . $this->mysqli->error;
        }
    }

    public function addComment($comment, $username, $email, $user_id)
    {
        $created_at = date('Y-m-d H:i:s');
        if (empty($comment)) {
            return "Please enter a comment.";
        }

        $sql = "INSERT INTO comments (name, email, user_id, comment, created_at) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('ssiss', $username, $email, $user_id, $comment, $created_at);

        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return "Error while executing the query: " . $this->mysqli->error;
        }
    }

    public function updateCommentCategory($flightname, $comment_id)
    {
        $sql = "UPDATE comments SET comment_category = ? WHERE id = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('si', $flightname, $comment_id);

        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return "Error updating record: " . $this->mysqli->error;
        }
    }

    public function getComments()
    {
        $comments = array();
        $sql = "SELECT id, name, comment, created_at, user_id FROM comments ORDER BY created_at DESC";
        $result = $this->mysqli->query($sql);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $comments[] = $row;
            }
            $result->free();
        } else {
            echo "Error executing query: " . $this->mysqli->error;
        }

        return $comments;
    }

    public function getAirlines()
    {
        $sql = "SELECT Airline FROM `airports/airlines`";
        $result = $this->mysqli->query($sql);

        $airlines = array();
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $airlines[] = $row["Airline"];
            }
        } else {
            echo "Error retrieving airlines: " . $this->mysqli->error;
        }

        return $airlines;
    }

    public function closeConnection()
    {
        $this->mysqli->close();
    }
}

$commentHandler = new Comment();

$user_id = $_SESSION['user_id'] ?? 0;
$admin_id = $_SESSION['admin_id'] ?? 0;
$username = $_SESSION['username'] ?? '';
$email = $_SESSION['email'] ?? '';

if ($user_id === 0 && $admin_id === 0) {
    header('Location: ../html/registration.html');
    exit;
}

$visibility = ($admin_id === 0) ? 'hidden' : 'visible';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['edit_comment'])) {
        $edit_comment_id = $_POST['edit_comment_id'];
        $edit_comment = $_POST['edit_comment'];
        $result = $commentHandler->editComment($edit_comment_id, $edit_comment, $user_id, $admin_id);
        if ($result === true) {
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo $result;
        }
    }

    if (isset($_POST['delete_comment'])) {
        $comment_id = $_POST['delete_comment_id'];
        $result = $commentHandler->deleteComment($comment_id, $user_id, $admin_id);
        if ($result === true) {
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo $result;
        }
    }

    if (isset($_POST['add_comment'])) {
        $comment = $_POST['comment'];
        $result = $commentHandler->addComment($comment, $username, $email, $user_id);
        if ($result === true) {
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo $result;
        }
    }

    if (isset($_POST['flightname']) && isset($_POST['comment_id'])) {
        $flightname = $_POST['flightname'];
        $comment_id = $_POST['comment_id'];
        $result = $commentHandler->updateCommentCategory($flightname, $comment_id);
        if ($result !== true) {
            echo $result;
        }
    }
}

$comments = $commentHandler->getComments();
$airlines = $commentHandler->getAirlines();
$commentHandler->closeConnection();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Comments</title>
    <link href="../css/review.css" rel="stylesheet" type="text/css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        function ShowEdit(commentId) {
            var editForm = document.getElementById('editForm' + commentId);
            if (editForm.style.display === 'none' || editForm.style.display === '') {
                editForm.style.display = 'block';
            } else {
                editForm.style.display = 'none';
            }
        }
    </script>
</head>

<body>
<div class='rectangleHeader'>
    <div class='logorectangle'>
        <a>AVIA</a>
    </div> 
    <div class='ButtonRect'>
        <a>You can leave a comment about your trip and communicate with other users</a>
    </div>  
    <a href="index.php" class="PrevPage">← On the main page</a>
    <img class='HeadImg'></img>
    <div class='Text1'>
        <a>Share your flight and vacation experiences with other users.</a>
    </div>
    <div class='GreyRect1'></div>
    <div class='bigRect1'>
        <div class='Text2'>
            <a>Leave your comment</a>
        </div>
        <div class='AddCommentRect'>
            <img class='UserImg' src='../images/user_foto.png'></img>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <label class='name' for='name'><?= $username ?></label>
                <label class='email' for='email'><?= $email ?></label>
                <textarea class='AddCommentArea' name='comment' id='comment' cols='30' rows='10' placeholder='Add a comment...'></textarea><br>
                <input class='inputBtn' type='submit' value='Post' name='add_comment'>
            </form>
        </div>
    </div>
    <div class='Text3'>
        <a>User comments</a>
    </div>
    <div class="scrollable-box"><?php foreach ($comments as $comment) : ?>
    <div class='comment-container'>  
        <img class='UserImg2' src='../images/user_foto.png'></img>
        <div class='comment-header'>
            <a class='name2'><?= $comment['name'] ?></a>
        </div>
        <div class='comment-text'><?= $comment['comment'] ?></div>
        <div class='comment-timestamp'>
            <a class='time'><?= $comment['created_at'] ?></a>
        </div>

        <?php if ($comment['user_id'] == $user_id || $admin_id != 0) : ?>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <input type='hidden' name='delete_comment_id' value='<?= $comment['id'] ?>'>
                <input class='DeleteBtn' type='submit' value='Delete' name='delete_comment'>
            </form>
            <button class='EditBtn' onclick="ShowEdit(<?= $comment['id'] ?>)">Edit</button>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" id='editForm<?= $comment['id'] ?>' style='display: none;'>
                <input type='hidden' name='edit_comment_id' value='<?= $comment['id'] ?>'>
                <input class='ApplyEditBtn' type='submit' value='Apply' name='edit_comment'>
                <div class='WhiteRect'>
                    <textarea class='EditCommentWindow' name='edit_comment' id='edit_comment<?= $comment['id'] ?>' cols='30' rows='10'><?= $comment['comment'] ?></textarea><br>
                </div>
            </form>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <input type='hidden' name='comment_id' value='<?= $comment['id'] ?>'>
                <?php if ($admin_id != 0 && $user_id == 0) : ?>
                    <select class='NamePlace' id='flightname' name='flightname'>
                        <option value='None' selected>None</option>
                        <?php foreach ($airlines as $airline) : ?>
                            <option value='<?= $airline ?>'><?= $airline ?></option>
                        <?php endforeach; ?>
                    </select>
                <?php endif; ?>
                <button class='AddStatus' type='submit' style='visibility: <?= $visibility ?>;'>Add</button>
            </form>
        <?php endif; ?>

    </div>
<?php endforeach; ?>
