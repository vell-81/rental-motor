window.addEventListener("DOMContentLoaded", () => {
  const motorGrid = document.querySelector(".motor-grid");

  fetch("produk.php")
    .then(response => response.json())
    .then(produkList => {
      motorGrid.innerHTML = ""; // Kosongkan dulu

      produkList.forEach((p, index) => {
        const card = document.createElement("div");
        card.className = "motor-card";
        card.innerHTML = `
          <img src="${p.gambar}" alt="${p.nama}" class="motor-image">
          <div class="motor-content">
              <h3>${p.nama}</h3>
              <p class="price">Rp ${p.harga}</p>
              <div class="motor-specs">
                  <div class="spec-item"><i class="fas fa-palette"></i><span>Warna: ${p.warna}</span></div>
                  <div class="spec-item"><i class="fas fa-tachometer-alt"></i><span>Kondisi: ${p.kondisi}</span></div>
                  <div class="spec-item"><i class="fas fa-road"></i><span>Jarak tempuh: ${p.jarak}</span></div>
              </div>
              <a href="detail_motor.php?id=${p.id}" class="btn btn-primary btn-block">Lihat Detail</a>
          </div>
        `;
        motorGrid.appendChild(card);
      });
    })
    .catch(error => {
      console.error("Gagal mengambil data dari database:", error);
      motorGrid.innerHTML = "<p>Gagal memuat data motor.</p>";
    });
});
