<?php 

require_once 'functions.php' ; 

$result = queryMysql ("SELECT * FROM clients ") ;

if ($result = $connection->query("SELECT * FROM clients")) {
    $rows = array();

    while($row = $result->fetch_array(MYSQLI_ASSOC) ) {
        $rows[] = $row;
    }

    echo json_encode($rows);
}
?>