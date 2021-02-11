<?php

$title = 'login';

require '../layouts/header.php';

require '../../public/app.php';


if (isset($_POST['submit'])) {

  if (loginpetugas($_POST) > 0) {
    header("location:petugas.php");
  } else {
    $error = true;
  }
}


?>


<div class="container mt-5">
  <div class="d-flex justify-content-center">
    <div class="card mt-5 border-left-primary border-bottom-primary w-75">
      <div class="card-body">
        <div class="row">
          <div class="col">
            <div class="image mt-3">
              <h2 class="text-center text-primary mb-3">Registrasi Akun</h2>
              <img src="../../assets/img/loginpetugas.svg" width="400px" alt="">
            </div>
          </div>
          <div class="col">
            <div class="mt-3">
              <div class="card shadow-sm">
                <div class="card-body">
                  <form action="" method="post">
                    <div class="form-group">
                      <label for="nama" class="text-dark">Nama</label>
                      <input type="text" id="nama" name="nama_petugas" placeholder="Masukkan Nama" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="username" class="text-dark">Username</label>
                      <input type="text" id="username" name="username" placeholder="Masukkan Username" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="password" class="text-dark">Password</label>
                      <input type="password" id="password" name="password" placeholder="Masukkan Password" class="form-control">
                    </div>
                    <input type="hidden" name="level" value="petugas">
                    <button class="btn btn-primary col-12 mb-3" type="submit" name="submit">Masuk!</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php require '../layouts/footer.php'; ?>