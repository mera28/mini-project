# Product Information System (Mini Project 1)

Aplikasi **Product Information System** berbasis **Laravel 10** yang dibuat untuk memenuhi tugas mata kuliah Pemrograman Web.

## 🛠️ Arsitektur Sistem

Aplikasi ini menerapkan pemisahan komponen desain konseptual sesuai dengan instruksi tugas:
1. **Data Layer (`ProductController.php`)**: Menyimpan multidimensional array komoditas produk (ID, Nama, Kategori, Harga, Stok, Deskripsi).
2. **Processing Layer (`ProductController.php`)**: Mengalkulasi total nilai aset gudang melalui fungsi `hitungTotalNilaiStok()` serta menerapkan logika penanda stok kritis (< 3).
3. **Presentation Layer (`index.blade.php`)**: Merender data ke layout tabel HTML via perulangan `@foreach` Blade dan menerapkan warna highlight merah jika stok kritis.

## 🚀 Cara Menjalankan Proyek

1. Clone repositori ini:
   ```bash
   git clone [https://github.com/mera28/mini-project.git](https://github.com/mera28/mini-project.git)