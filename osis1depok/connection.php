<?php 

include "config.php";
$con = mysqli_connect("localhost", "root", "", "osis1depok");

function query($query) {

    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

?>
