<?php
/**
 * Contact Section
 * Section untuk form kontak dan informasi kontak ABKIG
 */
?>
<section class="contact" id="contact">
    <div class="container">
        <h2 class="section-title">Hubungi <span>Kami</span></h2>
        <p class="section-subtitle">Siap menjawab semua pertanyaan Anda tentang program dan fasilitas ABKIG</p>
        
        <div class="contact-grid">
            <!-- Contact Form -->
            <div class="contact-form-wrapper">
                <form class="contact-form" id="contactForm" onsubmit="handleSubmit(event)">
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" id="name" name="name" required placeholder="Masukkan nama Anda">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required placeholder="Email Anda">
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">No. WhatsApp</label>
                        <input type="tel" id="phone" name="phone" required placeholder="+62 812 3456 7890">
                    </div>
                    
                    <div class="form-group">
                        <label for="program">Program Minat</label>
                        <select id="program" name="program" required>
                            <option value="">--- Pilih Program ---</option>
                            <option value="diploma">Diploma Kuliner</option>
                            <option value="pastry">Sertifikasi Pastry & Bakery</option>
                            <option value="management">Manajemen Restoran</option>
                            <option value="regular">Kelas Reguler</option>
                            <option value="workshop">Workshop Spesial</option>
                            <option value="konsultasi">Konsultasi Bisnis</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Pesan</label>
                        <textarea id="message" name="message" rows="5" placeholder="Tulis pertanyaan atau pesan Anda..."></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                </form>
            </div>
            
            <!-- Contact Information -->
            <div class="contact-info">
                <div class="info-card">
                    <div class="info-icon">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                            <circle cx="12" cy="10" r="3"/>
                        </svg>
                    </div>
                    <h4>Lokasi</h4>
                    <p>Jl. Kuliner No. 123<br>Jakarta, Indonesia 12345</p>
                </div>
                
                <div class="info-card">
                    <div class="info-icon">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                        </svg>
                    </div>
                    <h4>Telepon</h4>
                    <p>+62 812 3456 7890<br>+62 21 1234 5678</p>
                </div>
                
                <div class="info-card">
                    <div class="info-icon">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="2" y="4" width="20" height="16" rx="2"/>
                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                        </svg>
                    </div>
                    <h4>Email</h4>
                    <p>info@abkig.ac.id<br>support@abkig.ac.id</p>
                </div>
                
                <div class="info-card">
                    <div class="info-icon">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="1"/>
                            <path d="M12 1v6m0 6v6M4.22 4.22l4.24 4.24m2.12 2.12l4.24 4.24M1 12h6m6 0h6M4.22 19.78l4.24-4.24m2.12-2.12l4.24-4.24"/>
                        </svg>
                    </div>
                    <h4>Jam Operasional</h4>
                    <p>Senin - Jumat: 08:00 - 17:00<br>Sabtu: 09:00 - 15:00</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function handleSubmit(event) {
    event.preventDefault();
    alert('Terima kasih! Kami akan menghubungi Anda segera.');
    document.getElementById('contactForm').reset();
}
</script>
