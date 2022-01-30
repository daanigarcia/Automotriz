<?php
    $db="db_rascon";
     $user="root";
     $pass="";

try {
    $con=new PDO('mysql:host=localhost;dbname='.$db,$user,$pass);
} catch (PDOException $e) {
    echo "Error".$e->getMessage();
}


// function conectar(){
//     $user="root";
//     $pass="";
//     $db="db_rascon";
//     $server="localhost";
//     $con=mysql_connect($server,$user,$pass) or die("Error al conectar a la base de datos".mysql_error());
//     mysql_select_db($db,$con);
//     return $con;

// }

?>