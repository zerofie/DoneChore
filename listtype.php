
<?php session_start();?>
<?php include 'header.php';?>
<style>
  p{
    display: block;
    font-size: 2em;
    margin-block-start: 0.67em;
    margin-block-end: 0.67em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: 500;
    padding:50px;
    font-size:80px;
    letter-spacing: -1.5px;
    line-height: 110%;
  }
  input[type="text"]{
    margin: 100px 100px 50px 400px;
    box-sizing: border-box;
    border: 2px solid black;
    border-radius: 4px;
    width: 50%;
    font-size: 40px;
    
  }
  
  
button{
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

button:focus {
  text-decoration: none;
}

button:hover {
  text-decoration: none;
}

button:active {
  box-shadow: rgba(0, 0, 0, .125) 0 3px 5px inset;
  outline: 0;
}

button:not([disabled]):active {
  box-shadow: #fff 2px 2px 0 0, #000 2px 2px 0 1px;
  transform: translate(2px, 2px);
}

@media (min-width: 768px) {
  button {
    padding: 12px 50px;
  }
}
</style>

<?php include 'dbconnect.php';?>

<body>

  <p>Enter The Type of list you want to create:</p>
  
  <form method="post" action="list.php">
    <input type="text" name="ltype" id="ltype"><br><br>
    <button type="submit" name="create" class="button" id="create">Create</button>
  </form>
</body>
<?php include 'footer.php';?>