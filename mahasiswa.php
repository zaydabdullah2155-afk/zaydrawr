<?php
require 'fungsi.php';
$query = "SELECT * FROM mahasiswa";
$mahasiswas = tampildata($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="page-wrapper">
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="biodata.php">Biodata</a>
            <a href="kontak.php">Kontak</a>
            <a href="mahasiswa.php" class="active">Data Mahasiswa</a>
        </nav>

        <section class="hero" style="padding: 24px 28px; margin-bottom: 24px;">
            <div class="hero-copy">
                <span class="eyebrow">Database Mahasiswa</span>
                <h1>Data Mahasiswa</h1>
                <p>Kelola daftar mahasiswa dengan tampilan gelap yang bersih dan profesional, lengkap dengan aksi edit dan hapus yang mudah diakses.</p>
            </div>
            <div class="hero-visual">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRb5T_3MmoGd33ttUlz4IQc0iHiKCIeqUBlOupW7KXJ6A&s=10" alt="Data Mahasiswa">
            </div>
        </section>

        <div class="btn-container">
            <a href="tambahdata.php" class="btn">+ Tambah Data</a>
        </div>

        <section class="table-card">
            <div class="table-container">
                <table class="modern-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Jurusan</th>
                            <th>Email</th>
                            <th>No. HP</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($mahasiswas as $mhs) : ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $mhs['nama']; ?></td>
                                <td><?php echo $mhs['nim']; ?></td>
                                <td><?php echo $mhs['jurusan']; ?></td>
                                <td><?php echo $mhs['email']; ?></td>
                                <td><?php echo $mhs['no_hp']; ?></td>
                                <td><img src="assets/img/<?php echo $mhs['foto']; ?>" alt="Foto <?php echo $mhs['nama']; ?>"></td>
                                <td>
                                    <a href="editdata.php?id=<?php echo $mhs['id']; ?>" class="btn">Edit</a>
                                    <a href="deletedata.php?id=<?php echo $mhs['id']; ?>" class="btn" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</body>

</html>
