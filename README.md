# Membuat Pagination
NAMA : ANDREAN PUTRA ARYA

NIM : 312410341

KELAS : TI.24.A.4

# Latihan:
Lengkapi link previous dan next sehingga ketika diklik akan mengarah ke halaman sebelumnya
atau selanjutnya.

# Menentukan Jumlah Data per Halaman
```
$limit = 5;
```
Variabel $limit digunakan untuk menentukan jumlah data yang ditampilkan pada setiap halaman.
Pada kode ini, setiap halaman hanya menampilkan 5 data barang.



# Menentukan Posisi Awal Data (OFFSET)
```
$start = ($hal - 1) * $limit;
```

Kode ini digunakan untuk menentukan posisi awal data yang akan diambil dari database (OFFSET).
Contoh:

Halaman 1 → (1 - 1) * 5 = 0

Halaman 2 → (2 - 1) * 5 = 5

Halaman 3 → (3 - 1) * 5 = 10

# Query Data dengan LIMIT
```
$sql = "SELECT * FROM data_barang LIMIT $start, $limit";
$result = $db->query($sql);
```
Query ini digunakan untuk mengambil data dari tabel data_barang sesuai dengan halaman yang aktif.
Parameter $start berfungsi sebagai OFFSET dan $limit sebagai jumlah data per halaman.

# Menghitung Total Data
```
$totalData = mysqli_num_rows(
    $db->query("SELECT * FROM data_barang")
);
```

Kode ini digunakan untuk menghitung jumlah seluruh record data yang ada pada tabel data_barang.
Jumlah total data ini diperlukan untuk menentukan berapa halaman pagination yang harus dibuat.

# Menghitung Jumlah Halaman
```
$totalHalaman = ceil($totalData / $limit);
```

Kode ini digunakan untuk menghitung jumlah halaman berdasarkan total data dan jumlah data per halaman.
Fungsi ceil() digunakan untuk membulatkan hasil pembagian ke atas agar semua data tetap tertampilkan.

# Penomoran Data pada Tabel
```
<?php $no = $start + 1; ?>
```

Kode ini berfungsi untuk menampilkan nomor urut data secara berkelanjutan sesuai halaman yang aktif, sehingga nomor tidak kembali ke 1 saat berpindah halaman.

# Navigasi Previous
```
<?php if ($hal > 1): ?>
    <a class="btn" href="index.php?page=user/list&hal=<?= $hal - 1 ?>">Prev</a>
<?php endif; ?>
```

Tombol Previous akan muncul jika halaman aktif bukan halaman pertama.
Tombol ini berfungsi untuk menuju ke halaman sebelumnya.

# Navigasi Nomor Halaman
```
<?php for ($i = 1; $i <= $totalHalaman; $i++): ?>
```

Kode ini digunakan untuk menampilkan tombol nomor halaman sesuai dengan jumlah halaman yang tersedia.
Halaman yang sedang aktif akan diberi gaya (warna berbeda) agar mudah dikenali oleh pengguna.

# Navigasi Next
```
<?php if ($hal < $totalHalaman): ?>
    <a class="btn" href="index.php?page=user/list&hal=<?= $hal + 1 ?>">Next</a>
<?php endif; ?>
```

Tombol Next akan muncul jika halaman aktif bukan halaman terakhir.
Tombol ini berfungsi untuk menuju ke halaman berikutnya.


# Hasil Akhir Nya
