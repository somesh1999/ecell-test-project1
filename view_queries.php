<?php
session_start();
include 'db.php';


if(isset($_SESSION['email'])){
    $email=$_SESSION['email'];
    $sql="select * from users where email='$email'";
    $data=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($data)){
        $name=$row['name'];
    }
    
 }
else{
    header('location:index.php');
}
?>

<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<title>Dashboard</title>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><?php echo $name ."'s Dashboard"; ?></a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="dashboard.php">Post Queries</a></li>
      <li class="active"><a href="view_queries.php">View Queries</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">


<ul class="list-group">
    <?php 
    
    $sql="select * from queries";
    $data=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($data)){
        echo '<li class="list-group-item">'.$row['queries'].'<br><br> <b>Posted By:-</b> '.$row['email'].' </li>';
    }
    
    ?>
  
 
</ul>

</div>


</html>