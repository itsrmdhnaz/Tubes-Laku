<p align="center"><img src="https://github.com/itsrmdhnaz/Tubes-Laku/blob/main/public/logo.svg" height="200" alt="Laku! Logo"></p>

# LAKU! (Laundry ku)

LAKU adalah sebuah inovasi terbaru yang mempermudah masyarakat umum di sekitar Telkom University dalam hal pencucian pakaian. Bagi masyarakat yang memiliki aktivitas padat dan tidak memiliki waktu luang untuk pergi ke tempat laundry secara langsung, LAKU menjadi pilihan yang tepat untuk memenuhi kebutuhan pencucian pakaian mereka. Dengan LAKU, masyarakat umum dapat dengan mudah memesan layanan pencucian pakaian secara online melalui aplikasi atau website. Proses pemesanan mudah dan cepat, hanya dengan beberapa klik saja, dan pakaian akan dijemput oleh tim LAKU di lokasi yang ditentukan oleh pelanggan. Setelah dicuci, pakaian akan dikembalikan ke lokasi yang sama. Selain itu, LAKU juga menawarkan harga yang terjangkau dan transparan, dengan tarif yang sudah termasuk ongkos kirim dan layanan jemput antar. Hal ini tentunya sangat memudahkan bagi masyarakat umum yang ingin menghemat waktu dan biaya dalam mencuci pakaian. LAKU menawarkan berbagai macam pilihan layanan, termasuk pencucian reguler, dry cleaning, serta layanan setrika. Semua pakaian yang dicuci dijamin bersih dan rapi, dengan proses pencucian yang aman dan ramah lingkungan. Secara keseluruhan, LAKU adalah solusi praktis dan efektif bagi masyarakat umum di sekitar Telkom University yang ingin memenuhi kebutuhan pencucian pakaian dengan mudah dan cepat. Dengan LAKU, masyarakat umum dapat lebih fokus pada aktivitas harian mereka tanpa harus khawatir tentang pencucian pakaian mereka. 

Web Aplikasi ini di khususkan untuk pengguna seperti :
1. Masyarakat umum di sekitar Telkom University.

Fitur LAKU! :
1. Login & Logout
2. Melakukan pemesanan laundry
3. Memasukan koleksi laundry yang tersedia
4. Menerima order laundry
5. Pemberitahuan notif
6. Pencatatan transaksi
7. Melacak pesanan
8. Daftar pesanan
9. Ulasan Pelanggan

## Panduan Deployment Aplikasi

### 1. Siapkan tools untuk menyiapkan server web, ada beberapa tools yang bisa digunakan:
- [XAMPP](https://www.apachefriends.org/)
- [Laragon](https://laragon.org/)
- [MAMP](https://www.mamp.info/en/mamp/windows/)
- [EasyPHP](https://www.easyphp.org/)
- [Winginx](https://winginx.com/en/)
- [WAMPServer](https://sourceforge.net/projects/wampserver/files/)

### 2. Tools lainnya
- [IDE Visual Studio Code](https://code.visualstudio.com/download) (opsional ada IDE alternatif lain)
- [Composer](https://getcomposer.org/download/)
- [NodeJS](https://nodejs.org/en/download/current) (opsional)

> PHP version: 8.1, MySQL: 8.0.30

### 3. Install dan Update dependencies Composer
```bash
composer update
```
```bash
composer install
```
> **Note:** Penting untuk dicatat bahwa sebelum mengkloning proyek Laravel, langkah awal yang harus dilakukan adalah menjalankan perintah `composer update` diikuti oleh `composer install`. Ini penting karena proses `composer update` memperbarui versi dependensi ke versi terbaru yang kompatibel dengan proyek saat ini. Setelah itu, `composer install` akan menginstal semua dependensi yang diperlukan berdasarkan versi yang telah diperbarui. Dengan demikian, proses ini memastikan bahwa proyek akan berjalan dengan lancar dan menghindari masalah kompatibilitas dengan versi dependensi yang lebih lama.

### 4. Generate App Key
```bash
php artisan key:generate
```
> **Note:** 
Langkah ini sangat penting pada saat deployment karena perintah php artisan key:generate menghasilkan kunci aplikasi yang penting untuk keamanan Laravel. Kunci ini digunakan untuk enkripsi cookie dan sesi, sehingga sangat vital untuk menjaga keamanan aplikasi. Tanpa kunci yang dihasilkan, aplikasi mungkin menjadi rentan terhadap serangan keamanan. Sehingga, menjalankan perintah ini pada tahap deployment sangatlah penting untuk memastikan bahwa kunci aplikasi yang unik dan aman telah digenerate.

### 5. Konfigurasi .env aplikasi 
Atur konfigurasi aplikasi, seperti nama database, Api key Third Party dan sebagainya, yang tersimpan dalam file .env.
Contoh:  `DB_HOST`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`, `DB_PORT`
> **Note:** Jika `.env` tidak ada maka buat file dengan nama .env pada top level lalu gunakan isi .env.example untuk konfigurasi default

### 6. Melakukan Migration Database
```bash
php artisan migrate 
```

### 7. Create Symbolic link

Digunakan untuk membuat tautan simbolis antara direktori publik dengan penyimpanan file pribadi.

```bash
php artisan link:storage
```

### 8. Kompilasi dan Persiapan Aplikasi 

> **Note:** Jika dalam proses pemgembangan
npm run dev biasanya digunakan untuk memulai proses pengembangan (development process). Ini akan mengaktifkan alur kerja pengembangan lokal yang memungkinkan Anda untuk mengedit file CSS dan JavaScript Anda dengan cepat dan melihat perubahan secara langsung dalam browser anda tanpa perlu membangun ulang secara manual setiap kali terjadi perubahan.
```bash
npm run dev
```

>**Note:** Ketika aplikasi Anda siap untuk produksi,

npm run build digunakan untuk membangun aplikasi web dengan mengkompilasi kode sumbernya ke dalam format yang lebih efisien dan siap untuk dideploy ke lingkungan produksi. Ini termasuk penggabungan file, minifikasi kode, dan optimisasi lainnya untuk meningkatkan kinerja dan mengurangi ukuran file.

```bash
npm run build
```

>**Note:** Jika dalam mode Production
npm run production adalah perintah yang digunakan untuk membangun aplikasi dalam mode produksi. Ini berarti bahwa alat penyiapan seperti Webpack akan mengoptimalkan aset dan mengonfigurasi aplikasi agar siap untuk digunakan di lingkungan produksi. Hasilnya adalah versi aplikasi yang dioptimalkan untuk kinerja dan efisiensi maksimal saat dijalankan dalam lingkungan produksi. Proses ini memastikan bahwa aplikasi siap untuk dideploy ke server produksi setelah menjalankan npm run production.

### 8. Run App

```bash
php artisan serve
```

## API Reference

#### POST login for get `bearer_token`

```bash
POST /api/login
```

| Parameter      | Type     | Description                |
| :------------- | :------- | :------------------------- |
| `email` | `string` | **Required**. Your user email |
| `password` | `string` | **Required**. Your password email |

#### Get all items

```bash
GET /api/items
```

| Parameter      | Type     | Description                |
| :------------- | :------- | :------------------------- |
| `bearer_token` | `string` | **Required**. Your API key |

#### Get order by id

```bash
GET /api/order/{id}
```

| Parameter      | Type     | Description                |
| :------------- | :------- | :------------------------- |
| `id` | `string` | **Required**. order id|
| `bearer_token` | `string` | **Required**. Your API key |



### Susunan Tim

NIM        | Nama                  | Username Github
-----------|-----------------------| ---------------
6706220050 | Ahmad Faza Alfarisi   | Alfa1809
6706220088 | M Ihsan Firjatulloh A | mihsnfaa
6706223026 | Ramadhan Abdul Aziz   | itsrmdhnaz
