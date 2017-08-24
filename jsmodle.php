 <?php
 include 'db.php';
 $result="";
 $err="";
if(isset($_POST['submit1']))
 {
    $name=$_POST['name1'];
    $roll=$_POST['roll1'];
    $age=$_POST['age1'];
    $city=$_POST['city1'];
    $phone=$_POST['phone1'];
    $query="SELECT * FROM registration where roll='$roll'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)==1)
    {
      if($var!=-1)
      {
      $query="UPDATE registration SET name='$name',roll='$roll',age='$age',city='$city',phone='$phone' where
     roll='$roll'";
      $result=mysqli_query($con,$query);
      header('Location:index.php');
       }
     }
 }
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
    header('Location:jsmodle.php');
    }
 }
if(isset($_COOKIE["Test"]))
 {
    $var=$_COOKIE["Test"];
    $query="SELECT * FROM registration where roll='$var'";
    $res=mysqli_query($con,$query);
    $result=mysqli_fetch_assoc($res);
 }
 setcookie("Test", null);
 if(!empty($_POST['list']))
 {
   
    foreach($_POST['list'] as $selected) {
       setcookie("Test", $selected);
       header('Location:jdmodle.php');
    }
 }
 if(!empty($_POST['listd']))
 {
   
    foreach($_POST['listd'] as $selected) {
       $query="DELETE from registration where roll='$selected'";
       $res=mysqli_query($con,$query);
       header('Location:jsmodle.php');
    }
 }

$limit = 5;  
if (isset($_GET["page"]))
 { 
  $page  = $_GET["page"];
   if($page<1)
   {
    $page=1;
   }
  if($page>3)
  {
      $page=3;  
  }
}
 else
  {
   $page=1;
  }  
$start_from = ($page-1) * $limit;  
  
$sql = "SELECT * FROM registration ORDER BY roll ASC LIMIT $start_from, $limit";  
$res = mysqli_query ($con,$sql); 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="application/javascript">
    function valid()
    {
        if(window.confirm("Do you want to delete"))
            return true;
        else
            return false;

    }
</script>

</head>
<style type="text/css">
    .wi
    {
        width: 75%;
        margin-top: 100px;
    }
    .pagination
    {
      margin-left: 600px;
    }
    a
    {
      margin-right: 20px;
    }
</style>
<style type="text/css">
.main-center{
    margin-top: 30px;
    margin: 0 auto;
    width: 500px;
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
<body>

<div class="container">
  
<center>
<h1>Details of Students</h1>
<form action="" method="POST">
  <table class="table wi">
    <thead class="thead-inverse" >
    <tr>
     <th>S.No</th>
     <th>Name</th>
     <th>Roll Number </th>
     <th>Age</th>
     <th>City</th>
     <th>Phone Number</th>
     </tr>
  </thead>
  <tbody style="line-height:2em;">
     <?php
     $i=1;
 while($row=mysqli_fetch_assoc($res))
  {
    echo '<tr>';
    echo '<th>'.$i.'</th>';
    echo '<td>'. $row['name'] .'</td>';
    echo '<td>'. $row['roll'] .'</td>';
    echo '<td>'. $row['age'] .'</td>';
    echo '<td>'. $row['city'] .'</td>';
    echo '<td>'. $row['phone'] .'</td>';
    echo '<td>'. "<button type='button' name='list[]' class='btn btn-info' value=".$row['roll']." data-toggle='modal' data-target='#myModal1'>".'Edit'.'</button>'.'</td>';
    echo '<td>'. "<button name='listd[]' onclick='return valid()' class='btn btn-danger' value=".$row['roll']." >".'Delete'.'</button>'.'</td>';
    echo '</tr>';
    $i++;
  }
    ?>
  </tbody>
</table>
 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">ADD</button>
</form>
</center>



  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h1 class="modal-title">Student Registration</h1>
        </div>
<div class="container">
<form action="" name="reg" method="POST">
<div class="form-group row">
  <div class="col-xs-2">
    <div class="main-center">
    <span><?php echo $err ?></span>
    <h5>Name:<input class="form-control botto" type="text" name="name" placeholder="name" value="<?php echo $result['name'] ?>" required ></h5>


    <h5>Roll Number:<input class="form-control botto" type="number" name="roll" placeholder="roll number" value="<?php echo $result['roll'] ?>"  required ></h5>


    <h5>Age:<input class="form-control botto"  type="number" name="age" placeholder="age" value="<?php echo $result['age'] ?>" min="0" required ></h5>


    <h5>City:<input class="form-control botto" type="text" name="city" placeholder="city" value="<?php echo $result['city'] ?>" required ></h5>


    <h5>Phone Number:<input class="form-control botto" type="Number" name="phone" placeholder="phone number"  value="<?php echo $result['phone'] ?>" required ></h5>


    <button name="submit" class="btn btn-primary btn-lg btn-block login-button botto" >Submit</button>

    <center><button style="background-color: transparent;border:0" name="reset" >Clear?</button></center>
    
    </div>
    </div>
    </div>
    </form>
    </div>
      </div>

    </div>
  </div>
  


<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h1 class="modal-title">Update Details</h1>
        </div>
<div class="container center_div">
<form action="" name="reg" method="POST">
<div class="form-group row">
  <div class="col-xs-2">
    <div class="main-login main-center">
    <span><?php echo $err ?></span>
    <h5>Name:<input class="form-control botto" type="text" name="name1" placeholder="name" value="<?php echo $result['name'] ?>" required ></h5>


    <h5>Roll Number:<input class="form-control botto" type="number" name="roll1" readonly placeholder="roll number" value="<?php echo $result['roll'] ?>" required ></h5>


    <h5>Age:<input class="form-control botto"  type="number" name="age1" placeholder="age" value="<?php echo $result['age'] ?>" min="0" required ></h5>


    <h5>City:<input class="form-control botto" type="text" name="city1" placeholder="city" value="<?php echo $result['city'] ?>" required ></h5>


    <h5>Phone Number:<input class="form-control botto" type="Number" name="phone1" placeholder="phone number"  value="<?php echo $result['phone'] ?>" required ></h5>


    <button name="submit1" onclick="return valid()" class="btn btn-primary btn-lg btn-block login-button botto" >Update</button>
    
    <center><button style="background-color: transparent;border:0" name="reset1" >Close</button></center>
    
    </div>
    </div>
    </div>
    </form>
    </div>
      </div>
      
    </div>
  </div>



</div>

</body>
</html>
 <?php
$query="SELECT * from registration where 1";
$res=mysqli_query($con,$query);
$total_records=mysqli_num_rows($res);   
$total_pages = ceil($total_records / $limit);  
$pagLink = "<div class='pagination'>";
$pagLink .= "<a href='jsmodle.php?page=1'><<</a>";
$var=$page-1;
$pagLink .= "<a href='jsmodle.php?page=".$var."'><</a>";
for ($i=1; $i<=$total_pages; $i++) {  
          $pagLink .= "<a href='jsmodle.php?page=".$i."'>".$i."</a>";  
};   
$var=$page+1;
$pagLink .= "<a href='jsmodle.php?page=".$var."'>></a>";
$pagLink .= "<a href='jsmodle.php?page=".$total_pages."'>>></a>";
echo $pagLink . "</div>";  
?>


