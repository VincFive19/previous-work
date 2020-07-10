
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
<body>

<?php 
    use wad\Post;
    // use wd\Comment;
    // use wad\Commented;
    require 'classes/posts.php';
    // require_once 'classes/commented.php';
    // require 'classes/comment.php';

    // $comments = array();
    // $comments[0] = array(
    //     $comment1 = new Comment('Bananaman24', 'I LIKE BANANANANANANANANA'), $comment2 = new Comment('StinkyCheese', 'Cheesy'), $comment3 = new Comment('MonkeyLord777', 'Strategic Launch Detected'),

    // );
    // $comments[1] = array(
    //     $comment1 = new Comment('Test', 'Tester'), $comment2 = new Comment('VenomPower', 'Tasty'), $comment3 = new Comment('CHicken Nuggets', 'The burgers are better'),
    // );
    // $comments[2] = array(
    //     $comment1 = new Comment('pastry', 'Like the chicken'), $comment2 = new Comment('The Mother', "Don't drink the blue vials"), $comment3 = new Comment('What in the/..', 'Strategic Launch Detected'),

    // );
    



$post1 = new Post("BananaBran", "banana.jpg", "Welcome to the state of bananaBRan", "It was the year 3000", array());
$post2 = new Post("The Mother", "mother.jpg", "**Secretly a volitile**", "2014",  array());
$post3 = new Post("Pi", "Raspi-PGB001.png", "The MicroComputer for NERDS", "14/7/2019",  array());

$posts = [$post1, $post2, $post3];

$post1->addComment('Bananaman24', 'I LIKE BANANANANANANANANA')
?>


<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    
    <a class="navbar-brand">Social Network</a>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link">Photos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link">Friends</a>
        </li>
        <li class="nav-item">
            <a class="nav-link">Login</a>
        </li>
        </ul>
        
</nav>

    <!-- <div class="row justify-content-between border-primary">
        <div class="col-md-3">
            <h1>Social Network</h1>
        </div>
        <div class="col-md-3">
            <div>

            </div>
            <p>Photos   Friends    Login</p>
        </div>
        
    </div> -->

    <div class="row justify-content-around">
        <div class="col-sm-2"><!--left-->
            <h3>Name:</h3>
            <p class="border border-primary">Bob</p>

            <h3>Message:</h3>
            <p class="border border-primary">Bob is cool</p>
        </div>

        <div class="col-lg-6">
            <h3>Bob Sanders</h3>
            <?php foreach ($posts as $posted) { ?>
            <div class="jumbotron border-primary text-black row justify-content-between">
                <h4><?= $username = $posted->username?></h4>
                    <div class="row">
                        <div class="col-md-3">
                            <img class="w-100" src="<?= $userImage = $posted->userImage?>">
                        </div>
                        <div class="col-md-3 ml-auto text-right text-sm-left">
                        <p><?= $date = $posted->date?></p>
                        <p><?= $message = $posted->message?></p>
                
                    </div>
                </div>
            </div>
            <div>
                <?php foreach ($posted->commented as $single) { ?>
                   
                    <div class="card">
                        <div class="card-header"><?= $usernameComment = $single->username?></div>
                        <div class="card-body">
                            <p class="card-text"><?= $commentDescription = $single->commentDescription?></p>
                        </div>
                    </div>
                    
                <?php }?>
            </div>
            <?php } //end loop ?>
        </div>
        
    </div>
    
    <div>
    </div>
    <div>
    </div>
    <div>
    </div>
</body>
</html>