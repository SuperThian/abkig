# ✅ SETUP ABKIG dengan MySQL Database

Sistem ABKIG sudah berhasil dimigrasi dari JSON ke MySQL Database!

## 📋 Checklist Setup

```
✓ Membuat config/database.php
✓ Membuat setup.php (wizard installer)
✓ Update admin API (get/save/delete news)
✓ Update frontend (sections & news.php)
✓ Dokumentasi lengkap
```

---

## 🚀 LANGKAH SETUP (Penting!)

### 1. Pastikan MySQL Running
- **XAMPP Users**: Buka XAMPP Control Panel → start MySQL
- **WAMP Users**: Start WampServer
- **MAMP Users**: Start MAMP

### 2. Buka Setup Wizard
Akses di browser:
```
http://localhost:8000/setup.php
```
(Ganti 8000 dengan port Anda jika berbeda)

### 3. Klik Tombol "Buat Database"
Setup akan:
- ✓ Membuat database `abkig`
- ✓ Membuat tabel `news`
- ✓ Insert 3 sample data berita

**Selesai!** Database sudah siap digunakan.

---

## 🔐 Akses Admin Panel

**URL:** `http://localhost:8000/admin/`
**Password:** `abkig2024`

### Fitur Admin:
- Dashboard dengan statistik
- Tambah berita baru
- Edit berita
- Hapus berita
- Daftar semua berita

---

## 🗄️ Database Configuration

File: `config/database.php`

Jika MySQL Anda punya password, edit:
```php
define('DB_USER', 'root');
define('DB_PASS', 'your_password_here');
define('DB_NAME', 'abkig');
```

---

## ✅ Verifikasi Setup Berhasil

### Option 1: phpMyAdmin
1. Buka `http://localhost/phpmyadmin`
2. Login (default: root, tanpa password)
3. Lihat database `abkig` dan tabel `news`
4. Seharusnya ada 3 sample data

### Option 2: Admin Panel
1. Akses `/admin/`
2. Login dengan password
3. Dashboard menunjukkan total berita = 3

### Option 3: Frontend
1. Buka halaman utama `index.php`
2. Scroll ke section "Update Terbaru dari ABKIG"
3. Seharusnya ada 3 berita tampil

---

## 📁 File Structure

```
ABKIG/
├── config/
│   └── database.php          ← BARU: Konfigurasi MySQL
├── admin/
│   ├── index.php             (Dashboard)
│   ├── manage-news.php       (CRUD interface)
│   ├── logout.php
│   ├── README.md
│   └── api/
│       ├── get-news.php      (Fetch dari database)
│       ├── save-news.php     (Insert/Update)
│       └── delete-news.php   (Delete)
├── sections/
│   └── news.php              (Updated: query database)
├── news.php                  (Updated: query database)
├── setup.php                 ← BARU: Database installer
├── MIGRATION_GUIDE.md        ← BARU: Panduan migrasi
└── ... (files lainnya)
```

---

## 🔄 Operasi Database

### Tambah Berita via Admin Panel
1. Login ke `/admin/`
2. Klik "Kelola Berita & Event"
3. Klik "Tambah Berita"
4. Isi form dan klik "Simpan Berita"

### Edit Berita
1. Bukas daftar berita
2. Klik tombol "Edit" pada berita
3. Ubah isi form
4. Klik "Simpan Berita"

### Hapus Berita
1. Buka daftar berita
2. Klik tombol "Hapus"
3. Konfirmasi penghapusan

### Lihat Berita di Frontend
1. Halaman utama: muncul 3 berita terbaru
2. Halaman penuh: buka `/news.php`

---

## 🛠️ Konfigurasi Lanjutan

### Ubah Admin Password
Edit file `admin/index.php` (baris ~8):
```php
$admin_password = 'password_baru_anda';
```

Ubah juga di `admin/manage-news.php` (baris ~11)

### Ubah Database Name/Credentials
Edit `config/database.php`:
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'abkig');
```

---

## 📊 Database Schema

### Tabel: `news`
| Field | Type | Deskripsi |
|-------|------|-----------|
| id | INT AUTO_INCREMENT | Primary Key |
| title | VARCHAR(255) | Judul berita |
| category | VARCHAR(100) | Kategori (Prestasi, Acara, Program) |
| excerpt | TEXT | Ringkasan singkat |
| content | LONGTEXT | Konten lengkap |
| image | VARCHAR(500) | URL gambar |
| date | DATE | Tanggal publikasi |
| created_at | TIMESTAMP | Waktu dibuat (otomatis) |
| updated_at | TIMESTAMP | Waktu diupdate (otomatis) |

---

## 🚨 Troubleshooting

### Error: Connection failed
```
Solution:
1. Pastikan MySQL service running
2. Check credentials di config/database.php
3. Buka phpMyAdmin untuk verify MySQL akses
```

### Error: Database already exists
```
Solution: Normal! Setup akan skip membuat DB tapi tetap working.
Tabel akan di-create otomatis jika belum ada.
```

### Berita tidak muncul
```
Solution:
1. Refresh halaman (clear cache)
2. Check phpMyAdmin - lihat data di tabel news
3. Verify config/database.php credentials
4. Check browser console untuk error
```

### Admin login gagal
```
Solution:
1. Pastikan password benar (default: abkig2024)
2. Check file admin/index.php - pastikan tidak ada typo
3. Clear browser cache dan cookies
```

---

## 📦 Backup Database

### Manual Export via phpMyAdmin
1. Buka phpMyAdmin
2. Select database `abkig`
3. Click "Export"
4. Download SQL file

### Command Line (Local)
```bash
mysqldump -u root -p abkig > backup_abkig.sql
```

---

## 🔒 Sebelum Production

Checklist sebelum di-deploy ke production:
- [ ] Ubah admin password (jangan gunakan default)
- [ ] Ubah database user & password
- [ ] Setup MySQL user dengan proper permissions
- [ ] Gunakan HTTPS untuk admin panel
- [ ] Regular database backups
- [ ] Setup proper authentication system
- [ ] Hapus file setup.php (atau protect dengan password)
- [ ] Test semua fitur (tambah/edit/hapus)

---

## 📞 Bantuan & Support

Jika ada error:
1. Check `MIGRATION_GUIDE.md`
2. Review file `admin/README.md`
3. Check `config/database.php` - pastikan konfigurasi benar
4. Test di phpMyAdmin - pastikan data ada
5. Check browser console - lihat error messages

---

## 🎉 ✨ Selesai!

Sistem ABKIG dengan MySQL Database sudah siap digunakan!

**Next Steps:**
1. Setup database lewat setup.php
2. Login ke admin panel
3. Tambahkan berita/event
4. Verifikasi di frontend
5. Lanjutkan dengan fitur lainnya

---

**Happy Coding! 🚀**
