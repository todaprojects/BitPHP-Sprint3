<?php

namespace Views;

class Header {

    private $rootPath;
    private $requestPath;
    private $paths;

    private $html;

    public function __construct($rootPath, $paths, $requestPath) {
        $this->rootPath = $rootPath;
        $this->paths = $paths;
        $this->requestPath = $requestPath;
        $this->render();
    }

    private function render() {
        $this->html = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>PHP Sprint 3 - ' . $this->requestPath . '</title>
                <link rel="stylesheet" href="' . $this->rootPath . 'assets/css/normalize.css">
                <link rel="stylesheet" href="' . $this->rootPath . 'assets/css/style_main.css">
            </head>
            <body>
                <div class="container">
                    <header>
                        <div id="wrap">
                            <a href="' . $this->rootPath . '"><img src="' . $this->rootPath . 'assets/img/logo.png" width="200px" height="100px"></a>
                            <menu>
                                <ul>
                                    '. $this->getPaths() . '
                                </ul>
                            </menu>
                        </div>
                    </header>
        ';
    }

    private function getPaths() {
        $html = '';
        foreach ($this->paths as $path) {
            if ($path != 'admin' && $path != '') {
                $html .= '<li><a href="' . $this->rootPath . urlencode($path) . '">' . urldecode($path) . '</a></li>';
            }
        }
        return $html;
    }

    public function __toString() {
        return $this->html;
    }
}
