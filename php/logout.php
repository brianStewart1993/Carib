<?php
 session_start();
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST'); 
session_unset();
session_destroy();
echo "success";
?>