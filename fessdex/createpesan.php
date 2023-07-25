<?php 

require_once 'connection.php';

if ($con) {
    $kepada = $_POST['kepada'];
    $pesan = $_POST['pesan'];

    $insert = "INSERT INTO message (kepada, pesan) VALUES ('$kepada', '$pesan')";

    if ($kepada != "" && $pesan != "") {
        $result = mysqli_query($con, $insert);
        $response = array();

        if ($result) {
            array_push($response, array(
                'status' => 'BERHASIL' 
            ));
        } else {
            array_push($response, array(
                'status' => 'GAGAL' 
            ));
        }
    } else {
        array_push($response, array(
            'status' => 'GAGAL'
        ));
    }
} else {
    array_push($response, array(
        'status' => 'GAGAL'
    ));
}

echo json_encode(array("server_response" => $response));
mysqli_close($con);

?>