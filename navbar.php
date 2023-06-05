<style>
  .navbar{
    background-color: #000000;
  }
  body{
    background: #f2709c; 
background: -webkit-linear-gradient(to right, #ff9472, #f2709c);  
background: linear-gradient(to right, #ff9472, #f2709c); 
  }
  
</style>
<?php 
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin= true;
}
else{
  $loggedin = false;
}
echo '<nav class="navbar navbar-expand-lg">
  <a class="navbar-brand text-light" style="font-size:30px;">DoneChore</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-light border" style="font-size:17px; margin-right:70px;margin-left: 1000px" href="/vaibhav">Home <span class="sr-only">(current)</span></a>
      </li>';

      if(!$loggedin){
      echo '<li class="nav-item">
        <a class="nav-link text-light border" style="font-size:17px; margin-right:70px"href="/vaibhav/login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light border" style="font-size:17px"href="/vaibhav/signup.php">Signup</a>
      </li>';
      }
      if($loggedin){
      echo '<li class="nav-item">
        <a class="nav-link text-light border" style="font-size:17px; margin-right:70px"href="/vaibhav/logout.php">Logout</a>
      </li>';
      echo '<li class="nav-item">
        <a class="nav-link text-light border" style="font-size:17px"href="/vaibhav/listtype.php">Lists</a>
      </li>';
    }
       
      
    echo '</ul>
  </div>
</nav>';
?>