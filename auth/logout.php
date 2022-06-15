<?php 
session_start();
require_once '../function/helpers.php';

session_destroy();
redirect('auth/login.php');

?>