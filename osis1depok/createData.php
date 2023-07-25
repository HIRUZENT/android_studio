<?php 

require_once 'koneksi.php';

if ($con) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; 

    $insert = "INSERT INTO user(username, email, password) VALUES('$username', '$email', '$password')";

    if ($username != "" && $email != "" && $password  != "") {
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