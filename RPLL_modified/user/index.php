<?php
require_once '../includes/db.php';
$query = "SELECT * FROM motor";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Motor Bekas 88 | Jual Beli Motor Bekas Berkualitas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

<!-- Hero Section -->
<section class="hero" id="home">
    <div class="hero-content">
        <h1>Temukan Motor Bekas Berkualitas</h1>
        <p>Dapatkan motor impian Anda dengan harga terbaik dan kualitas terjamin di Motor Bekas 88</p>
        <a href="#motor" class="cta-button">Lihat Koleksi</a>
    </div>
</section>

<!-- Navigation -->
<nav class="navbar">
    <div class="nav-container">
        <a href="#" class="logo">MotorBekas88</a>
        <ul class="nav-links">
            <li><a href="#home"><i class="fas fa-home"></i> Beranda</a></li>
            <li><a href="#motor"><i class="fas fa-motorcycle"></i> Daftar Motor</a></li>
            <li><a href="#tentang"><i class="fas fa-info-circle"></i> Tentang Kami</a></li>
            <li><a href="#kontak"><i class="fas fa-phone-alt"></i> Kontak</a></li>
        </ul>
    </div>
</nav>

<!-- Motor List Section -->
<section class="section" id="motor">
    <div class="section-title">
        <h2>Daftar Motor Kami</h2>
        <p>Temukan motor bekas berkualitas dengan harga terbaik</p>
    </div>

    <div class="motor-grid">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <div class="motor-card">
                <img src="<?= htmlspecialchars($row['gambar']) ?>" alt="<?= htmlspecialchars($row['nama']) ?>" class="motor-image">
                <div class="motor-content">
                    <h3><?= htmlspecialchars($row['nama']) ?></h3>
                    <p class="price">Rp <?= number_format($row['harga'], 0, ',', '.') ?></p>
                    <div class="motor-specs">
                        <div class="spec-item">
                            <i class="fas fa-palette"></i>
                            <span>Warna: <?= htmlspecialchars($row['warna']) ?></span>
                        </div>
                        <div class="spec-item">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Kondisi: <?= htmlspecialchars($row['kondisi']) ?></span>
                        </div>
                        <div class="spec-item">
                            <i class="fas fa-road"></i>
                            <span>Jarak tempuh: <?= htmlspecialchars($row['jarak']) ?> km</span>
                        </div>
                    </div>
                    <a href="detail_motor.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-block">Lihat Detail</a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</section>

<!-- About Section -->
<section class="section about" id="tentang">
    <div class="about-container">
        <div class="about-text">
            <h2>Tentang Motor Bekas 88</h2>
            <p>Motor Bekas 88 adalah dealer khusus motor bekas yang telah berpengalaman lebih dari 5 tahun dalam penjualan motor bekas berkualitas di seluruh Indonesia.</p>
            <p>Kami berkomitmen untuk menyediakan motor bekas dengan kualitas terbaik yang telah melalui proses inspeksi ketat oleh mekanik profesional kami. Setiap motor yang kami jual memiliki garansi 3 bulan untuk memberikan kepuasan dan kepercayaan kepada pelanggan.</p>
            <p>Tim kami terdiri dari profesional yang berpengalaman di bidang otomotif dan siap membantu Anda menemukan motor yang sesuai dengan kebutuhan dan budget Anda.</p>
        </div>
        <img src="https://awsimages.detik.net.id/community/media/visual/2022/04/12/jual-beli-motor-bekas-antara-motor-2_169.jpeg?w=1200" alt="Showroom Motor Bekas 88" class="about-image">
    </div>
</section>

<!-- Contact Section -->
<section class="section contact" id="kontak">
    <div class="section-title">
        <h2>Hubungi Kami</h2>
        <p>Kami siap membantu Anda menemukan motor yang sesuai kebutuhan</p>
    </div>

    <div class="contact-container">
        <div class="contact-info">
            <h3>Informasi Kontak</h3>
            <div class="contact-items-wrapper">
                <div class="contact-item">
                    <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="contact-details">
                        <p><strong>Alamat</strong></p>
                        <p>Jl. Motor Bekas No. 88, Jakarta Selatan</p>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon"><i class="fas fa-phone-alt"></i></div>
                    <div class="contact-details">
                        <p><strong>Telepon/WA</strong></p>
                        <p><a href="https://wa.me/628989723481" target="_blank">0898-9723-481</a></p>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                    <div class="contact-details">
                        <p><strong>Email</strong></p>
                        <p><a href="mailto:firzzyr@gmail.com">firzzyr@gmail.com</a></p>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon"><i class="fas fa-clock"></i></div>
                    <div class="contact-details">
                        <p><strong>Jam Operasional</strong></p>
                        <p>Senin–Sabtu, 08.00–17.00 WIB</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="footer-container">
        <div class="footer-col">
            <h3>Motor Bekas 88</h3>
            <p>Dealer motor bekas terpercaya dengan kualitas terjamin dan harga terbaik di Indonesia.</p>
            <div class="social-links">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-whatsapp"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
        <div class="footer-col">
            <h3>Menu</h3>
            <ul>
                <li><a href="#home">Beranda</a></li>
                <li><a href="#motor">Daftar Motor</a></li>
                <li><a href="#tentang">Tentang Kami</a></li>
                <li><a href="#kontak">Kontak</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h3>Layanan</h3>
            <ul>
                <li><a href="#">Jual Motor</a></li>
                <li><a href="#">Tukar Tambah</a></li>
                <li><a href="#">Kredit Motor</a></li>
                <li><a href="#">Service Berkala</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h3>Kontak</h3>
            <ul>
                <li><a href="#"><i class="fas fa-map-marker-alt"></i> Jakarta Selatan</a></li>
                <li><a href="tel:08989723481"><i class="fas fa-phone-alt"></i> 0898-9723-481</a></li>
                <li><a href="mailto:firzzyr@gmail.com"><i class="fas fa-envelope"></i> firzzyr@gmail.com</a></li>
            </ul>
        </div>
    </div>
    <div class="copyright">
        <p>&copy; 2023 Motor Bekas 88. Seluruh hak cipta dilindungi.</p>
    </div>
</footer>

<!-- WhatsApp Chat Button -->
<div class="whatsapp-chat">
    <a href="https://wa.me/628989723481" target="_blank">
        <i class="fab fa-whatsapp"></i>
        <span>Chat dengan Admin</span>
    </a>
</div>

<script src="produk.js"></script>

</body>
</html>
