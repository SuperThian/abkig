# Admin Panel ABKIG

## 🚀 Quick Start

### 1. Setup Database
1. Pastikan MySQL server sudah running
2. Buka: `http://localhost:8000/setup.php`
3. Klik tombol "Buat Database"
4. Setup selesai!

### 2. Akses Admin Panel

1. URL: `http://localhost:8000/admin/`
2. Password: `abkig2024`

**⚠️ PENTING**: Ubah password ini di `admin/index.php` sebelum production!

## 📱 Fitur Admin Panel

### Dashboard
- Total berita statistics
- System status

### Kelola Berita & Event
- **Tambah** berita & event baru
- **Edit** berita yang sudah ada
- **Hapus** berita (dengan konfirmasi)
- **View** daftar semua berita

### Form Input
- Judul
- Kategori (Prestasi, Acara, Program, Berita)
- Ringkasan
- Konten lengkap
- URL Gambar (HTTPS)
- Tanggal publikasi

## 🗄️ Database Info

**Database Name:** `abkig`
**Table:** `news`

Tabel automatically created dengan fields:
- id, title, category, excerpt, content, image, date
- created_at, updated_at (timestamps)

## 🔗 Integration

- Admin panel menyimpan ke MySQL database
- Halaman utama menampilkan 3 berita terbaru
- Halaman `/news.php` menampilkan semua berita

## ⚙️ Konfigurasi

### MySQL Credentials
File: `config/database.php`

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', ''); // Ubah jika ada password
define('DB_NAME', 'abkig');
```

### Admin Password
File: `admin/index.php` & `admin/manage-news.php`

```php
$admin_password = 'abkig2024'; // Ubah ke password baru
```

## 🗃️ Backup Data

Backup database MongoDB using phpMyAdmin:
1. Login phpMyAdmin
2. Select database `abkig`
3. Export → download SQL file

## 📚 Learning Resources

- **Migrasi Guide:** `/MIGRATION_GUIDE.md`
- **Setup Helper:** `/setup.php`
- **API Docs:** Check `/admin/api/` files

## 🛠️ Troubleshooting

### Database Connection Error
- Check MySQL is running
- Verify credentials in `config/database.php`
- Check folder permissions

### Berita tidak muncul
- Refresh browser & clear cache
- Check phpMyAdmin - verify data exists
- Check browser console for errors

### FIle Permission Issues
Set permissions:
```bash
chmod 755 config/
chmod 755 admin/
```

## 🔒 Security Checklist

- [ ] Change admin password
- [ ] Use HTTPS in production
- [ ] Setup proper authentication
- [ ] Regular database backups
- [ ] Delete setup.php after setup

---

**Support:** Hubungi tim development untuk bantuan lebih lanjut.

