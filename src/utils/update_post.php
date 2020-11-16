<?php

session_start();

require_once '../../config/bootstrap.php';

$post = $entityManager->find('Models\Post', $_REQUEST['id']);

if (isset($_REQUEST['deletePost'])) {
    $entityManager->remove($post);
    $entityManager->flush();

    $_SESSION['msg'] = 'the post has been deleted';

    header('location: ../../');
} elseif (isset($_REQUEST['updatePost'])) {
    $dir;
    if ($_POST['title'] != null) {
        $post->setTitle($_POST['title']);
        $dir = urlencode($_POST['title']);  
        $_SESSION['msg'] = 'the post has been updated';
    } else {
        $post->setTitle('__wrong title__');
        $dir = urlencode('__wrong title__');
        $_SESSION['msg'] = '<span>error:</span> the title should not be empty';
    }
    $post->setBody($_POST['post']);

    $entityManager->persist($post);
    $entityManager->flush();

    header('location: ../../' . $dir);
}

exit();
