<?php 
require 'function.php';

// Ambil data dari tabel data_mhs
if (isset($_POST["cari"])) {
    $keyword = $_POST["keyword"]; // Simpan keyword pencarian
    $mahasiswa = cari($keyword); // Menetapkan hasil pencarian ke $mahasiswa
} else {
    // Jika tidak ada pencarian, ambil semua data mahasiswa
    $mahasiswa = query("SELECT * FROM data_mhs ORDER BY id ASC");
}
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
    <a href="tambah.php">Tambah Data Mahasiswa</a>

    <br><br>

    <!-- Formulir pencarian -->
    <form action="" method="POST">
        <input type="text" name="keyword" size="35" autofocus placeholder="Masukkan pencarian" autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form>

    <br><br>

    <!-- Tabel untuk menampilkan data mahasiswa -->
    <table border="2" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Email</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $row) : ?>
            <tr>
                <td><?= $i ?></td>
                <td>
                    <a href="ubah.php?id=<?= $row['id']; ?>">ubah</a>
                    <a href="hapus.php?id=<?= $row['id']; ?>">hapus</a>
                </td>
                <td>
                    <img src="ASET/<?= $row['gambar'] ?>" width="50">
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
