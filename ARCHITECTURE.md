# ABKIG System Architecture

## Database Flow Diagram

```
┌─────────────────────────────────────────────────────────────┐
│                      MySQL Database                        │
│  (abkig → news tabel)                                      │
│  - id, title, category, excerpt, content, image, date     │
│  - created_at, updated_at                                 │
└─────────────────┬───────────────────────────────────────────┘
                  │
        ┌─────────┴──────────┐
        │                    │
        ▼                    ▼
┌──────────────────────┐  ┌──────────────────────┐
│  config/database.php │  │   setup.php          │
│                      │  │                      │
│ - Konfigurasi MySQL  │  │ - Database installer │
│ - Koneksi mysqli     │  │ - Create DB & table  │
│ - Error handling     │  │ - Insert sample data │
└──────────────────────┘  └──────────────────────┘
        │                          │
        └──────────────┬───────────┘
                       │
    ┌──────────────────┴──────────────────┐
    │                                     │
    ▼                                     ▼
┌─────────────────────────┐  ┌─────────────────────────┐
│  admin/api/             │  │  Frontend (Public)      │
├─────────────────────────┤  ├─────────────────────────┤
│ get-news.php            │  │ sections/news.php       │
│ - SELECT * FROM news    │  │ - Fetch 3 latest       │
│                         │  │ - Display in homepage  │
│ save-news.php           │  │                        │
│ - INSERT/UPDATE         │  │ news.php               │
│ - Prepared statements   │  │ - Fetch all news       │
│                         │  │ - Full page view       │
│ delete-news.php         │  │                        │
│ - DELETE query          │  │ index.php (hero + nav) │
│                         │  │ + footer, contact, etc │
└───────────┬─────────────┘  └────────────────────────┘
            │
            │
            ▼
┌──────────────────────────────┐
│  admin/manage-news.php       │
│                              │
│ - Fetch semua berita (api)   │
│ - Render table admin         │
│ - Form tambah/edit berita    │
│ - Delete confirm dialog      │
│ - CRUD operations            │
│ - Real-time updates          │
└──────────┬───────────────────┘
           │
           ▼
┌──────────────────────────────┐
│  admin/index.php             │
│                              │
│ - Authentication (password)  │
│ - Dashboard stats            │
│ - Navigation menu            │
│ - Fetch total berita count   │
└──────────────────────────────┘
```

## API Endpoints

```
GET  /admin/api/get-news.php
     └─ Returns: json { success, news[] }
     └─ Query: SELECT * FROM news

POST /admin/api/save-news.php
     ├─ Body: { editIndex, news{...} }
     ├─ InsertMode: INSERT INTO news
     └─ UpdateMode: UPDATE news WHERE id=?

POST /admin/api/delete-news.php
     ├─ Body: { id }
     └─ Query: DELETE FROM news WHERE id=?
```

## File Dependencies

```
config/database.php
    ├── admin/api/
    │   ├── get-news.php
    │   ├── save-news.php
    │   └── delete-news.php
    ├── admin/manage-news.php
    │   └── GET requests ke admin/api/
    ├── admin/index.php
    │   └── GET requests ke admin/api/get-news.php
    ├── sections/news.php
    │   └── Direct query: SELECT * FROM news LIMIT 3
    └── news.php
        └── Direct query: SELECT * FROM news
```

## Data Flow

### 1. Admin Tambah Berita
```
Form Input → manage-news.js → POST /api/save-news.php 
  → config/db.php → mysqli INSERT 
  → Response JSON 
  → refresh table via GET /api/get-news.php
```

### 2. Admin Edit Berita
```
Edit Button → editNews(id) → Fill Form 
  → Form Submit 
  → POST /api/save-news.php (dengan id)
  → Update Query 
  → Response JSON 
  → Refresh table
```

### 3. Admin Hapus Berita
```
Delete Button → Confirm Dialog 
  → DELETE /api/delete-news.php (dengan id)
  → Query DELETE 
  → Response JSON 
  → Refresh table
```

### 4. Frontend Display (Homepage)
```
sections/news.php → Query: SELECT * FROM news LIMIT 3
  → Loop & render cards 
  → Display 3 latest + link ke /news.php
```

### 5. Frontend Display (Full Page)
```
news.php → Query: SELECT * FROM news DESC
  → Loop & render articles 
  → Full content display
```

## Database Connection Pool

```
┌────────────────────┐
│ MySQL Server       │
│ (localhost:3306)   │
└────────────────────┘
        ▲
        │ mysqli connection
        │
    Include config/database.php
        │
        ├─ admin/api/*.php
        ├─ admin/manage-news.php
        ├─ admin/index.php
        ├─ sections/news.php
        └─ news.php
```

## Security Layer

```
┌──────────────────────────────────┐
│        Public Frontend           │
│ (index.php, news.php)            │
│ - No auth required               │
│ - Read-only access               │
└──────────────┬───────────────────┘
               │
┌──────────────▼───────────────────┐
│     Private Admin Panel          │
│ (admin/)                         │
│ - Password authentication        │
│ - Session management             │
│ - CRUD operations                │
└──────────────┬───────────────────┘
               │
┌──────────────▼───────────────────┐
│       Database Layer             │
│ (config/database.php)            │
│ - MySQLi connection              │
│ - Prepared statements            │
│ - Error handling                 │
└──────────────────────────────────┘
```

---

## Setup Sequence

```
1. User navigates browser
   ↓
2. setup.php
   ├─ Check MySQL connection
   ├─ Create database 'abkig'
   ├─ Create table 'news'
   ├─ Insert sample data
   └─ Success message
   ↓
3. config/database.php initialized
   ├─ Connection details set
   └─ Ready for queries
   ↓
4. Admin Panel accessible
   ├─ /admin/ → login page
   ├─ manage-news.php → CRUD interface
   └─ API endpoints → database operations
   ↓
5. Frontend reads from DB
   ├─ sections/news.php → latest 3
   └─ news.php → all news
```

---

## Technology Stack

```
Frontend:
  ├─ HTML5
  ├─ CSS3 (Jost font)
  ├─ JavaScript (vanilla)
  └─ Fetch API (Ajax)

Backend:
  ├─ PHP (mysqli)
  ├─ MySQL Database
  └─ Prepared Statements

Architecture:
  ├─ MVC-like (separate concerns)
  ├─ RESTful API design
  └─ JSON for data transfer
```

---

**Last Updated:** April 2024
**Version:** 1.0 (MySQL)
