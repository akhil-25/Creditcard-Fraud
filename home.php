<?php
 include 'db.php';
 $result="";
 $err="";

 if(isset($_POST['submit']))
 {
    $name=$_POST['name'];
    $roll=$_POST['roll'];
    $age=$_POST['age'];
    $city=$_POST['city'];
    $phone=$_POST['phone'];
    $query="SELECT * FROM registration where roll='$roll'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)==1)
    {
       $result="";
       $err="Already registerd!!!!";
    }
    else
    {
    $query="INSERT INTO registration values('$name','$roll','$age','$city','$phone')";
    $result=mysqli_query($con,$query);
    header('Location:index.php');
    }
 }
 if(isset($_POST['reset']))
 {
    header('Location:home.php');
 }
?>
<html>
<head> 
  <title>Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</head>
<style type="text/css">
    
    .center_div{
    margin-left: 500px;
    width:50%; 
}
.main-login{
    background-color: #fff;
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);

}

.main-center{
    margin-top: 30px;
    margin: 0 auto;
    max-width: 500px;
    padding: 40px 40px;
}
 .botto
 { 
   margin-bottom: 20px;
    }
    button
    {
        cursor:pointer;
    }
</style>
<body style="background-color: lightgrey;">
<div class="container center_div">

<div class="form-group row">
  <div class="col-xs-2">

    <h1>Student Registration</h1><br><br><br>
    <div class="main-login main-center">
    <form action="" name="reg" method="POST">
    <span><?php echo $err ?></span>
    <h5>Name:<input class="form-control botto" type="text" name="name" placeholder="name" value="<?php echo $result['name'] ?>" required ></h5>


    <h5>Roll Number:<input class="form-control botto" type="number" name="roll" placeholder="roll number" value="<?php echo $result['roll'] ?>"  required ></h5>


    <h5>Age:<input class="form-control botto"  type="number" name="age" min="0" max="100" placeholder="age" value="<?php echo $result['age'] ?>" min="0" required ></h5>


    <h5>City:<input class="form-control botto" type="text" name="city" placeholder="city" value="<?php echo $result['city'] ?>" required ></h5>


    <h5>Phone Number:<input class="form-control botto" type="Number" name="phone" min="1000000000" max="9999999999" placeholder="phone number"  value="<?php echo $result['phone'] ?>" required ></h5>


    <button name="submit" class="btn btn-primary btn-lg btn-block login-button botto" >Submit</button>
</form>
    <form action="" method="POST">
    <center><button style="background-color: transparent;border:0" name="reset" >Clear</button></center>
    </form>
    </div>
    </div>
    </div>
    </div>
  </body>
</html>