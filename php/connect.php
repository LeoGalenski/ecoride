<?php

$connect = new PDO("mysql:host=localhost;dbname=ecoride_test", "root", "");
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
