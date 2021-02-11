<?php

$title = 'Lelang';

require '../layouts/header.php';

require 'navbar.php';

require '../../public/app.php';

$id = $_GET['id_lelang'];

$result = mysqli_query($conn, "SELECT * FROM lelang WHERE id_lelang = '$id'");

if (isset($_POST['submit'])) {

    if (terlelang($_POST) > 0) {
        header("location:detail.php");
    } else {
        echo mysqli_error($conn);
    }
}

?>


<div class="d-flex justify-content-center mt-5">
    <div class="card mt-5 shadow">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <form action="" method="post">
                <input type="hidden" name="id_lelang" value="<?= $row['id_lelang']; ?>">
                <input type="hidden" name="id_barang" value="<?= $row['id_barang']; ?>">
                <input type="hidden" name="id_user" value="<?= $row['id_user']; ?>">
                <input type="hidden" name="penawaran_harga" value="<?= $row['harga_akhir']; ?>">
                <div class="card-body">
                    <h5>Tanggal Lelang: <?= $row['tgl_lelang']; ?></h5>
                    <h5>Harga Akhir: <?= $row['harga_akhir']; ?></h5>
                </div>
                <div class="card-footer bg-transparent">
                    <button type="submit" name="submit" class="btn btn-primary">Lanjutin</button>
                </div>
            </form>
        <?php endwhile; ?>
    </div>
</div>


<?php require '../layouts/footer.php'; ?>