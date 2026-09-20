<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Processing Layer: Fungsi untuk mengalkulasi total nilai aset gudang
     * (Harga * Stok untuk setiap produk)
     */
    private function hitungTotalNilaiStok(array $products): float
    {
        $totalNilai = 0;
        foreach ($products as $product) {
            $totalNilai += $product['harga'] * $product['stok'];
        }
        return $totalNilai;
    }

    public function index()
    {
        // 1. DATA LAYER: Multidimensional Array komoditas produk (Sesuai Spesifikasi Dosen)
        $products = [
            [
                'id'        => 1,
                'nama'      => 'Laptop Asus Zenbook',
                'kategori'  => 'Elektronik',
                'harga'     => 12500000,
                'stok'      => 5,
                'deskripsi' => 'Laptop tipis dengan performa tinggi.'
            ],
            [
                'id'        => 2,
                'nama'      => 'Mouse Wireless Logitech',
                'kategori'  => 'Aksesori Komputer',
                'harga'     => 250000,
                'stok'      => 2, // Stok Kritis (< 3)
                'deskripsi' => 'Mouse ergonoimik tanpa kabel.'
            ],
            [
                'id'        => 3,
                'nama'      => 'Keyboard Mekanikal',
                'kategori'  => 'Aksesori Komputer',
                'harga'     => 750000,
                'stok'      => 1, // Stok Kritis (< 3)
                'deskripsi' => 'Keyboard mekanikal RGB switch biru.'
            ],
            [
                'id'        => 4,
                'nama'      => 'Monitor Gaming 24 Inch',
                'kategori'  => 'Elektronik',
                'harga'     => 2100000,
                'stok'      => 8,
                'deskripsi' => 'Monitor IPS 144Hz refresh rate.'
            ],
            [
                'id'        => 5,
                'nama'      => 'Flashdisk 64GB',
                'kategori'  => 'Penyimpanan Data',
                'harga'     => 95000,
                'stok'      => 0, // Stok Kritis (< 3)
                'deskripsi' => 'Penyimpanan portable USB 3.0.'
            ],
        ];

        // 2. PROCESSING LAYER: Memanggil fungsi hitungTotalNilaiStok
        $totalNilaiAset = $this->hitungTotalNilaiStok($products);

        // Mengirimkan data ke Presentation Layer (Blade View)
        return view('products.index', compact('products', 'totalNilaiAset'));
    }
}