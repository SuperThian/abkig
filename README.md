# 🍽️ ABKIG - Akademi Bisnis Kuliner Indonesia Global

Website resmi Akademi Bisnis Kuliner Indonesia Global dengan fitur admin panel untuk mengelola berita & event.

## 📸 Preview

- Modern hero section dengan background image
- Section berita terbaru (3 item)
- Admin panel untuk CRUD berita
- MySQL database backend
- Responsive design

## 🚀 Quick Start

### 1. Clone Repository
```bash
git clone https://github.com/yourusername/abkig.git
cd abkig
```

### 2. Setup Database
**Opsi 1: Import SQL file (Recommended)**
1. Buka phpMyAdmin: `http://localhost/phpmyadmin`
2. Login dengan username: `root`
3. Tab "Import" → Pilih `abkig.sql`
4. Klik "Go"

**Opsi 2: Automatic Setup**
1. Buka `http://localhost:8000/setup.php`
2. Klik tombol "Buat Database"

### 3. Configure Database (Opsional)
Jika MySQL punya password, edit `config/database.php`:
```php
define('DB_PASS', 'your_password');
```

### 4. Access Website
- **Frontend**: `http://localhost:8000`
- **Admin Panel**: `http://localhost:8000/admin`
- **Admin Password**: `admin` / `Admin@123`

## 📁 Folder Structure

```
abkig/
├── admin/                 # Admin panel
│   ├── index.php         # Dashboard & login
│   ├── manage-news.php   # CRUD interface
│   ├── logout.php
│   ├── api/              # REST API
│   │   ├── get-news.php
│   │   ├── save-news.php
│   │   └── delete-news.php
│   └── README.md
├── config/
│   └── database.php      # MySQL config
├── sections/             # Homepage sections
│   ├── hero.php
│   ├── news.php
│   ├── programs.php
│   ├── facilities.php
│   ├── vision-mission.php
│   ├── why-abkig.php
│   └── contact.php
├── includes/             # Reusable components
│   ├── header.php
│   ├── navbar.php
│   ├── footer.php
│   └── fab.php
├── css/
│   └── style.css        # Main styles
├── data/                # Data files (backup)
│   └── news.json       # Backup JSON data
├── abkig.sql           # Database setup script
├── setup.php           # Setup wizard
├── index.php           # Homepage
├── news.php            # News page
├── investasi.php
└── README.md           # This file
```

## 🔐 Admin Credentials

| Field | Value |
|-------|-------|
| Username | `admin` |
| Password | `Admin@123` |

**⚠️ Change in Production!**

Ganti password di `admin/index.php` (line ~8) dan `admin/manage-news.php` (line ~11)

## 🗄️ Database Tables

### news
- id, title, category, excerpt, content, image, date
- created_at, updated_at timestamps

### admin
- id, username, email, password (BCrypt), full_name, role, status
- last_login, created_at, updated_at

### activity_log (optional)
- id, admin_id, action, description, created_at

## 📋 Features

### Frontend
- ✅ Modern hero section
- ✅ News/Event showcase (3 latest)
- ✅ Programs section
- ✅ Facilities section
- ✅ Vision & Mission section
- ✅ Contact form
- ✅ Responsive design
- ✅ Smooth navigation

### Admin Panel
- ✅ Secure login
- ✅ Dashboard statistics
- ✅ View all news
- ✅ Add news
- ✅ Edit news
- ✅ Delete news
- ✅ Real-time updates

## 🛠️ Technology Stack

- **Frontend**: HTML5, CSS3, JavaScript
- **Backend**: PHP 7.4+
- **Database**: MySQL 5.7+
- **Font**: Jost (Google Fonts)

## 📚 Documentation

- [QUICK_START.md](QUICK_START.md) - Setup guide
- [MIGRATION_GUIDE.md](MIGRATION_GUIDE.md) - JSON to MySQL migration
- [ARCHITECTURE.md](ARCHITECTURE.md) - System architecture
- [admin/README.md](admin/README.md) - Admin panel docs

## 🔒 Security Notes

- Store database credentials in `.env` file (for production)
- Use strong admin passwords
- Enable HTTPS in production
- Regular database backups
- Update dependencies regularly
- Run security audit before deployment

## 📦 Installation Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx)
- Git (for version control)

## 🚨 Troubleshooting

### Database Connection Error
1. Check MySQL is running
2. Verify credentials in `config/database.php`
3. Database name should be `abkig`

### Admin Login Fails
1. Verify password is correct
2. Check `admin/index.php` settings
3. Clear browser cookies

### News Not Displaying
1. Verify data exists in database
2. Check `abkig.sql` has been imported
3. Refresh page and clear cache

## 🤝 Contributing

1. Fork repository
2. Create feature branch
3. Commit changes
4. Push to branch
5. Create Pull Request

## 📄 License

MIT License - feel free to use for educational & commercial projects

## 📞 Support

For issues, questions, or suggestions:
- Open an issue on GitHub
- Check existing documentation
- Review ARCHITECTURE.md for system design

## 🎉 Changelog

### v1.0 (2024-04-12)
- Initial release
- Hero section redesign
- Admin panel with CRUD
- MySQL database setup
- Full documentation

---

**Created with ❤️ for ABKIG**
