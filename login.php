<html>
    <head>
        <title>rizky</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <br>Write and edit by rizky
    <h6>Silahkan Isikan Username dan Password untuk Login</h6>
    <body>
        <div class="col-md-6 col-md-offset-3">
            <form action="" method="POST">
                <div class="form-group">
                    <label> Username </label>
                    <input type="text"  name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label> Password </label>
                    <input type="password"  name="password" class="form-control" required>
                </div>
                <input type="submit" class="btn btn-primary" value="Login" name="login"/>
            </form>
        </div>
    </body>
</html>

<?php
// Menggunakan koneksi database dari file eksternal
include "koneksi.php";

// Cek apakah form login telah di-submit
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query menggunakan mysqli
    $query = "SELECT * FROM user WHERE username=? AND password=?";
    $stmt = mysqli_prepare($db, $query);

    // Bind parameter dan execute
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);

    // Mendapatkan hasil query
    $result = mysqli_stmt_get_result($stmt);

    // Mengecek apakah ada hasil
    if (mysqli_num_rows($result) > 0) {
        // Memulai session dan menyimpan data session
        session_start();
        $data = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $data['username'];
        $_SESSION['nama'] = $data['nama'];
        echo "<script language=\"javascript\">alert(\"Selamat Datang\");document.location.href='index.php';</script>";
    } else {
        echo "<script language=\"javascript\">alert(\"Password atau Username Salah !!!\");document.location.href='login.php';</script>";
    }

    // Menutup statement
    mysqli_stmt_close($stmt);
}

// Menutup koneksi database
mysqli_close($db);
?>