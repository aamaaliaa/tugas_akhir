<?php 
require 'function.php';
//ambil data dari tabel dat_mhs /query data matahasiswa
$mahasiswa = query("SELECT * FROM data_mhs");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <a href="tambah.php ">Tambah Data Mahasiswa</a>
    <br></br>
    
    <table  border="2" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Email</th>
        </tr>

        <?php $i =1;?>
        <?php foreach ($mahasiswa as $row)  : ?>
        <tr>
        <td><?= $i ?></td>
        <td>
            <a href="">ubah</a>
            <a href="">hapus</a>
        </td>
        <td>
            <img src="ASET/<?= $row[ 'gambar'] ?>" width="50">
        </td>
        <td><?= $row['nim'] ?></td>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['jurusan'] ?></td>
        <td><?= $row['email'] ?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>

    </table>
</body>
</html>