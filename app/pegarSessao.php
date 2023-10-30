<?php
    session_start();

    $_SESSION['id_pasta'] = $_POST['id_pasta'];

    header("Location: home.php");
?>