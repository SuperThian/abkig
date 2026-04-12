<?php
/**
 * Investasi Page - Financial Details
 * Page terpisah untuk detail biaya dan investasi program
 */

// Set page title
$page_title = "Investasi & Biaya";

// Include header
include 'includes/header.php';

// Include navbar
include 'includes/navbar.php';
?>

<main>
    <!-- Hero Section untuk Investment Page -->
    <section class="hero" style="min-height: 300px; padding-top: 150px;">
        <div class="hero-overlay"></div>
        <div class="hero-content" style="padding: 40px 20px;">
            <h1 class="hero-title" style="font-size: 2.5em;">Investasi & Detail <span style="color: #FF6B35;">Biaya</span></h1>
            <p class="hero-subtitle">Transparansi harga dan berbagai pilihan paket pembayaran untuk kemudahan Anda</p>
        </div>
    </section>

    <!-- Investment Details Section -->
    <section class="investment-section">
        <div class="container">
            <h2 class="section-title">Rincian <span>Investasi</span></h2>
            <p class="section-subtitle">Pilih program sesuai kebutuhan dan kemampuan finansial Anda</p>

            <!-- Investment Table -->
            <div class="investment-table-wrapper">
                <table class="investment-table">
                    <thead>
                        <tr>
                            <th>Program</th>
                            <th>Durasi</th>
                            <th>Biaya Program</th>
                            <th>Biaya Daftar</th>
                            <th>Total Investasi</th>
                            <th>Cicilan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="Program"><strong>Diploma Kuliner</strong></td>
                            <td data-label="Durasi">12 Bulan</td>
                            <td data-label="Biaya Program">Rp 40.000.000</td>
                            <td data-label="Biaya Daftar">Rp 2.500.000</td>
                            <td data-label="Total Investasi"><strong>Rp 42.500.000</strong></td>
                            <td data-label="Cicilan">12 x Rp 3.541.667</td>
                        </tr>
                        <tr>
                            <td data-label="Program"><strong>Sertifikasi Pastry</strong></td>
                            <td data-label="Durasi">6 Bulan</td>
                            <td data-label="Biaya Program">Rp 25.000.000</td>
                            <td data-label="Biaya Daftar">Rp 2.000.000</td>
                            <td data-label="Total Investasi"><strong>Rp 27.000.000</strong></td>
                            <td data-label="Cicilan">6 x Rp 4.500.000</td>
                        </tr>
                        <tr>
                            <td data-label="Program"><strong>Manajemen Restoran</strong></td>
                            <td data-label="Durasi">9 Bulan</td>
                            <td data-label="Biaya Program">Rp 29.000.000</td>
                            <td data-label="Biaya Daftar">Rp 2.000.000</td>
                            <td data-label="Total Investasi"><strong>Rp 31.000.000</strong></td>
                            <td data-label="Cicilan">9 x Rp 3.444.444</td>
                        </tr>
                        <tr>
                            <td data-label="Program"><strong>Kelas Reguler</strong></td>
                            <td data-label="Durasi">Fleksibel</td>
                            <td data-label="Biaya Program">Rp 3.000.000+</td>
                            <td data-label="Biaya Daftar">Rp 500.000</td>
                            <td data-label="Total Investasi"><strong>Rp 3.500.000+</strong></td>
                            <td data-label="Cicilan">Per class</td>
                        </tr>
                        <tr>
                            <td data-label="Program"><strong>Workshop Spesial</strong></td>
                            <td data-label="Durasi">1-2 Minggu</td>
                            <td data-label="Biaya Program">Rp 7.500.000</td>
                            <td data-label="Biaya Daftar">Rp 500.000</td>
                            <td data-label="Total Investasi"><strong>Rp 8.000.000</strong></td>
                            <td data-label="Cicilan">Tidak ada</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Payment Options -->
            <div class="payment-options">
                <h3 class="payment-title">Sistem Pembayaran</h3>
                <div class="payment-grid">
                    <div class="payment-card">
                        <div class="payment-icon">💳</div>
                        <h4>Pembayaran Penuh</h4>
                        <p>Bayar seluruh biaya di muka dan dapatkan <span class="highlight">diskon 5%</span></p>
                    </div>
                    <div class="payment-card">
                        <div class="payment-icon">🔄</div>
                        <h4>Cicilan Tanpa Bunga</h4>
                        <p>Cicil hingga 12 kali dengan <span class="highlight">bunga 0%</span> untuk program diploma</p>
                    </div>
                    <div class="payment-card">
                        <div class="payment-icon">🏦</div>
                        <h4>Kerjasama Bank</h4>
                        <p>Cicilan khusus melalui <span class="highlight">BCA, Mandiri, BNI</span> dengan bunga kompetitif</p>
                    </div>
                    <div class="payment-card">
                        <div class="payment-icon">🎓</div>
                        <h4>Beasiswa</h4>
                        <p><span class="highlight">Beasiswa prestasi</span> hingga 50% untuk pendaftar terbaik</p>
                    </div>
                </div>
            </div>

            <!-- Cost Breakdown -->
            <div class="cost-breakdown">
                <h3 class="breakdown-title">Breakdown Biaya Program - Diploma Kuliner (12 Bulan)</h3>
                
                <div class="breakdown-grid">
                    <div class="breakdown-item">
                        <div class="breakdown-number">1</div>
                        <h4>Biaya Pendaftaran</h4>
                        <p class="breakdown-price">Rp 2.500.000</p>
                        <p class="breakdown-desc">Proses pendaftaran dan administrasi</p>
                    </div>
                    
                    <div class="breakdown-item">
                        <div class="breakdown-number">2</div>
                        <h4>Biaya Tuition</h4>
                        <p class="breakdown-price">Rp 30.000.000</p>
                        <p class="breakdown-desc">12 bulan teori & praktik kelas</p>
                    </div>
                    
                    <div class="breakdown-item">
                        <div class="breakdown-number">3</div>
                        <h4>Materials & Ingredients</h4>
                        <p class="breakdown-price">Rp 5.000.000</p>
                        <p class="breakdown-desc">Bahan-bahan untuk praktik setiap hari</p>
                    </div>
                    
                    <div class="breakdown-item">
                        <div class="breakdown-number">4</div>
                        <h4>Uniform & Tools</h4>
                        <p class="breakdown-price">Rp 2.000.000</p>
                        <p class="breakdown-desc">Chef uniform, apron, & kitchen tools</p>
                    </div>
                    
                    <div class="breakdown-item">
                        <div class="breakdown-number">5</div>
                        <h4>Sertifikat</h4>
                        <p class="breakdown-price">Rp 1.500.000</p>
                        <p class="breakdown-desc">Sertifikat resmi & internasional</p>
                    </div>
                    
                    <div class="breakdown-item">
                        <div class="breakdown-number">6</div>
                        <h4>Internship Placement</h4>
                        <p class="breakdown-price">Rp 1.500.000</p>
                        <p class="breakdown-desc">Penempatan magang di restoran partner</p>
                    </div>
                </div>
                
                <div class="breakdown-total">
                    <h4>Total Investasi Diploma Kuliner</h4>
                    <p class="total-price">Rp 42.500.000</p>
                </div>
            </div>

            <!-- Investment Benefits -->
            <div class="investment-benefits">
                <h3 class="benefits-title">Apa yang Anda Dapatkan?</h3>
                <div class="benefits-grid">
                    <div class="benefit-item">
                        <span class="benefit-number">✓</span>
                        <p>Pelatihan intensif dari chef berpengalaman internasional</p>
                    </div>
                    <div class="benefit-item">
                        <span class="benefit-number">✓</span>
                        <p>Sertifikat yang diakui global untuk meningkatkan karir</p>
                    </div>
                    <div class="benefit-item">
                        <span class="benefit-number">✓</span>
                        <p>Akses ke jaringan alumni profesional di industri</p>
                    </div>
                    <div class="benefit-item">
                        <span class="benefit-number">✓</span>
                        <p>Peluang magang di restaurant & hotel ternama</p>
                    </div>
                    <div class="benefit-item">
                        <span class="benefit-number">✓</span>
                        <p>Dukungan konsultasi karir dan penempatan kerja</p>
                    </div>
                    <div class="benefit-item">
                        <span class="benefit-number">✓</span>
                        <p>Akses lifetime ke learning materials & updates</p>
                    </div>
                </div>
            </div>

            <!-- Contact for Details -->
            <div class="contact-cta" style="text-align: center; margin-top: 60px;">
                <h3 style="color: #0D1B2A; margin-bottom: 20px; font-family: Cormorant Garamond; font-size: 1.8em;">Butuh Bantuan?</h3>
                <p style="color: #666; margin-bottom: 30px; font-size: 1.1em;">Hubungi tim kami untuk diskusi lebih detail tentang investasi dan pilihan pembayaran</p>
                <button class="btn btn-primary" onclick="window.location.href='index.php#contact'">Hubungi ABKIG Sekarang</button>
            </div>
        </div>
    </section>
</main>

<?php
// Include footer
include 'includes/footer.php';

// Include FAB
include 'includes/fab.php';
?>

<style>
.investment-section {
    padding: 80px 20px;
    background: linear-gradient(135deg, #F9F5EC 0%, #FFFFFF 100%);
}

.investment-table-wrapper {
    overflow-x: auto;
    margin: 40px 0;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
}

.investment-table {
    width: 100%;
    border-collapse: collapse;
    background: white;
}

.investment-table th {
    background: linear-gradient(135deg, #0D1B2A 0%, #1a3a52 100%);
    color: #E8D08A;
    padding: 18px;
    text-align: left;
    font-family: Cormorant Garamond;
    font-size: 1.1em;
    font-weight: 600;
}

.investment-table td {
    padding: 16px 18px;
    border-bottom: 1px solid #E8D08A;
    color: #333;
}

.investment-table tbody tr:hover {
    background: #F9F5EC;
}

.investment-table tbody tr:last-child td {
    border-bottom: none;
}

.payment-options {
    margin: 80px 0;
}

.payment-title {
    font-family: Cormorant Garamond;
    font-size: 1.8em;
    color: #0D1B2A;
    margin-bottom: 40px;
    text-align: center;
}

.payment-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 24px;
    margin-bottom: 40px;
}

.payment-card {
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(201, 168, 76, 0.1);
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: 2px solid transparent;
}

.payment-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 24px rgba(201, 168, 76, 0.2);
    border-color: #C9A84C;
}

.payment-icon {
    font-size: 3em;
    margin-bottom: 15px;
}

.payment-card h4 {
    font-family: Cormorant Garamond;
    font-size: 1.4em;
    color: #0D1B2A;
    margin-bottom: 10px;
}

.payment-card p {
    color: #666;
    font-size: 0.95em;
}

.payment-card .highlight {
    color: #FF6B35;
    font-weight: 600;
}

.cost-breakdown {
    background: white;
    padding: 40px;
    border-radius: 12px;
    margin: 60px 0;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
}

.breakdown-title {
    font-family: Cormorant Garamond;
    font-size: 1.6em;
    color: #0D1B2A;
    margin-bottom: 40px;
    text-align: center;
}

.breakdown-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
    margin-bottom: 40px;
}

.breakdown-item {
    background: linear-gradient(135deg, #F9F5EC 0%, #FFFFFF 100%);
    padding: 24px;
    border-left: 4px solid #FF6B35;
    border-radius: 8px;
    transition: transform 0.3s ease;
}

.breakdown-item:hover {
    transform: translateX(5px);
}

.breakdown-number {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #FF6B35, #C9A84C);
    color: white;
    border-radius: 50%;
    font-weight: 700;
    margin-bottom: 15px;
    font-size: 1.2em;
}

.breakdown-item h4 {
    font-family: Cormorant Garamond;
    font-size: 1.2em;
    color: #0D1B2A;
    margin-bottom: 8px;
}

.breakdown-price {
    color: #FF6B35;
    font-weight: 600;
    font-size: 1.3em;
    margin-bottom: 8px;
}

.breakdown-desc {
    color: #888;
    font-size: 0.9em;
}

.breakdown-total {
    background: linear-gradient(135deg, #0D1B2A 0%, #1a3a52 100%);
    padding: 30px;
    border-radius: 8px;
    text-align: right;
}

.breakdown-total h4 {
    color: #E8D08A;
    font-family: Cormorant Garamond;
    font-size: 1.3em;
    margin-bottom: 15px;
}

.total-price {
    color: #FFD700;
    font-size: 2em;
    font-weight: 700;
    font-family: Cormorant Garamond;
}

.investment-benefits {
    margin: 80px 0;
}

.benefits-title {
    font-family: Cormorant Garamond;
    font-size: 1.8em;
    color: #0D1B2A;
    margin-bottom: 40px;
    text-align: center;
}

.benefits-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
}

.benefit-item {
    display: flex;
    gap: 15px;
    align-items: flex-start;
    padding: 20px;
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}

.benefit-number {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 30px;
    height: 30px;
    background: linear-gradient(135deg, #FF6B35, #C9A84C);
    color: white;
    border-radius: 50%;
    font-weight: 700;
    flex-shrink: 0;
}

.benefit-item p {
    color: #333;
    font-size: 1em;
    line-height: 1.6;
}

/* Responsive */
@media (max-width: 768px) {
    .investment-section {
        padding: 60px 15px;
    }
    
    .investment-table th {
        padding: 12px;
        font-size: 0.9em;
    }
    
    .investment-table td {
        padding: 12px;
        font-size: 0.85em;
    }
    
    .investment-table-wrapper {
        font-size: 0.9em;
    }
    
    .breakdown-title,
    .payment-title,
    .benefits-title {
        font-size: 1.4em;
    }
    
    .breakdown-total {
        text-align: center;
    }
}
</style>

<!-- Closing body and html tags -->
</body>
</html>
