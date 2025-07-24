<?php
// Memulai session untuk menyimpan data yang digunakan antar halaman
session_start();

// Menyimpan informasi koneksi database
$hostname = 'localhost';  // Nama host atau server database, biasanya 'localhost' untuk server lokal
$username = 'root';  // Nama pengguna untuk login ke database (default untuk XAMPP adalah 'root')
$password = '';  // Kata sandi untuk login ke database, kosongkan jika tidak ada
$database = 'project_3';  // Nama database yang digunakan, dalam hal ini 'project_3'

// Mencoba untuk membuat koneksi ke database MySQL menggunakan mysqli_connect
$koneksi = mysqli_connect($hostname, $username, $password, $database);

// Mengecek apakah koneksi berhasil atau tidak
if(!$koneksi) {
    // Jika koneksi gagal, menampilkan pesan error
    echo "Database tidak terhubung";  // Pesan error jika koneksi ke database gagal
}
