<?php
// Koneksi ke Database
$conn = mysqli_connect("localhost", "root", "", "perusahaan");

function query($query): array
{
    global $conn; // Mengakses variabel global
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_array($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;
    $nik = mysqli_real_escape_string($conn, $data["nik"]);
    $nama = mysqli_real_escape_string($conn, $data["nama"]);
    $email = mysqli_real_escape_string($conn, $data["email"]);
    $departemen = mysqli_real_escape_string($conn, $data["departemen"]);

    $query = "INSERT INTO karyawan (nik, nama, email, departemen)
            VALUES ('$nik', '$nama', '$email', '$departemen')";

}

function hapus($id) {
    global $conn;
    mysqli_query($conn,"DELETE FROM karyawan WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function ubah($data): int|string {
    global $conn;
    $id = $data["id"];
    $nik = $data["nik"];
    $nama = $data["nama"];
    $email = $data["email"];
    $departemen = $data["departemen"];

    $query = "UPDATE karyawan SET
                nik = '$nik', 
                nama = '$nama',
                email = '$email',
                departemen = '$departemen'
                WHERE id = $id
            ";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);

}

function cari($keyword) {
    $query = "SELECT * FROM karyawan
                WHERE
            nama LIKE '%$keyword%' OR
            nik LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            departemen LIKE '%$keyword%'
            ";
    return query($query);
}

function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = $data["password"];
    $password2 = $data["password2"];

    // Cek apakah password dan konfirmasi password cocok
    if($password != $password2) {
        echo "<script>
            alert('Konfirmasi Password Tidak Sesuai');
        </script>";
        return false;
    }

    // Enkripsi Password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Cek apakah username sudah ada
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('Username sudah terdaftar!');
        </script>";
        return false;
    }

    // Query untuk insert data ke tabel user
    $query = "INSERT INTO user (username, password) VALUES (?, ?)";
    
    // Prepared statement untuk menghindari SQL injection
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);

    // Eksekusi query dan cek hasilnya
    if (mysqli_stmt_execute($stmt)) {
        return mysqli_affected_rows($conn);
    } else {
        return false;
    }
}

?>