# 🔄 Migrasi dari JSON ke MySQL Database

Sistem ABKIG telah diperbarui menggunakan MySQL database untuk penyimpanan data yang lebih reliable dan scalable.

## ⚙️ Instalasi & Setup

### 1. Akses Setup Page
Buka URL di browser:
```
http://localhost:8000/setup.php
```
(Sesuaikan dengan localhost path Anda)

### 2. Pastikan MySQL Running
- **XAMPP**: Start Apache & MySQL dari XAMPP Control Panel
- **WAMP**: Start WampServer
- **MAMP**: Start dari MAMP

### 3. Konfigurasi Database (Opsional)
File: `config/database.php`

Jika MySQL Anda punya password, edit:
```php
define('DB_USER', 'root');
define('DB_PASS', ''); // Ganti dengan password MySQL Anda
```

### 4. Jalankan Setup
Klik tombol "Buat Database" di halaman setup.php

Sistem akan:
- ✓ Membuat database `abkig`
- ✓ Membuat tabel `news`
- ✓ Insert 3 sample data

## 📁 Struktur Baru

```
config/
  └── database.php          (Konfigurasi koneksi MySQL)

admin/
  ├── api/
  │   ├── get-news.php      (Fetch dari database)
  │   ├── save-news.php     (Insert/Update)
  │   └── delete-news.php   (Delete)
  └── manage-news.php       (CRUD Interface)

sections/
  └── news.php              (Fetch dari database)

news.php                     (Fetch semua berita dari database)
setup.php                    (Database installation)
```

## 🗄️ Database Schema

### Tabel: `news`
| Field | Type | Keterangan |
|-------|------|-----------|
| id | INT AUTO_INCREMENT | Primary Key |
| title | VARCHAR(255) | Judul berita |
| category | VARCHAR(100) | Kategori |
| excerpt | TEXT | Ringkasan |
| content | LONGTEXT | Konten lengkap |
| image | VARCHAR(500) | URL gambar |
| date | DATE | Tanggal publikasi |
| created_at | TIMESTAMP | Dibuat otomatis |
| updated_at | TIMESTAMP | Diperbarui otomatis |

## ✅ Verifikasi Setup

### Melalui phpMyAdmin
1. Buka `http://localhost/phpmyadmin`
2. Login dengan username: `root` (tanpa password)
3. Klik database `abkig`
4. Seharusnya ada tabel `news` dengan 3 sample data

### Melalui Admin Panel
1. Akses `http://localhost:8000/admin/`
2. Login dengan password: `abkig2024`
3. Seharusnya ada 3 berita di dashboard

## 🚨 Troubleshooting

### Error: "Connection failed"
**Solusi:**
- Pastikan MySQL server running
- Cek username & password di `config/database.php`
- Check file permissions folder

### Error: "Database already exists"
Setup akan skip membuat database tapi tetap working fine. Tabel akan di-check dan di-create jika belum ada.

### Berita tidak muncul di admin
**Solusi:**
- Refresh halaman
- Clear browser cache
- Check database connection di `config/database.php`

### Error 500 saat save berita
**Solusi:**
- Check PHP error log
- Verify database connection
- Pastikan user MySQL punya permission INSERT/UPDATE/DELETE

## 📋 Operasi MySQL Manual

Jika ingin test query manual di phpMyAdmin:

### Lihat semua berita
```sql
SELECT * FROM news ORDER BY date DESC;
```

### Tambah berita
```sql
INSERT INTO news (title, category, excerpt, content, image, date) 
VALUES ('Judul', 'Prestasi', 'Ringkasan', 'Konten', 'URL', '2024-04-12');
```

### Edit berita
```sql
UPDATE news SET title='Judul Baru' WHERE id=1;
```

### Hapus berita
```sql
DELETE FROM news WHERE id=1;
```

## 🔐 Security Notes

- Change admin password di `admin/index.php` & `admin/manage-news.php`
- Gunakan HTTPS di production
- Setup proper authentication system
- Regular backup database

## 📦 Hapus Setup File

Setelah setup selesai, Anda bisa hapus file ini:
```
setup.php
```

Atau biarkan untuk reference/reinstall kemudian jika diperlukan.

## 🆘 Support

Jika ada error/pertanyaan, cek:
1. `config/database.php` - Pastikan konfigurasi benar
2. phpMyAdmin - Pastikan tabel ada dan data tersimpan
3. Admin panel - Test tambah/edit/hapus berita
4. Browser console - Cek error messages

---

**Catatan:** Migrasi dari JSON ke MySQL selesai. Semua fitur CRUD sudah bekerja dengan database.
