<?php

$title = 'Registrasi';

require '../layouts/header.php';

require '../../public/app.php';

if (isset($_POST['submit'])) {
    if (regisuser($_POST) > 0) {
        header("location: index.php");
    } else {
        echo mysqli_error($conn);
    }
}

?>


<div class="container mt-5">
    <div class="d-flex justify-content-center mt-5">
        <div class="card w-50 mt-3 shadow-sm">
            <div class="card-header bg-primary">
                <h3 class="text-center text-light mt-2">Registrasi</h3>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="nama" class="text-gray-900">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama_lengkap">
                    </div>
                    <div class="form-group">
                        <label for="username" class="text-gray-900">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Masukkan Username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="pw" class="text-gray-900">Password</label>
                        <input type="text" class="form-control" id="pw" placeholder="Masukkan Password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="telp" class="text-gray-900">No Telepeon</label>
                        <input type="text" class="form-control" id="telp" placeholder="Masukkan No Telepon" name="telp">
                    </div>
                    <button name="submit" type="submit" class="btn btn-primary">Konfirm</button>
                </form>
            </div>
        </div>
    </div>
</div>



<?php require '../layouts/footer.php'; ?>