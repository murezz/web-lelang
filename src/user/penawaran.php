<?php

$title = 'Penawaran';

require '../layouts/header.php';

require 'navbar.php';

require '../../public/app.php';

$result = mysqli_query($conn, "SELECT * FROM 
                        (( lelang INNER JOIN barang ON lelang.id_barang = barang.id_barang ) 
                            INNER JOIN masyarakat ON lelang.id_user = masyarakat.id_user)  
                            WHERE harga_akhir > 0");

?>

<div class="container">
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <div class="col-4 mb-3">
                <div class="card border-bottom-primary">
                    <div class="card-body">
                        <h5 class="text-primary text-uppercase font-weight-bold mb-2"><?= $row['nama_barang']; ?></h5>
                        <h5>Tanggal: <?= $row['tgl_lelang']; ?></h5>
                        <h5>Penawar: <?= $row['nama_lengkap']; ?></h5>
                        <h5>Penawaran: Rp. <?= $row['harga_akhir']; ?></h5>
                        <a href="lelang.php?id_lelang=<?= $row['id_lelang']; ?>" class="btn btn-primary col-12 mt-2">Bid Barang</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>




<?php require '../layouts/footer.php'; ?>