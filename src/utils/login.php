<?php

session_start();

require_once '../../config/bootstrap.php';

$matchAdmin = false;

if (isset($_REQUEST['login'])) {
    $adminRepository = $entityManager->getRepository('Models\Admin');
    $admins = $adminRepository->findAll();
    if ($_REQUEST['username'] != '' && $_REQUEST['password'] != '') {
        foreach ($admins as $admin) {
            $username = $admin->getUsername();
            $password = $admin->getPassword();
            $validPassword = password_verify(htmlspecialchars($_REQUEST['password']), $password);
            if ($username === htmlspecialchars($_REQUEST['username']) && $validPassword) {
                $matchAdmin = true;
                $_SESSION['adminLoggedIn'] = true;
                header('Location: ../../');
            }
        }
        if (!$matchAdmin) {
            $_SESSION['msg'] = '<span>error:</span> wrong username or password';
            header('Location: ../../admin/');
        }
    } else {
        $_SESSION['msg'] = '<span>error:</span> enter username and password';
        header('Location: ../../admin/');
    }
}

exit();
