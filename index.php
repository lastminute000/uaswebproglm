<!DOCTYPE html>
<html>
<head>
    <title>Form Makanan</title>
</head>
<body>
    <h1>Form Makanan</h1>
    <form method="post" action="proses.php">
        <label for="kode_makanan">Kode Makanan:</label>
        <input type="text" name="kode_makanan" id="kode_makanan" required><br><br>
        
        <label for="nama_makanan">Nama Makanan:</label>
        <input type="text" name="nama_makanan" id="nama_makanan" required><br><br>
        
        <label for="harga_makanan">Harga Makanan:</label>
        <input type="text" name="harga_makanan" id="harga_makanan" required><br><br>
        
        <label for="foto_makanan">URL Foto Makanan:</label>
        <input type="text" name="foto_makanan" id="foto_makanan" required><br><br>
        
        <input type="submit" value="Submit">
        <button onclick="window.location.href='order.php'">Lihat Order</button>
    </form>
</body>
</html>
