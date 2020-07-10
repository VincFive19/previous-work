<?php
namespace wad;
use wd\Comment;
require_once 'comment.php';

class Post{
    //member variables
    var $username;
    var $userImage;
    var $message;
    var $date;
    var $commented;

    function __construct($username, $userImage, $message, $date, $commented){
        $this->username = $username;
        $this->userImage = $userImage;
        $this->message = $message;
        $this->date = $date;
        $this->commented = $commented;
    }

    function addComment($commentUsername, $commentDescriptionInput){
        $commented = array();
        $comment = new Comment($commentUsername, $commentDescriptionInput);
        array_push($commented, $comment);
    }

}

?>