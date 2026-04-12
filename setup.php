<?php
/**
 * Database Setup & Installation
 * Script ini digunakan untuk setup database awal
 * Akses: http://yoursite.com/setup.php
 */

// Database credentials
$db_host = 'localhost';
$db_user = 'root';
$db_pass = ''; // Sesuaikan dengan password MySQL Anda
$db_name = 'abkig';

// Hanya tampilkan jika ada parameter setup
$show_form = !isset($_POST['setup']);
$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['setup'])) {
    // Create connection tanpa database
    $conn = new mysqli($db_host, $db_user, $db_pass);
    
    if ($conn->connect_error) {
        $error = "Connection failed: " . $conn->connect_error;
    } else {
        // Create database
        $sql = "CREATE DATABASE IF NOT EXISTS $db_name";
        if ($conn->query($sql) === TRUE) {
            // Select the database
            $conn->select_db($db_name);
            
            // Create news table
            $table_sql = "CREATE TABLE IF NOT EXISTS news (
                id INT AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(255) NOT NULL,
                category VARCHAR(100) NOT NULL,
                excerpt TEXT NOT NULL,
                content LONGTEXT NOT NULL,
                image VARCHAR(500),
                date DATE NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
            
            if ($conn->query($table_sql) === TRUE) {
                // Insert sample data
                $sample_data = [
                    [
                        'title' => 'Workshop Pastry Kami Raih Sertifikat Internasional',
                        'category' => 'Prestasi',
                        'excerpt' => 'Peserta workshop pastry kami berhasil meraih sertifikat dari International Pastry Association. Pencapaian luar biasa dari dedikasi dan kerja keras tim instruktur kami.',
                        'content' => 'Dengan bangga mengumumkan bahwa peserta workshop pastry kami telah berhasil meraih sertifikat internasional dari International Pastry Association. Ini merupakan bukti nyata dari kualitas pendidikan yang kami berikan dan dedikasi luar biasa dari semua instruktur kami dalam membimbing setiap peserta mencapai standar internasional.',
                        'image' => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=500&q=80',
                        'date' => '2024-04-10'
                    ],
                    [
                        'title' => 'Grand Opening Akademi Bisnis Kuliner Indonesia Global',
                        'category' => 'Acara',
                        'excerpt' => 'Acara pembukaan resmi ABKIG telah berhasil dilaksanakan dengan hadiran berbagai stakeholder dan media massa terkemuka. Terima kasih atas dukungan luar biasa dari semua pihak.',
                        'content' => 'Acara Grand Opening Akademi Bisnis Kuliner Indonesia Global telah dilaksanakan dengan meriah pada Sabtu, 5 April 2024. Event ini dihadiri oleh berbagai stakeholder industri kuliner, media massa, dan tentu saja mitra-mitra bisnis kami yang berharga. Terima kasih kepada semua pihak yang telah mendukung kesuksesan acara ini.',
                        'image' => 'https://images.unsplash.com/photo-1555939594-58d7cb561027?w=500&q=80',
                        'date' => '2024-04-05'
                    ],
                    [
                        'title' => 'Program Beasiswa untuk Talenta Muda 2024',
                        'category' => 'Program',
                        'excerpt' => 'ABKIG membuka program beasiswa penuh untuk talenta muda yang berbakat. Kesempatan emas untuk mengembangkan skill kuliner Anda bersama praktisi berpengalaman.',
                        'content' => 'Kami dengan senang hati mengumumkan pembukaan program beasiswa penuh untuk tahun 2024. Program ini dirancang khusus untuk memberikan kesempatan kepada talenta muda yang bersemangat untuk mengembangkan skill kuliner mereka tanpa beban finansial yang berat.',
                        'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=500&q=80',
                        'date' => '2024-03-28'
                    ]
                ];
                
                $insert_success = true;
                foreach ($sample_data as $data) {
                    $stmt = $conn->prepare("INSERT INTO news (title, category, excerpt, content, image, date) VALUES (?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("ssssss", $data['title'], $data['category'], $data['excerpt'], $data['content'], $data['image'], $data['date']);
                    
                    if (!$stmt->execute()) {
                        $insert_success = false;
                        break;
                    }
                    $stmt->close();
                }
                
                if ($insert_success) {
                    $message = "✓ Database berhasil dibuat! Tabel 'news' dengan 3 sample data sudah siap digunakan.";
                    $show_form = false;
                } else {
                    $error = "Database dibuat tapi gagal insert sample data: " . $conn->error;
                }
            } else {
                $error = "Error creating table: " . $conn->error;
            }
        } else {
            $error = "Error creating database: " . $conn->error;
        }
        
        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setup Database - ABKIG</title>
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
            padding: 2rem;
        }
        
        .container {
            background: white;
            padding: 3rem;
            border-radius: 8px;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
        }
        
        h1 {
            font-size: 2rem;
            color: #0D1B2A;
            margin-bottom: 1rem;
        }
        
        .info {
            background: #E8E8FF;
            border-left: 4px solid #5C5FB0;
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-radius: 4px;
            font-size: 0.9rem;
            line-height: 1.6;
        }
        
        .success {
            background: #E8F5E9;
            border-left: 4px solid #4CAF50;
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-radius: 4px;
            color: #2E7D32;
        }
        
        .error {
            background: #FFEBEE;
            border-left: 4px solid #F44336;
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-radius: 4px;
            color: #C62828;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #0D1B2A;
        }
        
        input {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #e0e0e0;
            border-radius: 4px;
            font-family: 'Jost', sans-serif;
            font-size: 1rem;
        }
        
        input:focus {
            outline: none;
            border-color: #D4AF37;
        }
        
        .btn {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, #D4AF37 0%, #FF6B35 100%);
            color: white;
            border: none;
            border-radius: 4px;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: transform 0.3s;
            font-family: 'Jost', sans-serif;
        }
        
        .btn:hover {
            transform: translateY(-2px);
        }
        
        .next-steps {
            background: #F5F1E8;
            padding: 1.5rem;
            border-radius: 4px;
            margin-top: 2rem;
        }
        
        .next-steps h3 {
            color: #0D1B2A;
            margin-bottom: 1rem;
        }
        
        .next-steps ol {
            margin-left: 1.5rem;
            color: #5A6B7A;
            line-height: 1.8;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Setup Database ABKIG</h1>
        
        <?php if ($message): ?>
            <div class="success"><?php echo $message; ?></div>
        <?php endif; ?>
        
        <?php if ($error): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <?php if ($show_form): ?>
            <div class="info">
                <strong>ℹ️ Informasi:</strong><br>
                Script ini akan membuat database MySQL baru dan tabel untuk menyimpan berita & event ABKIG.
                <br><br>
                <strong>Sebelum melanjutkan, pastikan:</strong>
                <ul style="margin-left: 1rem; margin-top: 0.5rem;">
                    <li>MySQL Server sudah berjalan</li>
                    <li>Username & password MySQL sudah benar</li>
                    <li>User punya akses CREATE DATABASE</li>
                </ul>
            </div>
            
            <form method="POST">
                <div class="form-group">
                    <label for="host">Database Host</label>
                    <input type="text" id="host" value="localhost" disabled style="background: #f5f5f5;">
                    <small style="color: #999;">Default: localhost</small>
                </div>
                
                <div class="form-group">
                    <label for="user">MySQL Username</label>
                    <input type="text" id="user" value="root" disabled style="background: #f5f5f5;">
                    <small style="color: #999;">Default: root</small>
                </div>
                
                <div class="form-group">
                    <label for="db">Database Name</label>
                    <input type="text" id="db" value="abkig" disabled style="background: #f5f5f5;">
                    <small style="color: #999;">Database akan dibuat otomatis</small>
                </div>
                
                <button type="submit" name="setup" class="btn">Buat Database</button>
            </form>
            
            <div class="next-steps">
                <h3>Catatan Penting:</h3>
                <ol>
                    <li>Jika password MySQL Anda berbeda, edit file <code>config/database.php</code></li>
                    <li>Ganti nilai <code>DB_PASS</code> dengan password MySQL Anda</li>
                    <li>Kemudian jalankan setup ini lagi</li>
                </ol>
            </div>
        <?php else: ?>
            <div class="next-steps">
                <h3>✓ Setup Berhasil!</h3>
                <p>Database dan tabel sudah siap digunakan. Langkah selanjutnya:</p>
                <ol style="margin: 1rem 0 0 1.5rem; color: #5A6B7A; line-height: 1.8;">
                    <li>Akses admin panel di <code>/admin/</code></li>
                    <li>Login dengan password: <code>abkig2024</code></li>
                    <li>Mulai kelola berita & event dari sana</li>
                </ol>
                <p style="margin-top: 1.5rem; color: #999;">
                    Anda bisa menghapus file <code>setup.php</code> ini setelah setup selesai.
                </p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
