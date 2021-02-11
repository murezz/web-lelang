<?php

$title = 'Petugas';

require '../layouts/header.php';

require 'navbar.php';

require '../../public/app.php';

$result = mysqli_query($conn, "SELECT * FROM petugas WHERE level = 'petugas'");

?>

<div class="p-5">
    <div class="container">
        <h3 class="text-dark">Daftar Petugas</h3>
        <table class="table table-bordered shadow-sm">
            <thead class="text-center">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Petugas</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">
                        <a href="registrasi.php" class="btn btn-primary">+ Petugas</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr class="text-center">
                        <th scope="row" class="text-center"><?= $i++; ?></th>
                        <td class="text-capitalize"><?= $row['nama_petugas']; ?></td>
                        <td><?= $row['username']; ?></td>
                        <td>*****</td>
                        <td class="text-center">
                            <a href="hapusPetugas.php?id_petugas=<?= $row['id_petugas']; ?>" class="text-danger"><i class="fas fa-times-circle fa-2x"></i></a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>




<?php require '../layouts/footer.php'; ?>