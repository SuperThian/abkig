CREATE DATABASE IF NOT EXISTS `abkig` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Use Database
USE `abkig`;

-- Create News Table
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `excerpt` text NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(500),
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `idx_date` (`date`),
  INDEX `idx_category` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert Sample Data
INSERT INTO `news` (`title`, `category`, `excerpt`, `content`, `image`, `date`) VALUES
('Workshop Pastry Kami Raih Sertifikat Internasional', 'Prestasi', 'Peserta workshop pastry kami berhasil meraih sertifikat dari International Pastry Association. Pencapaian luar biasa dari dedikasi dan kerja keras tim instruktur kami.', 'Dengan bangga mengumumkan bahwa peserta workshop pastry kami telah berhasil meraih sertifikat internasional dari International Pastry Association. Ini merupakan bukti nyata dari kualitas pendidikan yang kami berikan dan dedikasi luar biasa dari semua instruktur kami dalam membimbing setiap peserta mencapai standar internasional.', 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=500&q=80', '2024-04-10'),
('Grand Opening Akademi Bisnis Kuliner Indonesia Global', 'Acara', 'Acara pembukaan resmi ABKIG telah berhasil dilaksanakan dengan hadiran berbagai stakeholder dan media massa terkemuka. Terima kasih atas dukungan luar biasa dari semua pihak.', 'Acara Grand Opening Akademi Bisnis Kuliner Indonesia Global telah dilaksanakan dengan meriah pada Sabtu, 5 April 2024. Event ini dihadiri oleh berbagai stakeholder industri kuliner, media massa, dan tentu saja mitra-mitra bisnis kami yang berharga. Terima kasih kepada semua pihak yang telah mendukung kesuksesan acara ini.', 'https://images.unsplash.com/photo-1555939594-58d7cb561027?w=500&q=80', '2024-04-05'),
('Program Beasiswa untuk Talenta Muda 2024', 'Program', 'ABKIG membuka program beasiswa penuh untuk talenta muda yang berbakat. Kesempatan emas untuk mengembangkan skill kuliner Anda bersama praktisi berpengalaman.', 'Kami dengan senang hati mengumumkan pembukaan program beasiswa penuh untuk tahun 2024. Program ini dirancang khusus untuk memberikan kesempatan kepada talenta muda yang bersemangat untuk mengembangkan skill kuliner mereka tanpa beban finansial yang berat.', 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=500&q=80', '2024-03-28');

-- Query untuk verify
-- SELECT * FROM news ORDER BY date DESC;
-- SELECT COUNT(*) as total FROM news;