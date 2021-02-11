<?php

$title = 'Barang';

require '../layouts/header.php';

require 'navbar.php';

require '../../public/app.php';

$result = mysqli_query($conn, "SELECT * FROM barang ORDER BY id_barang DESC");

?>


<div class="p-5">
    <div class="container">
        <div class="row mb-2">
            <div class="col">
                <h3 class="text-dark">Daftar Barang</h3>
            </div>
            <div class="col">
                <div class="d-flex justify-content-end">
                    <a href="tambahBarang.php" class="btn btn-primary">Tambah Barang</a>
                </div>
            </div>
        </div>
        <table class="table table-bordered shadow-sm">
            <thead class="text-center">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Deskripsi Barang</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <th scope="row" class="text-center"><?= $i++; ?></th>
                        <td><?= $row['nama_barang']; ?></td>
                        <td><?= $row['tgl']; ?></td>
                        <td><?= $row['harga_awal']; ?></td>
                        <td><?= $row['deskripsi_barang']; ?></td>
                        <td class="text-center">
                            <a href="editBarang.php?id_barang=<?= $row['id_barang']; ?>" class="badge badge-success">Edit</a>
                            <a href="hapusBarang.php?id_barang=<?= $row['id_barang']; ?>" class="badge badge-danger">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>



<?php require '../layouts/footer.php'; ?>