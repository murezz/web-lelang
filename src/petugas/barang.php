<?php

$title = 'Semua Barang';

require '../layouts/header.php';

require 'navbar.php';

require '../../public/app.php';

$result = mysqli_query($conn, "SELECT * FROM barang ORDER BY id_barang DESC");


?>


<div class="container mt-3">
    <h3><a href="tambahBarang.php" class="btn btn-primary">Tambah Barang</a></h3>
    <hr class="bg-primary">
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <div class="col-3 mb-5">
                <div class="card shadow-sm border-bottom-primary">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-10">
                                <h5 class="text-gray-900 mt-2 text-uppercase font-weight-bold"><?= $row['nama_barang']; ?></h5>
                            </div>
                            <div class="col-2">
                                <div class="d-flex justify-content-end">
                                    <a href="hapusBarang.php?id_barang=<?= $row['id_barang']; ?>" class="text-danger"><i class="fas fa-times-circle fa-2x"></i></a>
                                </div>
                            </div>
                        </div>
                        <h5 class="mb-3"><span class="text-dark">Tanggal :</span> <?= $row['tgl']; ?></h5>
                        <h5 class="mb-3"><span class="text-dark">Harga :</span> Rp.<?= $row['harga_awal']; ?></h5>
                        <h5 class="mb-3"><span class="text-dark">Deskripsi :</span> <?= $row['deskripsi_barang']; ?></h5>
                        <a href="editBarang.php?id_barang=<?= $row['id_barang']; ?>" class="btn btn-outline-primary col-4">Edit</a>
                        <a href="lelang.php?id_barang=<?= $row['id_barang']; ?>" class="btn btn-primary col-7 ml-2">Lelang</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>



<?php require '../layouts/footer.php'; ?>