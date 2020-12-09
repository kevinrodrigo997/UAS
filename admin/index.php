    <?php
    include_once '../config/Config.php';
    $con = new Config();
    if ($con->auth()) {
        //panggil fungsi
        switch (@$_GET['mod']) {
            case 'karyawan':
                include_once 'controller/karyawan.php';
                    break;
            case 'kamar':
                include_once 'controller/kamar.php';
                break;
            default:
                include_once 'controller/tamu.php';
        }
    } else {
        //panggil cont login
        include_once 'controller/login.php';
    }
    ?>