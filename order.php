<?php
session_start();

// Inisialisasi session makanan_terpilih jika belum ada
if (!isset($_SESSION['makanan_terpilih'])) {
    $_SESSION['makanan_terpilih'] = array();
}

// Check if form is submitted (makanan is selected)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id'])) {
        $selectedMakanan = $_POST['id'];
        if (isset($_SESSION['makanan']) && array_key_exists($selectedMakanan, $_SESSION['makanan'])) {
            $makananToAdd = $_SESSION['makanan'][$selectedMakanan];
            $_SESSION['makanan_terpilih'][$selectedMakanan] = $makananToAdd;
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Order Page</title>
    <style>
        .card {
            width: 300px;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f2f2f2;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .card img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
        
        .card-content {
            margin-top: 10px;
        }
        
        .card-area {
            display: flex;
            flex-wrap: wrap;
        }
        
        .column {
            width: 250px;
            float: right;
        }
        
        .selected-container {
            background-color: #f2f2f2;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .selected-list {
            list-style: none;
            padding: 0;
        }
        
        .selected-list li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="column">
        <div class="selected-container">
            <h3>Makanan yang Dipilih</h3>
            <ul class="selected-list">
                <?php if (isset($_SESSION['makanan_terpilih']) && !empty($_SESSION['makanan_terpilih'])): ?>
                    <?php foreach ($_SESSION['makanan_terpilih'] as $id_makanan => $makanan_terpilih): ?>
                        <li><?php echo $makanan_terpilih['nama']; ?> - <?php echo $makanan_terpilih['harga']; ?></li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>Tidak ada makanan yang dipilih.</li>
                <?php endif; ?>
            </ul>
            <h3>Total Makanan yang Dipilih</h3>
            <?php
                $totalHarga = 0;
                foreach ($_SESSION['makanan_terpilih'] as $makanan_terpilih) {
                    $totalHarga += $makanan_terpilih['harga'];
                }
                echo "Jumlah Makanan: " . count($_SESSION['makanan_terpilih']) . "<br>";
                echo "Total Harga: " . $totalHarga;
            ?>
        </div>
    </div>
    
    <div class="card-area">
        <?php if (isset($_SESSION['makanan']) && !empty($_SESSION['makanan'])): ?>
            <?php foreach ($_SESSION['makanan'] as $id_makanan => $makanan): ?>
                <div class="card">
                    <img src="<?php echo $makanan['foto']; ?>" alt="Foto Makanan">
                    <div class="card-content">
                        <h3><?php echo $makanan['nama']; ?></h3>
                        <p>Kode: <?php echo $makanan['kode']; ?></p>
                        <p>Harga: <?php echo $makanan['harga']; ?></p>
                        <?php if (array_key_exists($id_makanan, $_SESSION['makanan_terpilih'])): ?>
                            <button disabled>Telah Dipilih</button>
                        <?php else: ?>
                            <form method="POST" action="order.php">
                                <input type="hidden" name="id" value="<?php echo $id_makanan; ?>">
                                <button type="submit">Pilih</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Tidak ada data makanan.</p>
        <?php endif; ?>
    </div>
</body>
</html>
