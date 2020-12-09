<?php
if(isset($_POST['email'])){
    //action
    $conn=$con->koneksi();
    $email = $_POST['email'];
    $psw = md5($_POST['password']);
    $sql = "SELECT * FROM data_login WHERE password ='$psw' and email ='$email' and active='y'";
    $user = $conn->query($sql);
    if($user->num_rows > 0){
        $sess=$user->fetch_array();
        $_SESSION['login']['id_admin']=$sess['id_admin'];
        $_SESSION['login']['email'] = $sess['email'];
        header('Location: http://localhost/reservasi/admin/index.php?mod=tamu');
    }else{
        $msg="Email dan Password tidak cocok";
        include_once 'views/v_login.php';
    }
}else{
    include_once 'views/v_login.php';
}
?>