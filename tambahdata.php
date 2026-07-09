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
</head>

<body>

    <h2>Tambah Data Mahasiswa</h2>

    <form action="" method="post" enctype="multipart/form-data">
        <table cellpadding="5">

            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" required></td>
            </tr>

            <tr>
                <td>NIM</td>
                <td><input type="text" name="nim" required></td>
            </tr>

            <tr>
                <td>Jurusan</td>
                <td><input type="text" name="jurusan" required></td>
            </tr>

            <tr>
                <td>Email</td>
                <td><input type="email" name="email" required></td>
            </tr>

            <tr>
                <td>No HP</td>
                <td><input type="text" name="no_hp" required></td>
            </tr>

            <tr>
                <td>Foto</td>
                <td><input type="file" name="foto"></td>
            </tr>

            <tr>
                <td colspan="2">
                    <button type="submit" name="kirim">
                        Tambah Data
                    </button>
                </td>
            </tr>

        </table>
    </form>

</body>

</html>