<?php

$title = 'Detail';

require '../layouts/header.php';

require 'navbar.php';

require '../../public/app.php';

$result = mysqli_query($conn, "SELECT * FROM ((history_lelang 
                        INNER JOIN barang ON history_lelang.id_barang = barang.id_barang) 
                            INNER JOIN masyarakat ON history_lelang.id_user = masyarakat.id_user) WHERE id_history ORDER BY id_history DESC LIMIT 1")

?>


<div class="d-flex justify-content-center mt-5">
    <div class="card shadow mt-5">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <div class="card-body">
                <h5>Pelelang : <?= $row['nama_lengkap']; ?></h5>
                <h5>Nama Barang : <?= $row['nama_barang']; ?></h5>
                <h5>Harga Akhir : <?= $row['penawaran_harga']; ?></h5>
                <a href="barangLelang.php" class="btn btn-primary">Kembali</a>
            </div>
        <?php endwhile; ?>
    </div>
</div>



<?php require '../layouts/footer.php'; ?>