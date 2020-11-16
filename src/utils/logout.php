<?php

session_start();

if(isset($_REQUEST['logout'])) {
    unset($_SESSION['adminLoggedIn']);
    unset($_SESSION['adminAccess']);
}

header('Location: ../../');
exit();
