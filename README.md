
# LAUNDRY PINTAR
**LAUNDRY PINTAR**, merupakan sebuah suatu aplikasi berbasis web yang berfungsi sebagai media yang memudahkan pemilik usaha dalam pekerjaan.Aplikasi ini merupakan apikasi yang bersifat online sehingga dibuat untuk memudahkan para penggunanya.Aplikasi ini dapat melakukan tambah paket, member, user, outlet serta dapat melakukan input transaksi dan cetak laporan.Setiap user juga memiliki tampilan dan fitur masing-masing.
# FITUR ADMIN
- Login
- Dashboard(cetak laporan disini)
- Daftar Paket(untuk pemesanan)
- Outlet
- Pelanggan
- Manage User
- Paket Laundry
- Transaksi
# FITUR KASIR
- Login
- Dashboard(cetak laporan disini)
- Daftar Paket(untuk pemesanan)
- Pelanggan
- Transaksi
# FITUR OWNER
- Login
- Dashboard(cetak laporan disini)
# PERSYARATAN
- Composer Terbaru
- Xampp Terbaru
- Php Version 8.0+ atau di atasnya
# CARA INSTALASI
- Install composer dan Xampp.
- Melakuakan git clone https://github.com/rootx3/laundrypintar.
- Menjalankan composer install.
- Membuat .env pada folder yang sudah di download.
- Membuat database sesuai yang ada di .env.
- Melakukan php artisan key:generate.
- Melakukan php artisan cache:clear.
- Melakukan php artisan route:clear;
- Melakukan php migrate:fresh –seed.
- Melakukan php artisan serve.
# USER UNTUK LOGIN
- **USERNAME** : admin ,**PASSWORD** : admin123
- **USERNAME** : admin2 ,**PASSWORD** : admin234 (masuk sebagai admin di outlet 2)
- **USERNAME** : kasir ,**PASSWORD** : kasir123
- **USERNAME** : owner ,**PASSWORD** : owner123