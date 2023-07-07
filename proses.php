<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil nilai dari form
    $kode_makanan = $_POST['kode_makanan'];
    $nama_makanan = $_POST['nama_makanan'];
    $harga_makanan = $_POST['harga_makanan'];
    $foto_makanan = $_POST['foto_makanan'];

    // Membuat array data makanan baru
    $makanan_baru = array(
        'kode' => $kode_makanan,
        'nama' => $nama_makanan,
        'harga' => $harga_makanan,
        'foto' => $foto_makanan
    );

    // Menambahkan data makanan baru ke dalam session
    if (!isset($_SESSION['makanan'])) {
        $_SESSION['makanan'] = array();
    }
    $_SESSION['makanan'][] = $makanan_baru;

    // Menampilkan pesan sukses
    echo "Data makanan berhasil disimpan ke dalam session!";

    // Redirect kembali ke halaman index.php
    header('Location: index.php');
    exit();
}
?>
