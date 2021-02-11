<?php

$title = 'Detail Barang';

require '../layouts/header.php';

require 'navbar.php';

require '../../public/app.php';

$id = $_GET['id_barang'];

$result = mysqli_query($conn, "SELECT * FROM lelang INNER JOIN barang ON lelang.id_barang = barang.id_barang WHERE id_barang = $id");

?>


<div class="container mt-5">
    <div class="d-flex justify-content-center mt-5">
        <div class="card w-50 shadow-sm border-bottom-primary">
            <div class="card-header bg-primary">
                <h5 class="text-center text-light font-weight-bold mt-2">Detail Barang</h5>
            </div>
            <div class="card-body">
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <h5 class="text-gray-800 mb-2"><span class="text-gray-900">Nama Barang</span> : <?= $row['nama_barang']; ?></h5>
                    <h5 class="text-gray-800 mb-2"><span class="text-gray-900">Tanggal</span> : <?= $row['tgl']; ?></h5>
                    <h5 class="text-gray-800 mb-2"><span class="text-gray-900">Harga</span> : Rp. <?= $row['harga_awal']; ?></h5>
                    <h5 class="text-gray-800 mb-2"><span class="text-gray-900">Deskripsi</span>i : <?= $row['deskripsi_barang']; ?></h5>
                    <a href="dashboard.php" class="btn btn-outline-primary mt-2 col-4 ml-5">Kembali</a>
                    <a href="lelang.php?id_lelang=<?= $row['id_lelang']; ?>" class="btn btn-primary mt-2 col-6 ml-3">Tawar Barang</a>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>




<?php require '../layouts/footer.php'; ?>