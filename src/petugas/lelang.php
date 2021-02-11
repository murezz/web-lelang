<?php

$title = 'Lelang';

require '../layouts/header.php';

require 'navbar.php';

require '../../public/app.php';

$id = $_GET['id_barang'];

$barang = mysqli_query($conn, "SELECT * FROM barang WHERE id_barang = $id");
$petugas = mysqli_query($conn, "SELECT * FROM petugas WHERE level = 'petugas'");
$user = mysqli_query($conn, "SELECT * FROM masyarakat ORDER BY id_user DESC LIMIT 1");

if (isset($_POST['submit'])) {

    if (lelangBarang($_POST) > 0) {
        header("location: barangLelang.php");
    } else {
        $error = true;
    }
}

?>


<div class="container">
    <div class="d-flex justify-content-center">
        <div class="card w-50">
            <?php if (isset($error)) : ?>
                <div class="card-header text-danger font-italic">
                    <div class="row">
                        <div class="col">
                            <div class="mt-2">
                                <span>*Maaf Barang sudah terlelang</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex justify-content-end">
                                <a href="barang.php" class="btn btn-outline-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <div class="col mb-3">
                            <?php while ($row = mysqli_fetch_assoc($barang)) : ?>
                                <h4 class="text-dark">Nama Barang : <?= $row['nama_barang']; ?></h4>
                                <input type="hidden" value="<?= $row['id_barang']; ?>" name="id_barang" required>
                            <?php endwhile; ?>
                        </div>
                        <div class="col mb-3">
                            <label for="petugas">Nama Petugas</label>
                            <select class="form-control" name="id_petugas" id="petugas" required>
                                <option selected disabled value="">Pilih Petugas</option>
                                <?php while ($row = mysqli_fetch_assoc($petugas)) : ?>
                                    <option value="<?= $row['id_petugas']; ?>"><?= $row['nama_petugas']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <label for="tgl">Tanggal</label>
                        <input type="date" id="tgl" name="tgl_lelang" class="form-control" required>
                    </div>
                    <!-- HIdden -->
                    <input type="hidden" name="harga_akhir" value="0" id="">
                    <?php while ($row = mysqli_fetch_assoc($user)) : ?>
                        <input type="hidden" name="id_user" value="<?= $row['id_user']; ?>" id="">
                    <?php endwhile; ?>
                    <!-- end hidden -->
                    <div class="form-row">
                        <div class="col mb-3 mt-2 ml-3">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="status" value="dibuka" id="exampleCheck1" required>
                                <label class="form-check-label" for="exampleCheck1">Buka Lelang</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <div class="col">
                                <button class="btn btn-primary" type="submit" name="submit">Kirim</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php require '../layouts/footer.php'; ?>