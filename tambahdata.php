<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa | Teknologi Informasi</title>
    <link rel="stylesheet" type="text/css" href="Assets/css/style.css">
</head>
<body>
    <div class="page-container">
        <header>
            <h1>Tambah Data Mahasiswa</h1>
            <nav>
                <a href="index.php">Home</a>
                <a href="profile.php">Profile</a>
                <a href="contact.php">Contact</a>
                <a href="mahasiswa.php">Data Mahasiswa</a>
            </nav>
        </header>
        <main>
            <form action="mahasiswa.php" method="post">
                <table cellpadding="10" cellspacing="5">
                    <tr>
                        <td><label for="nama">Nama:</label></td>
                        <td>:</td>
                        <td><input type="text" id="nama" name="nama" required></td>
                    </tr>
                    <tr>
                        <td><label for="nim">NIM:</label></td>
                        <td>:</td>
                        <td><input type="text" id="nim" name="nim" required></td>
                    </tr>
                    <tr>
                        <td><label for="foto">Foto (path atau URL):</label></td>
                        <td>:</td>
                        <td><input type="text" id="foto" name="foto" placeholder="Assets/images/nama.jpg" required></td>
                    </tr>
                    <tr>
                        <td><label for="uts">Nilai UTS:</label></td>
                        <td>:</td>
                        <td><input type="number" id="uts" name="uts" min="0" max="100" required></td>
                    </tr>
                    <tr>
                        <td><label for="uas">Nilai UAS:</label></td>
                        <td>:</td>
                        <td><input type="number" id="uas" name="uas" min="0" max="100" required></td>
                    </tr>
                    <tr>
                        <td><label for="tugas">Nilai Tugas:</label></td>
                        <td>:</td>
                        <td><input type="number" id="tugas" name="tugas" min="0" max="100" required></td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center">
                            <button type="submit">Kirim Data</button>
                        </td>
                    </tr>
                </table>
            </form>
            <p class="form-note">Data baru akan ditambahkan ke halaman Data Mahasiswa setelah dikirim.</p>
        </main>
    </div>
</body>
</html>
