<?php

$title = 'Tambah Barang.php';

require '../layouts/header.php';

require 'navbar.php';

require '../../public/app.php';

if (isset($_POST['submit'])) {

    if (tambahBarang($_POST) > 0) {
        header("location: barang.php");
    } else {
        echo mysqli_error($conn);
    }
}

?>


<div class="d-flex justify-content-center">
    <div class="card w-50 shadow-sm">
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="nama" class="text-dark">Nama Barang</label>
                    <input type="text" name="nama_barang" id="nama" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tgl" class="text-dark">Tanggal</label>
                    <input type="date" name="tgl" id="tgl" class="form-control">
                </div>
                <div class="form-group">
                    <label for="harga" class="text-dark">Harga</label>
                    <input type="number" name="harga_awal" id="harga" class="form-control">
                </div>
                <div class="form-group">
                    <label for="desc" class="text-dark" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi_barang" id="desc" class="form-control" rows="3"></textarea>
                </div>
                <button class="btn btn-primary" type="submit" name="submit">Tambah</button>
            </form>
        </div>
    </div>
</div>



<?php require '../layouts/footer.php'; ?>