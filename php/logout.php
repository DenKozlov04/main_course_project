<?php
session_start();


 $_SESSION['user_id'] = 0;
 $_SESSION['admin_id'] = 0;

// logout 
header("Location: index.php");
exit;
?>