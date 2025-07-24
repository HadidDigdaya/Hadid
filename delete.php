. <?php
include("koneksi.php"); // Menghubungkan ke file koneksi.php yang berisi pengaturan koneksi ke database.

$id = $_GET['id']; // Mengambil nilai 'id' dari URL yang dikirimkan melalui metode GET.

$query = "DELETE FROM artikel WHERE id=$id"; // Menyusun query SQL untuk menghapus data dari tabel artikel berdasarkan id yang diterima.

mysqli_query($koneksi, $query); // Menjalankan query yang sudah disusun pada database yang terhubung (melalui koneksi.php).

echo "<script>alert('Berhasil Menambahkan'); window.location.replace('index.php');</script>"; 
// Menampilkan pesan alert kepada pengguna yang mengatakan "Berhasil Menambahkan" (seharusnya "Berhasil Menghapus") dan mengarahkan ulang pengguna ke halaman index.php.
?>
