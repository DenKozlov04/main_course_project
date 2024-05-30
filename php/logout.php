<?php
session_start();


 $_SESSION['user_id'] = 0;
 $_SESSION['admin_id'] = 0;

// user session logout code
header("Location: index.php");
exit;
?>