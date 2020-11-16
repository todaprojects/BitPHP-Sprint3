<?php

namespace Controller;

use Views\Header;
use Views\MainAdmin;
use Views\Footer;

class ControllerAdmin extends Controller {

    private $isNewPost;

    function __construct($entityManager, $rootPath, $paths, $isNewPost) {
        parent::__construct($entityManager, $rootPath, $paths);
        $this->isNewPost = $isNewPost;
    }

    public function setRequestPath($requestPath) {
        $this->requestPath = $requestPath;
        $this->renderHtml();
    }

    public function renderHtml() {
        $this->header = new Header($this->rootPath, $this->paths, $this->requestPath);
        $this->main = new MainAdmin($this->em, $this->requestPath, $this->isNewPost);
        $this->footer = new Footer();
    }

    public function __toString() {
        $html = $this->header->__toString()
            . $this->main->__toString()
            . $this->footer->__toString();
        return $html;
    }
}
