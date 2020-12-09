<?php
include_once '../config/Config.php';
$con = new Config();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/fd8370ec87.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="navbar" class="mb-4">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Sistem Informasi Penginapan</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a href="<?= $con->site_url() ?>admin/controller/logout.php" class="nav-link"> <i
                                class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="container">
        <div class="jumbotron">
            <div class="kotak">
                <?php if (isset($_SESSION['ket']) && $_SESSION['ket'] == '1') { ?>
                <div class="alert alert-success" role="alert">
                    Berhasil!
                </div>
                <?php unset($_SESSION['ket']); ?>
                <?php } ?>
                <?php if (isset($_SESSION['ket']) && $_SESSION['ket'] == '2') { ?>
                <div class="alert alert-danger" role="alert">
                    Gagal!
                </div>
                <?php unset($_SESSION['ket']); ?>
                <?php } ?>
            </div>
            <div class="row">
                <div id="navbar-example" class="col-lg-2">
                    <ul class="nav nav-tabs" role="tablist">
                        <div id="list-example" class="list-group">
                            <a class="list-group-item list-group-item-action"
                                href="<?= $con->site_url() ?>admin/index.php">Data Tamu</a>
                            <a class="list-group-item list-group-item-action"
                                href="<?= $con->site_url() ?>admin/index.php?mod=karyawan">Data Karyawan</a>
                            <a class="list-group-item list-group-item-action"
                                href="<?= $con->site_url() ?>admin/index.php?mod=kamar">Data Kamar</a>
                        </div>
                    </ul>
                </div>
                <div class="col-lg-10">
                    <?php include_once $content;  ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script src="<?= $con->site_url() ?>assets/main.js"></script>
</body>

</html>