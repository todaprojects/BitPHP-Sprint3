<?php

session_start();

$_SESSION['adminAccess'] = true;

header('location: ../');
exit();
