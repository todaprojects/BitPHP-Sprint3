<?php

session_start();

use Models\Post;

require_once '../../config/bootstrap.php';

$post = new Post();
$dir;

if ($_POST['title'] != null) {
    $post->setTitle($_POST['title']);
    $dir = urlencode($_POST['title']);  
    $_SESSION['msg'] = 'new post has been published'; 
} else {
    $post->setTitle('__wrong title__');
    $dir = urlencode('__wrong title__');
    $_SESSION['msg'] = '<span>error:</span> the title should not be empty';
}

$post->setBody($_POST['post']);
$post->setIsHomepage(false);

$entityManager->persist($post);
$entityManager->flush();

header('location: ../../' . $dir);
exit();
