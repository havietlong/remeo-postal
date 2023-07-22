<?php
session_start();
// Unset all session variables
session_unset();
unset($_SESSION['cart']);
unset($_SESSION['user_name']);
unset($_SESSION['user_type']);
// Destroy the session
session_destroy();

header("location:index.php?role=staff&action=index");
