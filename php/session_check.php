<?php

session_start();

$isLoggedIn = isset($_SESSION['user_id']);
$userId     = $_SESSION['user_id']    ?? null;
$username   = $_SESSION['username']   ?? null;
$userEmail  = $_SESSION['user_email'] ?? null;

$isDriver   = $_SESSION['driver']     ?? false;
$isPassenger = $_SESSION['passenger'] ?? false;
$isEmployee = $_SESSION['employee']   ?? false;
