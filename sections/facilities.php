<?php
/**
 * Facilities Section
 * Section dengan grid fasilitas-fasilitas yang tersedia di ABKIG
 */
?>
<section class="facilities" id="facilities">
    <div class="container">
        <h2 class="section-title">Fasilitas <span>Lengkap</span></h2>
        <p class="section-subtitle">Kami menyediakan fasilitas modern untuk mendukung pembelajaran optimal</p>
        
        <div class="facilities-grid">
            <!-- Facility 1 -->
            <div class="facility-card">
                <div class="facility-image">
                    <svg viewBox="0 0 300 200" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#FF6B35;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#C9A84C;stop-opacity:1" />
                            </linearGradient>
                        </defs>
                        <rect width="300" height="200" fill="url(#grad1)"/>
                        <rect x="30" y="40" width="240" height="120" fill="white" opacity="0.1" rx="10"/>
                        <circle cx="150" cy="100" r="30" fill="white" opacity="0.3"/>
                        <path d="M 120 85 Q 150 70 180 85 L 180 130 Q 150 145 120 130 Z" fill="white" opacity="0.2"/>
                    </svg>
                </div>
                <div class="facility-content">
                    <h3 class="facility-title">Dapur Profesional</h3>
                    <p class="facility-description">Dapur lengkap dengan peralatan standar restoran bintang lima dan teknologi dapur terkini.</p>
                </div>
            </div>
            
            <!-- Facility 2 -->
            <div class="facility-card">
                <div class="facility-image">
                    <svg viewBox="0 0 300 200" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient id="grad2" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#0D1B2A;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#1a3a52;stop-opacity:1" />
                            </linearGradient>
                        </defs>
                        <rect width="300" height="200" fill="url(#grad2)"/>
                        <rect x="40" y="50" width="220" height="30" fill="#E8D08A" rx="5"/>
                        <rect x="40" y="90" width="220" height="60" fill="white" opacity="0.15" rx="5"/>
                        <text x="150" y="125" font-family="Jost" font-size="24" fill="white" opacity="0.3" text-anchor="middle">Perpustakaan</text>
                    </svg>
                </div>
                <div class="facility-content">
                    <h3 class="facility-title">Perpustakaan Kuliner</h3>
                    <p class="facility-description">Koleksi lengkap referensi culinary dari Indonesia hingga internasional dengan akses digital.</p>
                </div>
            </div>
            
            <!-- Facility 3 -->
            <div class="facility-card">
                <div class="facility-image">
                    <svg viewBox="0 0 300 200" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient id="grad3" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#FFD700;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#FF6B35;stop-opacity:1" />
                            </linearGradient>
                        </defs>
                        <rect width="300" height="200" fill="url(#grad3)"/>
                        <rect x="60" y="60" width="180" height="100" fill="white" opacity="0.15" rx="10"/>
                        <circle cx="100" cy="110" r="20" fill="white" opacity="0.25"/>
                        <circle cx="200" cy="110" r="20" fill="white" opacity="0.25"/>
                        <rect x="120" y="130" width="60" height="15" fill="white" opacity="0.2" rx="7"/>
                    </svg>
                </div>
                <div class="facility-content">
                    <h3 class="facility-title">Ruang Praktikum</h3>
                    <p class="facility-description">Ruang praktikum berbagai teknik memasak dengan standar keselamatan internasional.</p>
                </div>
            </div>
            
            <!-- Facility 4 -->
            <div class="facility-card">
                <div class="facility-image">
                    <svg viewBox="0 0 300 200" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient id="grad4" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#20BA5E;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#0D1B2A;stop-opacity:1" />
                            </linearGradient>
                        </defs>
                        <rect width="300" height="200" fill="url(#grad4)"/>
                        <circle cx="75" cy="100" r="30" fill="white" opacity="0.2"/>
                        <circle cx="225" cy="100" r="30" fill="white" opacity="0.2"/>
                        <path d="M 120 70 L 180 70 L 200 130 L 100 130 Z" fill="white" opacity="0.15"/>
                    </svg>
                </div>
                <div class="facility-content">
                    <h3 class="facility-title">Aula Konferensi</h3>
                    <p class="facility-description">Aula modern dengan kapasitas hingga 200 orang untuk seminar dan event kuliner.</p>
                </div>
            </div>
            
            <!-- Facility 5 -->
            <div class="facility-card">
                <div class="facility-image">
                    <svg viewBox="0 0 300 200" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient id="grad5" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#C9A84C;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#FF6B35;stop-opacity:1" />
                            </linearGradient>
                        </defs>
                        <rect width="300" height="200" fill="url(#grad5)"/>
                        <rect x="50" y="80" width="100" height="80" fill="white" opacity="0.12" rx="8"/>
                        <rect x="150" y="80" width="100" height="80" fill="white" opacity="0.12" rx="8"/>
                        <line x1="60" y1="95" x2="130" y2="95" stroke="white" stroke-width="2" opacity="0.2"/>
                        <line x1="160" y1="95" x2="230" y2="95" stroke="white" stroke-width="2" opacity="0.2"/>
                    </svg>
                </div>
                <div class="facility-content">
                    <h3 class="facility-title">Ruang Teori</h3>
                    <p class="facility-description">Kelas modern dilengkapi proyektor dan papan interaktif untuk pembelajaran teori kuliner.</p>
                </div>
            </div>
            
            <!-- Facility 6 -->
            <div class="facility-card">
                <div class="facility-image">
                    <svg viewBox="0 0 300 200" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient id="grad6" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#0D1B2A;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#FF6B35;stop-opacity:1" />
                            </linearGradient>
                        </defs>
                        <rect width="300" height="200" fill="url(#grad6)"/>
                        <circle cx="150" cy="90" r="35" fill="white" opacity="0.15"/>
                        <rect x="80" y="140" width="140" height="35" fill="white" opacity="0.12" rx="6"/>
                        <line x1="100" y1="157" x2="200" y2="157" stroke="white" stroke-width="2" opacity="0.2"/>
                    </svg>
                </div>
                <div class="facility-content">
                    <h3 class="facility-title">Laboratorium Sensori</h3>
                    <p class="facility-description">Lab khusus untuk menguji cita rasa, aroma, dan tekstur dengan standar industri global.</p>
                </div>
            </div>
        </div>
    </div>
</section>
