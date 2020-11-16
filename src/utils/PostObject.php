<?php

namespace Utils;

class PostObject {

    private $em;
    private $requestPath;
    private $post;

    public function __construct($em, $requestPath) {
        $this->em = $em;
        $this->requestPath = $requestPath;
    }

    public function getPost() {
        $this->post = $this->em->getRepository('Models\Post')->findOneBy(array('title' => $this->requestPath));
        return $this->post;
    }
}
