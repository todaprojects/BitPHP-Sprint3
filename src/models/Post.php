<?php

namespace Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="posts")
 */
class Post {
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $body;

    /** 
     * @ORM\Column(type="datetime")
     */
    private $postedAt;

    /** 
     * @ORM\Column(type="boolean", options={"default":false})
     */
    private $isHomepage = false;

    public function __construct() {
        $this->postedAt = new \DateTime();
    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getBody() {
        return $this->body;
    }

    public function setBody($body) {
        $this->body = $body;
    }

    public function getPostedAt() {
        $date = $this->postedAt;
        return date_format($date, "M d, Y");
    }

    public function setPostedAt($setPostedAt) {
        $this->setPostedAt = $setPostedAt;
    }

    public function isHomepage() {
        return $this->isHomepage;
    }

    public function setIsHomepage($isHomepage) {
        $this->isHomepage = $isHomepage;
    }
}
