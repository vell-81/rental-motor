<?php
require_once '../includes/db.php';

if (!isset($_GET['id'])) {
    echo "ID motor tidak ditemukan.";
    exit;
}

$id = intval($_GET['id']);
$query = "SELECT * FROM motor WHERE id = $id";
$result = mysqli_query($conn, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "Data motor tidak ditemukan.";
    exit;
}

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Motor | <?= htmlspecialchars($row['nama']) ?></title>
    <link rel="stylesheet" href="style.css?v=1">
    <link rel="stylesheet" href="detail.css?v=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<div class="detail-container">

    <div class="detail-header">
        <h1><?= htmlspecialchars($row['nama']) ?></h1>
        <div class="price">Rp <?= number_format($row['harga'], 0, ',', '.') ?></div>
    </div>

    <div class="detail-layout">
        <!-- Gambar -->
        <div class="detail-image">
            <img src="<?= htmlspecialchars($row['gambar']) ?>" alt="<?= htmlspecialchars($row['nama']) ?>">
        </div>

        <!-- Spesifikasi -->
        <div class="detail-specs">
            <h2>Spesifikasi</h2>
            <div class="spec-item"><span>Warna:</span><span><?= htmlspecialchars($row['warna']) ?></span></div>
            <div class="spec-item"><span>Kondisi:</span><span><?= htmlspecialchars($row['kondisi']) ?></span></div>
            <div class="spec-item"><span>Jarak Tempuh:</span><span><?= htmlspecialchars($row['jarak']) ?> km</span></div>
            <div class="spec-item"><span>Tahun:</span><span><?= htmlspecialchars($row['tahun']) ?></span></div>
            <div class="spec-item"><span>Transmisi:</span><span><?= htmlspecialchars($row['transmisi']) ?></span></div>
            <div class="spec-item"><span>Mesin:</span><span><?= htmlspecialchars($row['mesin']) ?></span></div>
            <div class="spec-item"><span>Bahan Bakar:</span><span><?= htmlspecialchars($row['bahan']) ?></span></div>
            <div class="spec-item"><span>Plat:</span><span><?= htmlspecialchars($row['plat']) ?></span></div>
        </div>
    </div>

    <!-- Deskripsi -->
    <div class="detail-description">
        <h3>Deskripsi</h3>
        <p><?= nl2br(htmlspecialchars($row['deskripsi'])) ?></p>
    </div>

    <a href="index.php" class="back-button">← Kembali ke Beranda</a>
</div>

</body>
</html>
