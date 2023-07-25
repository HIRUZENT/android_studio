<?php
        include('crud.php');
        $crud = new Crud;

?>
<style>
    #edit{
        background-color: #0a53be;
        border-radius: 2px;
        padding: 2px;
        padding-top: 2px;
        padding-right: 10px;
        padding-left: 10px;
        font-size: 12px;
        text-decoration: none;
        color: white;
    }
    #hapus{
        background-color: #ED2B2A;
        border-radius: 2px;
        padding: 2px;
        padding-bottom: 3px;
        padding-left: 7px;
        padding-right: 7px;
        font-size: 11px;
        text-decoration: none;
        color: white;
    }
</style>
<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Osis</title>
</head>
<body>
    <?php
if(isset($_GET['id'])) 
    {
        $id = $_GET['id'];
        $update = $crud->tampil('data_siswa','id',$id);
        foreach ($update as $upd) {
            $id = $upd['id'];
            $nama = $upd['nama'];
            $kelas = $upd['kelas'];
            $alamat = $upd['alamat'];
            $no_telp = $upd['no_telp'];
            $action = 'update';
        }
    }
    else
    {
        $id = '';
        $nama = '';
        $kelas = '';
        $alamat = '';
        $no_telp = '';
        $action = 'simpan';
    }
?>
<form action="simpan.php" method="post">
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>This is Osis 1 Depok</title>
  </head>
    <div class="container my-3">
      <h1><center>Form Pendaftaran Anggota Baru</center></h1>
    </div>

    <div class="container my-5">
      <div class="mb-3">
        <input type="hidden" class="form-control" placeholder="Enter your name" value="<?php echo $id; ?>" name="id" id="id" aria-describedby="name">
      </div>

      <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control" placeholder="Enter your name" value="<?php echo $nama; ?>" name="nama" id="nama" aria-describedby="name">
      </div>

      <div class="mb-3">
        <label for="class" class="form-label">Kelas</label>
        <input type="text"class="form-control" placeholder="Enter your class" value="<?php echo $kelas; ?>" name="kelas" id="kelas" aria-describedby="class">
      </div>

      <div class="mb-3">
        <label for="address" class="form-label">Alamat</label>
        <input type="text" class="form-control" placeholder="Enter your address" value="<?php echo $alamat; ?>" name="alamat" id="alamat" aria-describedby="address">
      </div>

      <div class="mb-3">
        <label for="phone" class="form-label">No.Telp</label>
        <input type="number" class="form-control" placeholder="Enter your phone number" value="<?php echo $no_telp; ?>"name="no_telp" id="no_telp" aria-describedby="phone">
      </div>
            <input type="submit" id="submit" name="submit" class="btn btn-primary" value="submit">
            <input type="hidden" name="action" value="<?php echo $action; ?>">
</form>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="data" style="margin-top: 15px;">
    <table class="table table-striped" border="2">
  <thead>
    <tr>
      <th scope="col">No. Pendaftar</th>
      <th scope="col">Nama</th>
      <th scope="col">Kelas</th>
      <th scope="col">Alamat</th>
      <th scope="col">No Telp</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
    <?php
        
        $data_siswa = $crud->tampil('data_siswa',null,null);
        if (!$data_siswa == 0) {

            foreach ($data_siswa as $d_siswa) {
        ?>
            <tr>
                <td><?php echo $d_siswa['id']; ?>.</td>
                <td><?php echo $d_siswa['nama']; ?></td>
                <td><?php echo $d_siswa['kelas']; ?></td>
                <td><?php echo $d_siswa['alamat']; ?></td>
                <td><?php echo $d_siswa['no_telp']; ?></td>
                <td>
                    <a id="edit" href="index.php?id=<?php echo $d_siswa['id']; ?>">Edit</a> | 
                    <a id="hapus" href="delete.php?id=<?php echo $d_siswa['id']; ?>">Hapus</a>
                </td>
            </tr>
        <?php }} else {?>
            <tr><td colspan="8" style="text-align: center;">DATA KOSONG</td></tr>
        <?php } ?>
</table>
</tbody>
</div>
</body>
</html>
</html>