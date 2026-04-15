<?php
/**
 * ABKIG Admin - Delete News
 */
session_start();
require_once dirname(__DIR__) . '/includes/functions.php';
requireAdminLogin();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    deleteNews($id);
}

header('Location: index.php?deleted=1');
exit;
