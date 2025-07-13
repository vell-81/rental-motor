<?php
require_once '../includes/db.php';

$id = $_GET['id'];
$q = mysqli_query($conn, "SELECT * FROM motor WHERE id=$id");
$data = mysqli_fetch_assoc($q);

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $warna = $_POST['warna'];
    $kondisi = $_POST['kondisi'];
    $jarak = $_POST['jarak'];
    $tahun = $_POST['tahun'];
    $transmisi = $_POST['transmisi'];
    $mesin = $_POST['mesin'];
    $bahan = $_POST['bahan'];
    $plat = $_POST['plat'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_POST['gambar'];

    $update = "UPDATE motor SET 
        nama='$nama', harga='$harga', warna='$warna', kondisi='$kondisi', 
        jarak='$jarak', tahun='$tahun', transmisi='$transmisi', mesin='$mesin', 
        bahan='$bahan', plat='$plat', deskripsi='$deskripsi', gambar='$gambar'
        WHERE id=$id";

    mysqli_query($conn, $update);
    header("Location: list_motor.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Motor</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 2rem;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.25rem;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: white;
            padding: 0.75rem;
            border: none;
            border-radius: 5px;
            width: 100%;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Edit Data Motor</h2>
    <form method="post">
        <label>Nama</label>
        <input type="text" name="nama" value="<?= $data['nama'] ?>">

        <label>Harga</label>
        <input type="number" name="harga" value="<?= $data['harga'] ?>">

        <label>Warna</label>
        <input type="text" name="warna" value="<?= $data['warna'] ?>">

        <label>Kondisi</label>
        <input type="text" name="kondisi" value="<?= $data['kondisi'] ?>">

        <label>Jarak Tempuh</label>
        <input type="text" name="jarak" value="<?= $data['jarak'] ?>">

        <label>Tahun</label>
        <input type="text" name="tahun" value="<?= $data['tahun'] ?>">

        <label>Transmisi</label>
        <input type="text" name="transmisi" value="<?= $data['transmisi'] ?>">

        <label>Kapasitas Mesin</label>
        <input type="text" name="mesin" value="<?= $data['mesin'] ?>">

        <label>Bahan Bakar</label>
        <input type="text" name="bahan" value="<?= $data['bahan'] ?>">

        <label>Plat Nomor</label>
        <input type="text" name="plat" value="<?= $data['plat'] ?>">

        <label>Deskripsi</label>
        <textarea name="deskripsi"><?= $data['deskripsi'] ?></textarea>

        <label>URL Gambar</label>
        <input type="text" name="gambar" value="<?= $data['gambar'] ?>">

        <input type="submit" name="submit" value="Simpan">
    </form>
</div>
</body>
</html>
