<?php
namespace wad;

class Post{
    //member variables
    var $username;
    var $userImage;
    var $message;
    var $date;

    function __construct($username, $userImage, $message, $date, $commented){
        $this->username = $username;
        $this->userImage = $userImage;
        $this->message = $message;
        $this->date = $date;
        $this->commented = $commented;
    }

    function getComments(){

    }

}

?>