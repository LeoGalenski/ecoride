<?php

require_once 'session_check.php';

if (!$isLoggedIn) {
    header("Location: ../Ecoride/login.php");
    exit;
}
