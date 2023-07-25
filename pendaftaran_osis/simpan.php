<?php
include('crud.php');

$crud = new Crud();
if($_POST['action'] == 'simpan') {
	$arrData = array('id'=>$_POST['id'],
					'nama'=>$_POST['nama'],
					'kelas'=>$_POST['kelas'],
					'alamat'=>$_POST['alamat'], 'no_telp'=>$_POST['no_telp']);

	$hasil = $crud->simpan('data_siswa',$arrData); } 

	else { 
$arrData = array ("id='".$_POST['id']."'","nama='".$_POST['nama']."'", "kelas='".$_POST
	['kelas']."'", "alamat='".$_POST['alamat']."'", "no_telp='".$_POST
	['no_telp']."'"); 
$idvalue = $_POST['id']; 
$hasil = $crud->update('data_siswa',$arrData,'id',$idvalue); }

if($hasil)
{
	header('Location: index.php');
}
else
{
	echo "Gagal Simpan";
}
?>