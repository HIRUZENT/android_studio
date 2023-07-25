<?php 

require_once 'koneksi.php';

if ($con) {
    $kelas = $_POST['kelas'];
    $nama = $_POST['nama'];
    $asal_smp= $_POST['asal_smp'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alasan = $_POST['alasan'];

    $insert = "INSERT INTO daftar(kelas, nama, asal_smp, jenis_kelamin, alasan) VALUES('$kelas', '$nama', '$asal_smp', '$jenis_kelamin', '$alasan')";

    if ($kelas != "" && $nama != "" && $asal_smp != "" && $jenis_kelamin != "" && $alasan != "" ) {
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