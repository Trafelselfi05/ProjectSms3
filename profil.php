<?php
session_start();
include 'db.php'; //agar query bisa berjalan
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '" . $_SESSION['id'] . "' ");
$d = mysqli_fetch_object($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>

<body>
    <!--Header-->
    <header>
        <div class="container">
            <h1><a href="dashboard.php">TokoKarmaIndah</a></h1>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="data-kategori.php">Data Kategori</a></li>
                <li><a href="data-produk.php">Data Produk</a></li>
                <li><a href="keluar.php">Keluar</a></li>
            </ul>
        </div>
    </header>
    <!--Content-->
    <div class="section">
        <div class="container">
            <h3>Profile</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control"
                        value="<?php echo $d->admin_name ?>" required>
                    <input type="text" name="user" placeholder="Username" class="input-control"
                        value="<?php echo $d->username ?>" required>
                    <input type="text" name="hp" placeholder="No Handphone" class="input-control"
                        value="<?php echo $d->admin_telp ?>" required>
                    <input type="email" name="email" placeholder="Email" class="input-control"
                        value="<?php echo $d->admin_email ?>" required>
                    <input type="text" name="alamat" placeholder="Alamat" class="input-control"
                        value="<?php echo $d->admin_addres ?>" required>
                    <input type="submit" name="submit" value="Ubah Profile" class="btn">
                </form>
                <?php
                if (isset($_POST['submit'])) {

                    $nama = ucwords($_POST['nama']);
                    $user = $_POST['user'];
                    $hp = $_POST['hp'];
                    $emai = $_POST['email'];
                    $alamat = ucwords($_POST['alamat']);

                    $update = mysqli_query($conn, "UPDATE tb_admin SET
                    admin_name  = '" . $nama . "',
                    username  = '" . $user . "',
                    admin_telp = '" . $hp . "',
                    admin_addres = '" . $alamat . "'
                    WHERE admin_id = '" . $d->admin_id . "' ");


                    if ($update) {
                        echo '<script>alert("Ubah data berhasil")</script>';
                        echo '<script>window.location="profil.php"</script>';
                    } else {
                        echo 'gagal' . mysqli_error($conn);
                    }
                }
                ?>
            </div>

            <!--Lupa Password-->
            <h3>Ubah Password</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="password" name="pass1" placeholder="Password Baru" class="input-control" required>
                    <input type="password" name="pass2" placeholder="Masukkan Ulang Password Baru" class="input-control" required>
                    <input type="submit" name="ubah_password" placeholder="Ubah Password" class="btn" >
                </form>
                <?php
                if (isset($_POST['ubah_password'])) {

                    $pass1 = $_POST['pass1'];
                    $pass2 = $_POST['pass2'];

                    if ($pass2 != $pass1) {
                        echo '<script>alert("Password Baru Tidak Sesuai")</script>';
                    }else {

                        $u_pass = mysqli_query($conn, "UPDATE tb_admin SET
                        password = '" . MD5($pass1) . "'
                        WHERE admin_id = '" . $d->admin_id . "' ");

                        if ($u_pass) {
                            echo '<script>alert("Ubah data berhasil")</script>';
                            echo '<script>window.location="profil.php"</script>';
                        }else {
                            echo 'gagal' . mysqli_error($conn);
                        }
                    }

                    
                }
                ?>
            </div>
        </div>
    </div>

    <!--Footer-->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2023 -TOKOKARMAINDAH.</small>
        </div>
    </footer>
</body>

</html>