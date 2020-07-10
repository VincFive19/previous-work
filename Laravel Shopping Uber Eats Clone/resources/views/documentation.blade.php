@extends('layouts.app')

@section('content') 
<div class="container">
    <h1>
        Documentation
    </h1>
    <h3>EER Diagram</h3>
    <figure>
      <img src="{{url('WebDevIA2CrowsFootEER.PNG')}}" alt="">
      <figcaption class="figure-caption">Above is the EER Diagram</figcaption>
    </figure>   

    <h3>Peer Review Reflection</h3>
    <p>With my peer review experience I have leanred many things, it is very useful to understand areas which I could improve on or stuff that I missed while doing the work, such as spelling errors or code errors which I didn't think of checking. It is also 
    very useful as I get to see how other people set out their code, allowing me to see the way that their code works giving me ideas on how I can improve my code, or give me knowledge in things I didn't know about previously, allowing me to know what I need to research further. 
    From these experiences I have improved the way that I review others by giving more detailed feedback, and helping others improve their code, letting them know what areas they could improve in. It is also good because
     with the peer review I am able to discuss the code with fellow peers to learn more ways to achieve tasks, and discussing the code helps solidify the theory and understanding of said code.</p>

    
    <h3>Overview of Website</h3>
    <p>The brief was to create a website much like Uber Eats and deliveroo, where Users could buy dishes from restaurants.
    To achieve the result I used laravels Eloquent ORM to create the databases, using migrations to create the actual databases, and using 
    seeding to make initial database data. Throughout the creation fo this I experienced many different things which I had not known about before, such as using cookies to display information
    to another page (Sessions) and how to properly use Laravel Eloquent and relationships between tables.
    <br>
    I wasn't able to complete two of the optional tasks due to running out of time, however I did attempt them and I have I idea of how I would achieve this. I also added a way for a restaurant to mark orders that they have sent, while also keeping all previous orders.</p>

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
 
 



    <tr class="table-success">
      <th scope="row">Users can register with this website. When registering, users must provide their name, email, password, and address.  
    Furthermore, users must register as either a: a. Restaurant, or b. Consumer. Done</th>
      <td>Completed</td>
      <td></td>
      <td></td>
    </tr>
    <tr class="table-success">
      <th scope="row">Registered users can login. Users should be able to login  (or get to the login page) from any page. A logged in user should be able to log out. Done
</th>
      <td>Completed</td>
      <td></td>
      <td></td>
    </tr>
    <tr class="table-success">
      <th scope="row">Only the restaurant users can add dishes to the list of dishes sold by his/her restaurant. They can also update and delete existing dishes.
   A dish must have a name and a price. A dish name must be unique. A price must be a positive value. Done</th>
      <td>Completed</td>
      <td></td>
      <td></td>
    </tr>

    <tr class="table-success">
      <th scope="row">4. All users (including guests) can see a list of registered restaurants. They can click into any restaurant to see the dishes this restaurant sells. Done
.</th>
      <td>Completed</td>
      <td></td>
      <td></td>
    </tr>

    <tr class="table-success">
      <th scope="row">5. The list of dishes should be paginated with at most 5 dishes per page. Done.</th>
      <td>Completed</td>
      <td>Added all needed form optons, redirects to main home page</td>
      <td></td>
    </tr>

    <tr class="table-success">
      <th scope="row">6. (Single purchase) Only consumers can purchase a dish. Since we do not deal with payment gateways in this course, when user clicks on purchase, we simply assume 
    the payment is successful, and save the purchase order in the database. Then it will display the dish purchased, the price, and the delivery address 
    (which is the consumer’s address) to let the user know that the purchase is successful. TO DO</th>
      <td>halfway</td>
      <td></td>
      <td></td>
    </tr>

    <tr class="table-success">
      <th scope="row">7. A restaurant (user) can see a list of orders customers have placed on his/her restaurant. An order should consist of the name of the consumer, that dish (name) that was 
    ordered, and the date that the order was placed. Done</th>
      <td>Completed</td>
      <td></td>
      <td></td>
    </tr>

    <tr>
      <th scope="row">Optional Extras</th>
      <td></td>
      <td></td>
      <td></td>
    </tr>


    <tr class="table-success">
      <th scope="row">8. After user registration, login, or logout, appropriate redirections should be provided. E.g. if user logs in from the details page, then after user 
    logs in, s/he should be redirected back to that page.  I think done needs test</th>
      <td>Completed</td>
      <td></td>
      <td></td>
    </tr>

    <tr class="table-warning">
      <th  scope="row">9. When restaurant users add a new dish, the dish name must be unique for that restaurant, not across restaurants. This is an extension of requirement 4. Broken
 </th>
      <td>Broken</td>
      <td></td>
      <td></td>
    </tr>

    <tr class="table-success">
      <th scope="row">10. When restaurant users add a dish, s/he can upload a photo for that dish. This photo will be displayed when this dish displayed. DONE
</th>
      <td>Completed</td>
      <td></td>
      <td></td>
    </tr>


    <tr class="table-success">
      <th  scope="row">11. In addition to requirement 6 (single purchase), consumers can add multiple dishes to a cart, see the contents in the cart, the cost of this cart
     (the sum of all dishes), remove any unwanted dishes, before purchasing these dishes.  Once purchased, the cart will be emptied. .</th>
      <td>Completed</td>
      <td>orders can be deleted by restaurant user, to show completion</td>
      <td></td>
    </tr>

    <tr class="table-warning">
      <th  scope="row">12. There is a page which lists the top 5 most popular (most ordered) dishes in the last 30 days..</th>
      <td></td>
      <td></td>
      <td></td>
    </tr>

    <tr class="table-success">
      <th  scope="row">13. Restaurants can view a statistic page which shows the sales statics for that restaurant. This page shows: 
        a. The total amount of sales (in dollar value) made by this restaurant. 
        b. The weekly sales total (in dollar value) for the last 12 weeks, i.e. there should be a sales total for each of the last 12 weeks. 
</th>
      <td></td>
      <td></td>
      <td></td>
    </tr>

    <tr class="table-success">
      <th  scope="row">14. There is another user type called administrator. There is only 1 administrator which is created through seeder. The purpose of administrator is to approve 
    new restaurant (users). After a new restaurant user (account) is registered, s/he cannot add/remove dishes from his/her restaurant until this account is approved
     by the administrator. There is a page where the administrator can go to see a list of new restaurant accounts that require approval, and to approve these accounts. 
 .</th>
      <td>completed</td>
      <td></td>
      <td></td>
    </tr>

    

  </tbody>
</table>


</div>
<h1></h1>
    
@endsection