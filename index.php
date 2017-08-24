<?php
 include 'db.php';
 if(isset($_POST['add']))
 {
    header('Location:home.php');
 }
 if(!empty($_POST['list']))
 {
   
    foreach($_POST['list'] as $selected) {
       setcookie("Test", $selected);
       header('Location:home1.php');
    }
 }
 if(!empty($_POST['listd']))
 {
   
    foreach($_POST['listd'] as $selected) {
       $query="DELETE from registration where roll='$selected'";
       $res=mysqli_query($con,$query);
       header('Location:index.php');
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

<html>
<head>
<title>Student Details</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
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
      margin-left: 500px;
    }
    .pagination a.active {
          background-color: #4CAF50;
          color: white;
      }

      .pagination a:hover:not(.active) {background-color: #dddddd;}
    a
    {
      margin-right: 20px;
      width: 30px;
      text-align: center;
    }
</style>

<body>
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
    echo '<td>'. "<button name='list[]' class='btn btn-info' value=".$row['roll']." >".'Edit'.'</button>'.'</td>';
    echo '<td>'. "<button name='listd[]' onclick='return valid()' class='btn btn-danger' value=".$row['roll']." >".'Delete'.'</button>'.'</td>';
    echo '</tr>';
    $i++;
  }
    ?>
  </tbody>
</table>

<button class="btn btn-primary" name="add">Add</button>
</form>
</center>
 </body>
 </html>
 <?php
$query="SELECT * from registration where 1";
$res=mysqli_query($con,$query);
$total_records=mysqli_num_rows($res);   
$total_pages = ceil($total_records / $limit);  
$pagLink = "<div class='pagination'>";
$pagLink .= "<a href='index.php?page=1'><<</a>";
$var=$page-1;
$pagLink .= "<a href='index.php?page=".$var."'><</a>";
for ($i=1; $i<=$total_pages; $i++) { 
     $active = $i == $page ? 'class="active"' : ''; 
          $pagLink .= "<a $active href='index.php?page=".$i."'>".$i."</a>";  
};   
$var=$page+1;
$pagLink .= "<a href='index.php?page=".$var."'>></a>";
$pagLink .= "<a href='index.php?page=".$total_pages."'>>></a>";
echo $pagLink . "</div>";  
?>