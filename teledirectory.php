<?php phpinfo() ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <title>Bootstrap Example</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>

    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>// divyam commit
          <a class="navbar-brand" href="#">TELEPHONE</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active"><a data-toggle="tab" href="#home">records</a></li>
            <li class="dropdown">
             
            </li>
            
            <li><a href="#menu1" data-toggle="tab">create record</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> USER::ADMIN</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>
        </div>
      </div>
    </nav>
     <div class="tab-content"> 

        <div id="menu1" class="tab-pane fade">
          
          <?php
    define('ROOT_URL','http://localhost/mydirectory/another.php');

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydb";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if(isset($_POST['submit'])){
      $name    = $_POST['name'];
      $phone   = $_POST['phone'];
      $city    = $_POST['city'];
      $country =$_POST['country'];

      $query = "INSERT INTO telephone(name,phone,city,country) VALUES ('$name', '$phone', '$city', '$country')";

      if(mysqli_query($conn,$query)){
       header('location: '.ROOT_URL.'');
        
      }
      else{
        echo 'ERROR' .mysqli_error($conn);
      }
      
    }

     ?>
    
    <body>
    <div class="container">
      <h1>Add record</h1>
      <form class="form-horizontal" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
      <div class="form-group">
         <label class="control-label col-sm-2">Name:</label>
         <input type="text" name="name"  >
      </div> 
      <br>
      <div class="form-group">
         <label class="control-label col-sm-2">Phone:</label>
         <input type="text" name="phone"  >
      </div> <br>
      <div class="form-group">
         <label class="control-label col-sm-2">City:</label>
         <input type="text" name="city" >
      </div > <br>
      <div class="form-group">
         <label class="control-label col-sm-2">Country:</label>
         <input type="text" name="country" >
      </div> 
      <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" name="submit" value="submit" class="btn btn-default">
        </div>
      </form> 
    </div>  

    </form>
    </body>
    </html>
        </div>
<div id="home" class="tab-pane fade in active">
          <?php

    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = 'SELECT * FROM telephone';

    $result = mysqli_query($conn,$query);

    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //VAR_DUMP($posts);

    mysqli_free_result($result);



     ?>
    
    <style>
    #customers {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color:rgb(60, 60, 60);
        color: white;
    }
    </style>
    <body>
    <input class="form-control" id="myInput" type="text" placeholder="Search.."> 
    <br>
    <table id="customers">
    <tr>
    <th>id</th>
    <th>name</th>
    <th>phone</th>
    <th>city</th>
    <th>country</th>
    <tbody id="myTable">
    </tr>
    <?php
    foreach($posts as $posts) {
        echo "<tr>";
        echo "<td>" . $posts['id'] . "</td>";
        echo "<td>" . $posts['name'] . "</td>";
        echo "<td>" . $posts['phone'] . "</td>";
        echo "<td>" . $posts['city'] . "</td>";
        echo "<td>" . $posts['country'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_close($conn);
    "<br>"

    ?>
    </tbody>
    <script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    </script>

    <br>
    </body>
    
        </div>
        </div>
    </body>
    </html>

    <!-- HTML
    CSS 
    C
    C++
    JAVASCRIPT
    PHP
    SQL
    BOOTSTRAP
    JQUERY
    VB
    VB.NET -->