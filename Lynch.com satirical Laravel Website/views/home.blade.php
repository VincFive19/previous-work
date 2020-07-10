@extends('layouts.master')
@section('title') 
    Home- Lynch.com
@endsection
@section('content') 

    <!-- ADD SEARCH FUNCTION TO SEARCH FOR USERS NAME OR POST DATA  https://www.w3schools.com/bootstrap4/bootstrap_filters.asp -->

    <div class="border p-3 m-sm-1">
    <h3>Add a new Post:</h3>
        <form method="get" action="{{ url("add_post") }}">
        {{ csrf_field() }}
            <!-- <div class="form-group">

            </div> -->

            <!-- Username -->
            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" id="username" placeholder="Username" name="username">
            </div>

            <!-- Title -->
            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" id="title" placeholder="Post Title" name="title">
            </div>
            <!-- Date done automatically -->
            


            <!-- <div class="form-group">
                <label for="icon">Icon</label>
            </div> -->
            <!-- Insert Icon -->
            <!-- <div class="custom-file">
                <input type="file" class="custom-file-input" id="icon" required name="icon">
                <label class="custom-file-label" for="icon">Choose file...</label>
            </div> -->

            <!-- Message -->
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" rows="3" name="message"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Post</button>
        </form>
    </div>


    @forelse($posts as $post)

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-1">
                    <img src="{{url('/images/avatar.png')}}" alt="Username" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                </div>
                <div class="col">
                    <p class="float-right"><a href="#" class="text-primary" data-toggle="modal" data-target="#post{{$post->Id}}">edit</a> <a href="{{ url("delete_post/$post->Id") }}" class="text-primary">delete</a></p>
                    <h4 class="card-title">{{$post->Title}}</h4>
                    <blockquote class="blockquote">
                        <p>{{$post->Message}}</p> 
                        <footer class="blockquote-footer">{{$post->Name}} 
                            @if($post->lynch = 0)
                                <span class="badge badge-danger">LYNCHED</span>
                            @else
                            @endif
                             {{$post->Date}}, <a href="{{ url("comment/$post->Id") }}">
                                <span class="badge badge-primary">Comments  
                                    <span class="badge badge-light">
                                        {{$post->amountOfComments}}
                                    </span>
                                </span>
                            </a><footer class="float-right"><span class="badge badge-primary float-right">Praise</span> <span class="badge badge-danger float-right">Hate</span></footer></footer>
                        
                    </blockquote>
                </div>
            </div>
        </div> 
    </div>
    <!-- Modal -->
<div class="modal fade" id="post{{$post->Id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$post->Title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="{{ url("edit_post") }}">
        {{ csrf_field() }}
            <div class="form-group">

            </div>

            <input hidden type="number" id="postId" name="postId" value="{{$post->Id}}">
            <input hidden type="number" id="userId" name="userId" value="{{$post->UserId}}">
            <!-- Username -->
            <!-- <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" id="username" placeholder="Username" name="username" value="{{$post->Name}}">
            </div> -->
            <input hidden class="form-control" id="username" placeholder="Username" name="username" value="{{$post->Name}}">
           
            <!-- Title -->
            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" id="title" placeholder="Post Title" name="title" value="{{$post->Title}}"">
            </div>
            <!-- Date done automatically -->
            


            <!-- <div class="form-group">
                <label for="icon">Icon</label>
            </div> -->
            <!-- Insert Icon -->
            <!-- <div class="custom-file">
                <input type="file" class="custom-file-input" id="icon" required name="icon">
                <label class="custom-file-label" for="icon">Choose file...</label>
            </div> -->

            <!-- Message -->
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" rows="3" name="message" value="{{$post->Message}}"></textarea>
            </div>
            <!-- <button type="submit" class="btn btn-primary">Post</button> -->
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

    @empty
    <p class="text-danger">Sadly no Posts to display :(</p>

    
    @endforelse
   
@endsection

<!-- 
All pages must have a navigation menu, either across the top of the page or down the left or right column.
 2. The home page must display all posts. Only posts should be displayed, not comments. 
 3. Next to each post there should a number indicating how many comments are there for this post. 
 4. From the home page, click on a post will bring up the comments page. The comments page for a post should contain that post and all comments for that post. 
 5. The home page must display a form for the user to create a new post. Each post should contain a title, a message, 
 a date, an icon, and a user’s name (the user is not required to login, they can simply enter their name in the post form).
  All posts can have the same icon. When creating a new post, user must enter the title, message, and user’s name. 
  Date can either be entered or generated by the system. After a new post is successfully created, it should redirect back to the home page.
   6. Users can edit posts. After a post is edited, the comments page for that post is displayed. 
   7. Users can delete posts. When user deletes a post, the comments for that post should also be deleted.  
   8. Users can add comments to a post. A comment must have a message and a user, but no title.  
   9. Users can delete comments. 
   10. There is a page that lists all unique users that have made a post (i.e. a user is only displayed once no matter how many posts this user has made).
    Clicking on the user should display all posts made by that user. 
11. There is a most recent page, which shows only the posts that have been made in the last 7 days.  -->