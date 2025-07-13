<?php
require_once '../includes/db.php';

$result = mysqli_query($conn, "SELECT * FROM motor");
?>

<!DOCTYPE html>
<html>
<head>
    <title>List Motor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            padding: 2rem;
            position: relative;
            min-height: 100vh;
        }

        .container {
            max-width: 1100px;
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

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 0.75rem;
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        img {
            max-width: 100px;
            border-radius: 4px;
        }

        .btn {
            display: inline-block;
            margin: 4px 0;
            padding: 6px 12px;
            text-decoration: none;
            border-radius: 4px;
            color: white;
            font-size: 14px;
        }

        .btn-edit {
            background-color: #2ecc71;
        }

        .btn-hapus {
            background-color: #e74c3c;
        }

        .btn-edit:hover {
            background-color: #27ae60;
        }

        .btn-hapus:hover {
            background-color: #c0392b;
        }

        .btn-back {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #3498db;
            padding: 10px 16px;
            font-size: 14px;
            border-radius: 6px;
            color: white;
            text-decoration: none;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            transition: background-color 0.2s;
        }

        .btn-back:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Daftar Motor</h2>
        <table>
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Warna</th>
                    <th>Kondisi</th>
                    <th>Jarak</th>
                    <th>Tahun</th>
                    <th>Transmisi</th>
                    <th>Mesin</th>
                    <th>Bahan</th>
                    <th>Plat</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($m = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><img src="<?= $m['gambar'] ?>" alt="Foto <?= $m['nama'] ?>"></td>
                    <td><?= $m['nama'] ?></td>
                    <td>Rp <?= number_format($m['harga'], 0, ',', '.') ?></td>
                    <td><?= $m['warna'] ?></td>
                    <td><?= $m['kondisi'] ?></td>
                    <td><?= $m['jarak'] ?> km</td>
                    <td><?= $m['tahun'] ?></td>
                    <td><?= $m['transmisi'] ?></td>
                    <td><?= $m['mesin'] ?></td>
                    <td><?= $m['bahan'] ?></td>
                    <td><?= $m['plat'] ?></td>
                    <td><?= $m['deskripsi'] ?></td>
                    <td>
                        <a class="btn btn-edit" href="edit_motor.php?id=<?= $m['id'] ?>">Edit</a><br>
                        <a class="btn btn-hapus" href="hapus_motor.php?id=<?= $m['id'] ?>" onclick="return confirm('Yakin ingin menghapus motor ini?')">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Tombol kembali -->
    <!-- Tombol kembali -->
    <a href="admin.html" class="btn-back">← Kembali ke Admin</a>
</body>
</html>
