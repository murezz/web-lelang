<?php

$title = 'Login';

require '../layouts/header.php';

require '../../public/app.php';


if (isset($_POST["submit"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM masyarakat WHERE username = '$username' AND password = '$password'");

    if (mysqli_num_rows($result) === 1) {
        header("location: dashboard.php");
    } else {
        $error = true;
    }
}


?>


<div class="d-flex justify-content-center mt-5">
    <div class="card mt-5 shadow border-bottom-primary">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="image">
                        <img src="../../assets/img/mobile.svg" width="350px" alt="">
                    </div>
                </div>
                <div class="col">
                    <div class="mt-3">
                        <h3 class="text-gray-900 text-center">Login</h3>
                        <hr class="bg-primary">
                        <form action="" method="post">
                            <?php if (isset($error)) : ?>
                                <div class="text-center mb-3">
                                    <span class="text-danger font-italic">Username Atau Password Salah!</span>
                                </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <input type="text" placeholder="Username" name="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Password" name="password" class="form-control" required>
                            </div>
                            <button class="btn btn-primary col-12 mb-3" type="submit" name="submit">Login</button>
                            <span class="ml-5">Belum Punya Akun? <a href="registrasi.php" style="text-decoration: none;">Buat Akun</a></span>
                            <div class="mt-2 text-center">
                                <a href="../petugas/login.php" style="text-decoration: none;">Login Petugas</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php require '../layouts/footer.php'; ?>