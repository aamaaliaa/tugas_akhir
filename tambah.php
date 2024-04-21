<?php 
//koneksi dbms
$koneksi = mysqli_connect("localhost","root","", "mahasiswa");

//apakah tombol submit sudah ditekan apa belum
if(isset($_POST["submit"])) {
    //ambil data masing-masing form
    $nama = $_POST["nama"];
    $nim = $_POST["nim"];
    $email = $_POST["email"];
    $jurusan = $_POST["jurusan"];
    $gambar = $_POST["gambar"];

    //query insert ke database 
    $query = "INSERT INTO data_mhs VALUES(NULL, '$nama', '$nim', '$email', '$jurusan', '$gambar')";
    mysqli_query($koneksi, $query);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tambah Data Mahasiswa</title>
</head>
<body>
    <h1>Tambah Data Kendaraaan</h1>
    <form action="" method="POST">
        <ul>
            <li>
                <label for="nim"> NIM : </label>
                <input type="text" name="nim" id="nim">
            </li>
            <li>
                <label for="nama"> Nama : </label>
                <input type="text" name="nama" id="nama">
            </li>
            <li>
                <label for="email"> Email : </label>
                <input type="text" name="email" id="email">
            </li>
            <li>
                <label for="jurusan"> Jurusan : </label>
                <input type="text" name="jurusan" id="jurusan">
            </li>
            <li>
                <label for="gambar"> Gambar : </label>
                <input type="text" name="gambar" id="gambar">
            </li>
            <button type="submit" name="submit">Kirim</button>
        </ul>
    </form>
</body>
</html>
