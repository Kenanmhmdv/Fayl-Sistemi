<?php
session_start();
echo "WELCOME";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $_SESSION[] = [];
    session_destroy();
    header("Location:login.php");
}
