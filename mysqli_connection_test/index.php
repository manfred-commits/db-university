<?php

// definition of constant variables for my sqli connection
define('DB_SERVERNAME', 'localhost:3306');
define('DB_USERNAME', 'root');

// default mamp mysql, password
define('DB_PASSWORD','root');
define('DB_NAME', 'db_university');

// connection through mysqli
$conn=new mysqli(DB_SERVERNAME,DB_USERNAME,DB_PASSWORD,DB_NAME);

var_dump($conn);


if($conn && $conn->connect_error){
    echo "connection failed". $conn->connect_error;
}




?>