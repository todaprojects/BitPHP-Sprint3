<?php

namespace Views;

class MainUser extends Main {

    private $post;
    private $isAdminAccess;

    function __construct($em, $requestPath, $isAdminAccess) {
        parent::__construct($em, $requestPath);
        $this->isAdminAccess = $isAdminAccess;
        $this->post = $this->postEntity->getPost();
        $this->render();
    }

    private function render() {
        if ($this->isAdminAccess) {
            $this->html = '
            <main>';
            if (isset($_SESSION['msg'])) $this->html .= '<h1 class="message">' . $_SESSION['msg'] . '</h1>';
                $this->html .=
                '<form action="src/utils/login.php" method="post">
                    <h1>Please log in</h1>
                    <input type="text" name="username" id="username" placeholder="Username">
                    <input type="password" name="password" id="password" placeholder="Password">
                    <button type="submit" name="login">Login</button>
                </form>
            </main>
            ';
        } else {
            $body = '';
            $date = '';
            if ($this->post != null) {
                $body = $this->post->getBody();
                if (!$this->post->isHomepage()) {
                    $date = $this->post->getPostedAt();
                }
            }
            $this->html = '
        <main>';
        if (isset($_SESSION['msg'])) $this->html .= '<h1 class="message">' . $_SESSION['msg'] . '</h1>';
            $this->html .= '
            <h1 class="title">' . $this->requestPath . '</h1>
            <div class="info">' . $date . '</div>
            <article>
                ' . $body . '
            </article>
        </main>
        ';
        }
    }

    public function __toString() {
        return $this->html;
    }
}
