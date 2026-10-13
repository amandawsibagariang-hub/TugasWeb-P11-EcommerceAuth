TUGAS RUTIN 11 - E-COMMERCE DB + SECURE AUTH

ISI PROJECT
- 7 tabel: users, categories, products, carts, cart_items, orders, order_items
- Foreign key + cascade
- Seeder + Factory 50 produk
- Model relationships
- Product scopeActive()
- Login, Register, Logout
- Role admin/editor/user
- Custom RoleMiddleware
- Product Policy untuk create/update/delete
- Route protection
- Route model binding
- Pagination
- Validasi + error + old input
- CSRF + PUT + DELETE
- 5 query Tinker untuk dokumentasi

CARA MENJALANKAN DI WINDOWS/XAMPP

1. Ekstrak ZIP ke:
   C:\xampp\htdocs\TugasWeb-P11-EcommerceAuth

2. Buka folder tersebut di VS Code.

3. Buka terminal VS Code:
   cd C:\xampp\htdocs\TugasWeb-P11-EcommerceAuth

4. Install dependency:
   composer install

5. Buat .env:
   copy .env.example .env

6. Buat database MySQL di phpMyAdmin:
   ecommerce_db

7. Pastikan .env:
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=ecommerce_db
   DB_USERNAME=root
   DB_PASSWORD=

8. Generate APP_KEY:
   php artisan key:generate

9. Install frontend:
   npm install
   npm run build

10. Buat tabel + data:
    php artisan migrate:fresh --seed

11. Jalankan:
    php artisan serve

12. Buka:
    http://127.0.0.1:8000

AKUN TEST

ADMIN
Email: admin@gmail.com
Password: password
Bisa: lihat, tambah, edit, hapus

EDITOR
Email: editor@gmail.com
Password: password
Bisa: lihat, tambah, edit
Tidak bisa: hapus

USER
Email: user@gmail.com
Password: password
Bisa: lihat
Tidak bisa: tambah/edit/hapus

5 QUERY TINKER UNTUK SCREENSHOT

php artisan tinker

1. App\Models\Product::count();

2. App\Models\Product::with('category')->first();

3. App\Models\Product::active()->count();

4. App\Models\Category::with('products')->first();

5. App\Models\Product::where('price', '>', 1000000)->get();

CATATAN
Folder vendor dan node_modules tidak disertakan karena ukurannya besar.
Jalankan composer install dan npm install setelah ZIP diekstrak.
Breeze dicantumkan sebagai dependency dev dan fitur autentikasi sudah disiapkan di project.
