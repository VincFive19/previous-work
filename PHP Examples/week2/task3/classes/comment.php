<?php
namespace wad;
use wad\Post;
require_once 'posts.php';

class Comment extends Post{
    //member variables
    protected $commented;

    function __construct($username, $userImage, $message, $date, $commented){
        $this->commented = $commented;
        parent::__construct($username, $userImage, $message, $date);
    }

    function getComments(){

    }

}

?>