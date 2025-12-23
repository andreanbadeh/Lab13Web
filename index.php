<?php
session_start();

include "template/header.php";

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$path = explode('/', $page);

if ($path[0] == "user") {
    $file = "user/" . ($path[1] ?? 'list') . ".php";

    if (file_exists($file)) {
        include $file;
    } else {
        echo "<h3>Halaman tidak ditemukan</h3>";
    }

} else {

    if ($path[0] == 'profil' && !isset($_SESSION['is_login'])) {
        header("Location: index.php?page=login");
        exit;
    }

    $file = "pages/" . $path[0] . ".php";

    if (file_exists($file)) {
        include $file;
    } else {
        echo "<h3>Halaman tidak ditemukan</h3>";
    }
}

include "template/footer.php";
