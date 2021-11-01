<?php

// definition of constant variables for my sqli connection
define('DB_SERVERNAME', 'localhost:3306');
define('DB_USERNAME', 'root');

// default mamp mysql, password
define('DB_PASSWORD','root');
define('DB_NAME', 'db_university');

// connection through mysqli
$conn=new mysqli(DB_SERVERNAME,DB_USERNAME,DB_PASSWORD,DB_NAME);

// DEBUG $CONN
// var_dump of the $conn class, to visualize the resulting object

// var_dump($conn);

// var_dump of the $conn class, with a specified query, to visualize the resulting object (specific to the SELECT)

// var_dump($conn->query("SELECT * FROM `courses`"));

// /DEBUG $CONN




// condition in case of errors in establishing the connection
if($conn && $conn->connect_error){
    echo "connection failed". $conn->connect_error;
    // in case of verified condition of the if, the code past line 32 won't be executed due to the die
    die;
}

// initialization of the $sql variable, that will hold the string to insert in the query, that will contain the SQL SELECT

$sql="SELECT * FROM `degrees`";

// initialization of the $result variable, that will add the query to the mysqli initialized in the $conn class

$result= $conn->query($sql);

var_dump($result);
if($result && $result->num_rows>0){


    while($row = $result->fetch_assoc()){
        echo $row['name']." ".$row['level']. "<br>";
    }
}elseif($result){
    echo "nessun risultato trovato";
}else{
    echo "errore query";
}






?>