<?php
/**
 * ABKIG - Akademi Bisnis Kuliner Indonesia Global
 * Main landing page with modular PHP structure
 */

// Set page title
$page_title = "Beranda";

// Include header dengan meta tags dan CSS
include 'includes/header.php';

// Include navbar
include 'includes/navbar.php';
?>

<!-- Main Content -->
<main>
    <?php
    // Include sections dalam urutan yang benar
    include 'sections/hero.php';
    include 'sections/why-abkig.php';
    include 'sections/vision-mission.php';
    include 'sections/facilities.php';
    include 'sections/programs.php';
    include 'sections/news.php';
    include 'sections/contact.php';
    ?>
</main>

<?php
// Include footer
include 'includes/footer.php';

// Include FAB (Floating Action Button)
include 'includes/fab.php';
?>

<!-- Closing body and html tags -->
</body>
</html>
