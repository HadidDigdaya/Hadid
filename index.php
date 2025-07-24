<?php
// Mengimpor file koneksi untuk menghubungkan ke database
include('koneksi.php');  // Menghubungkan ke file koneksi.php untuk akses database

// Query untuk mengambil semua data dari tabel 'artikel'
$query = "SELECT * FROM artikel";  // Menyiapkan query SQL untuk mengambil semua data artikel
$eksekusi = mysqli_query($koneksi, $query); // Menjalankan query ke database
$artikels = mysqli_fetch_all($eksekusi, MYSQLI_ASSOC); // Mengambil hasil query dalam bentuk array asosiatif

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Menentukan karakter encoding yang digunakan -->
    <meta charset="UTF-8"> <!-- Menentukan pengkodean karakter HTML -->
    <!-- Memastikan tampilan responsif pada semua perangkat -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Memastikan tampilan halaman responsif -->
    <!-- Judul halaman -->
    <title>PROJECT 3</title> <!-- Menentukan judul halaman web -->
    <style>
        /* Gaya umum untuk body */
        body {
            font-family: Arial, sans-serif; /* Menggunakan font Arial untuk teks */
            margin: 0; /* Menghapus margin default */
            background-image: url('foto/galaksi3.jpg'); /* Menambahkan gambar latar belakang */
            background-size: cover; /* Membuat gambar latar belakang memenuhi seluruh layar */
            background-attachment: fixed; /* Membuat latar belakang tetap saat halaman di-scroll */
            background-position: center; /* Menempatkan gambar latar belakang di tengah layar */
            display: flex; /* Menggunakan Flexbox untuk layout */
            flex-direction: column; /* Menyusun elemen secara vertikal */
            min-height: 100vh; /* Membuat tinggi halaman minimal setinggi viewport */
            color: white; /* Menetapkan warna teks menjadi putih */
        }

        /* Navbar */
        .container-navbar {
            background-color: rgba(82, 81, 99, 0.59);/* Memberikan warna latar belakang pada navbar */
            padding: 15px 20px; /* Menambahkan padding di dalam navbar */
            text-align: center; /* Menyusun teks di tengah navbar */
        }

        /* Gaya untuk teks pada navbar */
        .navbar h3 {
            margin: 0; /* Menghapus margin pada h3 */
            font-size: 24px; /* Mengatur ukuran font pada h3 */
            font-weight: bold; /* Menebalkan teks */
        }

        /* Tombol logout */
        .btn-logout {
            text-decoration: none; /* Menghapus garis bawah pada link */
            color: white; /* Menetapkan warna teks menjadi putih */
            padding: 8px 15px; /* Menambahkan padding pada tombol */
            background-color: rgb(248, 5, 5);; /* Menetapkan warna latar belakang tombol menjadi merah */
            border-radius: 5px; /* Membuat sudut tombol melengkung */
            font-size: 14px; /* Mengatur ukuran font pada tombol */
            transition: background-color 0.3s ease; /* Menambahkan efek transisi saat tombol di-hover */
            float: right; /* Menempatkan tombol logout di sebelah kanan */
            margin-top: -10px; /* Memberikan jarak negatif di atas tombol */
        }

        /* Efek hover pada tombol logout */
        .btn-logout:hover {
            background-color: rgb(15, 15, 15); /* Mengubah warna latar belakang tombol saat di-hover menjadi hitam */
        }

        .btn-login {
            text-decoration: none; /* Menghapus garis bawah pada link */
            color: white; /* Menetapkan warna teks menjadi putih */
            padding: 8px 15px; /* Menambahkan padding pada tombol */
            background-color: rgb(248, 5, 5);; /* Menetapkan warna latar belakang tombol menjadi merah */
            border-radius: 5px; /* Membuat sudut tombol melengkung */
            font-size: 14px; /* Mengatur ukuran font pada tombol */
            transition: background-color 0.3s ease; /* Menambahkan efek transisi saat tombol di-hover */
            float: right; /* Menempatkan tombol logout di sebelah kanan */
            margin-top: -10px; /* Memberikan jarak negatif di atas tombol */
        }

        .btn-login:hover {
            background-color: rgb(15, 15, 15); /* Mengubah warna latar belakang tombol saat di-hover menjadi hitam */
        }

        
        /* Tombol tambah artikel */
        .tambah {
            text-align: right; /* Menyusun tombol tambah artikel ke sebelah kanan */
            margin: 20px; /* Memberikan margin sekitar tombol */
        }

        /* Gaya untuk link tombol tambah */
        .tambah a {
            text-decoration: none; /* Menghapus garis bawah pada link */
            padding: 10px 20px; /* Memberikan padding pada tombol */
            background-color: rgb(248, 5, 5); /* Memberikan latar belakang tombol dengan warna abu-abu */
            color: white; /* Menetapkan warna teks tombol menjadi putih */
            border-radius: 5px; /* Membuat sudut tombol melengkung */
            font-size: 16px; /* Mengatur ukuran font pada tombol */
            transition: background-color 0.3s ease; /* Menambahkan efek transisi saat tombol di-hover */
        }

        /* Efek hover pada tombol tambah */
        .tambah a:hover {
            background-color: rgb(14, 14, 14); /* Mengubah warna latar belakang tombol saat di-hover menjadi lebih gelap */
        }

        /* Gaya untuk container artikel */
        .container {
            display: flex; /* Menggunakan Flexbox untuk layout container artikel */
            flex-wrap: wrap; /* Membungkus elemen dalam container ke baris baru jika perlu */
            gap: 20px; /* Menambahkan jarak antar kartu artikel */
            justify-content: center; /* Menyusun artikel di tengah */
            padding: 20px; /* Memberikan padding pada container */
            flex-grow: 1; /* Membuat container mengisi ruang yang tersedia */
        }

        /* Gaya untuk kartu artikel */
        .card {
            background-color: white; /* Memberikan warna latar belakang kartu artikel menjadi putih */
            border-radius: 10px; /* Membuat sudut kartu melengkung */
            box-shadow: 0 4px 8px rgba(8, 8, 8, 0.9); /* Memberikan bayangan pada kartu */
            width: 300px; /* Mengatur lebar kartu artikel */
            padding: 20px; /* Memberikan padding di dalam kartu */
            transition: transform 0.3s ease; /* Menambahkan efek transisi saat kartu di-hover */
            display: flex; /* Menggunakan Flexbox untuk layout di dalam kartu */
            flex-direction: column; /* Menyusun elemen di dalam kartu secara vertikal */
            justify-content: space-between; /* Memberikan jarak antar elemen di dalam kartu */
            color: black; /* Menetapkan warna teks kartu menjadi hitam */
        }

        /* Efek hover pada kartu */
        .card:hover {
            transform: translateY(-5px); /* Menggeser kartu sedikit ke atas saat di-hover */
        }

        /* Gaya untuk judul artikel */
        .content h2 {
            font-size: 20px; /* Mengatur ukuran font judul artikel */
            color: rgb(31, 31, 30); /* Menetapkan warna teks judul artikel */
            margin-bottom: 10px; /* Memberikan jarak bawah pada judul artikel */
        }

        /* Gaya untuk paragraf di dalam kartu */
        .content p {
            font-size: 16px; /* Mengatur ukuran font paragraf */
            line-height: 1.5; /* Menambah jarak antar baris dalam paragraf */
            margin: 5px 0; /* Memberikan margin vertikal pada paragraf */
        }

        /* Gaya untuk tombol aksi (edit dan delete) */
        .aksi a {
            text-decoration: none; /* Menghapus garis bawah pada link */
            padding: 8px 15px; /* Menambahkan padding pada tombol aksi */
            font-size: 14px; /* Mengatur ukuran font tombol aksi */
            border-radius: 5px; /* Membuat sudut tombol aksi melengkung */
            transition: background-color 0.3s ease; /* Menambahkan efek transisi pada tombol aksi */
            color: white; /* Menetapkan warna teks tombol aksi menjadi putih */
            text-align: center; /* Menyusun teks tombol aksi di tengah */
        }

        /* Gaya tombol edit */
        .aksi a:first-child {
            background-color: rgb(8, 32, 248); /* Menetapkan warna latar tombol edit menjadi biru */
        }

        /* Efek hover pada tombol edit */
        .aksi a:first-child:hover {
            background-color: rgb(3, 39, 78); /* Mengubah warna latar belakang tombol edit saat di-hover menjadi biru lebih gelap */
        }

        /* Gaya tombol delete */
        .aksi a:last-child {
            background-color: rgb(255, 0, 25); /* Menetapkan warna latar tombol delete menjadi merah */
        }

        /* Efek hover pada tombol delete */
        .aksi a:last-child:hover {
            background-color: rgb(119, 5, 15); /* Mengubah warna latar belakang tombol delete saat di-hover menjadi merah lebih gelap */
        }

        /* Gaya untuk footer */
        footer {
            text-align: center; /* Menyusun teks di tengah footer */
            padding: 10px 0; /* Memberikan padding atas dan bawah pada footer */
            background-color: rgba(82, 81, 99, 0.59); /* Menetapkan warna latar footer */
            color: white; /* Menetapkan warna teks footer menjadi putih */
            font-size: 14px; /* Mengatur ukuran font footer */
            margin-top: 20px; /* Memberikan jarak atas pada footer */
        }

        /* Responsivitas untuk perangkat dengan lebar maksimal 768px */
        @media (max-width: 768px) {
            .container {
                flex-direction: column; /* Mengubah susunan artikel menjadi kolom pada layar lebih kecil */
                align-items: center; /* Menyusun artikel agar rata tengah */
            }

            .card {
                width: 90%; /* Membuat kartu artikel mengambil 90% lebar layar */
            }

            .btn-logout {
                float: none; /* Menghapus posisi tombol logout */
                display: block; /* Menampilkan tombol logout dalam blok */
                margin: 10px auto; /* Memberikan margin otomatis agar tombol berada di tengah */
            }
            .btn-login {
                float: none; /* Menghapus posisi tombol logout */
                display: block; /* Menampilkan tombol logout dalam blok */
                margin: 10px auto; /* Memberikan margin otomatis agar tombol berada di tengah */
            }
        }

        /* Responsivitas untuk perangkat dengan lebar maksimal 480px */
        @media (max-width: 480px) {
            .navbar h3 {
                font-size: 20px; /* Mengatur ukuran font pada navbar menjadi lebih kecil */
            }

            .tambah a {
                font-size: 14px; /* Mengubah ukuran font tombol tambah artikel */
                padding: 8px 15px; /* Mengubah padding tombol tambah artikel */
            }

            .content h2 {
                font-size: 18px; /* Mengubah ukuran font judul artikel */
            }

            .content p {
                font-size: 14px; /* Mengubah ukuran font paragraf */
            }

            .aksi a {
                font-size: 12px; /* Mengubah ukuran font tombol aksi */
                padding: 5px 10px; /* Mengubah ukuran padding tombol aksi */
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="container-navbar">
        <div class="navbar">
       
        <?php
       if(isset($_SESSION['id'])){ 
        echo '<a href="logout.php" class="btn btn-logout">Log Out</a>';
        }
        else {
            echo '<a href="login.php" class="btn btn-login">Login</a>';
        }
         ?>
            <h3>Galaxy Pedia</h3>
        </div>
    </div>

    


    <!-- Tombol Tambah Artikel -->
    <div class="tambah">
    <?php
        if(isset($_SESSION['id'])){ 
        echo'<a href="tambah.php" class="btn btn-primary">Tambah Artikel</a> <br>';
        }
    ?>
    </div>


    <!-- Container Artikel -->
    <div class="container">
        <?php foreach ($artikels as $artikel):

             ?>
            <div class="card">
                <div class="content">
                    <h2 class="judul"><?= htmlspecialchars($artikel['judul']); ?></h2>
                    <hr>
                    <div class="info">
                        <p class="deskripsi"><b>Deskripsi:</b> <?= htmlspecialchars($artikel['deskripsi']); ?> <a href="detail.php?id=<?= $artikel['id']; ?>">baca selengkapnya</a></p>
                        <p class="penulis"><b>Penulis:</b> <?= htmlspecialchars($artikel['penulis']); ?></p>
                        <p class="tgl"><b>Tanggal:</b> <?= htmlspecialchars($artikel['tgl_buat']); ?></p>
                    </div>
                    <div class="aksi">

                    <?php
                    if(isset($_SESSION['id']) AND $artikel['user_id'] == $_SESSION['id']){
                    ?>
                       <a href='edit.php?id=<?=$artikel["id"]?>' class='btn btn-primary'>Edit</a>
                   <?php
                   }
                   ?>

                    <?php
                    if(isset($_SESSION['id']) AND $_SESSION['role'] == 'admin'){
                    ?>
                       <a href='delete.php?id=<?=$artikel["id"]?>' class='btn btn-danger'>Delete</a>
                    <?php
                    }
                   ?> 

                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
</body>
<!-- Footer -->
<footer>
    <p>©2024 Himurwata Hadid Digdaya. All rights reserved. Unauthorized copying or reproduction is prohibited.</p>
</footer>
</html>


