<?php
     
    if ($_SESSION['user_id'] != true){
        header("Location:/home");
        
    }