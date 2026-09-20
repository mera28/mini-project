<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Information System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: #f8f9fa;
        }
        h2 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            background-color: #fff;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px 12px;
            text-align: left;
        }
        th {
            background-color: #0d6efd;
            color: white;
        }
        /* Logika Conditional: Menyaring warna baris tabel jika stok kritis (< 3) */
        .stok-kritis {
            background-color: #f8d7da;
            color: #842029;
            font-weight: bold;
        }
        .total-box {
            margin-top: 20px;
            padding: 15px;
            background-color: #e2e3e5;
            border-radius: 5px;
            font-size: 16px;
        }
    </style>
</head>
<body>

    <h2>Product Information System (Katalog Gudang)</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            {{-- PRESENTATION LAYER: Merender data ke layout tabel HTML via perulangan foreach --}}
            @foreach ($products as $product)
                {{-- Conditional logic untuk mengecek stok kritis (< 3) --}}
                <tr class="{{ $product['stok'] < 3 ? 'stok-kritis' : '' }}">
                    <td>{{ $product['id'] }}</td>
                    <td>{{ $product['nama'] }}</td>
                    <td>{{ $product['kategori'] }}</td>
                    <td>Rp {{ number_format($product['harga'], 0, ',', '.') }}</td>
                    <td>
                        {{ $product['stok'] }}
                        @if ($product['stok'] < 3)
                            <span>(Stok Kritis!)</span>
                        @endif
                    </td>
                    <td>{{ $product['deskripsi'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Menampilkan hasil kalkulasi dari hitungTotalNilaiStok() --}}
    <div class="total-box">
        <strong>Total Nilai Aset Gudang:</strong> Rp {{ number_format($totalNilaiAset, 0, ',', '.') }}
    </div>

</body>
</html>