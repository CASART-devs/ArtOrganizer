<?php

namespace artorganizer\Controller;

class ValidarController
{
    public function __construct()
    {
        if (!$_SESSION['user_id']) {
            header("Location:/home");

        }
    }
}