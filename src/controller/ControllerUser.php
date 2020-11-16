<?php

namespace Controller;

use Views\Header;
use Views\MainUser;
use Views\Footer;

class ControllerUser extends Controller {

    private $isAdminAccess;

    function __construct($entityManager, $rootPath, $paths, $isAdminAccess) {
        parent::__construct($entityManager, $rootPath, $paths);
        $this->isAdminAccess = $isAdminAccess;
    }

    public function setRequestPath($requestPath) {
        $this->requestPath = $requestPath;
        $this->renderHtml();
    }

    public function renderHtml() {
        $this->header = new Header($this->rootPath, $this->paths, $this->requestPath);
        $this->main = new MainUser($this->em, $this->requestPath, $this->isAdminAccess);
        $this->footer = new Footer();
    }

    public function __toString() {
        $html = $this->header->__toString()
            . $this->main->__toString()
            . $this->footer->__toString();
        return $html;
    }
}
