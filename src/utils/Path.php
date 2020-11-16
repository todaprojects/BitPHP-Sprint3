<?php

namespace Utils;

class Path {

    private $em;
    private $posts;

    public function __construct($em) {
        $this->em = $em;
    }

    public function getPaths() {
        $this->posts = $this->em->getRepository('Models\Post')->findAll();
        $paths = [];
        foreach ($this->posts as $post) {
            array_push($paths, $post->getTitle());
        }
        return $paths;
    }
}
