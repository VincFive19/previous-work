@extends('layouts.master')
@section('title') 
    Comment for POST TITLE - Lynch.com
@endsection
@section('content') 
<div>
    <h1>
        Documentation
    </h1>
    <h3>EER Diagram</h3>
    <figure>
      <img src="{{url('/images/EER_Diagram.png')}}" alt="">
      <figcaption class="figure-caption">Above is the EER Diagram</figcaption>
    </figure>   
    <figure>
      <img src="{{url('/images/Sketch2.jpg')}}"  width="50%" alt="">
      <figcaption class="figure-caption">Above is the initial EER Diagram I had sketched in my workbook</figcaption>
    </figure>  

    <h3>Wireframe</h3>
    <figure>
      <img src="{{url('/images/Sketch1.jpg')}}"  width="50%" alt="">
      <figcaption class="figure-caption">Above is the initial Wireframe I had sketched in my workbook, this is more towards a version where there is profiles, but explains the proposed satirical features</figcaption>
    </figure>  

    <h3>Overview of Website</h3>
    <p>The brief for this assignment was to create a simple Social Media website where users can add posts and comments, delete posts and comments as well as edit posts. With my version of this assignment 
    I decided to create a satirical look and approach to what a social media website entails. In this case my project is called Lynch.com, with the main premise being that Users can 
    get voted off the social media website by other users, in this case they're 'Lynched'. For this first assignment I haven't added the lynch funcitonailty, however I have planned ahead for it in my
    SQL and User tables, as well as created what a Lynched account would look like. I plan on adding these extra features into the website later on. I also want to experiment on ways on trying to exploit my own website in order to
    make it more secure.</p>

    <h3>Assignment Completion Table:</h3>
    <p>Below is a table regarding all the stuff I was able to complete</p>
    
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Feature</th>
      <th scope="col">Completion Status</th>
      <th scope="col">Description</th>
      <th scope="col">Further </th>
    </tr>
  </thead>
  <tbody>
    <tr class="table-success">
      <th scope="row">Navigation Menu (On all pages)</th>
      <td>Completed</td>
      <td>Added Navigation menu to all pages, and used templating to allow it to only need to be changed in one file.</td>
      <td></td>
    </tr>
    <tr class="table-success">
      <th scope="row">The home page must display all posts. Only posts should be displayed, not comments.</th>
      <td>Completed</td>
      <td>Posts and only posts displayed on home page</td>
      <td></td>
    </tr>
    <tr class="table-success">
      <th scope="row">Next to each post there should a number indicating how many comments are there for this post.</th>
      <td>Completed</td>
      <td>Added a bootstrap badge that shows the amount of comments for that post</td>
      <td></td>
    </tr>

    <tr class="table-success">
      <th scope="row">From the home page, click on a post will bring up the comments page. The comments page for a post should contain that post and all comments for that post.</th>
      <td>Completed</td>
      <td>When clicked it shows all comments for that post on new page, routed, as well as includes the post</td>
      <td></td>
    </tr>

    <tr class="table-success">
      <th scope="row">The home page must display a form for the user to create a new post. Each post should contain a title, a message, a date, an icon, and a user’s name (the user is not required to login, they can simply enter their name in the post form). All posts can have the same icon. When creating a new post, user must enter the title, message, and user’s name. Date can either be entered or generated by the system. After a new post is successfully created, it should redirect back to the home page.</th>
      <td>Completed</td>
      <td>Added all needed form optons, redirects to main home page</td>
      <td></td>
    </tr>

    <tr class="table-success">
      <th scope="row">Users can edit posts. After a post is edited, the comments page for that post is displayed.</th>
      <td>Completed</td>
      <td>User can edit posts, need to have it so it redirects to comment page</td>
      <td>Made this within a bootstrap Modal window, requiring me to generate an specific Id for each modal in the loop which I did using the post Id</td>
    </tr>

    <tr class="table-success">
      <th scope="row">Users can delete posts. When user deletes a post, the comments for that post should also be deleted.</th>
      <td>Completed</td>
      <td>Post and Comments connected to that post are deleted</td>
      <td></td>
    </tr>

    <tr class="table-success">
      <th scope="row">Users can add comments to a post. A comment must have a message and a user, but no title.</th>
      <td>Completed</td>
      <td>Comments are added to post, with user and title</td>
      <td>If User doesn't exist, it creates a new User</td>
    </tr>

    <tr class="table-success">
      <th  scope="row">Users can delete comments.</th>
      <td>Completed</td>
      <td>User can delete comments</td>
      <td></td>
    </tr>

    <tr class="table-success">
      <th scope="row">There is a page that lists all unique users that have made a post (i.e. a user is only displayed once no matter how many posts this user has made). Clicking on the user should display all posts made by that user.</th>
      <td>Completed</td>
      <td>Have Users displaying once, just need to make it so that once clicked it displays the users posts</td>
      <td></td>
    </tr>

    <tr>
      <th scope="row">Technical Requirements</th>
      <td></td>
      <td></td>
      <td></td>
    </tr>

    <tr class="table-success">
      <th  scope="row">This assignment must be implemented using Laravel. Database access should be implemented via raw SQL and executed through Laravel’s DB class. You are not to use Laravel's ORM (ORM will be used for assignment 2).</th>
      <td>Completed</td>
      <td>Database access is using RAW SQL</td>
      <td></td>
    </tr>

    <tr class="table-success">
      <th  scope="row">An SQL file should be used to create tables and insert initial data. There should be enough initial data to thoroughly test the retrieval, update, and deletion functionalities you have implemented.</th>
      <td>Fully Completed</td>
      <td>Database file created, Includes initial input statements</td>
      <td>Created extra Tables, for future iterations, such as Users and Icons</td>
    </tr>

    <tr class="table-success">
      <th  scope="row">All input must be validated; validation errors message must be displayed within the view.</th>
      <td>Validation added</td>
      <td>Validated using HTML validation and validation of inputs during routes</td>
      <td></td>
    </tr>

    <tr class="table-success">
      <th  scope="row">Proper security measures must be implemented, e.g. perform HTML and SQL sanitisation etc. You should be able to explain the security measures you have implemented.</th>
      <td>Completed</td>
      <td>Added sanitisation using HTML and Laravel, such as placeholders and csrf_field</td>
      <td>Used placeholders to make sure users can't use SQL inject attacks, as this stops them from adding "word = True" as an option, as an example. 
      This is due to the query data being in quotes, as well as in a placeholder. I also used csrf_fields to protect from Cross Site Request Forgery attacks, Laravel has a feature alled csrf_field which allows 
      the application to create tokens based on trusted users in order to make sure the user can't exploit the website using the Get/Post requests. Laravel makes sure that the user 
      initiating the request is actually the authenticated user.</td>
    </tr>

    <tr class="table-success">
      <th  scope="row">Template inheritance must be properly used.</th>
      <td>Completed</td>
      <td>Header is Template Inherited</td>
      <td></td>
    </tr>

    <tr class="table-success">
      <th  scope="row">Good coding practice is expected.</th>
      <td>Completed</td>
      <td>Has commenting, is readable, variables named well</td>
      <td></td>
    </tr>

  </tbody>
</table>


</div>
<h1></h1>
    
@endsection