<?php

require 'fungsi.php';

if (!isset($_GET['id'])) {
    header("Location: mahasiswa.php");
    exit;
}

$id = (int)$_GET['id'];

if (hapusdata($id) > 0) {
    echo "
    <script>
        alert('Data berhasil dihapus');
        document.location.href='mahasiswa.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('Data gagal dihapus');
        document.location.href='mahasiswa.php';
    </script>
    ";
}
