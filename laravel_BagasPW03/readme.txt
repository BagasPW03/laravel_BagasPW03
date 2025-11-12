LARAVEL CRUD - RUMAH SAKIT & PASIEN
===================================

Cara Menjalankan:
-----------------
1. Buka terminal di folder proyek.
2. Jalankan perintah:
   composer install
   cp .env.example .env
3. Buat database (misal: laravel_bagaspw03) lalu ubah pengaturan DB di file .env.
4. Jalankan:
   php artisan key:generate
   php artisan migrate
5. Jalankan server:
   php artisan serve
6. Buka di browser:
   http://localhost:8000

Login / Register:
-----------------
- Karena tidak ada seeder untuk user, silakan **register akun baru** terlebih dahulu di halaman register.
- Setelah itu, login menggunakan akun yang baru dibuat.
