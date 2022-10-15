<?php
//Start Database Connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "ontro";
// Create connection
$con = new mysqli( $servername, $username, $password, $database );
// Check connection
try{
    if ( $con->connect_error ) {
         throw new Exception( "Connection failed: " );
    }
}
catch( Exception $e ) {
    echo 'Message: ' .$e->getMessage();
}
//End Database Connection
?>
