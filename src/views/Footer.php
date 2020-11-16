<?php

namespace Views;

class Footer {

    private $html;

    public function __construct() {
        $this->render();
    }

    private function render() {
        $this->html = '
                <footer>
                    <div>
                        &copy; 2020 todaprojects
                    </div>
                </footer>
            </div>
        </body>
        </html>
        ';
    }

    public function __toString() {
        return $this->html;
    }
}
