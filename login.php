<?php
include("inc_koneksi.php");
$username = "";
$password = "";
$err = "";
if (isset($_post['login'])){
    $username =$_post['username'];
    $password =$_post['password'];
    if ($username == '' or $password == ''){
        $err .= "<li>Silahkan masukkan username dan password</li>";
    }
    if(empty($err)){
        $sql1 = "select * from admin where username = $username";
        $q1 = mysqli_query($koneksi, $sql1);
        $r1 = mysqli_fetch_array($q1);
        if ($r1['password'] != md5($password)){
            $err .= "<li>Akun tidak ditemukan</li>";
        }
    }
    if(empty($err)){
        $_SESSION['admin_username'] = $username;
        header('location:admin_depan.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="app">
        <h1>Halaman Login</h1>
        <form action="" method="post">
            <input type="text" name="username" class="input" placeholder="username"/> <br /> <br />
            <input type="text" name="username" class="input" placeholder="password" /> <br /> <br />
            <input type="submit" name="login" value="submit" />
        </form>
    </div>
</body>
</html>