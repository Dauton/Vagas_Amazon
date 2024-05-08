<?php

    if((!isset($_SESSION['usuario']) === true) && (!isset($_SESSION['senha']) === true))
    {
        header("Location: ../../index.php");
        die();
    }