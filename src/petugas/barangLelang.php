<?php

$title = 'Barang Lelang';

require '../layouts/header.php';

require 'navbar.php';

require '../../public/app.php';

$result = mysqli_query($conn, "SELECT * FROM (( lelang INNER JOIN barang ON lelang.id_barang = barang.id_barang ) INNER JOIN petugas ON lelang.id_petugas = petugas.id_petugas )");

?>


<div class="container mt-5">
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-80 py-2">
                    <div class="card-body">
                        <div class="h5 font-weight-bold text-primary text-uppercase mb-3">
                            <?= $row['nama_barang']; ?>
                        </div>
                        <div class="h6 mb-2 font-weight-bold text-gray-800"><i class="fas fa-calendar-alt"></i> <?= $row['tgl']; ?></div>
                        <div class="h6 mb-2 font-weight-bold text-gray-800">Rp. <?= $row['harga_awal']; ?></div>
                        <div class="h6 mb-1 font-weight-bold text-gray-800"><i class="fas fa-user-tie"></i> Nama Petugas</div>
                        <div class="h6 mb-4 font-weight-bold text-gray-800 ml-3"><?= $row['nama_petugas']; ?></div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>



<?php require '../layouts/footer.php'; ?>