<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
if($_SERVER['REQUEST_METHOD']=="POST")
    {
      include '_dbconnect.php';
      $first=$_POST['firstname'];
      $last=$_POST['lastname'];
      $email=$_POST['email'];
      $address=$_POST['address'];
      $city=$_POST['city'];
      $state=$_POST['state'];
      $pin=$_POST['pin'];

        if(!$conn)
        {
            echo "Conection failed".mysqli_connect_errno();
        }
        else{
                $sql="INSERT INTO `patientinfo` ( `first`, `last`, `email`, `Address`, `City`, `State`, `Zip`) VALUES ( '$first', '$last', '$email', '$address', '$city', '$state', '$pin')";
                $result=mysqli_query($conn,$sql);
                echo'<script>window.location = "find.php";</script>';
        }
            
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

   <script src="cities.js"></script>
    <style>
        body{
            background-image: url('images/login.jpg');
            background-size: cover;
            font-weight: bolder;
            color: #d88f8f;
        }
        .form-control{
          background: transparent;
          color: #d88f8f;
        }
    </style>
    <title>Document</title>
  </head>
  <body>
    <?php require '_nav.php' ?>
    
    <div style="margin: 5% 10% 10% 10%" >
    <h1 style="text-align: center;">Fill form to Submit .</h1>
    <form action="find1.php"  method="POST"  >
    <div class="form-row" style="margin-top: 3%;">
    <div class="col">
      First Name: <input type="text" class="form-control" placeholder="First name" name="firstname" required>
    </div><br>
    <div class="col">
      Last Name: <input type="text" class="form-control" placeholder="Last name" name="lastname" required>
    </div>
  </div><br>
  <div class="form-row">
    <div class="col">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" required>
    </div>
  <div class="col">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address" required>
  </div>
      </div>
    <div class="form-row ">
      <div class="col" >
      <label for="validationDefault05">State</label>
      <select onchange="print_city('state', this.selectedIndex);" id="sts" name ="state" class="form-control" required></select>
      </div>
      <div class="col">
      <label for="validationDefault05">City</label>
      <select id ="state" class="form-control" required name="city" placeholder="City"></select>
      <script language="javascript">print_state("sts");</script>
      </div>  
      <div class="col">
          <label for="validationDefault05">Pincode</label>
          <input type="text" class="form-control" id="validationDefault05" placeholder="Zip" required name="pin">
      </div>
      </div><br>
  <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>


  </body>
</html>