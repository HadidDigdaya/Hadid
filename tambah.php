<?php
include('koneksi.php'); // Menyertakan file koneksi.php untuk menghubungkan ke database.

        
         if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
        $judul = $_POST['judul']; // Mengambil data dari input 'judul' yang dimasukkan pengguna.
        $deskripsi = $_POST['deskripsi']; // Mengambil data dari input 'deskripsi' yang dimasukkan pengguna.
        $penulis = $_POST['penulis']; // Mengambil data dari input 'penulis' yang dimasukkan pengguna.

        // Membuat query SQL untuk memasukkan artikel ke dalam tabel 'artikel'.
        $query = "INSERT INTO artikel (judul, deskripsi, tgl_buat, penulis, user_id) 
                VALUES ('$judul', '$deskripsi', now(), '$penulis', '$_SESSION[id]' )"; 
       
        if (mysqli_query($koneksi, $query)) { 
            echo "<script>alert('Berhasil Menambahkan');
            window.location.replace('index.php');
            </script>"; // Menampilkan pesan sukses dan mengarahkan kembali ke halaman index.php.
        } else {
            echo "Error: " . mysqli_error($koneksi); // Menampilkan pesan error jika query gagal dijalankan.
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Menentukan encoding karakter untuk halaman HTML. -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Menyusun halaman agar responsif pada perangkat mobile. -->
    <title>Tambah Artikel</title> <!-- Judul halaman yang muncul di tab browser. -->
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/44.0.0/ckeditor5.css" /> <!-- Menyertakan link CKEditor untuk editor teks. -->

    <style>
        body {
            background-image: url('foto/galaksi.jpg'); /* Menambahkan gambar latar belakang dengan URL yang diberikan. */
            background-size: cover; /* Membuat gambar latar belakang menutupi seluruh halaman. */
            background-position: center; /* Menempatkan gambar latar belakang di tengah layar. */
            background-attachment: fixed; /* Menjaga gambar latar belakang tetap saat halaman di-scroll. */
            color: white; /* Mengatur warna teks menjadi putih. */
            display: flex; /* Menggunakan Flexbox untuk menyusun elemen halaman. */
            flex-direction: column; /* Menyusun elemen secara vertikal. */
            align-items: center; /* Menempatkan elemen di tengah halaman. */
            margin-top: 2rem; /* Memberikan jarak atas dari elemen lainnya. */
            height: 100vh; /* Mengatur tinggi halaman agar mengisi seluruh viewport. */
            overflow: hidden; /* Menyembunyikan elemen yang melampaui batas layar. */
        }

        h3 {
            font-size: 2.5rem; /* Ukuran font judul menjadi 2.5rem. */
            font-weight: bold; /* Membuat font judul tebal. */
            color: white; /* Mengatur warna teks judul menjadi putih. */
            margin-top: 20px; /* Memberikan jarak atas pada judul. */
        }

        .container-tambah {
            background-color: rgba(255, 255, 255, 0.8); /* Memberikan latar belakang semi transparan. */
            padding: 4rem; /* Memberikan jarak di dalam container. */
            margin: 2rem; /* Memberikan jarak di luar container. */
            border-radius: 10px; /* Membuat sudut container melengkung. */
            width: 80%; /* Lebar container 80% dari layar. */
            max-width: 600px; /* Lebar maksimal container adalah 600px. */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Memberikan bayangan pada container untuk efek kedalaman. */
        }

        .container-tambah .card {
            display: flex; /* Menggunakan Flexbox untuk penyusunan elemen di dalam container. */
            flex-direction: column; /* Menyusun elemen secara vertikal. */
            gap: 15px; /* Memberikan jarak antar elemen. */
        }

        .container-tambah label {
            font-weight: bold; /* Memberikan teks label dengan font tebal. */
            margin-bottom: 5px; /* Memberikan jarak bawah pada label. */
        }

        .container-tambah input[type="text"], .container-tambah textarea {
            padding: 10px; /* Memberikan padding pada input dan textarea. */
            border: 1px solid #ccc; /* Memberikan border abu-abu pada input dan textarea. */
            border-radius: 5px; /* Membuat sudut input dan textarea melengkung. */
            width: 100%; /* Lebar input dan textarea 100% dari lebar container. */
            font-size: 1rem; /* Ukuran font pada input dan textarea. */
        }

        .tombol-tambah button {
            padding: 10px 20px; /* Memberikan padding pada tombol. */
            background-color: #007bff; /* Memberikan warna latar belakang biru pada tombol. */
            color: white; /* Warna teks tombol menjadi putih. */
            border: none; /* Menghapus border tombol. */
            border-radius: 5px; /* Membuat sudut tombol melengkung. */
            cursor: pointer; /* Menampilkan pointer saat tombol di-hover. */
            margin-top: 10px; /* Memberikan jarak atas pada tombol. */
            font-size: 1.1rem; /* Ukuran font tombol menjadi 1.1rem. */
        }

        .tombol-tambah button:hover {
            background-color: #0056b3; /* Mengubah warna latar tombol saat di-hover menjadi biru lebih gelap. */
        }

        .tombol-tambah button:active {
            background-color: #004085; /* Mengubah warna tombol saat ditekan menjadi biru lebih gelap. */
        }

        .tombol-tambah button a {
            color: white; /* Mengatur warna link dalam tombol menjadi putih. */
            text-decoration: none; /* Menghapus garis bawah pada link. */
        }

        @media screen and (max-width: 768px) {
            .container-tambah {
                width: 90%; /* Mengatur lebar container menjadi 90% pada perangkat dengan lebar kurang dari 768px. */
                padding: 3rem; /* Mengurangi padding container pada layar kecil. */
            }

            h3 {
                font-size: 2rem; /* Mengurangi ukuran font judul pada layar kecil. */
            }
        }

        label {
            font-size: 24px; /* Ukuran font label menjadi 24px. */
            color: black; /* Warna teks label menjadi hitam. */
        }

        textarea {
            min-height: 80px; /* Menentukan tinggi minimal textarea 80px. */
            min-width: 50px; /* Menentukan lebar minimal textarea 50px. */
        }
    </style>
</head>
<body>

    <h3>Tambah Artikel</h3> <!-- Judul halaman untuk form tambah artikel. -->

    <div class="container-tambah"> <!-- Container untuk form tambah artikel. -->
        <form action="" method="POST"> <!-- Form untuk mengirim data artikel menggunakan metode POST. -->
            <div class="card">
                <div class="judul"> <!-- Input untuk judul artikel. -->
                    <label for="judul">Judul</label><br> <!-- Label untuk input judul artikel. -->
                    <input type="text" name="judul" id="judul" required> <!-- Input untuk memasukkan judul artikel. -->
                </div>
                <div class="deskripai"> <!-- Input untuk deskripsi artikel. -->
                    <label for="deskripsi">Deskripsi</label><br> <!-- Label untuk input deskripsi. -->
                    <textarea name="deskripsi" id="deskripsi" required></textarea> <!-- Textarea untuk memasukkan deskripsi artikel. -->
                </div>
                <div class="penulis"> <!-- Input untuk nama penulis artikel. -->
                    <label for="penulis">Penulis</label><br> <!-- Label untuk input penulis. -->
                    <input type="text" name="penulis" id="penulis" required> <!-- Input untuk memasukkan nama penulis. -->
                </div>
                <div class="tombol-tambah"> <!-- Div untuk tombol-tombol aksi. -->
                    <button><a href="index.php">Kembali</a></button> <!-- Tombol untuk kembali ke halaman index.php. -->
                    <button type="submit" name="simpan">Tambah</button> <!-- Tombol untuk mengirimkan data artikel. -->
                </div>
            </div>
        </form>
    </div>
</body>
</html>
