<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Home page
Route::get('/', function () {
    $sqlPost = "select *, (select count(*) 
                    from comment 
                    where Post.Id = Comment.PostId) as amountOfComments, Post.Id as Id 
                from Post, User 
                where Post.UserId = User.Id  order by Post.Date desc";
    // $sqlUser = "select * from user";

    // $users = DB::select($sqlUser);
    $posts = DB::select($sqlPost);
    return view('home')->with('posts',$posts);

    // )->with('users',$users)
});

// Documentation
Route::get('/documentation', function () {
    return view('documentation');
});

//Displays comments of specific post
Route::get('/comment/{id}', function ($id) {
    if(!is_numeric($id)){
        die("Not Numeric");
    };

    $post = get_post($id);
    $sqlComment = "select *, comment.Id as Id from comment, user where ? = comment.postId and comment.UserId = user.id";

    $comments = DB::select($sqlComment, array($id));
    
    // dump($post);

    return view('comment')->with('post',$post)->with('comments',$comments);
});

// Delete comment
Route::get('/deletecomment/{id}', function ($id) {
    if(!is_numeric($id)){
        die("Not Numeric");
    };

    $query = "SELECT PostId FROM Comment WHERE ? = Id";
    $postId = DB::select($query, array($id));


    $result = json_decode(json_encode($postId), true);
    $postIdNum = $result[0]["PostId"];
    if(remove_comment($id)){
        return redirect("/comment/$postIdNum");
    } else {
        die("Error Removing Item");
    }
});

//Displays recent posts from last 7 Days
Route::get('/recent', function () {

    $startDate = date('d/m/Y');

    $endDate = date('d/m/Y', strtotime('-7 days'));
    $query = "select *, (select count(*) 
    from comment 
    where Post.Id = Comment.PostId) as amountOfComments, Post.Id as Id from Post, User where Post.UserId = User.Id and date BETWEEN ? and ?";
    $postPastSeven = DB::select($query, array("$endDate", "$startDate"));
    return view('recent')->with('posts', $postPastSeven);
});


// Displays unique user
Route::get('/unique', function () {
    
    $uniqueUsers = DB::select("select *, (select count(*) from Post where User.Id = Post.UserId) as postCount from User");
    return view('unique')->with('users',$uniqueUsers);
});

// Display a unique users post
Route::get('/userpost/{id}', function ($id) {
    if(!is_numeric($id)){
        die("Not Numeric");
    };
    $sqlPost = "select *, (select count(*) 
                    from comment 
                    where Post.Id = Comment.PostId) as amountOfComments, Post.Id as Id 
                from Post, User 
                where ? = Post.UserId and Post.UserId = User.Id  order by Post.Date desc";

    $posts = DB::select($sqlPost, array($id));
    // return view('home')->with('posts',$posts);

    return view('userpost')->with('posts',$posts);
});


// // Testing Route Ignore This
// Route::get('/test', function () {
//     $sql = "select Id from User where 'Banana1'=Name";
// // $userId = DB::select("select Id from User where '$username'=Name");

//     //  var_dump($userId)
//     $items = DB::select($sql); 
//     $result = json_decode(json_encode($items), true);
//     // $result = fetch_array($items);
//     // $new = get_object_vars($items);
//     // $newUserId = $new[0]['id'];
//     // $test = count(DB::select("select count(*) from User where name = 'bcamell011'"));
//     $test = count(DB::select("select * from User where name = 'bcam'"));
//     dump(date('d/m/Y')); });


Route::get('add_comment/{id}', function($id) {
    if(!is_numeric($id)){
        die("Not Numeric");
    };

    $username = request('username');
    $message = request('message');
    // $id = 
    add_comment($username, $message, $id);

    if($id){
        return redirect("comment/$id");
    } else {
        die("Error Adding Item");
    }

});

Route::get('add_post', function() {
    $username = request('username');
    $message = request('message');
    $title = request('title');
    // $icon = request('icon');
    $date = date('d/m/Y');
    // $id = id('postId');
    // add_post($username, $message, $title, /* $icon,*/ $date);

    if(add_post($username, $message, $title, /* $icon,*/ $date)){
        return redirect("/");
        // return redirect("/comment/$id");
    } else {
        die("Error Adding Item");
    }

});

Route::get('delete_post/{id}', function($id){
    if(!is_numeric($id)){
        die("Not Numeric");
    };
    
    if(remove_post($id)){
        return redirect("/");
    } else {
        die("Error Removing Item");
    }
});

Route::post('edit_post', function() 
{   
    $userId = request('userId');
    $message = request('message');
    $title = request('title');
    // $icon = request('icon');
    $date = date('d/m/Y');
    $postId = request('postId');

    update_item($userId, $message, $title, /* $icon,*/ $date, $postId);  

    return redirect("/comment/$postId");
});



// FUNCTIONS:

// Update post

function update_item($userId, $message, $title, /* $icon,*/ $date, $id) { 
    $sql = "UPDATE Post SET UserId = ?, Title = ?, Message = ?, Date = ? WHERE Id = ?";   
    DB::update($sql, array($userId, "$title", "$message", "$date", $id)); 
}

// Add Comment Function



function add_comment($username, $message, $postid){

    // $userId = DB::select("select id from User where name = $username");
    // Search for id of user from username
    
    $usernameExistsQuery = "select * from User where name = ?";

    // if (count($posts) != 1DB::select("select Id from User where '$username'=Name")) {
    // echo(DB::select("select count(*) from User where name = '$username'") == 0);
    if (count(DB::select($usernameExistsQuery, array("$username"))) == 0) {

        add_user($username);

        // $userId = DB::select("select Id from User where '$username'=Name");
        // user doesn't exist
        // If doesn't exist then create new user
        
     } else {
        // $userId = DB::select("select Id from User where '$username'=Name");
     };
    
    $selectUserId = "select Id from User where ? = Name";
    $userId = DB::select($selectUserId, array("$username"));
    //  $new = json_decode($userId, true);
    //  $newUserId = $userId[0]['id'];
    //  if($userId->num_rows > 0) {
    //     $row = $userId->fetch_assoc();
    //     $newUserId = $row["id"];
    // }
    $newUserId = json_decode(json_encode($userId), true);
    $new = $newUserId[0]["Id"];
    // dump($newUserId);
     
    //  var_dump($userId);
    //  var_dump($userId);
    //  var_dump($username);

    //  $newUserId = array_shift( $userId );
    //  exit;
     
    //  PostId INTEGER REFERENCES Post(Id),
    //  Message TEXT,
    //  UserId INTEGER REFERENCES User(Id)
    
    
    $sql = "insert into comment (UserId, Message, PostId) values (?,?,?)";
    DB::insert($sql, array($new, "$message", $postid));
    
    // DB::insert("insert into comment (UserId, Message, PostId) values ($new, '$message', $postid)");


    // $id = DB::getPdo()->lastInsertId();
    // return $id;

    



    
}

// Add Post Function
function add_post($username, $message, $title, /*$icon,*/ $date){

    $checkUserQuery = "select * from User where name = ?";

    if (count(DB::select($checkUserQuery, array("$username"))) == 0) {

        add_user_withIcon($username/*, $icon*/);

     };
        
    $selectIdQuery = "select Id from User where ? = Name";
     $userId = DB::select($selectIdQuery, array("$username"));

    $newUserId = json_decode(json_encode($userId), true);
    $new = $newUserId[0]["Id"];

    $sql = "insert into post (UserId, Title, Message, Date) values (?, ?, ?, ?)";
    DB::insert($sql, array($new, "$title", "$message", "$date"));

    return True;
}

// Remove Post
function remove_post($id){

    $removeCommentQuery = "delete from Comment where PostId = ?";
    $removePostQuery = "delete from Post where Id = ?";

    DB::delete($removeCommentQuery, array($id));
    DB::delete($removePostQuery, array($id));
    return True;
}

// Remove Comments
function remove_comment($id){

    $deleteCommentSingleQuery = "delete from Comment where Id = ?";

    DB::delete($deleteCommentSingleQuery, array($id));
    return True;
}

/* Gets item with the given id */ 
function get_post($id) { 
    $sql = "select *, (select count(*) 
                    from comment 
                    where post.id = comment.PostId) as amountOfComments, ? as Id 
                from Post, user 
                where post.UserId = user.Id and ? = post.id"; 
    $posts = DB::select($sql, array($id, $id));
    // If we get more than one item or no items display an error 
    if (count($posts) != 1) { 
        die("Invalid query or result"); 
    }
    // Extract the first item (which should be the only item) 
    $post = $posts[0]; 
    return $post;
};


// Add new user

function add_user($username){

    // add_icon
    $addUserQuery = "insert into User (Lynch, IconId, Name) values (0, 1, ?)";
    DB::insert($addUserQuery, array("$username"));


};

//  add new icon (default Icon)
function add_user_withIcon($username/*, $icon*/){

    $addUserWithIconQuery = "insert into User (Lynch, IconId, Name) values (0, 1, ?)";
    DB::insert($addUserWithIconQuery, array("$username"));

};



// default lynch Name VARCHAR(12) DEFAULT '' NOT NULL UNIQUE,
        // lynch BOOLEAN,
        // IconId INTEGER NOT NULL REFERENCES Icon(Id) 
        // creates new ICON as well, but the Icon is the default (which for now will be null but change this to be a default)