<?php
$con->auth();
$conn = $con->koneksi();
switch (@$_GET['page']) {
    case 'add':
        $content = "views/kamar/tambah.php";
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
                    $new_Foto = uniqid() . "_" . $_POST['nama'];
                    $new_Foto .= '.';
                    $new_Foto .= $eksfoto;
                    // $destination_path = getcwd() . DIRECTORY_SEPARATOR;
                    $destination_path = $_SERVER['DOCUMENT_ROOT'] . '/UAS/';
                    // Target
                    $target_foto = $destination_path . 'assets/upload/' . $new_Foto;
                    if (empty($_POST['nama'])) {
                        $err['nama'] = "Nama Wajib";
                    }
                    if (empty($_POST['no_kamar'])) {
                        $err['nomer'] = "wajib diisi";
                    }
                    if (empty($_POST['harga'])) {
                        $err['harga'] = "wajib diisi";
                    }
                    if (!isset($err)) {
                        $sql = "INSERT INTO kamar (foto_kamar, jenis_kamar, no_kamar, harga) 
            VALUES ('$new_Foto','$_POST[nama]', '$_POST[no_kamar]', '$_POST[harga]')";
                        if ($conn->query($sql) === TRUE) {
                            move_uploaded_file($tmpfoto, $target_foto);
                            $_SESSION['ket'] = '1';
                            header('Location: http://localhost/UAS/admin/index.php?mod=kamar');
                        } else {
                            $_SESSION['ket'] = '2';
                            header('Location: http://localhost/UAS/admin/index.php?mod=kamar');
                        }
                    }
                }
            }
        } else {
            $_SESSION['ket'] = '2';
            header('Location: http://localhost/UAS/admin/index.php?mod=kamar');
        }
        break;
    case 'edit':
        $kamar = "select * from kamar where md5(id)='$_GET[id]'";
        $kamar = $conn->query($kamar);
        $_POST = $kamar->fetch_assoc();
        //var_dump($kamar);
        $content = "views/kamar/ubah.php";
        include_once 'views/template.php';
        break;
    case 'proses_edit':
        $user_cari = "SELECT * FROM kamar WHERE id='$_POST[id]'";
        $user_cari = $conn->query($user_cari)->fetch_assoc();
        if ($_POST['nama'] == $user_cari['jenis_kamar'] && $_POST['no_kamar'] == $user_cari['no_kamar'] && $_POST['harga'] == $user_cari['harga'] && $_FILES['foto']['error'] != 0) {
            $_SESSION['ket'] = '1';
            header('Location:' . $con->site_url() . 'admin/index.php?mod=kamar');
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
                        $new_Foto = uniqid() . "_" . $_POST['nama'];
                        $new_Foto .= '.';
                        $new_Foto .= $eksfoto;
                        $destination_path = $_SERVER['DOCUMENT_ROOT'] . '/UAS/';
                        // Target
                        $target_foto = $destination_path . 'assets/upload/' . $new_Foto;
                        $in_nama = $_POST['nama'];
                        $in_nomer = $_POST['no_kamar'];
                        $in_harga = $_POST['harga'];
                        $in_sql =
                            "UPDATE kamar SET foto_kamar='$new_Foto', jenis_kamar ='$in_nama',no_kamar= '$in_nomer',harga= '$in_harga' WHERE id='$_POST[id]'";
                        if ($conn->query($in_sql) === true) {
                            move_uploaded_file($tmpfoto, $target_foto);
                            $_SESSION['ket'] = '1';
                            header('Location: http://localhost/UAS/admin/index.php?mod=kamar');
                        } else {
                            $_SESSION['ket'] = '2';
                            header('Location: http://localhost/UAS/admin/index.php?mod=kamar');
                        }
                    }
                }
            } else {
                $in_nama = $_POST['nama'];
                $in_nomer = $_POST['no_kamar'];
                $in_harga = $_POST['harga'];
                $in_sql =
                    "UPDATE kamar SET jenis_kamar ='$in_nama',no_kamar= '$in_nomer',harga= '$in_harga' WHERE id='$_POST[id]'";
                if ($conn->query($in_sql) === true) {
                    $_SESSION['ket'] = '1';
                    header('Location: http://localhost/UAS/admin/index.php?mod=kamar');
                } else {
                    $_SESSION['ket'] = '2';
                    header('Location: http://localhost/UAS/admin/index.php?mod=kamar');
                }
            }
        }

        break;
    case 'delete';
        $sql_where = "SELECT * FROM kamar WHERE md5(id)='$_GET[id]'";
        $user_cari = $conn->query($sql_where)->fetch_array();
        if (unlink($_SERVER['DOCUMENT_ROOT'] . "/UAS/assets/upload/" . $user_cari['foto_kamar'])) {
            $kamar = "delete from kamar where md5(id)='$_GET[id]'";
            $kamar = $conn->query($kamar);
            $_SESSION['ket'] = '1';
            header('Location: http://localhost/UAS/admin/index.php?mod=kamar');
        } else {
            $_SESSION['ket'] = '2';
            header('Location: http://localhost/UAS/admin/index.php?mod=kamar');
        }


        break;
    default:
        $sql = "select * from kamar";
        $kamar = $conn->query($sql);
        $conn->close();
        $content = "views/kamar/tampil.php";
        include_once "views/template.php";
}