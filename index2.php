<?php 
//koneksi ke data 
$koneksi = mysqli_connect("localhost", "root", "", "mahasiswa");

//ambil data dari tabel dat_mhs /query data matahasiswa
$result = mysqli_query($koneksi,"SELECT * FROM data_mhs");
/* var_dump($result);

//ambil data (fetch) dari object result
//mysqli_fetch_row();
//mysqli_fecth_assoc();
//mysqli_fetch_array();
//mysqli_fetch_object();
*/


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
    <table  border="1" cellpadding="10" cellspacing="0">
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
        <?php while($row = mysqli_fetch_assoc($result))  : ?>
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
        <?php endwhile; ?>

    </table>
</body>
</html>