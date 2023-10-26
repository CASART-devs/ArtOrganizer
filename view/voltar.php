<?php 
    session_start();
    require_once "../model/conexao.php";

    unset($_SESSION['id_pasta']);
    header("location:home.php");
?>