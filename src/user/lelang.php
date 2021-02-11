<?php

$title = 'Lelang Barang';

require '../layouts/header.php';

require 'navbar.php';

require '../../public/app.php';

$id = $_GET['id_lelang'];
$lelang = mysqli_query($conn, "SELECT * FROM lelang INNER JOIN barang ON lelang.id_barang = barang.id_barang WHERE id_lelang = $id");

$user = mysqli_query($conn, "SELECT * FROM masyarakat");


if (isset($_POST['submit'])) {

    if (lelang($_POST)) {
        header("location: penawaran.php");
    } else {
        $error = true;
    }
}


?>


<div class="d-flex justify-content-center mt-5">
    <?php while ($row = mysqli_fetch_assoc($lelang)) : ?>
        <div class="card w-25 shadow">
            <div class="card-header bg-primary">
                <h5 class="mt-2 text-center text-uppercase text-light"><?= $row['nama_barang']; ?></h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col">
                        <h5 class="text-dark">Bid Tertinggi: Rp. <?= $row['harga_akhir']; ?></h5>
                    </div>
                    <div class="col">
                        <div class="d-flex justify-content-end">
                            <h5 class="text-dark">Harga Awal: Rp. <?= $row['harga_awal']; ?></h5>
                        </div>
                    </div>
                </div>
                <form action="" method="post">
                    <!-- hidden -->

                    <input type="hidden" name="id_lelang" value="<?= $row['id_lelang']; ?>">
                    <input type="hidden" name="id_barang" value="<?= $row['id_barang']; ?>">
                    <input type="hidden" name="id_petugas" value="<?= $row['id_petugas']; ?>">
                    <input type="hidden" name="status" value="<?= $row['status']; ?>">

                    <!-- end hiden -->
                    <div class="form-group mb-4">
                        <input type="date" name="tgl_lelang" placeholder="Tanggal" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <input type="number" name="harga_akhir" placeholder="Masukkan Bid" class="form-control">
                        <p class="font-italic">*Bid harus lebih dari Rp. <?= $row['harga_akhir']; ?></p>
                    </div>
                    <div class="form-group mb-3">
                        <select name="id_user" id="user" class="form-control">
                            <option selected disabled>Cari Nama Anda</option>
                            <?php while ($row = mysqli_fetch_assoc($user)) : ?>
                                <option value="<?= $row['id_user']; ?>"><?= $row['nama_lengkap']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <button class="btn btn-primary col-4" type="submit" name="submit">Kirim</button>
                </form>
            </div>
        </div>
    <?php endwhile; ?>
</div>




<?php require '../layouts/footer.php'; ?>