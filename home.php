<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        body{
            background-image: url('images/login.jpg');
            background-size: cover;
        }
.container {
  height: 200px;
  position: relative;
}

.center {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
.btn1{
  
  background-color: #52b116;
}
.btn2{
  margin-top: 2%;
  background-color: #52b116;
}
.card{
  background: transparent;
}
</style>
    <title>Welcome - <?php $_SESSION['username']?></title>
  </head>
  <body>
    <?php require '_nav.php' ?>
    
    <div class="card-group">
      <div class="card">
        <img class="card-img-top" src="images/img1.jpg" alt="Card image cap">
        <div class="card-body">
          <h3 class="card-title" style="color: blanchedalmond;">Wear Mask</h3>
          <h5 class="card-text" style="color: blanchedalmond;">Wear mask not for only your own safety but also for others.</h5>
        </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="images/img2.jpg" alt="Card image cap">
        <div class="card-body">
          <h3 class="card-title" style="color: blanchedalmond;">Sanitize Hand Regularly</h3>
          <h5 class="card-text" style="color: blanchedalmond;">Hit the germs by applying the sanitizer</h5>
      
        </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="images/img3.jpg" alt="Card image cap">
        <div class="card-body">
          <h3 class="card-title" style="color: blanchedalmond;">Stay Home</h3>
          <h5 class="card-text" style="color: blanchedalmond;">Stay Home Stay Safe</h5>
          
        </div>
      </div>
    </div>
    <div class="container" >
      <div class="center">
  <button type="button" class="btn1 btn-dark" style="width:40rem" onclick="window.location.replace('donate.php')">Donate Plasma</button>
    <button type="button" class="btn2 btn-dark" style="width:40rem" onclick="window.location.replace('find1.php')" >Find Donar</button>
    <button type="button" class="btn2 btn-dark" style="width:40rem" onclick="window.location.replace('donarvalidation.php')" >Donar Validation</button>
    </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>