
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
    $posts = array();
    $posts[0] = array(
        'username' => 'MonkeyLord777',
        'userImage' => 'banana.jpg',
        'message' => 'I like SupCom',
        'date' => '13/7/2019'
    );
    $posts[1] = array(
        'username' => 'Bananana',
        'userImage' => 'Monkeylord.jpg',
        'message' => 'Banana is my favourite vegetable',
        'date' => '5/1/2015'
    );
    $posts[2] = array(
        'username' => 'ShrimpMan',
        'userImage' => 'OdontodactylusScyllarus.jpg',
        'message' => "I'm a tasty Caridea, aka in my case Odontodactylus Scyllarus",
        'date' => '12/12/2065'
    );

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
            <?php foreach ($posts as $post) { ?>
            <div class="jumbotron border-primary text-black row justify-content-between">
                <h4><?= $post['username']?></h4>
                    <div class="row">
                        <div class="col-md-3">
                            <img class="w-100" src="<?= $post['userImage']?>">
                        </div>
                        <div class="col-md-3 ml-auto text-right text-sm-left">
                        <p><?= $post['date']?></p>
                        <p><?= $post['message']?></p>
                
                    </div>
                </div>
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