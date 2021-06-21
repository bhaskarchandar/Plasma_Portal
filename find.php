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
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script type="text/javascript" src="sliding.form.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        body{
            background-image: url('images/login.jpg');
            background-size: cover;
            color: #520d0d;
            text-shadow: #520d0d;
        } 
        #formElem{
            font-weight: bolder;
        }
        
    </style>
    <title>find</title>
  </head>
  <body>
    <?php require '_nav.php' ?>
    
    <div id="content" >
            <h1>Find Donar</h1>
            <div id="wrapper" style="background: transparent;">
                <div id="steps">
                    <form id="formElem" name="formElem" action="fetch1.php" method="POST">
                        <fieldset class="step" >
                            <legend style="background: transparent; border: none; text-shadow: 1px 1px 1px #941c1c;">Blood Group and Pincode</legend>
                            <p style="background: transparent; border: none;" >
                                <label for="hname" style="text-shadow: 1px 1px 1px #941c1c;">Patient Addhar No.</label>
                                <input  id="hospital" name="hospital" placeholder="" type="text" AUTOCOMPLETE=OFF required/>
                            </p>
                            <p style="background: transparent; border: none;" >
                                <label for="pincode" style="text-shadow: 1px 1px 1px #941c1c;">Pincode</label>
                                <input id="pin" name="pin" type="number" AUTOCOMPLETE=OFF required/>
                            </p>
                            <p style="background: transparent; border: none;" >
                            <label for="inputState" style="text-shadow: 1px 1px 1px #941c1c;">Blood Group</label>
                            <select  id="inputState" class="form-control" name="blood" required>
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
                            </p>
                            <p style="background: transparent; border: none;">
                            <button type="submit" form="formElem" value="Search" >Search</button>
                            </p>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>