<?php 
    if(isset($_COOKIE['lifetime'])) $lifetime = time()-$_COOKIE['lifetime'];
    else $lifetime =-1;
    session_start();
    if(isset($_SESSION['email']) and $lifetime<0) {
        header("Location: /Project_demo/san_pham_admin.php");
    } else {   
        header("Location: /Project_demo/san_pham.php");
    }
?>
