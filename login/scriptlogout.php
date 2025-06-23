<?php
    session_start();
    session_destroy(); //Encerrar todas as sesões abertas
    header('Location:../index.php');
?>