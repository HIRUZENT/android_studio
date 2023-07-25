<?php 

include 'config.php';
$con = mysqli_connect("localhost", "root", "", "fessdex");
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
