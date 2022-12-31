<?php
session_start();
unset($_SESSION["admin_login"]);
unset($_SESSION["admin_pass"]);
header("Location:dashboard.html");
?>