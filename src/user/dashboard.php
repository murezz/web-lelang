<?php

$title = 'Lelangin';

require '../layouts/header.php';

require 'navbar.php';

require '../../public/app.php';

$result = mysqli_query($conn, "SELECT * FROM lelang INNER JOIN barang ON lelang.id_barang = barang.id_barang");
$jumlah = mysqli_query($conn, "SELECT * FROM barang ORDER BY id_barang DESC LIMIT 1");

?>


<div class="container">
    <div class="row">
        <div class="col-6 mt-5">
            <div class="desc mt-5">
                <h1 class="text-gray-900 mb-3">Website pusat <span class="text-primary">lelang</span> terbesar di
                    <span class="text-primary">Indonesia.</span>
                </h1>
                <p class="mb-4">Website ini menyediakan barang lelang dengan kualitas <br> yang bagus
                    dari seluruh kota di Indonesia.</p>
                <div class="row">
                    <div class="col-3">
                        <h5 class="text-primary font-weight-bold">20 ++</h5>
                        <p class="text-gray-800">Pelelang</p>
                    </div>
                    <div class="col-3">
                        <?php while ($row = mysqli_fetch_assoc($jumlah)) : ?>
                            <h5 class="text-primary font-weight-bold"><?= $row['id_barang']; ?> ++</h5>
                        <?php endwhile ?>
                        <p class="text-gray-800">Barang</p>
                    </div>
                    <div class="col-3">
                        <h5 class="text-primary font-weight-bold">36 ++</h5>
                        <p class="text-gray-800">Terjual</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="image mt-3">
                <img src="../../assets/img/img.png" alt="">
            </div>
        </div>
    </div>

    <div class="input-group mb-3 col-11 ml-3">
        <div class="input-group-prepend">
            <button class="btn btn-primary" id="basic-addon1"><i class="fas fa-search fa-sm"></i></button>
        </div>
        <input type="search" class="form-control py-4 shadow" placeholder="Cari barang" aria-label="search" aria-describedby="basic-addon1">
    </div>

    <div class="text-center mt-5">
        <h3 class="text-gray-800">Rekomendasi Barang lelang</h3>
        <hr>
    </div>

    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <div class="col-4">
                <div class="card border-left-primary shadow-sm h-500 py-2 mb-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col">
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $row['nama_barang']; ?></div>
                                <div class="mt-2">
                                    Rp. <?= $row['harga_awal']; ?>
                                </div>
                            </div>
                            <div class="col">
                                <a href="lelang.php?id_lelang=<?= $row['id_lelang']; ?>" class="btn btn-primary">Lelang Barang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>


<?php require '../layouts/footer.php'; ?>