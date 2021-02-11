<?php

$title = 'Penawaran';

require '../layouts/header.php';

require 'navbar.php';

require '../../public/app.php';

$result = mysqli_query($conn, "SELECT * FROM 
                        (( lelang INNER JOIN barang ON lelang.id_barang = barang.id_barang ) 
                            INNER JOIN masyarakat ON lelang.id_user = masyarakat.id_user) 
                            INNER JOIN petugas ON lelang.id_petugas = petugas.id_petugas
                            WHERE harga_akhir > 0");

?>

<div class="p-5">
    <div class="container">
        <h3 class="text-dark">Penawaran</h3>
        <table class="table table-bordered shadow-sm">
            <thead class="text-center">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Tanggal Lelang</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Penawar</th>
                    <th scope="col">Bid</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr class="text-center">
                        <th scope="row" class="text-center"><?= $i++; ?></th>
                        <td class="text-uppercase"><?= $row['nama_barang']; ?></td>
                        <td><?= $row['tgl_lelang']; ?></td>
                        <td><?= $row['harga_awal']; ?></td>
                        <td><?= $row['nama_lengkap']; ?></td>
                        <td><?= $row['harga_akhir']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>




<?php require '../layouts/footer.php'; ?>