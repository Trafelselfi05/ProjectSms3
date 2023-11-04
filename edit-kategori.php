<?php
session_start();
include 'db.php'; //agar query bisa berjalan
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
$kategori = mysqli_query($conn, "SELECT * FROM tb_category WHERE category_id = '".$_GET['id']."' ");
$k = mysqli_fetch_object($kategori);
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
            <h3>Edit Data Kategori</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Kategori" class="input-control" value="<?php echo $k->category_name ?>"required>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
               <?php
               if(isset($_POST['submit'])){
                $nama = ucwords($_POST['nama']);
                $insert = mysqli_query($conn, "INSERT INTO tb_category VALUES (
                    null,
                    '".$nama."')");
                    if($insert){
                        echo '<script>alert("Tambah Data Sukses")</script>';
                        echo '<script>window.location="data-kategori.php"</script>';
                    }else{
                        echo 'gagal' .mysqli_error($conn);
                    }
               }
               ?>
            </div>

           
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