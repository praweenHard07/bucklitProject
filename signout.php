<?php
session_start();
unset($_SESSION['currUser']);
 session_destroy();
 header("Location:/");

?>