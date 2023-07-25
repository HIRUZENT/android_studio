<?php
    
    include "koneksi.php";
    
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $kelas = isset($_POST['kelas']) ? $_POST['kelas'] : '';
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $asal_smp = isset($_POST['asal_smp']) ? $_POST['asal_smp'] : '';
    $jenis_kelamin = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '';
    $alasan = isset($_POST['alasan']) ? $_POST['alasan'] : '';
    
    if ( empty($kelas) && empty($nama) && empty($asal_smp) && empty($jenis_kelamin) && empty($alasan)) { 
        echo "Kolom isian tidak boleh kosong"; 
        
    } else if(empty($id)) {
        $query = mysqli_query($con,"INSERT INTO daftar (id,kelas,nama,asal_smp,jenis_kelamin,alasan) VALUES(0,'".$kelas."','".$nama."','".$asal_smp."','".$jenis_kelamin."','".$alasan."')");
        
        if ($query) {
            echo "Data berhasil di simpan";
            
        } else{ 
            echo "Error simpan Data";
            
        }
    }else{
        $query = mysqli_query($con,"UPDATE daftar set kelas = '".$kelas."', nama = '".$nama."', asal_smp = '".$asal_smp."', jenis_kelamin = '".$jenis_kelamin."', alasan = '".$alasan."' where id = '". $id ."'");
        
        if ($query) {
            echo "Data berhasil di ubah";
            
        } else{ 
            echo "Error ubah Data";
            
        }
        
    }
?>