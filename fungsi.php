<?php

$koneksi = mysqli_connect("localhost", "root", "", "zydweekly");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

function tampildata($query)
{
    global $koneksi;

    $result = mysqli_query($koneksi, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function upload()
{
    if (!isset($_FILES['foto']) || $_FILES['foto']['error'] === UPLOAD_ERR_NO_FILE) {
        return 'default.png';
    }

    if ($_FILES['foto']['error'] !== UPLOAD_ERR_OK) {
        return 'default.png';
    }

    $namaFile = $_FILES['foto']['name'];
    $tmpName  = $_FILES['foto']['tmp_name'];
    $fileSize = $_FILES['foto']['size'];
    $fileExt  = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

    if (!in_array($fileExt, $allowedExtensions, true)) {
        return 'default.png';
    }

    if ($fileSize > 5 * 1024 * 1024) {
        return 'default.png';
    }

    $uploadDir = __DIR__ . '/assets/img/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $newFileName = uniqid('img_', true) . '.' . $fileExt;
    if (move_uploaded_file($tmpName, $uploadDir . $newFileName)) {
        return $newFileName;
    }

    return 'default.png';
}

function tambahdata($data)
{
    global $koneksi;

    $nama    = htmlspecialchars($data['nama']);
    $nim     = htmlspecialchars($data['nim']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $email   = htmlspecialchars($data['email']);
    $no_hp   = htmlspecialchars($data['no_hp']);

    $foto = upload();

    $query = "INSERT INTO mahasiswa
              (nama, nim, jurusan, email, no_hp, foto)
              VALUES
              ('$nama', '$nim', '$jurusan', '$email', '$no_hp', '$foto')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function editdata($data)
{
    global $koneksi;

    $id        = $data['id'];
    $nama      = htmlspecialchars($data['nama']);
    $nim       = htmlspecialchars($data['nim']);
    $jurusan   = htmlspecialchars($data['jurusan']);
    $email     = htmlspecialchars($data['email']);
    $no_hp     = htmlspecialchars($data['no_hp']);
    $fotoLama  = $data['fotoLama'];

    if ($_FILES['foto']['error'] === 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload();
    }

    $query = "UPDATE mahasiswa SET
                nama = '$nama',
                nim = '$nim',
                jurusan = '$jurusan',
                email = '$email',
                no_hp = '$no_hp',
                foto = '$foto'
              WHERE id = '$id'";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function hapusdata($id)
{
    global $koneksi;

    $id = (int)$id;

    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = $id");

    return mysqli_affected_rows($koneksi);
}
