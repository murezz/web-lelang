<?php

$title = 'Dashboard | Petugas';

require '../layouts/header.php';

require 'navbar.php';

require '../../public/app.php';

?>


<div class="container mt-5">
    <div class="row">
        <div class="col mt-5">
            <div class="desc mt-5">
                <h1 class="text-dark">Selamat Datang</h1>
                <h2 class="text-justify">
                    Lelang
                    <span class="text-primary">barang</span>
                    dengan aman dan mudah hanya di website
                    <span class="text-primary">lelangin</span>
                </h2>
                <a href="tambahBarang.php" class="btn btn-primary">Lelang Barang</a>
            </div>
        </div>
        <div class="col">
            <div class="image">
                <img src="../../assets/img/officer.svg" width="550px" alt="">
            </div>
        </div>
    </div>
</div>



<?php require '../layouts/footer.php'; ?>