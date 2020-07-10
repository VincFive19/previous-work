<?php
namespace wd;

class Comment{
    //member variables
    var $username;
    var $commentDescription;


    function __construct($username, $commentDescription){
        $this->username = $username;
        $this->commentDescription = $commentDescription;

    }



}

?>