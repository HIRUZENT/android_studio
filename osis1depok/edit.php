<?php
	include "connection.php";
	
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	class emp{};

	if (empty($id)) { 
		echo "Error Mengambil Data id kosong"; 
		
	} else {
		$query 	= mysqli_query($con,"SELECT * FROM daftar WHERE id='".$id."'");
		$row 	= mysqli_fetch_array($query);
		
		if (!empty($row)) {
			$response = new emp();
			$response->id = $row["id"];
			$response->kelas = $row["kelas"];
			$response->nama = $row["nama"];
			$response->asal_smp = $row["asal_smp"];
			$response->jenis_kelamin = $row["jenis_kelamin"];
			$response->alasan = $row["alasan"];
			
			echo(json_encode($response));
		} else{ 
			
			echo("Error Mengambil Data"); 
		}	
	}
?>