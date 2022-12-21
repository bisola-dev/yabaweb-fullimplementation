<?php
session_start();

session_destroy();

header("Location:applicantlogin.php");
exit;
?>



