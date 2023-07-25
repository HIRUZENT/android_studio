<?php

class koneksi
{
	private $host = 'localhost';
	private $user = 'root';
	private $pass = '';
	private $db   = 'osis';

	protected $conn;
	
	function __construct()
	{
		if(!isset($this->conn)) 
		{
			$this->conn = new mysqli($this->host,$this->user,$this->pass,$this->db);
		}

		if(!$this->conn)
		{
			echo 'Koneksi Gagal';
		}
		return $this->conn;
	}
	
}


?>