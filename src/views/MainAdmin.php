<?php

namespace Views;

class MainAdmin extends Main {

    private $post;
    private $isNewPost;

    function __construct($em, $requestPath, $isNewPost) {
        parent::__construct($em, $requestPath);
        $this->post = $this->postEntity->getPost();
        $this->isNewPost = $isNewPost;
        $this->render();
    }

    private function render() {
        $inputType = 'text';
        $buttonStyle = '';
        if ($this->requestPath == '' && !$this->isNewPost) {
            $inputType = 'hidden';
            $buttonStyle = 'style = "display: none;"';
        }
        $this->html =
        '
            <div class="container-2">
                <div id="wrap2">
                    <span>hello, admin</span>
                        <menu>
                                <ul style="display: flex;">
                                    <li>
                                        <form class="inline" action="./" method="POST">
                                            <button class="link-button" type="submit" name="addNewPost">new post</button>
                                        </form>
                                    </li>
                                    <li>
                                        <form class="inline" action="src/utils/logout.php" method="POST">
                                            <button class="link-button" type="submit" name="logout">logout</button>
                                        </form>
                                    </li>
                                </ul>
                        </menu>
                    </div>
                </div>
            <main>';
                if (isset($_SESSION['msg'])) $this->html .= '<h1 class="message">' . $_SESSION['msg'] . '</h1>';
                        $this->html .= '
                    <article>';
        if ($this->isNewPost) {
            $this->html .= '
                        <form class="edit_form" action="src/utils/add_post.php" method="post">            
                            <input type="' . $inputType . '" name="title" id="title" value="" placeholder="title">
                            <textarea id="post" name="post" placeholder="write your post here..."></textarea>
                            <button type="submit" name="savePost">publish</button>
                        </form>
            ';
        } elseif ($this->post != null) {
            $this->html .= '
                        <form class="edit_form" action="src/utils/update_post.php" method="post">
                            <input type="hidden" name="id" value="' . $this->post->getId() . '" placeholder="title">
                            <input type="' . $inputType . '" name="title" id="title" value="' . $this->requestPath . '" placeholder="title">
                            <textarea id="post" name="post" placeholder="write your post here...">' . $this->post->getBody() . '</textarea>
                            <button type="submit" name="updatePost">update</button>
                            <button type="submit" id="delete" name="deletePost" ' . $buttonStyle . '>delete</button>
                        </form>
            ';
        } else {
            $this->html .= '<h1 class="title">' . $this->requestPath . '</h1>';
        }
            $this->html .= '
                    </article>
                </main>
        ';
    }

    public function __toString() {
        return $this->html;
    }
}
