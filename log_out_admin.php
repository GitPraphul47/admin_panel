<?php
session_start();
include('conflict/connection.php');
session_destroy();

header('Location: login.php');

?>