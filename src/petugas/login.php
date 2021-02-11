<?php

$title = 'Login';

require '../layouts/header.php';

require '../../public/app.php';

if (isset($_POST['submit'])) {


    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM petugas WHERE username = '$username' AND password = '$password'");

    if (mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);
        if ($_SESSION['level'] = $row['level'] === 'administrator') {
            header("location: ../admin/index.php");
        } else if ($_SESSION['level'] = $row['level'] === 'petugas') {
            header("location: dashboard.php");
        }
    } else {
        $error = true;
    }
}

?>

<div class="container mt-5">
    <div class="d-flex justify-content-center">
        <div class="card w-50 mt-5 shadow">
            <div class="card-body">
                <form action="" method="post">
                    <a href="../user/login.php" class="text-dark"><i class="fas fa-arrow-circle-left fa-2x"></i></a>
                    <h3 class="text-center text-dark">Login</h3>
                    <hr>
                    <?php if (isset($error)) : ?>
                        <div class="text-center">
                            <span class="text-danger font-italic">Maaf username atau password salah!</span>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="username" class="text-dark">Username</label>
                        <input type="text" id="username" name="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-dark">Password</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary col-2" type="submit" name="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<?php require '../layouts/footer.php'; ?>