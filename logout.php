<?php
session_start();
session_unset();
session_destroy();
echo "<script>alert('You have successefully Logged out')</script>";
echo "<script>window.open('index.php')</script>";

?>