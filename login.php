<?php 

// Menghubungkan file koneksi.php untuk koneksi ke database
include('koneksi.php');

// Mengecek apakah tombol simpan (submit) sudah diklik
if(isset($_POST['simpan'])) {

    // Mengambil input username dari form
    $username = $_POST['username'];

    // Mengenkripsi input password dengan md5
    $password = md5($_POST['password']);

    // Query untuk memeriksa apakah ada pengguna dengan username dan password yang cocok
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";

    // Menjalankan query ke database
    $eksekusi = mysqli_query($koneksi, $query);

    // Mengecek apakah hasil query menemukan 1 baris data
    if($eksekusi->num_rows == 1) {

        // Mengambil data pengguna dari hasil query
        $data_user = $eksekusi->fetch_all(MYSQLI_ASSOC);

        // Mengakses data pengguna pertama
        $user = $data_user[0];

        // Menyimpan username ke dalam session
        $_SESSION['username'] = $user['username'];

        // Menyimpan id pengguna ke dalam session
        $_SESSION['id'] = $user['id'];

        // menyimpan role pengguna sebagai admin

        $_SESSION['role'] = $user['role'];

        header('location:index.php');

        // Menampilkan pesan berhasil login dan mengarahkan ke halaman index.php
        echo "<script> alert('Berhasil Login');
        window.location.replace('index.php');
        </script>";
        }

     else { 
        // Menampilkan pesan error jika username atau password salah dan kembali ke halaman login.php
        echo "<script> alert('Username atau Password anda salah');
        window.location.replace('login.php');
        </script>";

        
        }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Menghubungkan file CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
    <style>
        /* Memberikan gaya untuk background dan layout */
        body {
            font-family: Arial, sans-serif;
            background-image: url('foto/galaksi2.jpg'); /* Menambahkan background gambar */
            background-size: cover; /* Menyesuaikan gambar dengan ukuran layar */
            background-attachment: fixed; /* Gambar tetap saat di-scroll */
            background-position: center; /* Memusatkan gambar */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Tinggi halaman penuh layar */
            margin: 0;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <!-- Membuat div tengah menggunakan Bootstrap -->
        <div class="d-flex justify-content-center align-items-center vh-100">
            <!-- Membuat kotak form login -->
            <div class="card" style="width: 100%; max-width: 350px; padding: 10px;">
                <div class="card-title">
                    <center><h3>LOGIN</h3></center>
                    <!-- Membuat form untuk login -->
                    <form action="" method="post">
                        <!-- Input untuk username -->
                        <label for="tx_user">Username</label>
                        <input type="text" name="username" id="tx_user" class="form-control">
                        <!-- Input untuk password -->
                        <label for="tx_pass">Password</label>
                        <input type="password" name="password" id="tx_pass" class="form-control">
                        <!-- Link untuk membuat akun baru -->
                        <center><p>Tidak punya akun? <a href="buat_akun.php">Buat akun</a></p></center>
                        <!-- Tombol submit untuk login -->
                        <input type="submit" name="simpan" value="LOGIN" class="btn btn-primary w-100 mt-3">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Menghubungkan file JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>

</html>
