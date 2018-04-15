<?php 
$hostName     = 'localhost' ;
$database       = 'db_map' ;
$user     = 'rachid' ;
$password = 'SQL$$50..' ;


$connection = new mysqli($hostName , $user , $password , $database );
if( $connection->connect_error ) {
    die ( $connection->connect_error ) ;
} 

//Issues a query to MySQL, outputting an error message if it fails
function queryMysql($query) {

    global $connection ;
    $result = $connection->query($query) ;
    // if(!$result) {
    //     // die ($connection->error) ;
    //     echo "Error : " . mysqli_error($connection) . "<br><a href='index.php'>Back..</a>";
        
    // }
    return $result ;
}

//Removes potentially malicious code or tags from user input
function sanitizeString($var) {

    global $connection ;
    $var = strip_tags($var) ;
    $var = htmlentities($var) ;
    $var = stripslashes($var) ;

    return $connection->real_escape_string($var) ;
}


?>