<?php
session_start();  
unset($_SESSION['un']);  
session_destroy();  


header('Location: index.php');
exit();  
?>
