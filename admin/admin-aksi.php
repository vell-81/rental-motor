<?php
include '../includes/db.php';

$aksi = $_POST['aksi'] ?? '';
$id = $_POST['id'] ?? null;

$nama = $_POST['nama'] ?? '';
$harga = $_POST['harga'] ?? '';
$warna = $_POST['warna'] ?? '';
$kondisi = $_POST['kondisi'] ?? '';
$jarak = $_POST['jarak'] ?? '';
$gambar = $_POST['gambar'] ?? '';
$tahun = $_POST['tahun'] ?? '';
$transmisi = $_POST['transmisi'] ?? '';
$mesin = $_POST['mesin'] ?? '';
$bahan = $_POST['bahan'] ?? '';
$plat = $_POST['plat'] ?? '';
$deskripsi = $_POST['deskripsi'] ?? '';

if ($aksi === "tambah") {
    $stmt = $conn->prepare("INSERT INTO motor (nama, harga, warna, kondisi, jarak, gambar, tahun, transmisi, mesin, bahan, plat, deskripsi) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssss", $nama, $harga, $warna, $kondisi, $jarak, $gambar, $tahun, $transmisi, $mesin, $bahan, $plat, $deskripsi);
    $stmt->execute();
    echo "Motor berhasil ditambahkan";
} elseif ($aksi === "edit" && $id !== null) {
    $stmt = $conn->prepare("UPDATE motor SET nama=?, harga=?, warna=?, kondisi=?, jarak=?, gambar=?, tahun=?, transmisi=?, mesin=?, bahan=?, plat=?, deskripsi=? WHERE id=?");
    $stmt->bind_param("ssssssssssssi", $nama, $harga, $warna, $kondisi, $jarak, $gambar, $tahun, $transmisi, $mesin, $bahan, $plat, $deskripsi, $id);
    $stmt->execute();
    echo "Motor berhasil diedit";
} elseif ($aksi === "hapus" && $id !== null) {
    $stmt = $conn->prepare("DELETE FROM motor WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    echo "Motor berhasil dihapus";
} else {
    echo "Aksi tidak valid";
}

$conn->close();
?>
