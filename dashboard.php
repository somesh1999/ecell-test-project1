<?php
session_start();
include 'db.php';
if(isset($_SESSION['email'])){
    if(isset($_POST['submit'])){
    $queries=$_POST['queries'];
    $email=$_SESSION['email'];
    $sql="insert into queries (email, queries) values ('$email','$queries')";
    if(mysqli_query($con,$sql)){
        echo "<script>alert('Posted successfully')</script>";
    }
    else{
        echo "<script>alert('Something went wrong')</script>";
    }
    }
    
 }
else{
    header('location:index.php');
}


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
      <li class="active"><a href="dashboard.php">Post Queries</a></li>
      <li><a href="view_queries.php">View Queries</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
<form action="dashboard.php" method="post">
<div class="form-group">
  <label for="comment">Post queries:</label>
  <textarea class="form-control" rows="5" id="queries" name="queries"></textarea>
</div>

<div class="form-group">
  <button type="submit" name="submit" class="btn btn-primary">Post Query</button>
</div>
</form>

</div>


</html>