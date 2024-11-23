<?php
session_start();
if(isset($_POST['submit'])) {
    require 'db.php';
    $tai_khoan = $_POST['tai_khoan'];
    $password = $_POST['password'];
    $sql = 'SELECT * FROM user WHERE ten_dang_nhap=:ten_dang_nhap';
    $statement = $connection->prepare($sql);
    $statement->execute([':ten_dang_nhap' => $tai_khoan ]);
    $user = $statement->fetch(PDO::FETCH_OBJ); 
    if($user != null && $user->mat_khau == $password) {
        $lifetime = 24*60*60;
        $_SESSION['email'] = $email;
        setcookie('lifetime',time()+$lifetime);
        setcookie($tai_khoan, $password,$lifetime, "/");
        header('Location: san_pham_admin.php');
    } else {
        $error = "Sai tên đăng nhập hoặc mật khẩu.";
             }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Teddy Store</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
      @import url("CSS/styles.css");
    </style>
    <header><div class="header-text"> </div>
    </header>
  </head>
  <body id="body-login">
    <section class="wrapper">  
        <div class="login">
            <div class="d1 step1">
                <span>Đăng Nhập</span>
                <form 
                action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                    <div class="input-area">
                    <i class="fa-solid fa-user input-icon"></i>
                    <input type="text" id="tai_khoan" name="tai_khoan" placeholder="Tài khoản">                   
                </div>
                    <div class="input-area">
                    <i class="fa-solid fa-lock input-icon"></i>
                    <input type="password" id="password" name="password" placeholder="Mật khẩu" style ="margin-left: 3px;">
                    </div>
                    <button type="submit" class="btn-login" value="Submit" name="submit">Đăng nhập</button>
                </form>
                <?php if(isset($error)): ?>
                    <div class="error"><?php echo $error; ?></div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    </body>
</html>
