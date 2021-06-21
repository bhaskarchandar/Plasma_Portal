<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/find.php">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style> 
    
th, td {
  padding: 15px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
th {
  background-color: #4CAF50;
  color: white;
}
</style>
    <title>Data</title>
</head>

<body>
<?php require '_nav.php' ?>
    <div id="content">       
    <table id="table1">
        <tr>
            <th>Name</th>
            <th>Number</th>
            <th>bloodgroup</th>
        </tr>
        <?php
            include '_dbconnect.php';
            $blood = $_POST['blood'];
            $pin=$_POST['pin'];

        
        
        
            
        
                if(!$conn)
                {
                echo "Conection failed".mysqli_connect_errno();
                }
                else{
                    $sql="select firstname,number, bloodgroup from donar where (bloodgroup='$blood' and pin= '$pin')";
                    $result=mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)>0) {
                        while($row = $result->fetch_assoc()){
                            echo"    <tr><td>    ".$row["firstname"]. "    </td><td>   ".$row["number"]."    </td><td>   ".$row["bloodgroup"]."</td></tr>";
                        }
                        echo "</table>";
                    }
                    else{
                        echo "<script>alert('Not Found');window.location='find.php'</script>";
                 }
                    
                }


        ?>
    </table>
        </div>
</body>
</html>