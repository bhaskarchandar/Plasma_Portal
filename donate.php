
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
  $age=$_POST['age'];
  $sex=$_POST['sex'];
  $gmail=$_POST['gmail'];
  $number=$_POST['number'];
  $state=$_POST['state'];
  $city=$_POST['city'];
  $pin=$_POST['pin'];
  $addhar=$_POST['addhar'];
  $dopr=$_POST['dopr'];
  $donr=$_POST['donr'];
  $blood=$_POST['blood'];


    if(!$conn)
    {
    echo "Conection failed".mysqli_connect_errno();
    }
    else{
        $sql="SELECT addhar from donar where(addhar='$addhar')";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)
        {
            echo "<script>alert('Addhar Already added'); window.location= 'donate.php';</script>";
        }
        else{
            $sql="INSERT INTO `donar` (`addhar`, `firstname`, `lastname`, `age`, `sex`, `gmail`, `number`, `bloodgroup`, `state`, `city`, `pin`, `dopr`, `donr`) VALUES ('$addhar', '$first', '$last', '$age', '$sex', '$gmail', '$number', '$blood', '$state', '$city', '$pin', '$dopr', '$donr')";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
                echo "<script>alert('Submitted Successfully'); window.location= 'home.php';</script>";
                
            }
            else{
                echo "<script>alert('ERROR'); window.location='donate.php'</script>";
            }
    }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        body{
            background-image: url("images/login.jpg");
            background-size: cover;
            color: #36ffe3;
            font:bold ;
        }
        #dform{
            /* border-style: solid;
            border-color: red; */
            margin:3%;
        }
        .form-control{
          background: transparent;
          color: #d88f8f;
        }
    </style>
    <script src="cities.js"></script>
    <title>Donate Page</title>
</head>
<body >
    
<?php require '_nav.php' ?>



<div id="dform">
<h1 style="text-align: center; color: #8e8eff;">Fill the form to donate the plasma and help others to get out from this pandemic.</h1>
    <form action="donate.php" method="POST">
        <div class="form-row">
            <div class="col-md-3 mb-2">
                <label for="validationDefault01">First name</label>
                <input type="text" class="form-control" id="validationDefault01" placeholder="First name"  required name="firstname">
            </div>
            <div class="col-md-3 mb-2">
                <label for="validationDefault02">Last name</label>
                <input type="text" class="form-control" id="validationDefault02" placeholder="Last name"  required name="lastname">
            </div>
            <div class="col-md-3 mb-2">
                <label for="validationDefault02">Age</label>
                <input type="text" class="form-control" id="validationDefault02" placeholder="Age"  required name="age">
            </div>
            <div class="col-md-3 mb-2">
      <label for="inputState">Sex</label>
      <select id="inputState" class="form-control" name="sex">
        <option selected>Choose...</option>
        <option>Male</option>
        <option>Female</option>
        <option>Others</option>
      </select> 
    </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationDefault03">Gmail</label>
                <input type="text" class="form-control" id="validationDefault03" placeholder="Gmail" required name="gmail">
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationDefault04">Phone Number</label>
                <input type="text" class="form-control" id="validationDefault04" placeholder="Phone Number" required name="number">
            </div>
            <div class="col-md-3 mb-3">
            <label for="inputState">Blood Group</label>
      <select id="inputState" class="form-control" name="blood">
        <option selected>Choose...</option>
        <option>A+</option>
        <option>A-</option>
        <option>B+</option>
        <option>B-</option>
        <option>O+</option>
        <option>O-</option>
        <option>AB+</option>
        <option>AB-</option>
      </select> 
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
            <label for="validationDefault05">State</label>
            <select onchange="print_city('state', this.selectedIndex);" id="sts" name ="state" class="form-control" required></select>
            </div>
            <div class="col-md-3 mb-3">
            <label for="validationDefault05">City</label>
            <select id ="state" class="form-control" required name="city" placeholder="City"></select>
            <script language="javascript">print_state("sts");</script>
            </div>  
            <div class="col-md-3 mb-3">
                <label for="validationDefault05">Pincode</label>
                <input type="text" class="form-control" id="validationDefault05" placeholder="Zip" required name="pin">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationDefault03">Addhar No</label>
                <input type="text" class="form-control" id="validationDefault03" placeholder="Addhar No." required name="addhar">
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationDefault04">Date of Positive Report</label>
                <input type="date" class="form-control" id="validationDefault04" placeholder="Date of Positive Report" required name="dopr">
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationDefault05">Date of Negative Report</label>
                <input type="date" class="form-control" id="validationDefault05" placeholder="Date of Negative Report" name="donr" required>
            </div>
        </div>

        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                <label class="form-check-label" for="invalidCheck2">
                     <a href="Agrement.docx">Agree to terms and conditions</a>
                </label>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
</div>
    
</body>
</html>