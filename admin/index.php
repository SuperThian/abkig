<?php
/**
 * Admin Dashboard
 * Simple admin panel untuk ABKIG
 */

session_start();

// Simple session/auth check (untuk production, gunakan proper auth)
$admin_password = 'abkig2024'; // CHANGE THIS IN PRODUCTION
$is_authenticated = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
    if ($_POST['password'] === $admin_password) {
        $_SESSION['admin'] = true;
        $is_authenticated = true;
    } else {
        $error = 'Password salah!';
    }
}

if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
    $is_authenticated = true;
}

// If not authenticated, show login
if (!$is_authenticated) {
    ?>
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Login — ABKIG</title>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@200;300;400;500;600&display=swap" rel="stylesheet">
        <style>
            * { margin: 0; padding: 0; box-sizing: border-box; }
            
            body {
                font-family: 'Jost', sans-serif;
                background: linear-gradient(135deg, #0D1B2A 0%, #1A2633 100%);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            
            .login-container {
                background: white;
                padding: 3rem;
                border-radius: 8px;
                box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
                max-width: 400px;
                width: 90%;
            }
            
            .login-header {
                text-align: center;
                margin-bottom: 2rem;
            }
            
            .logo-text {
                font-size: 2rem;
                font-weight: 700;
                color: #0D1B2A;
                margin-bottom: 0.5rem;
            }
            
            .subtitle {
                color: #5A6B7A;
                font-size: 0.9rem;
            }
            
            .form-group {
                margin-bottom: 1.5rem;
            }
            
            label {
                display: block;
                margin-bottom: 0.5rem;
                color: #0D1B2A;
                font-weight: 500;
                font-size: 0.9rem;
            }
            
            input[type="password"] {
                width: 100%;
                padding: 0.8rem;
                border: 2px solid #e0e0e0;
                border-radius: 4px;
                font-family: 'Jost', sans-serif;
                font-size: 1rem;
                transition: border-color 0.3s;
            }
            
            input[type="password"]:focus {
                outline: none;
                border-color: #D4AF37;
            }
            
            .error {
                background: #FFE5E5;
                color: #C33;
                padding: 0.8rem;
                border-radius: 4px;
                margin-bottom: 1rem;
                font-size: 0.9rem;
            }
            
            .btn-login {
                width: 100%;
                padding: 1rem;
                background: linear-gradient(135deg, #D4AF37 0%, #FF6B35 100%);
                color: #0D1B2A;
                border: none;
                border-radius: 4px;
                font-weight: 700;
                font-size: 0.9rem;
                letter-spacing: 0.1em;
                cursor: pointer;
                transition: transform 0.3s;
            }
            
            .btn-login:hover {
                transform: translateY(-2px);
            }
        </style>
    </head>
    <body>
        <div class="login-container">
            <div class="login-header">
                <div class="logo-text">ABKIG</div>
                <p class="subtitle">Admin Panel</p>
            </div>
            
            <?php if (isset($error)): ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <form method="POST">
                <div class="form-group">
                    <label for="password">Password Admin</label>
                    <input type="password" id="password" name="password" required autofocus>
                </div>
                <button type="submit" class="btn-login">Login</button>
            </form>
        </div>
    </body>
    </html>
    <?php
    exit;
}

// If authenticated, show dashboard
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard — ABKIG</title>
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
        
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }
        
        .dashboard-card {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-top: 4px solid #D4AF37;
        }
        
        .card-label {
            color: #5A6B7A;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }
        
        .card-value {
            font-size: 2.5rem;
            font-weight: 700;
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
        }
        
        .btn:hover {
            transform: translateY(-2px);
        }
        
        .btn-secondary {
            background: transparent;
            color: #D4AF37;
            border: 2px solid #D4AF37;
        }
        
        @media (max-width: 768px) {
            .admin-container {
                grid-template-columns: 1fr;
            }
            
            .admin-sidebar {
                grid-column: 1;
                grid-row: 1;
                display: grid;
                grid-template-columns: auto 1fr;
                gap: 1rem;
                align-items: start;
                padding: 1rem;
            }
            
            .admin-nav {
                display: none;
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
                    <a href="index.php" class="admin-nav-link active">Dashboard</a>
                </li>
                <li class="admin-nav-item">
                    <a href="manage-news.php" class="admin-nav-link">Kelola Berita</a>
                </li>
            </ul>
            <div class="admin-logout">
                <a href="logout.php">Logout</a>
            </div>
        </div>
        
        <div class="admin-content">
            <div class="admin-header">
                <h1 class="admin-title">Dashboard</h1>
            </div>
            
            <div class="dashboard-grid">
                <div class="dashboard-card">
                    <div class="card-label">Total Berita</div>
                    <div class="card-value" id="totalNews">0</div>
                </div>
                <div class="dashboard-card">
                    <div class="card-label">Status Sistem</div>
                    <div class="card-value" style="color: #4CAF50;">✓ Online</div>
                </div>
            </div>
            
            <div style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);">
                <h2 style="margin-bottom: 1.5rem; font-size: 1.3rem;">Manajemen Konten</h2>
                <a href="manage-news.php" class="btn">Kelola Berita & Event</a>
            </div>
        </div>
    </div>
    
    <script>
        // Load total news
        fetch('./api/get-news.php')
            .then(response => response.json())
            .then(data => {
                document.getElementById('totalNews').textContent = (data.news || []).length;
            });
    </script>
</body>
</html>
