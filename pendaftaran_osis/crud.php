<?php 
include('connection.php');

class crud extends koneksi{
		
	public function __construct(){
		parent::__construct();
	}

	public function tampil($table,$id,$id_value)
	{
		$query = "SELECT * FROM $table";
		if($id!=null)
		{
			$query .= " WHERE $id='".$id_value."'";
		}
		
		$hasil = $this->conn->query($query);

		if(!$hasil)
		{
			return "Terjadi Kesalahan dalam Query";
		}

		$rows = array();
		while($row = $hasil->fetch_assoc()) 
		{
			$rows[] = $row;
		}
		return $rows;
	}
public function simpan($table,$data)
	{
		$columns = implode(", ",array_keys($data));
		$escaped_values = array_map(array($this->conn, 'real_escape_string'), array_values($data));
		foreach ($escaped_values as $idx=>$data) $escaped_values[$idx] = "'".$data."'";
	    $values  = implode(", ", $escaped_values);
	    $query = "INSERT INTO $table ($columns) VALUES ($values)";

	    $hasil = $this->conn->query($query);
        if($hasil)
        {
        	return true;
        }
        else
        {
        	return false;
        }
	}
		public function update($table,$data,$id,$id_value)
	{
		
		$query = "UPDATE $table SET ";
        $query .= implode(',', $data);
        $query .= " WHERE $id='".$id_value."'";
        $hasil = $this->conn->query($query);
        if($hasil)
        {
        	return true;
        }
        else
        {
        	return false;
        }
	}

		public function delete($table,$id,$id_value)
	{
		$query = "DELETE FROM $table WHERE $id='".$id_value."'";
		$hasil = $this->conn->query($query);
		if($hasil)
        {
        	return true;
        }
        else
        {
        	return false;
        }
	}
}
?>