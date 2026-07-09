<?php

require 'fungsi.php';
$query = "SELECT * FROM mahasiswa";
$mahasiswas = tampildata($query); /// wadah berisi data 



////ambil data (fetch) dari lemari
///mysqli_fetch_row
///mysqli_fetch_assoc
///mysqli_fetch_array
///mysqli_fetch_object

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
</head>

<body>
    <h1 align="center">
        WEB TI UNIMUS 2026 OYEE
    </h1>

    <nav class="navbar">
        <a href="index.php">Home</a>
        <a href="biodata.php">Biodata</a>
        <a href="kontak.php">Kontak</a>
        <a href="mahasiswa.php">Data Mahasiswa</a>
    </nav>

    <h2>
        Data Mahasiswa
    </h2>
    <div class="btn-container">
        <a href="tambahdata.php" class="btn">+ Tambah Data</a>
    </div>

    <table border="1" cellpadding="5px">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nim</th>
            <th>Jurusan</th>
            <th>Email</th>
            <th>No. HP</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        foreach ($mahasiswas as $mhs) {

        ?>
            <tr>
                <td align="center"><?php echo $no++; ?></td>
                <td><?php echo $mhs["nama"]; ?></td>
                <td><?php echo $mhs["nim"]; ?></td>
                <td align="center"><?php echo $mhs["jurusan"]; ?></td>
                <td align="center"><?php echo $mhs["email"]; ?></td>
                <td align="center"><?php echo $mhs["no_hp"]; ?></td>
                <td>
                    <img src="assets/img/<?php echo $mhs['foto']; ?>" width="80">
                </td>
                <td>

                    <a href="editdata.php?id=<?php echo $mhs['id']; ?>">
                        <button>Edit</button>
                    </a>

                    <a href="deletedata.php?id=<?php echo $mhs['id']; ?>"
                        onclick="return confirm('Yakin ingin menghapus data ini?');">
                        <button>Hapus</button>
                    </a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

    <hr>

    <table border="1" cellpadding="5px">
        <tr>
            <td>1,1</td>
            <td>1,2</td>
            <td>1,3</td>
            <td>1,4</td>
        </tr>
        <tr>
            <td>2,1</td>
            <td colspan="2" rowspan="2"></td>
            <td>2,4</td>
        </tr>
        <tr>
            <td>3,1</td>
            <td>3,4</td>
        </tr>
        <tr>
            <td>4,1</td>
            <td>4,2</td>
            <td>4,3</td>
            <td>4,4</td>
        </tr>
    </table>

</body>

</html>