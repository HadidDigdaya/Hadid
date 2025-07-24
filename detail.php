<?php
include ('koneksi.php'); // Menyertakan file koneksi.php untuk menghubungkan ke database.

$id = $_GET['id']; // Mengambil nilai 'id' yang dikirim melalui URL dengan metode GET.
$query = "SELECT * FROM artikel WHERE id = $id"; // Menyusun query SQL untuk memilih data artikel berdasarkan id yang diterima.
$result = mysqli_query($koneksi, $query); // Menjalankan query yang telah disusun di database dan menyimpan hasilnya.
$artikels = mysqli_fetch_all($result, MYSQLI_ASSOC); // Mengambil semua hasil query dan menyimpannya dalam bentuk array asosiatif.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Menentukan encoding karakter untuk halaman HTML. -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Mengatur agar halaman responsive pada perangkat mobile. -->
    <title>Detail Artikel</title> <!-- Judul halaman yang akan muncul di tab browser. -->
    <style>
        body {
            font-family: 'Arial', sans-serif; /* Menentukan font untuk seluruh halaman. */
            margin: 0; /* Menghapus margin default pada body. */
            padding: 0; /* Menghapus padding default pada body. */
            background-image: url('foto/galaksi3.jpg'); /* Menambahkan gambar latar belakang untuk halaman. */
            background-size: cover; /* Menyesuaikan gambar latar belakang agar memenuhi layar. */
            background-attachment: fixed; /* Memastikan gambar latar belakang tetap di tempat saat scrolling. */
            color: white; /* Menentukan warna teks menjadi putih. */
            display: flex; /* Menggunakan Flexbox untuk tata letak halaman. */
            justify-content: center; /* Menyusun konten secara horizontal di tengah. */
            align-items: center; /* Menyusun konten secara vertikal di tengah. */
            min-height: 100vh; /* Memastikan tinggi halaman minimal 100% dari tinggi layar. */
        }

        .container {
            background: rgba(0, 0, 0, 0.8); /* Membuat latar belakang semi-transparan di dalam kontainer. */
            border-radius: 15px; /* Membuat sudut-sudut kontainer menjadi melengkung. */
            padding: 20px; /* Memberi jarak di dalam kontainer. */
            max-width: 800px; /* Menentukan lebar maksimal kontainer. */
            width: 90%; /* Mengatur lebar kontainer menjadi 90% dari lebar layar. */
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.3); /* Memberikan efek bayangan pada kontainer. */
            text-align: center; /* Mengatur agar semua teks di dalam kontainer terpusat. */
        }

        h2 {
            font-size: 28px; /* Mengatur ukuran font untuk judul artikel. */
            margin-bottom: 15px; /* Memberikan jarak bawah pada judul artikel. */
            color: rgb(9, 245, 245); /* Mengatur warna teks judul menjadi biru kehijauan. */
        }

        p {
            font-size: 18px; /* Mengatur ukuran font untuk paragraf. */
            line-height: 1.6; /* Menambahkan jarak antar baris teks. */
            margin: 10px 0; /* Memberikan jarak atas dan bawah pada setiap paragraf. */
        }

        .penulis, .tanggal {
            font-weight: bold; /* Menebalkan teks untuk penulis dan tanggal. */
            color: rgb(8, 160, 248); /* Mengatur warna teks penulis dan tanggal menjadi biru. */
        }

        a {
            display: inline-block; /* Mengubah elemen anchor menjadi block-level supaya dapat diberi padding dan margin. */
            text-decoration: none; /* Menghilangkan garis bawah pada tautan. */
            color: rgb(239, 247, 248); /* Mengatur warna teks tautan menjadi putih kebiruan. */
            font-weight: bold; /* Menebalkan teks tautan. */
            margin-top: 20px; /* Memberikan jarak atas pada tautan. */
            padding: 10px 20px; /* Memberikan padding di sekitar teks tautan. */
            border: 2px solid #00e5ff; /* Memberikan garis tepi berwarna biru cerah pada tautan. */
            border-radius: 5px; /* Membuat sudut-sudut border pada tautan menjadi melengkung. */
            transition: all 0.3s ease; /* Menambahkan efek transisi ketika tautan di-hover. */
        }

        @media (max-width: 768px) {
            h2 {
                font-size: 24px; /* Mengatur ukuran font judul pada layar yang lebih kecil. */
            }

            p {
                font-size: 16px; /* Mengatur ukuran font paragraf pada layar yang lebih kecil. */
            }

            a {
                padding: 8px 15px; /* Mengatur padding tautan pada layar yang lebih kecil. */
                font-size: 14px; /* Mengatur ukuran font tautan pada layar yang lebih kecil. */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <?php foreach ($artikels as $artikel) { ?> <!-- Mengulang data artikel yang didapatkan dan menampilkannya satu per satu. -->
            <h2><?= htmlspecialchars($artikel['judul']) ?></h2> <!-- Menampilkan judul artikel dengan mengamankan output menggunakan htmlspecialchars. -->
            <p><?= htmlspecialchars($artikel['deskripsi']) ?></p> <!-- Menampilkan deskripsi artikel dengan mengamankan output menggunakan htmlspecialchars. -->
            <p><span class="penulis">Penulis:</span> <?= htmlspecialchars($artikel['penulis']) ?></p> <!-- Menampilkan nama penulis artikel dengan mengamankan output. -->
            <p><span class="tanggal">Tanggal:</span> <?= htmlspecialchars($artikel['tgl_buat']) ?></p> <!-- Menampilkan tanggal artikel dengan mengamankan output. -->
        <?php } ?>
        <a href="index.php">Kembali</a> <!-- Tautan untuk kembali ke halaman utama (index.php). -->
    </div>
</body>
</html>
