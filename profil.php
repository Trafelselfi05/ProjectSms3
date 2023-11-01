
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
            <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" required>
            <input type="text" name="user" placeholder="Username" class="input-control" required>
            <input type="text" name="hp" placeholder="No Handphone" class="input-control" required>
            <input type="email" name="email" placeholder="Email" class="input-control" required>
            <input type="text" name="alamat" placeholder="Alamat" class="input-control" required>
            <input type="submit" name="submit" value="Ubah Profile"class="btn">
            </form>
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