<?php
$con->auth();
$conn = $con->koneksi();
switch (@$_GET['page']) {
    case 'add':
        $content = "views/tamu/tambah.php";
        include_once "views/template.php";
        break;
    case 'save':
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (empty($_POST['nama_tamu'])) {
                $err['nama_tamu'] = "Wajib diisi";
            }
            if (empty($_POST['nik'])) {
                $err['nik'] = "wajib diisi";
            }
            if (empty($_POST['jenis_kelamin'])) {
                $err['jenis_kelamin'] = "wajib diisi";
            }
            if (empty($_POST['alamat'])) {
                $err['alamat'] = "wajib diisi";
            }
            if (!isset($err)) {
                $sql = "INSERT INTO tamu (nama_tamu, nik, jenis_kelamin, alamat) 
            VALUES ('$_POST[nama_tamu]', '$_POST[nik]', '$_POST[jenis_kelamin]', '$_POST[alamat]')";
                if ($conn->query($sql) === TRUE) {
                    $_SESSION['ket'] = '1';
                    header('Location: http://localhost/UAS/admin/?mod=tamu');
                } else {
                    $_SESSION['ket'] = '2';
                    header('Location: http://localhost/UAS/admin/?mod=tamu');
                }
            }
        } else {
            $err['msg'] = "tidak diijinkan";
        }
        break;
    case 'edit':
        $tamu = "select * from tamu where md5(id)='$_GET[id]'";
        $tamu = $conn->query($tamu);
        $_POST = $tamu->fetch_assoc();
        $content = "views/tamu/ubah.php";
        include_once 'views/template.php';
        break;
    case 'proses_edit':
        $in_nama = $_POST['nama_tamu'];
        $in_nik = $_POST['nik'];
        $in_jenis_kelamin = $_POST['jenis_kelamin'];
        $in_alamat = $_POST['alamat'];
        $in_sql =
            "UPDATE tamu SET nama_tamu ='$in_nama',nik= '$in_nik',jenis_kelamin= '$in_jenis_kelamin',alamat='$in_alamat' WHERE id='$_POST[id]'";
        if ($conn->query($in_sql) === true) {
            $_SESSION['ket'] = '1';
            header('Location: http://localhost/UAS/admin/?mod=tamu');
        } else {
            $_SESSION['ket'] = '2';
            header('Location: http://localhost/UAS/admin/?mod=tamu');
        }
        break;
    case 'delete';
        $tamu = "delete from tamu where md5(id)='$_GET[id]'";
        $tamu = $conn->query($tamu);
        $_SESSION['ket'] = '1';
        header('Location: http://localhost/UAS/admin/?mod=tamu');
        break;
    default:
        $sql = "select * from tamu";
        $tamu = $conn->query($sql);
        $conn->close();
        $content = "views/tamu/tampil.php";
        include_once "views/template.php";
}