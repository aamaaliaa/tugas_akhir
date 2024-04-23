<?php 
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "mahasiswa");

// Fungsi untuk menjalankan query dan mengambil hasilnya dalam bentuk array
function query($query){
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Fungsi untuk menambahkan data mahasiswa ke database
function tambah($data){
    global $koneksi;
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);

    // Query insert ke database 
    $query = "INSERT INTO data_mhs VALUES(NULL, '$nama', '$nim', '$email', '$jurusan', '$gambar')";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
} 

// Fungsi untuk menghapus data mahasiswa dari database
function hapus($id)
{
    global $koneksi;
    // Periksa apakah $id tidak kosong
    if($id !== null) {
        mysqli_query($koneksi, "DELETE FROM data_mhs WHERE id = $id");
        return mysqli_affected_rows($koneksi);
    } else {
        // Jika $id kosong, kembalikan 0
        return 0;
    }
}

// Fungsi untuk mengubah data mahasiswa di database
function ubah($data) {
    global $koneksi;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);

    // Query update ke database 
    $query = "UPDATE data_mhs SET
                nama = '$nama', 
                nim='$nim',
                email = '$email', 
                jurusan = '$jurusan',
                gambar = '$gambar'
               WHERE id = $id ";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

// Fungsi untuk melakukan pencarian data mahasiswa berdasarkan keyword
function cari($keyword){
    $query = "SELECT * FROM data_mhs
                WHERE 
                nama LIKE '%$keyword%' OR 
                nim LIKE '%$keyword%' OR
                email LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%'";
    return query($query);            
}

 