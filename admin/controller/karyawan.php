<?php
$con->auth();
$conn = $con->koneksi();
switch (@$_GET['page']) {
    case 'add':
        $content = "views/karyawan/tambah.php";
        include_once "views/template.php";
        break;
    case 'save':
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if ($_FILES['foto']['error'] == 0) {

                $eks_foto_boleh = array('png', 'jpg');
                $nama_foto = $_FILES['foto']['name'];
                $foto = explode('.', $nama_foto);
                $eksfoto = strtolower(end($foto));
                $ukuranfoto = $_FILES['foto']['size'];
                if (in_array($eksfoto, $eks_foto_boleh) === true) {
                    $tmpfoto = $_FILES['foto']['tmp_name'];
                    $new_Foto = uniqid() . "_" . $_POST['nama_karyawan'];
                    $new_Foto .= '.';
                    $new_Foto .= $eksfoto;
                    // $destination_path = getcwd() . DIRECTORY_SEPARATOR;
                    $destination_path = $_SERVER['DOCUMENT_ROOT'] . '/UAS/';
                    // Target
                    $target_foto = $destination_path . 'assets/upload/' . $new_Foto;
                    if (empty($_POST['nama_karyawan'])) {
                        $err['nama_karyawan'] = "Nama Wajib";
                    }
                    if (empty($_POST['id_karyawan'])) {
                        $err['id_karyawan'] = "wajib diisi";
                    }
                    if (empty($_POST['jenis_kelamin'])) {
                        $err['jenis_kelamin'] = "wajib diisi";
                    }
                    if (empty($_POST['alamat'])) {
                        $err['alamat'] = "wajib diisi";
                    }
                    if (!isset($err)) {
                        echo "disini";
                        $sql = "INSERT INTO karyawan (foto_karyawan, nama_karyawan, id_karyawan, jenis_kelamin, alamat) 
            VALUES ('$new_Foto','$_POST[nama_karyawan]', '$_POST[id_karyawan]', '$_POST[jenis_kelamin]', '$_POST[alamat]')";
                        if ($conn->query($sql) === TRUE) {
                            move_uploaded_file($tmpfoto, $target_foto);
                            $_SESSION['ket'] = '1';
                            header('Location:' . $con->site_url() . 'admin/index.php?mod=karyawan');
                        } else {
                            $_SESSION['ket'] = '2';
                            header('Location:' . $con->site_url() . 'admin/index.php?mod=karyawan');
                        }
                    }
                }
            }
        } else {
            $err['msg'] = "tidak diijinkan";
        }
        break;
    case 'edit':
        $karyawan = "select * from karyawan where md5(id)='$_GET[id]'";
        $karyawan = $conn->query($karyawan);
        $_POST = $karyawan->fetch_assoc();
        //var_dump($karyawan);
        $content = "views/karyawan/ubah.php";
        include_once 'views/template.php';
        break;
    case 'proses_edit':
        $user_cari = "SELECT * FROM karyawan WHERE id='$_POST[id]'";
        $user_cari = $conn->query($user_cari)->fetch_assoc();
        if ($_POST['nama_karyawan'] == $user_cari['nama_karyawan'] && $_POST['alamat'] == $user_cari['alamat'] && $_POST['id_karyawan'] == $user_cari['id_karyawan'] && $_POST['jenis_kelamin'] == $user_cari['jenis_kelamin'] && $_FILES['foto']['error'] != 0) {
            $_SESSION['ket'] = '1';
            header('Location:' . $con->site_url() . 'admin/index.php?mod=karyawan');
        } else {
            if ($_FILES['foto']['error'] == 0) {
                if (unlink($_SERVER['DOCUMENT_ROOT'] . "/UAS/assets/upload/" . $_POST['file_old'])) {
                    $eks_foto_boleh = array('png', 'jpg');
                    $nama_foto = $_FILES['foto']['name'];
                    $foto = explode('.', $nama_foto);
                    $eksfoto = strtolower(end($foto));
                    $ukuranfoto = $_FILES['foto']['size'];
                    $tmpfoto = $_FILES['foto']['tmp_name'];
                    if (in_array($eksfoto, $eks_foto_boleh) === true) {
                        //  Generate Nama Gambar Baru
                        $new_Foto = uniqid() . "_" . $_POST['nama_karyawan'];
                        $new_Foto .= '.';
                        $new_Foto .= $eksfoto;
                        $destination_path = $_SERVER['DOCUMENT_ROOT'] . '/UAS/';
                        // Target
                        $target_foto = $destination_path . 'assets/upload/' . $new_Foto;
                        $in_nama_karyawan = $_POST['nama_karyawan'];
                        $in_id_karyawan = $_POST['id_karyawan'];
                        $in_alamat = $_POST['alamat'];
                        $in_jenis_kelamin = $_POST['jenis_kelamin'];
                        $in_sql =
                            "UPDATE karyawan SET foto_karyawan ='$new_Foto', nama_karyawan ='$in_nama_karyawan',id_karyawan= '$in_id_karyawan',alamat= '$in_alamat',jenis_kelamin='$in_jenis_kelamin' WHERE id='$_POST[id]'";
                        if ($conn->query($in_sql) === true) {
                            move_uploaded_file($tmpfoto, $target_foto);
                            $_SESSION['ket'] = '1';
                            header('Location:' . $con->site_url() . 'admin/index.php?mod=karyawan');
                        } else {
                            $_SESSION['ket'] = '2';
                            header('Location:' . $con->site_url() . 'admin/index.php?mod=karyawan');
                        }
                    }
                }
            } else {
                $in_nama_karyawan = $_POST['nama_karyawan'];
                $in_id_karyawan = $_POST['id_karyawan'];
                $in_alamat = $_POST['alamat'];
                $in_jenis_kelamin = $_POST['jenis_kelamin'];
                $in_sql =
                    "UPDATE karyawan SET nama_karyawan ='$in_nama_karyawan',id_karyawan= '$in_id_karyawan',alamat= '$in_alamat',jenis_kelamin='$in_jenis_kelamin' WHERE id='$_POST[id]'";
                if ($conn->query($in_sql) === true) {
                    $_SESSION['ket'] = '1';
                    header('Location:' . $con->site_url() . 'admin/index.php?mod=karyawan');
                } else {
                    $_SESSION['ket'] = '2';
                    header('Location:' . $con->site_url() . 'admin/index.php?mod=karyawan');
                }
            }
        }
        break;
    case 'delete';
        $sql_where = "SELECT * FROM karyawan WHERE md5(id)='$_GET[id]'";
        $user_cari = $conn->query($sql_where)->fetch_array();
        if (unlink($_SERVER['DOCUMENT_ROOT'] . "/UAS/assets/upload/" . $user_cari['foto_karyawan'])) {
            $karyawan = "delete from karyawan where md5(id)='$_GET[id]'";
            $karyawan = $conn->query($karyawan);
            $_SESSION['ket'] = '1';
            header('Location: http://localhost/UAS/admin/index.php?mod=karyawan');
        } else {
            $_SESSION['ket'] = '2';
            header('Location: http://localhost/UAS/admin/index.php?mod=karyawan');
        }

        break;
    case 'ajax':
        $sql_where = "SELECT * FROM karyawan WHERE nama_karyawan LIKE '%$_GET[cari]%' OR id_karyawan LIKE '%$_GET[cari]%'";
        $karyawan = $conn->query($sql_where);
        include_once "views/karyawan/table.php";
        break;
    default:
        $sql = "select * from karyawan";
        $karyawan = $conn->query($sql);
        $conn->close();
        $content = "views/karyawan/tampil.php";
        include_once "views/template.php";
}