<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
            include '_dbconnect.php';
            $addhar = $_POST['addhar'];
            if(!$conn)
            {
                echo "Conection failed".mysqli_connect_errno();
            }
            else{
                date_default_timezone_set('Asia/Kolkata');
                $date = date('d-m-y h:i:s');
                $sql="select lastdonate from donarvalidation where (addhar='$addhar' )";
                $result=mysqli_query($conn,$sql);
                if (mysqli_num_rows($result)>0) {
                    while($row = $result->fetch_assoc()){
                        $date1=$row["lastdonate"];
                    }
                
                    
                    $diff = abs(strtotime($date) - strtotime($date1));
                    $years = floor($diff / (365*60*60*24));
                    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                    if($days< '16'){
                        echo "<script>alert('User not alowed to donate beacuse last donate date of this donar is less than 15 days ');window.location = 'donarvalidation.php';</script>";
                    }
                    else{
                        $sql = "UPDATE donarvalidation SET lastdonate= now() WHERE (addhar='$addhar')";
                        $result=mysqli_query($conn,$sql);
                        echo '<script>alert("Valid User date updated");window.location = "donarvalidation.php";</script>';
                    }
                }
                else{
                    $sql="INSERT INTO `donarvalidation` (`addhar`, `lastdonate`) VALUES ('$addhar', now())";
                    $result=mysqli_query($conn,$sql);
                    echo '<script>alert("Valid User");window.location = "donarvalidation.php";</script>';
             }
                
            }
            
        }

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Fancy Sliding Form with jQuery</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="Fancy Sliding Form with jQuery" />
        <meta name="keywords" content="jquery, form, sliding, usability, css3, validation, javascript"/>
        <link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script type="text/javascript" src="sliding.form.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <style>
        body{
            background-image: url('images/login.jpg');
            background-size: cover;
            color: #520d0d;
            text-shadow: #520d0d;
        } 
    </style>

    </head>
    <body >
    <?php require '_nav.php' ?>
        <!-- <form action=""> -->


        <div id="content" >
            <h1>Donar Validation Can Be Done By Hospital Only.</h1>
            <div id="wrapper" style="background: transparent;">
                <div id="steps">
                    <form id="formElem" name="formElem" action="donarvalidation.php" method="POST">
                        <fieldset class="step" >
                            <legend style="background: transparent; border: none; text-shadow: 1px 1px 1px #941c1c;">Validate Donar Before Donation Of Plasma. </legend>
                            <p style="background: transparent; border: none;" on>
                                <label for="adhar" style="text-shadow: 1px 1px 1px #941c1c;">Addhar No</label>
                                <input  id="addhar" name="addhar" required />
                            </p>
                            <p style="background: transparent; border: none;">
                            <button type="submit" form="formElem" value="Search" >Submit</button>
                            </p>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <!-- </form> -->
    </body>
</html>