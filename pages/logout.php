<?php
session_start();
session_unset();
session_destroy();
header("Location: /capstone/pages/login.php");
exit();

?>