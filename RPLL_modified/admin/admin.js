function login() {
  const user = document.getElementById("username").value;
  const pass = document.getElementById("password").value;
  if (user === "admin" && pass === "12345") {
    localStorage.setItem("adminLogin", "true");
    showAdmin();
  } else {
    alert("Login gagal!");
  }
}

function logout() {
  localStorage.removeItem("adminLogin");
  location.reload();
}

function showAdmin() {
  document.getElementById("loginSection").style.display = "none";
  document.getElementById("adminSection").style.display = "block";
  renderProduk();
}

function simpanProduk() {
  const produk = {
    id: document.getElementById("editIndex").value,
    nama: document.getElementById("nama").value,
    harga: document.getElementById("harga").value,
    warna: document.getElementById("warna").value,
    kondisi: document.getElementById("kondisi").value,
    jarak: document.getElementById("jarak").value,
    gambar: document.getElementById("gambar").value,
    tahun: document.getElementById("tahun").value,
    transmisi: document.getElementById("transmisi").value,
    mesin: document.getElementById("mesin").value,
    bahan: document.getElementById("bahan").value,
    plat: document.getElementById("plat").value,
    deskripsi: document.getElementById("deskripsi").value
  };

  const formData = new FormData();
  for (const key in produk) {
    formData.append(key, produk[key]);
  }

  formData.append("aksi", produk.id ? "edit" : "tambah");

  fetch("admin-aksi.php", {
    method: "POST",
    body: formData
  })
    .then(res => res.text())
    .then(msg => {
      alert(msg);
      resetForm();
      renderProduk();
    })
    .catch(err => {
      console.error("Gagal kirim:", err);
    });
}

function renderProduk() {
  fetch("produk.php")
    .then(res => res.json())
    .then(data => {
      const productList = document.getElementById("productList");
      productList.innerHTML = "";

      data.forEach(p => {
        const item = document.createElement("div");
        item.className = "product-item";
        item.innerHTML = `
          <strong>${p.nama}</strong><br>
          Harga: ${p.harga}<br>
          Warna: ${p.warna}<br>
          Kondisi: ${p.kondisi}<br>
          Jarak: ${p.jarak}<br>
          <img src="${p.gambar}" alt="${p.nama}"><br>
          <button onclick="editProduk(${p.id})">Edit</button>
          <button onclick="hapusProduk(${p.id})">Hapus</button>
        `;
        productList.appendChild(item);
      });
    })
    .catch(err => {
      console.error("Gagal ambil produk:", err);
    });
}

function editProduk(id) {
  fetch("produk.php")
    .then(res => res.json())
    .then(data => {
      const p = data.find(d => d.id == id);
      if (!p) return;

      document.getElementById("editIndex").value = p.id;
      document.getElementById("nama").value = p.nama;
      document.getElementById("harga").value = p.harga;
      document.getElementById("warna").value = p.warna;
      document.getElementById("kondisi").value = p.kondisi;
      document.getElementById("jarak").value = p.jarak;
      document.getElementById("gambar").value = p.gambar;
      document.getElementById("tahun").value = p.tahun;
      document.getElementById("transmisi").value = p.transmisi;
      document.getElementById("mesin").value = p.mesin;
      document.getElementById("bahan").value = p.bahan;
      document.getElementById("plat").value = p.plat;
      document.getElementById("deskripsi").value = p.deskripsi;
    });
}

function hapusProduk(id) {
  if (!confirm("Yakin ingin menghapus motor ini?")) return;

  const formData = new FormData();
  formData.append("aksi", "hapus");
  formData.append("id", id);

  fetch("admin-aksi.php", {
    method: "POST",
    body: formData
  })
    .then(res => res.text())
    .then(msg => {
      alert(msg);
      renderProduk();
    })
    .catch(err => {
      console.error("Gagal hapus:", err);
    });
}

function resetForm() {
  document.getElementById("editIndex").value = "";
  document.getElementById("nama").value = "";
  document.getElementById("harga").value = "";
  document.getElementById("warna").value = "";
  document.getElementById("kondisi").value = "";
  document.getElementById("jarak").value = "";
  document.getElementById("gambar").value = "";
  document.getElementById("tahun").value = "";
  document.getElementById("transmisi").value = "";
  document.getElementById("mesin").value = "";
  document.getElementById("bahan").value = "";
  document.getElementById("plat").value = "";
  document.getElementById("deskripsi").value = "";
}

window.onload = () => {
  if (localStorage.getItem("adminLogin") === "true") {
    showAdmin();
  }
};

document.getElementById("password").addEventListener("keyup", function (event) {
  if (event.key === "Enter") login();
});
document.getElementById("username").addEventListener("keyup", function (event) {
  if (event.key === "Enter") login();
});
