<?php
    session_start();
    session_destroy();
    header('Location: /Project_demo/index.php');
?>