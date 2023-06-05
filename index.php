<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>DoneChore</title>
    <style>
      section{
        margin-top: 100px;
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-pack: center;
	    -ms-flex-pack: center;
	        justify-content: center;
	-webkit-box-align: center;
	    -ms-flex-align: center;
	        align-items: center;
}

.eye {
  
	width: 300px;
	height: 300px;
	background: #fffdf9;
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-align: center;
	    -ms-flex-align: center;
	        align-items: center;
	-webkit-box-pack: center;
	    -ms-flex-pack: center;
	        justify-content: center;
	margin: 0 1rem;
	-webkit-clip-path: circle(50% at center);
	        clip-path: circle(50% at center);
	position: relative;
}

.iris {
	width: 50%;
	height: 50%;
	background: #343434;
	border-radius: 50%;
	-webkit-animation: movement 6s ease-in-out infinite;
	        animation: movement 6s ease-in-out infinite;
}

.upper-pupil,
.lower-pupil {
	width: 100%;
	height: 250px;
	background: #f6c6c6;
	position: absolute;
	-webkit-animation: blink 6s ease-in-out infinite;
	        animation: blink 6s ease-in-out infinite;
	z-index: 1;
}

.upper-pupil {
	top: 0;
}

.lower-pupil {
	bottom: 0;
}

@-webkit-keyframes movement {
	0%, 10% {
		-webkit-transform: translateX(0);
		        transform: translateX(0);
	}
	20% {
		-webkit-transform: translateX(-80%);
		        transform: translateX(-80%);
	}
	30%, 80% {
		-webkit-transform: translateX(0);
		        transform: translateX(0);
	}
	90% {
		-webkit-transform: translateX(80%);
		        transform: translateX(80%);
	}
	100% {
		-webkit-transform: translateX(0);
		        transform: translateX(0);
	}
}

@keyframes movement {
	0%, 10% {
		-webkit-transform: translateX(0);
		        transform: translateX(0);
	}
	20% {
		-webkit-transform: translateX(-80%);
		        transform: translateX(-80%);
	}
	30%, 80% {
		-webkit-transform: translateX(0);
		        transform: translateX(0);
	}
	90% {
		-webkit-transform: translateX(80%);
		        transform: translateX(80%);
	}
	100% {
		-webkit-transform: translateX(0);
		        transform: translateX(0);
	}
}

@-webkit-keyframes blink {
	0%, 30% {
		height: 20%;
	}
	32% {
		height: 40%;
	}
	34% {
		height: 20%;
	}
	36% {
		height: 40%;
	}
	38%, 50% {
		height: 20%;
	}
	60%, 70% {
		height: 45%;
	}
	80%, 100% {
		height: 20%;
	}
}

@keyframes blink {
	0%, 30% {
		height: 20%;
	}
	32% {
		height: 40%;
	}
	34% {
		height: 20%;
	}
	36% {
		height: 40%;
	}
	38%, 50% {
		height: 20%;
	}
	60%, 70% {
		height: 45%;
	}
	80%, 100% {
		height: 20%;
	}
}
    </style>
  </head>
  <body>
    <?php require 'navbar.php' ?>
    
    <div class="container my-3">
    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Welcome - <?php echo $_SESSION['username']?></h4>
      <p>Hey how are you doing? Welcome to TodoList. You are logged in as <?php echo $_SESSION['username']?>. </p>
      <hr>
      <p class="mb-0">Whenever you need to, be sure to logout <a href="/vaibhav/logout.php"> using this link.</a></p>
    </div>
  </div>
  <section><div class="eye">
		<div class="upper-pupil"></div>
		<div class="iris"></div>
		<div class="lower-pupil"></div>
	</div>
	<div class="eye">
		<div class="upper-pupil"></div>
		<div class="iris"></div>
		<div class="lower-pupil"></div>
	</div></section>
  
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>