<?php
require 'fungsi.php';

if (isset($_POST['kirim'])) {
    if (tambahdata($_POST) > 0) {
        echo " <script>
            alert('Data berhasil ditambahkan');
            document.location.href='mahasiswa.php';
        </script>
        ";
    } else {
        echo mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="page-wrapper">
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="biodata.php">Biodata</a>
            <a href="kontak.php">Kontak</a>
            <a href="mahasiswa.php">Data Mahasiswa</a>
        </nav>

        <section class="form-card">
            <h1>Tambah Data Mahasiswa</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><label for="nama">Nama</label></td>
                        <td><input id="nama" type="text" name="nama" required></td>
                    </tr>
                    <tr>
                        <td><label for="nim">NIM</label></td>
                        <td><input id="nim" type="text" name="nim" required></td>
                    </tr>
                    <tr>
                        <td><label for="jurusan">Jurusan</label></td>
                        <td><input id="jurusan" type="text" name="jurusan" required></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email</label></td>
                        <td><input id="email" type="email" name="email" required></td>
                    </tr>
                    <tr>
                        <td><label for="no_hp">No HP</label></td>
                        <td><input id="no_hp" type="text" name="no_hp" required></td>
                    </tr>
                    <tr>
                        <td><label for="foto">Foto</label></td>
                        <td><input id="foto" type="file" name="foto" accept="image/png, image/jpeg, image/gif"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" name="kirim">Tambah Data</button>
                        </td>
                    </tr>
                </table>
            </form>
        </section>
    </div>
</body>

</html>
