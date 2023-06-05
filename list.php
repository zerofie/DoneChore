<style>
  .button{
  appearance: button;
  background-color: #000;
  background-image: none;
  border: 1px solid #000;
  border-radius: 4px;
  box-shadow: #fff 4px 4px 0 0,#000 4px 4px 0 1px;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  font-family: ITCAvantGardeStd-Bk,Arial,sans-serif;
  font-size: 25px;
  font-weight: 400;
  line-height: 20px;
  margin: 0 5px 10px 0;
  overflow: visible;
  padding: 12px 40px;
  text-align: center;
  text-transform: none;
  touch-action: manipulation;
  user-select: none;
  -webkit-user-select: none;
  vertical-align: middle;
  white-space: nowrap;
  margin: 0px 200px 100px 670px;
}

.button:focus {
  text-decoration: none;
}

.button:hover {
  text-decoration: none;
}

.button:active {
  box-shadow: rgba(0, 0, 0, .125) 0 3px 5px inset;
  outline: 0;
}

.button:not([disabled]):active {
  box-shadow: #fff 2px 2px 0 0, #000 2px 2px 0 1px;
  transform: translate(2px, 2px);
}

</style>
<?php session_start();?>
<?php include "dbconnect.php"?>
<?php include "header.php"?>
<style>
<?php include "styles.css"?>
</style>

<body>
  
  <?php
  
    if(isset($_POST['create'])){
      $tablename =$_POST['ltype'].$_SESSION['username'];
      if ($result = mysqli_query($conn,"SHOW TABLES LIKE '".$tablename."'")) {
        if(mysqli_num_rows($result) == 1) {
          echo' <div class="alert alert-info" role="alert">List Already Exists.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Previously created notes are being displayed!!!</div>';
        }
        else{
        $sql="CREATE TABLE $tablename (sno INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY, content TEXT(100) NOT NULL , timestamp DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP)";
        $result= mysqli_query($conn, $sql);
        $sql1 = "INSERT INTO $tablename (`sno`, `content`, `timestamp`) VALUES ('1', 'Welcome to your todo list', current_timestamp());";
        $sql2 = "INSERT INTO $tablename (`content`, `timestamp`) VALUES ('Hit the + button to add your new item.', current_timestamp());";
        $sql3 = "INSERT INTO $tablename (`content`, `timestamp`) VALUES ('<---Hit this to delete item.', current_timestamp());";
        $result1= mysqli_query($conn, $sql1);
        $result2= mysqli_query($conn, $sql2);
        $result3= mysqli_query($conn, $sql3);
        }
      }
    }
  ?>
  <?php
  
    if(isset($_POST['list'])){
      $tablename =$_POST['ltype'];
      if ($result = mysqli_query($conn,"SHOW TABLES LIKE '".$tablename."'")) {
        if(mysqli_num_rows($result) == 1) {
          echo'';
        }
        else{
        $sql="CREATE TABLE $tablename (sno INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY, content TEXT(100) NOT NULL , timestamp DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP)";
        $result= mysqli_query($conn, $sql);
        $sql1 = "INSERT INTO $tablename (`sno`, `content`, `timestamp`) VALUES ('1', 'Welcome to your todo list', current_timestamp());";
        $sql2 = "INSERT INTO $tablename (`content`, `timestamp`) VALUES ('Hit the + button to add your new item.', current_timestamp());";
        $sql3 = "INSERT INTO $tablename (`content`, `timestamp`) VALUES ('<---Hit this to delete item.', current_timestamp());";
        $result1= mysqli_query($conn, $sql1);
        $result2= mysqli_query($conn, $sql2);
        $result3= mysqli_query($conn, $sql3);
        }
      }
    }
  ?>
    
    <div class="box" id="heading">
<?php 
  if(isset($_POST['create'])){
    echo "<h1>".$_POST['ltype']." </h1>";
    }
  if(isset($_POST['list'])){
    echo "<h1>".trim($_POST['ltype'],$_SESSION['username'])." </h1>";
    }
  if(isset($_POST['del'])){
    echo "<h1>".trim($_POST['ltype'],$_SESSION['username'])." </h1>";
    }
?>
    </div>

    <div class="box">
    


<form class="item" method="post" action="list.php">
        <input type="text" name="newItem" placeholder="New Item" autocomplete="off">
        <input type="hidden" name="ltype" value="<?php echo $tablename;?>" />
        <button class="listbutton" type="submit" name="list" value="list">+</button>
    </form>

         <?php
          if (isset($_POST['list'])) {
            $tablename = $_POST['ltype'];
			    $task = $_POST['newItem'];
			    $sql = "INSERT INTO $tablename (content)VALUES ('$task')";
			    $result = mysqli_query($conn, $sql);
      }
      ?> 

      <?php 

    if(isset($_POST['list'])){
      $tablename = $_POST['ltype'];
      
      $sql="SELECT * FROM $tablename";
		  $tasks = mysqli_query($conn, $sql);
		  $i = 1; 
      
      while ($row = mysqli_fetch_array($tasks)) { 
        echo'
        <form method="post">
        <div class="item">
        <input type="hidden" name="ltype" value="'.$tablename.'" />
        <input type="checkbox" name="del" id="del" value="'.$row["sno"].'" onchange="submit()">
        <p>'.$row["content"].'</p>
        </div>
        </form>
        
    ';
		    $i++;
      }
    }
    if(isset($_POST['create'])){
      $tablename = $_POST['ltype'].$_SESSION['username'];
      
      $sql="SELECT * FROM $tablename";
		  $tasks = mysqli_query($conn, $sql);
		  $i = 1; 
      
      while ($row = mysqli_fetch_array($tasks)) { 
        echo'
        <form method="post">
        <div class="item">
        <input type="hidden" name="ltype" value="'.$tablename.'" />
        <input type="checkbox" name="del" id="del" value="'.$row["sno"].'" onchange="submit()">
        <p>'.$row["content"].'</p>
        </div>
        </form>
        
    ';
		    $i++;
      }
    }
     ?>	
     <?php
if (isset($_POST['del'])){
  $tablename = $_POST['ltype'];
  
        $id = $_POST['del'];
        $sql1 = "DELETE FROM $tablename WHERE `sno` = '$id'";
        mysqli_query($conn, $sql1);
      }

?>
<?php 

if(isset($_POST['del'])){
  $tablename = $_POST['ltype'];
     
  $sql="SELECT * FROM $tablename";
  $tasks = mysqli_query($conn, $sql);
  $i = 1; 
  
  while ($row = mysqli_fetch_array($tasks)) { 
    echo'
    <form method="post">
    <div class="item">
    <input type="hidden" name="ltype" value="'.$tablename.'" />
    <input type="checkbox" name="del" id="del" value="'.$row["sno"].'" onchange="submit()">
    <p>'.$row["content"].'</p>
    </div>
    </form>
    
';
    $i++;
  }
}
 ?>
 
    </div>
    <form method="post" action="/vaibhav">
    <button type="submit" name="create" class="button" id="create">Home</button>
  </form>
</body>