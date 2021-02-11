<?php

$title = 'Semua Barang';

require '../layouts/header.php';

require 'navbar.php';

require '../../public/app.php';

$result = mysqli_query($conn, "SELECT * FROM 
                        (( lelang INNER JOIN barang ON lelang.id_barang = barang.id_barang ) 
                            INNER JOIN petugas ON lelang.id_petugas = petugas.id_petugas) 
                            WHERE harga_akhir = 0 ");

?>


<div class="container mt-5">
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="h5 font-weight-bold text-primary text-uppercase mb-2">
                                    <?= $row['nama_barang']; ?>
                                </div>
                                <div class="h6 mb-1 font-weight-bold text-gray-800"><i class="fas fa-calendar-alt"></i> <?= $row['tgl']; ?></div>
                                <div class="h6 mb-1 font-weight-bold text-gray-800">Rp. <?= $row['harga_awal']; ?></div>
                                <div class="h6 mb-1 font-weight-bold text-gray-800"><i class="fas fa-user-tie"></i> Petugas : </div>
                                <div class="h6 mb-1 font-weight-bold text-gray-800"><?= $row['nama_petugas']; ?></div>
                            </div>
                            <div class="col-auto mt-3">
                                <a href="lelang.php?id_lelang=<?= $row['id_lelang']; ?>" style="text-decoration: none;">
                                    <div class="h4 mb-1 font-weight-bold text-gray-800">
                                        <i class="fas fa-dollar-sign text-success"></i>
                                        Bid <br> Now
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>



<?php require '../layouts/footer.php'; ?>