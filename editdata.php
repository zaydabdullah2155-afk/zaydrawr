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
</head>
<body>

<h2>Edit Data Mahasiswa</h2>

<form action="" method="post">

    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

    <table cellpadding="5">

        <tr>
            <td>Nama</td>
            <td>
                <input type="text" name="nama"
                       value="<?php echo $data['nama']; ?>" required>
            </td>
        </tr>

        <tr>
            <td>NIM</td>
            <td>
                <input type="text" name="nim"
                       value="<?php echo $data['nim']; ?>" required>
            </td>
        </tr>

        <tr>
            <td>Jurusan</td>
            <td>
                <input type="text" name="jurusan"
                       value="<?php echo $data['jurusan']; ?>" required>
            </td>
        </tr>

        <tr>
            <td>Email</td>
            <td>
                <input type="email" name="email"
                       value="<?php echo $data['email']; ?>" required>
            </td>
        </tr>

        <tr>
            <td>No HP</td>
            <td>
                <input type="text" name="no_hp"
                       value="<?php echo $data['no_hp']; ?>" required>
            </td>
        </tr>

        <tr>
            <td>Foto</td>
            <td>
                <input type="text" name="foto"
                       value="<?php echo $data['foto']; ?>">
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <button type="submit" name="kirim">
                    Simpan Perubahan
                </button>
            </td>
        </tr>

    </table>

</form>

</body>
</html>