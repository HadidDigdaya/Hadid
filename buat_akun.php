<?php 
include('koneksi.php');

if(isset($_POST['simpan'])) { // isset = Mengecek apakah form disubmit dengan tombol 'simpan' yang ditekan.
    $username = $_POST['username']; // Mengambil nilai username yang dimasukkan pengguna dari form.
    $password = md5($_POST['password']); // Mengambil nilai password yang dimasukkan, lalu mengenkripsinya dengan md5.
    $query = "INSERT INTO users (username, password) VALUES('$username', '$password')";
    $eksekusi = mysqli_query($koneksi, $query);
    
    if($eksekusi) { 
        echo "<script> alert('Berhasil Membuat Akun'); window.location.replace('login.php'); </script>"; // Jika berhasil, tampilkan pesan dan arahkan ke halaman login.php.
    } else {
        header('Location: buat_akun.php'); // Jika gagal, arahkan kembali ke halaman buat_akun.php.
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Menentukan encoding karakter untuk halaman HTML. -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Membuat halaman ini responsive pada perangkat mobile. -->
    <title>Login</title> <!-- Judul halaman yang muncul di tab browser. -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> <!-- Menghubungkan file CSS Bootstrap dari CDN. -->
    <style> 
        body{
            background-image:url('foto/galaksi4.jpg'); /* Mengatur gambar latar belakang halaman. */
            background-size:cover; /* Menyesuaikan gambar latar belakang agar menutupi seluruh halaman. */
            background-attachment: fixed; /* Memastikan gambar latar belakang tetap di tempat saat scroll. */
            background-position: center; /* Menempatkan gambar latar belakang di tengah. */
        }
    </style>
</head>

<body>

    <div class="container-fluid"> <!-- Membuat container fluid untuk menampung seluruh elemen halaman. -->
        <div class="d-flex justify-content-center align-items-center vh-100"> <!-- Menyusun konten di tengah secara vertikal dan horizontal menggunakan Flexbox. -->
            <div class="card" style="width: 100%; max-width: 350px; padding: 10px; background-color: rgb(0, 0, 0, 0.7);"> <!-- Membuat card dengan lebar maksimal 350px dan memberi latar belakang semi-transparan. -->
                <div class="card-title">
                    <center><h3 style="color: white;">Buat Akun</h3></center> <!-- Judul halaman yang muncul di card, dengan warna teks putih. -->

                    <form action="" method="post"> <!-- Membuat form yang akan mengirimkan data ke halaman yang sama menggunakan metode POST. -->
                        <label for="tx_user" style="color: white;">Username</label> <!-- Label untuk input username dengan warna teks putih. -->
                        <input type="text" name="username" id="tx_user" class="form-control"> <!-- Input field untuk username dengan class form-control dari Bootstrap. -->
                        
                        <label for="tx_pass" style="color: white;">Password</label> <!-- Label untuk input password dengan warna teks putih. -->
                        <input type="password" name="password" id="tx_pass" class="form-control"> <!-- Input field untuk password dengan class form-control dari Bootstrap. -->
                        
                        <input type="submit" name="simpan" value="Daftar" class="btn btn-primary w-100 mt-3"> <!-- Tombol submit dengan kelas Bootstrap untuk memberi style tombol. -->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Menghubungkan file JavaScript Bootstrap untuk fungsionalitas seperti modal, dropdown, dll. -->
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
