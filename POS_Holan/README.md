<<<<<<< HEAD
## Tentang Aplikasi

Aplikasi POS atau point of sales adalah aplikasi yang digunakan untuk mengelola transaksi pada sebuah toko atau oleh kasir. Aplikasi ini dibuat menggunakan Laravel v10.\* dan minimal PHP v7.4 jadi apabila pada saat proses instalasi atau penggunaan terdapat error atau bug kemungkinan karena versi dari PHP yang tidak support.
=======


## Tentang Aplikasi

Aplikasi POS atau point of sales adalah aplikasi yang digunakan untuk mengelola transaksi pada sebuah toko atau oleh kasir. Aplikasi ini dibuat menggunakan Laravel v10.* dan minimal PHP v7.4 jadi apabila pada saat proses instalasi atau penggunaan terdapat error atau bug kemungkinan karena versi dari PHP yang tidak support.
>>>>>>> e352de2936fb3a6add12fc2a6d7117db7a04c320

### Beberapa Fitur yang tersedia:

-   Manajemen Kategori Produk
-   Manajemen Produk
    -   Multiple Delete
    -   Cetak Barcode
-   Manajemen Member atau Anggota
    -   Cetak Kartu Member
-   Manajemen Supplier
-   Transaksi Pengeluaran
-   Transaksi Pembelian
-   Transaksi Penjualan
-   Laporan Pendapatan atau Laba & Rugi
    -   Bulanan
    -   Harian
    -   Custom Tanggal
-   Custom Tipe Nota
    -   Nota Besar
    -   Nota Kecil / Thermal Nota
-   Manajemen User dan Profil
-   Pengaturan Toko
    -   Identitas
    -   Upload Desain Kartu Member
    -   Setting Diskon Member
-   User (Administrator, Kasir)
-   Grafik ChartJS pada Dashboard

## Instalasi

#### Via Git

```bash
git clone https://github.com/HolanTech/holan_eduwork.git
```

<<<<<<< HEAD
=======

>>>>>>> e352de2936fb3a6add12fc2a6d7117db7a04c320
### Setup Aplikasi

Jalankan perintah

```bash
composer update
```

atau:

```bash
composer install
```

Copy file .env dari .env.example

```bash
cp .env.example .env
```

Konfigurasi file .env

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mystore
DB_USERNAME=root
DB_PASSWORD=
```

Opsional

```bash
APP_NAME=MyStore
APP_ENV=local
APP_KEY=base64:QGRW4K7UVzS2M5HE2ZCLlUuiCtOIzRSfb38iWApkphE=
APP_DEBUG=true
APP_URL=http://example-app.test
```

Generate key

```bash
php artisan key:generate
```

Migrate database

```bash
php artisan migrate
```

Seeder table User, Pengaturan

```bash
php artisan db:seed
```

Menjalankan aplikasi

```bash
php artisan serve
```

## License

[MIT license](https://opensource.org/licenses/MIT)
