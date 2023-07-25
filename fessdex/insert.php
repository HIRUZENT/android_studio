<?php
	
	include 'connection.php';
	
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$kepada = isset($_POST['kepada']) ? $_POST['kepada'] : '';
	$pesan = isset($_POST['pesan']) ? $_POST['pesan'] : '';
	
	
	if (empty($pesan) || empty($kepada)) { 
		echo "Kolom isian tidak boleh kosong"; 
		
	} else if(empty($id)) {
		$query = mysqli_query($con,"INSERT INTO message (id,kepada, pesan) VALUES(0,'".$kepada."','".$pesan."')");
		
		if ($query) {
			echo "Data berhasil di simpan";
			
		} else{ 
			echo "Error simpan Data";
			
		}
	}else{
		$query = mysqli_query($con,"UPDATE message set kepada = '".$kepada."', pesan = '".$pesan."' where id = '". $id ."'");
		
		if ($query) {
			echo "Data berhasil di ubah";
			
		} else{ 
			echo "Error ubah Data";
			
		}
		
	}
?>