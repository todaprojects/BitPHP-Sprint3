<?php

namespace Views;

use Utils\PostObject;

abstract class Main {

    protected $em;

    protected $requestPath;
    protected $postEntity;
    protected $html;

    public function __construct($em, $requestPath) {
        $this->em = $em;
        $this->requestPath = $requestPath;
        $this->postEntity = new PostObject($this->em, $this->requestPath);
    }

    abstract function __toString();
}
