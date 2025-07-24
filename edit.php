<?php
include('koneksi.php'); // Menyertakan file koneksi.php untuk menghubungkan ke database.
$id = $_GET['id']; // Mengambil nilai 'id' dari URL untuk mencari artikel yang ingin diedit.
$query = "SELECT * FROM artikel WHERE id = $id"; // Menyiapkan query untuk mengambil data artikel berdasarkan 'id'.
$eksekusi = mysqli_query($koneksi, $query); // Menjalankan query untuk mendapatkan artikel.
$artikel = mysqli_fetch_assoc($eksekusi); // Mengambil data artikel yang diambil dalam bentuk array asosiatif.

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Mengecek apakah form disubmit dengan metode POST.
    $judul = $_POST['judul']; // Mengambil data dari input 'judul' yang dimasukkan pengguna.
    $deskripsi = $_POST['deskripsi']; // Mengambil data dari input 'deskripsi' yang dimasukkan pengguna.
    $penulis = $_POST['penulis']; // Mengambil data dari input 'penulis' yang dimasukkan pengguna.

    // Membuat query SQL untuk mengupdate artikel berdasarkan 'id' yang diambil dari URL.
    $sql = "UPDATE artikel SET
                judul = '$judul',
                deskripsi = '$deskripsi',
                penulis = '$penulis',
                tgl_buat = now()
            WHERE id = $id";
    $eksekusi = mysqli_query($koneksi, $sql); // Menjalankan query untuk mengupdate artikel.

    if ($eksekusi) { // Mengecek apakah query berhasil dijalankan.
        echo "<script>alert('Berhasil Mengedit');
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Membuat halaman responsif pada perangkat mobile. -->
    <title>Edit Artikel</title> <!-- Judul halaman untuk halaman edit artikel. -->
    <style>
        body {
            font-family: Arial, sans-serif; /* Mengatur font halaman menggunakan font Arial. */
            background-image: url('foto/galaksi1.jpg'); /* Menambahkan gambar latar belakang dengan URL yang diberikan. */
            background-size: cover; /* Membuat gambar latar belakang menutupi seluruh halaman. */
            background-position: center; /* Menempatkan gambar latar belakang di tengah layar. */
            display: flex; /* Menggunakan Flexbox untuk menyusun elemen halaman. */
            justify-content: center; /* Menempatkan elemen di tengah secara horizontal. */
            align-items: center; /* Menempatkan elemen di tengah secara vertikal. */
            height: 100vh; /* Mengatur tinggi halaman agar mengisi seluruh viewport. */
            margin: 0; /* Menghilangkan margin default halaman. */
        }

        .container {
            background-color: rgb(245, 236, 236); /* Memberikan warna latar belakang pada container. */
            border-radius: 8px; /* Membuat sudut container melengkung. */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Memberikan bayangan pada container. */
            padding: 30px; /* Memberikan padding di dalam container. */
            width: 400px; /* Lebar container 400px. */
            text-align: center; /* Menyusun teks di dalam container agar rata tengah. */
        }

        h3 {
            color: #2c3e50; /* Mengatur warna teks judul menjadi warna biru gelap. */
            margin-bottom: 20px; /* Memberikan jarak bawah pada judul. */
        }

        .form-group {
            margin-bottom: 15px; /* Memberikan jarak bawah pada tiap form group. */
            text-align: left; /* Menyusun teks form group ke kiri. */
        }

        label {
            font-size: 16px; /* Ukuran font untuk label menjadi 16px. */
            color: #333; /* Warna teks label menjadi abu-abu gelap. */
        }

        input[type="text"] {
            width: 100%; /* Lebar input text 100% dari lebar container. */
            padding: 10px; /* Memberikan padding pada input text. */
            margin-top: 5px; /* Memberikan jarak atas pada input text. */
            border-radius: 5px; /* Membuat sudut input text melengkung. */
            border: 1px solid #ccc; /* Memberikan border abu-abu pada input text. */
            font-size: 14px; /* Ukuran font dalam input text menjadi 14px. */
            background-color: rgb(243, 235, 235); /* Warna latar belakang input text menjadi abu-abu muda. */
        }

        button {
            padding: 10px 20px; /* Memberikan padding pada tombol. */
            margin-top: 15px; /* Memberikan jarak atas pada tombol. */
            border-radius: 5px; /* Membuat sudut tombol melengkung. */
            border: none; /* Menghapus border tombol. */
            background-color: #3498db; /* Memberikan warna latar belakang biru pada tombol. */
            color: white; /* Warna teks tombol menjadi putih. */
            font-size: 16px; /* Ukuran font tombol menjadi 16px. */
            cursor: pointer; /* Menampilkan pointer saat tombol di-hover. */
        }

        button:hover {
            background-color: #2980b9; /* Mengubah warna latar tombol saat di-hover menjadi biru lebih gelap. */
        }

        .back-button {
            background-color: #7f8c8d; /* Memberikan latar belakang tombol kembali dengan warna abu-abu. */
        }

        .back-button:hover {
            background-color: #95a5a6; /* Mengubah warna latar tombol kembali saat di-hover menjadi abu-abu lebih terang. */
        }

        a {
            text-decoration: none; /* Menghapus garis bawah pada link. */
            color: white; /* Warna teks link menjadi putih. */
        }
    </style>
</head>

<body>

    <div class="container">
        <h3>Edit Artikel</h3> <!-- Judul halaman untuk form edit artikel. -->
        <form action="" method="POST"> <!-- Form untuk mengedit artikel yang akan disubmit dengan metode POST. -->
            <div class="form-group"> <!-- Group untuk input judul artikel. -->
                <label for="judul">Judul</label><br> <!-- Label untuk input judul. -->
                <input type="text" name="judul" value="<?= $artikel['judul'] ?>" required> <!-- Input untuk judul artikel dengan nilai default artikel yang sudah diambil. -->
            </div>

            <div class="form-group"> <!-- Group untuk input deskripsi artikel. -->
                <label for="deskripsi">Deskripsi</label><br> <!-- Label untuk input deskripsi. -->
                <input type="text" name="deskripsi" value="<?= $artikel['deskripsi'] ?>" required> <!-- Input untuk deskripsi artikel dengan nilai default artikel yang sudah diambil. -->
            </div>

            <div class="form-group"> <!-- Group untuk input penulis artikel. -->
                <label for="penulis">Penulis</label><br> <!-- Label untuk input penulis. -->
                <input type="text" name="penulis" value="<?= $artikel['penulis'] ?>" required> <!-- Input untuk penulis artikel dengan nilai default artikel yang sudah diambil. -->
            </div>

            <div class="form-group"> <!-- Group untuk tombol simpan. -->
                <button type="submit" name="simpan">Simpan</button> <!-- Tombol untuk menyimpan perubahan artikel. -->
            </div>
            <div class="form-group"> <!-- Group untuk tombol kembali. -->
                <button class="back-button"><a href="index.php">Kembali</a></button> <!-- Tombol untuk kembali ke halaman index.php. -->
            </div>
        </form>
    </div>

</body>
</html>
