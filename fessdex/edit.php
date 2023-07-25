<?php
	include 'connection.php';
	
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	class emp{}
	
	if (empty($id)) { 
		echo "Error Mengambil Data id kosong"; 
		
	} else {
		$query 	= mysqli_query($con,"SELECT * FROM message WHERE id='".$id."'");
		$row 	= mysqli_fetch_array($query);
		
		if (!empty($row)) {
			$response = new emp();
			$response->id = $row["id"];
			$response->kepada = $row["kepada"];
			$response->pesan = $row["pesan"];
			echo(json_encode($response));
			
		} else{ 
			
			echo("Error Mengambil Data"); 
		}	
	}
?>