<?php
session_start();
$defaultStudents = [
    [
        'nama' => 'Uss TAZZ',
        'nim' => '13242520030',
        'foto' => 'Assets/images/Fanny.jpg',
        'uts' => 85,
        'uas' => 90,
        'tugas' => 80,
    ],
    [
        'nama' => 'Kairiiiii',
        'nim' => '13242520031',
        'foto' => 'Assets/images/Kairi.jpg',
        'uts' => 85,
        'uas' => 90,
        'tugas' => 80,
    ],
];

if (!isset($_SESSION['students'])) {
    $_SESSION['students'] = $defaultStudents;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama'] ?? '');
    $nim = trim($_POST['nim'] ?? '');
    $foto = trim($_POST['foto'] ?? '');
    $uts = intval($_POST['uts'] ?? 0);
    $uas = intval($_POST['uas'] ?? 0);
    $tugas = intval($_POST['tugas'] ?? 0);

    if ($nama && $nim && $foto) {
        $_SESSION['students'][] = [
            'nama' => htmlspecialchars($nama, ENT_QUOTES, 'UTF-8'),
            'nim' => htmlspecialchars($nim, ENT_QUOTES, 'UTF-8'),
            'foto' => htmlspecialchars($foto, ENT_QUOTES, 'UTF-8'),
            'uts' => $uts,
            'uas' => $uas,
            'tugas' => $tugas,
        ];
    }
    header('Location: mahasiswa.php');
    exit;
}

$students = $_SESSION['students'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="Assets/css/style.css">
</head>
<body>
    <hr>
    <h1 align="center">WEB TI UNIMUS 2026 UYY</h1>
    <table border="1" align="center" cellspacing="5" cellpadding="10">
        <tr>
            <td><a href="index.php">Home</a></td>
            <td><a href="profile.php">Profile</a></td>
            <td><a href="contact.php">Contact</a></td>
            <td><a href="mahasiswa.php">Data Mahasiswa</a></td>
        </tr>
    </table>
    <h2>Data Mahasiswa</h2>
    <a href="tambahdata.php"><button>Tambah Data</button></a>
    <table border="1" align="center" cellspacing="5" cellpadding="10">
        <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">Nama</th>
            <th rowspan="2">NIM</th>
            <th rowspan="2">Foto</th>
            <th colspan="3">Nilai</th>
        </tr>
        <tr>
            <th>UTS</th>
            <th>UAS</th>
            <th>Tugas</th>
        </tr>
        <?php foreach ($students as $index => $student): ?>
            <tr>
                <td align="center"><?php echo $index + 1; ?></td>
                <td><?php echo $student['nama']; ?></td>
                <td><?php echo $student['nim']; ?></td>
                <td><img src="<?php echo $student['foto']; ?>" alt="Foto <?php echo $student['nama']; ?>" width="100"></td>
                <td align="center"><?php echo $student['uts']; ?></td>
                <td align="center"><?php echo $student['uas']; ?></td>
                <td align="center"><?php echo $student['tugas']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
