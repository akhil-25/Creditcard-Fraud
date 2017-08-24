<?php
 include 'db.php';
 /*$query="SELECT * from registration where 1";
 $res=mysqli_query($con,$query);
  $count=mysqli_num_rows($res);*/  
$limit = 2;  
if (isset($_GET["page"]))
 { 
  $page  = $_GET["page"];
   }
 else
  {
   $page=1;
 };  
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
<body>
<center>
<h1>Details of Students</h1>
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
    $i++;
  }
    ?>
  </tbody>
</table>
</center>
</body>
</html>
<?php
$query="SELECT * from registration where 1";
$res=mysqli_query($con,$query);
$total_records=mysqli_num_rows($res);   
$total_pages = ceil($total_records / $limit);  
$pagLink = "<div class='pagination'>";
$pagLink .= "<a href='main.php?page=1'><<</a>";
for ($i=1; $i<=$total_pages; $i++) {  
          $pagLink .= "<a href='main.php?page=".$i."'>".$i."</a>";  
};   
$pagLink .= "<a href='main.php?page=".$total_pages."'>>></a>";
echo $pagLink . "</div>";  
?>