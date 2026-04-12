<?php
/**
 * Manage News Admin Page
 */

session_start();

// Simple auth check
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    // Check if coming from login form
    $admin_password = 'abkig2024';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
        if ($_POST['password'] === $admin_password) {
            $_SESSION['admin'] = true;
        } else {
            // Redirect back to index
            header('Location: index.php');
            exit;
        }
    } else {
        header('Location: index.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Berita — Admin ABKIG</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: 'Jost', sans-serif;
            background: #f5f1e8;
            color: #0D1B2A;
        }
        
        .admin-container {
            display: grid;
            grid-template-columns: 250px 1fr;
            min-height: 100vh;
        }
        
        .admin-sidebar {
            background: linear-gradient(135deg, #0D1B2A 0%, #1A2633 100%);
            padding: 2rem 1.5rem;
            color: white;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        
        .admin-logo {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 2rem;
        }
        
        .admin-nav {
            list-style: none;
        }
        
        .admin-nav-item {
            margin-bottom: 1rem;
        }
        
        .admin-nav-link {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            display: block;
            padding: 0.8rem 1rem;
            border-radius: 4px;
            transition: all 0.3s;
            border-left: 3px solid transparent;
        }
        
        .admin-nav-link:hover,
        .admin-nav-link.active {
            background: rgba(212, 175, 55, 0.2);
            color: #D4AF37;
            border-left-color: #D4AF37;
        }
        
        .admin-logout {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .admin-logout a {
            color: rgba(255, 107, 53, 0.8);
            text-decoration: none;
            padding: 0.8rem 1rem;
            display: block;
            border-radius: 4px;
            transition: all 0.3s;
        }
        
        .admin-logout a:hover {
            background: rgba(255, 107, 53, 0.1);
            color: #FF6B35;
        }
        
        .admin-content {
            padding: 2rem;
            overflow-y: auto;
        }
        
        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #e0e0e0;
        }
        
        .admin-title {
            font-size: 2rem;
            font-weight: 600;
            color: #0D1B2A;
        }
        
        .btn {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            background: linear-gradient(135deg, #D4AF37 0%, #FF6B35 100%);
            color: white;
            text-decoration: none;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            transition: transform 0.3s;
            font-family: 'Jost', sans-serif;
        }
        
        .btn:hover {
            transform: translateY(-2px);
        }
        
        .btn-secondary {
            background: transparent;
            color: #D4AF37;
            border: 2px solid #D4AF37;
        }
        
        .btn-danger {
            background: #FF5252;
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
        }
        
        .btn-edit {
            background: #4CAF50;
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
            margin-right: 0.5rem;
        }
        
        .news-table {
            width: 100%;
            background: white;
            border-collapse: collapse;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-top: 1.5rem;
        }
        
        .news-table thead {
            background: linear-gradient(135deg, #0D1B2A 0%, #1A2633 100%);
            color: white;
        }
        
        .news-table th {
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            border-bottom: 2px solid #D4AF37;
        }
        
        .news-table td {
            padding: 1rem;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .news-table tr:hover {
            background: #f9f7f3;
        }
        
        .news-table tr:last-child td {
            border-bottom: none;
        }
        
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.6);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }
        
        .modal.active {
            display: flex;
        }
        
        .modal-content {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            max-width: 700px;
            width: 90%;
            max-height: 80vh;
            overflow-y: auto;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
        }
        
        .modal-header {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 1rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #0D1B2A;
        }
        
        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #e0e0e0;
            border-radius: 4px;
            font-family: 'Jost', sans-serif;
            font-size: 1rem;
        }
        
        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #D4AF37;
        }
        
        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }
        
        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            margin-top: 2rem;
        }
        
        .btn-cancel {
            background: #e0e0e0;
            color: #0D1B2A;
        }
        
        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #5A6B7A;
        }
        
        .empty-state-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        
        @media (max-width: 768px) {
            .admin-container {
                grid-template-columns: 1fr;
            }
            
            .admin-sidebar {
                display: grid;
                grid-template-columns: auto 1fr;
                gap: 1rem;
                padding: 1rem;
            }
            
            .admin-nav {
                display: none;
            }
            
            .news-table {
                font-size: 0.9rem;
            }
            
            .news-table th,
            .news-table td {
                padding: 0.7rem;
            }
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-sidebar">
            <div class="admin-logo">ABKIG</div>
            <ul class="admin-nav">
                <li class="admin-nav-item">
                    <a href="index.php" class="admin-nav-link">Dashboard</a>
                </li>
                <li class="admin-nav-item">
                    <a href="manage-news.php" class="admin-nav-link active">Kelola Berita</a>
                </li>
            </ul>
            <div class="admin-logout">
                <a href="logout.php">Logout</a>
            </div>
        </div>
        
        <div class="admin-content">
            <div class="admin-header">
                <h1 class="admin-title">Kelola Berita & Event</h1>
                <button class="btn" onclick="openAddNewsModal()">+ Tambah Berita</button>
            </div>
            
            <div id="newsList"></div>
        </div>
    </div>
    
    <!-- Add/Edit News Modal -->
    <div id="newsModal" class="modal">
        <div class="modal-content">
            <div class="modal-header" id="modalTitle">Tambah Berita Baru</div>
            
            <form id="newsForm">
                <div class="form-group">
                    <label for="title">Judul Berita</label>
                    <input type="text" id="title" name="title" required>
                </div>
                
                <div class="form-group">
                    <label for="category">Kategori</label>
                    <select id="category" name="category" required>
                        <option value="">Pilih Kategori</option>
                        <option value="Prestasi">Prestasi</option>
                        <option value="Acara">Acara</option>
                        <option value="Program">Program</option>
                        <option value="Berita">Berita</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="excerpt">Ringkasan</label>
                    <textarea id="excerpt" name="excerpt" required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="content">Konten Lengkap</label>
                    <textarea id="content" name="content" required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="image">URL Gambar</label>
                    <input type="url" id="image" name="image" placeholder="https://example.com/image.jpg">
                </div>
                
                <div class="form-group">
                    <label for="date">Tanggal</label>
                    <input type="date" id="date" name="date" required>
                </div>
                
                <div class="form-actions">
                    <button type="button" class="btn btn-cancel" onclick="closeNewsModal()">Batal</button>
                    <button type="submit" class="btn">Simpan Berita</button>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        let currentEditId = null;
        let newsData = [];
        
        // Load news list on page load
        window.addEventListener('load', loadNewsList);
        
        // Add event listener to form
        document.getElementById('newsForm').addEventListener('submit', handleFormSubmit);
        
        function loadNewsList() {
            fetch('./api/get-news.php')
                .then(response => response.json())
                .then(data => {
                    newsData = data.news || [];
                    renderNewsList();
                });
        }
        
        function renderNewsList() {
            const container = document.getElementById('newsList');
            
            if (newsData.length === 0) {
                container.innerHTML = `
                    <div class="empty-state">
                        <div class="empty-state-icon">📰</div>
                        <h3>Belum ada berita</h3>
                        <p>Mulai tambahkan berita atau event pertama Anda</p>
                    </div>
                `;
                return;
            }
            
            let html = '<table class="news-table"><thead><tr><th>Judul</th><th>Kategori</th><th>Tanggal</th><th>Aksi</th></tr></thead><tbody>';
            
            newsData.forEach((news, index) => {
                html += `
                    <tr>
                        <td>${news.title}</td>
                        <td><span style="background: rgba(212, 175, 55, 0.1); padding: 0.3rem 0.8rem; border-radius: 20px; font-size: 0.85rem;">${news.category}</span></td>
                        <td>${new Date(news.date).toLocaleDateString('id-ID')}</td>
                        <td>
                            <button class="btn btn-edit" onclick="editNews(${news.id})">Edit</button>
                            <button class="btn btn-danger" onclick="deleteNews(${news.id})">Hapus</button>
                        </td>
                    </tr>
                `;
            });
            
            html += '</tbody></table>';
            container.innerHTML = html;
        }
        
        function openAddNewsModal() {
            currentEditId = null;
            document.getElementById('modalTitle').textContent = 'Tambah Berita Baru';
            document.getElementById('newsForm').reset();
            document.getElementById('date').valueAsDate = new Date();
            document.getElementById('newsModal').classList.add('active');
        }
        
        function closeNewsModal() {
            document.getElementById('newsModal').classList.remove('active');
        }
        
        function editNews(id) {
            const news = newsData.find(n => n.id == id);
            if (!news) return;
            
            currentEditId = id;
            
            document.getElementById('modalTitle').textContent = 'Edit Berita';
            document.getElementById('title').value = news.title;
            document.getElementById('category').value = news.category;
            document.getElementById('excerpt').value = news.excerpt;
            document.getElementById('content').value = news.content;
            document.getElementById('image').value = news.image || '';
            document.getElementById('date').value = news.date;
            
            document.getElementById('newsModal').classList.add('active');
        }
        
        function handleFormSubmit(e) {
            e.preventDefault();
            
            const newsItem = {
                id: currentEditId,
                title: document.getElementById('title').value,
                category: document.getElementById('category').value,
                excerpt: document.getElementById('excerpt').value,
                content: document.getElementById('content').value,
                image: document.getElementById('image').value,
                date: document.getElementById('date').value
            };
            
            fetch('./api/save-news.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    editIndex: currentEditId,
                    news: newsItem
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    closeNewsModal();
                    loadNewsList();
                    alert('Berita berhasil disimpan!');
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan!');
            });
        }
        
        function deleteNews(id) {
            if (confirm('Apakah Anda yakin ingin menghapus berita ini?')) {
                fetch('./api/delete-news.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ id: id })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        loadNewsList();
                        alert('Berita berhasil dihapus!');
                    } else {
                        alert('Error: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan!');
                });
            }
        }
        
        // Close modal when clicking outside
        document.getElementById('newsModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeNewsModal();
            }
        });
    </script>
</body>
</html>
