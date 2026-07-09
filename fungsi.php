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
    $namaFile = $_FILES['foto']['name'];
    $tmpName  = $_FILES['foto']['tmp_name'];

    if ($namaFile == '') {
        return 'default.png';
    }

    move_uploaded_file($tmpName, 'assets/img/' . $namaFile);

    return $namaFile;
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
