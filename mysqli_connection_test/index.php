<?php

// definition of constant variables for my sqli connection

require_once __DIR__."/config.php";

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
// this specific method is to avoid sql injections

// preparation of the query, with adition of ? to bind a variable declared at line 43
$sql=$conn->prepare("SELECT * FROM `degrees` WHERE department_id= ?");

// bind of variable $id with specification of type
$sql->bind_param('s',$id);

// initialization of $id variable
$id=$_GET['id'];

// execution of the prepared string at line 41
$sql->execute();


// initialization of the $result variable,
// that will get the result from the execute of $sql
$result= $sql->get_result();


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