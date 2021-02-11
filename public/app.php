<?php

$conn = mysqli_connect("localhost", "root", "", "lelang");


function regisuser($data)
{

    global $conn;

    $nama = htmlspecialchars($data['nama_lengkap']);
    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);
    $telp = htmlspecialchars($data['telp']);

    mysqli_query($conn, "INSERT INTO masyarakat VALUES('', '$nama', '$username', '$password', '$telp')");

    return mysqli_affected_rows($conn);
}

function loginpetugas($data)
{

    global $conn;

    $nama = htmlspecialchars($data['nama_petugas']);
    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);
    $level = htmlspecialchars($data['level']);

    mysqli_query($conn, "INSERT INTO petugas VALUES('', '$nama', '$username', '$password', '$level')");

    return mysqli_affected_rows($conn);
}

function lelangBarang($data)
{

    global $conn;

    $id_barang = htmlspecialchars($data['id_barang']);
    $tgl = htmlspecialchars($data['tgl_lelang']);
    $harga = htmlspecialchars($data['harga_akhir']);
    $id_user = htmlspecialchars($data['id_user']);
    $id_petugas = htmlspecialchars($data['id_petugas']);
    $status = htmlspecialchars($data['status']);

    mysqli_query($conn, "INSERT INTO lelang VALUES('', '$id_barang', '$tgl', '$harga', '$id_user', '$id_petugas', '$status')");

    return mysqli_affected_rows($conn);
}

function tambahBarang($data)
{

    global $conn;

    $nama = htmlspecialchars($data['nama_barang']);
    $tgl = htmlspecialchars($data['tgl']);
    $harga = htmlspecialchars($data['harga_awal']);
    $desc = htmlspecialchars($data['deskripsi_barang']);

    mysqli_query($conn, "INSERT INTO barang VALUES('', '$nama', '$tgl', '$harga', '$desc')");

    return mysqli_affected_rows($conn);
}

function terlelang($data)
{

    global $conn;

    $id_lelang = htmlspecialchars($data['id_lelang']);
    $id_barang = htmlspecialchars($data['id_barang']);
    $id_user = htmlspecialchars($data['id_user']);
    $penawaran = htmlspecialchars($data['penawaran_harga']);

    mysqli_query($conn, "INSERT INTO history_lelang VALUES('', '$id_lelang', '$id_barang', '$id_user', '$penawaran')");

    return mysqli_affected_rows($conn);
}

function lelang($data)
{

    global $conn;

    $id = htmlspecialchars($data['id_lelang']);
    $id_barang = htmlspecialchars($data['id_barang']);
    $tgl = htmlspecialchars($data['tgl_lelang']);
    $harga = htmlspecialchars($data['harga_akhir']);
    $id_user = htmlspecialchars($data['id_user']);
    $id_petugas = htmlspecialchars($data['id_petugas']);
    $status = htmlspecialchars($data['status']);

    $query = "UPDATE lelang SET 
                id_barang = '$id_barang',
                tgl_lelang = '$tgl',
                harga_akhir = '$harga',
                id_user = '$id_user',
                id_petugas = '$id_petugas',
                status = '$status'
                WHERE id_lelang = '$id'
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function editbarang($data)
{

    global $conn;

    $id = htmlspecialchars($data['id_barang']);
    $nama = htmlspecialchars($data['nama_barang']);
    $tgl = htmlspecialchars($data['tgl']);
    $harga = htmlspecialchars($data['harga_awal']);
    $desc = htmlspecialchars($data['deskripsi_barang']);

    $query = "UPDATE barang SET
                nama_barang = '$nama',
                tgl = '$tgl',
                harga_awal = '$harga',
                deskripsi_barang = '$desc'
                WHERE id_barang = '$id'
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function hapusBarang($id)
{

    global $conn;

    mysqli_query($conn, "DELETE FROM barang WHERE id_barang = $id");

    return mysqli_affected_rows($conn);
}


function hapusLelang($id)
{

    global $conn;

    mysqli_query($conn, "DELETE FROM lelang WHERE id_lelang = $id");

    return mysqli_affected_rows($conn);
}

function hapusPetugas($id)
{

    global $conn;

    mysqli_query($conn, "DELETE FROM petugas WHERE id_petugas = $id");

    return mysqli_affected_rows($conn);
}
