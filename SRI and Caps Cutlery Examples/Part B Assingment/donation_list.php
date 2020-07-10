<?php
  require_once "queryDb.php";



  if(isset($_GET['title'])){
    // Search for the games
    $data = getGames($_GET['title']);
  } else {
    // Show all the games
    $data = getGames();
  }
?>

<html>
  <head>
    <title>SRI - Donations</title>
    <link rel="stylesheet" type="text/css" media="(min-width: 601px)" href="Style.css" />
    <link rel="stylesheet" type="text/css" media="(max-width: 600px)" href="Mobile.css" />

  </head>
  <body>
    <!-- header -->
    <div class="header">
      <div class="header-data">
        <img src="img/logo.png" alt="SRI Logo" height="100px">
      </div>
      <div class="header-data-nav">

        <nav>
          <ul>
            <li><a href="Index.html">Home</a></li>
            <li><a href="About.html">About</a></li>
            <li><a href="Contact.html">Contact</a></li>
            <li><a href="Donations.html">Donations</a></li>
            <li><a href="Selfhelp.html">Self Help</a></li>
          </ul>
        </nav>

      </div>
    </div>


    <!-- Main Image -->
    <div class="banner">
      <img src="img/header.jpg" alt="Header" />
    </div>

    <!-- Body -->
    <div class="body">
      <div class="body-data">
        <h1>People who have Donated</h1>

        <div class="container" id="search">
          <form class="form-inline" method="get" action="index.php">
            <fieldset>
              <label>
                <p>Search the List</p>
              </label>
              <input type="text" class="form-control" id="title" placeholder="Search" name="title">
              <input type="submit" value="Search" class="btn btn-default">
            </fieldset>
          </form>
        </div>
        <div class="container" id="data">
          <table class="table">
            <thead>
              <th>
                <p>Title</p>
              </th>
              <th>
                <p>Developer</p>
              </th>
              <th>
                <p>Publisher</p>
              </th>
              <th>
                <p>Price</p>
              </th>
              <th>
                <p>Platform</p>
              </th>
            </thead>
            <?php
            foreach($data as $game)
            {
              echo "<tr>";
              echo "<td>" . $game["TITLE"] . "</td>";
              echo "<td>" . $game["DEVELOPER"] . "</td>";
              echo "<td>" . $game["PUBLISHER"] . "</td>";
              echo "<td>" . $game["PRICE"] . "</td>";
              echo "<td>" . $game["PLATFORM"] . "</td>";
              echo "</tr>";


            }



            ?>



          </table>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <div class="footer1">
      <h2 class="">Who we support</h2>
    </div>
    <div class="footer">
      <div class="footer-image">
        <img src="img/placeholder-sponsor.png" alt="placeholder logo" height="50px">
      </div>
      <div class="footer-image">
        <img src="img/placeholder-sponsor.png" alt="placeholder logo" height="50px">
      </div>
      <div class="footer-image">
        <img src="img/placeholder-sponsor.png" alt="placeholder logo" height="50px">
      </div>
      <div class="footer-image">
        <img src="img/placeholder-sponsor.png" alt="placeholder logo" height="50px">
      </div>
    </div>

    <div class="footer-two">

      <div class="footer-two-data">
        <p>Copyright 2018</p>
      </div>

    </div>
  </body>
</html>
