<?php
require 'fungsi.php';

$id = $_GET['id'];

$query = "SELECT * FROM mahasiswa WHERE id = $id";
$data = tampildata($query)[0];

if (isset($_POST['kirim'])) {
    if (editdata($_POST) > 0) {
        echo "
        <script>
            alert('Data berhasil diedit');
            document.location.href='mahasiswa.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal diedit');
            document.location.href='mahasiswa.php';
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
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
            <h1>Edit Data Mahasiswa</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <table>
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                    <input type="hidden" name="fotoLama" value="<?php echo $data['foto']; ?>">
                    <tr>
                        <td><label for="nama">Nama</label></td>
                        <td><input id="nama" type="text" name="nama" value="<?php echo $data['nama']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="nim">NIM</label></td>
                        <td><input id="nim" type="text" name="nim" value="<?php echo $data['nim']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="jurusan">Jurusan</label></td>
                        <td><input id="jurusan" type="text" name="jurusan" value="<?php echo $data['jurusan']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email</label></td>
                        <td><input id="email" type="email" name="email" value="<?php echo $data['email']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="no_hp">No HP</label></td>
                        <td><input id="no_hp" type="text" name="no_hp" value="<?php echo $data['no_hp']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="foto">Foto</label></td>
                        <td><input id="foto" type="file" name="foto" accept="image/png, image/jpeg, image/gif"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" name="kirim">Simpan Perubahan</button>
                        </td>
                    </tr>
                </table>
            </form>
        </section>
    </div>
</body>

</html>