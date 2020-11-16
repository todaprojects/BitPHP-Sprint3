<?php

namespace Controller;

abstract class Controller {

    protected $em;

    protected $rootPath;
    protected $requestPath;
    protected $paths;

    protected $header;
    protected $main;
    protected $footer;

    public function __construct($entityManager, $rootPath, $paths) {
        $this->em = $entityManager;
        $this->rootPath = $rootPath;
        $this->paths = $paths;
    }

    abstract function setRequestPath($requestPath);

    abstract function renderHtml();
    
    abstract function __toString();
}
