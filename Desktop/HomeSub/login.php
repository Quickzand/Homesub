<?php
ob_start();
if (isset($_POST["usn"]))
{
  $C = new mysqli("216.51.232.98","a9763_Matthew","Mateo2002$","a9763_Main");
  $C2 = new mysqli("216.51.232.98","a9763_Matthew","Mateo2002$","a9763_Main");
  $loginUsr = $C->prepare("CALL LOGIN_USR('".$_POST["usn"]. "','" .$_POST["psw"]."');");
  $loginUsr -> execute();
  $R = $loginUsr->get_result();
  $REC = $R->fetch_assoc();
  $usn = $_POST["usn"];
  if($REC["TOKEN"] != "ERROR") {
    $usrIDAssoc = $C2->query("SELECT USRID FROM USR WHERE USRN = '$usn';" );
    echo ($C2 -> error);
    $usrID = $usrIDAssoc->fetch_assoc();
    setcookie("stoken",$REC["TOKEN"],time()+(60*60*2));
    setcookie("usn",$_POST["usn"],time()+(60*60*2));
    setcookie("usrID",$usrID["USRID"],time()+(60*60*2));
    header('Location:home.php');
  }
  else {

  }
}
else
{
}
?>
<html>
<head>
  <style>
  Body {
    width:100%;
    margin: 0;
    padding: 0;
    background-color: #F5FFF7;
    font-family:arial;
  }
  #LoginForm {
    position: absolute;
    left: 50%;
    top:50%;
    width:100%;
    transform: translate(-50%,-50%);
  }

  .FormInput {
    width:100%;
    text-align: center;
    margin:5px;
    font-size:25px;
    color:black;
  }

  .FormInput input {
    width:25%;
    text-align: center;
    font-size:40px;
  }

  #submitButton {
    background-color:#446f4b;
    color:white;
    cursor:pointer;
    width:12.5%;
    font-size:30px;
    border:none;
    box-shadow: 5px 5px grey;
  }

  #submitButton:hover {
    background-color:#24c149;
  }

  #newUserButton {
    background-color:#aab4a9;;
    cursor:pointer;
    width:12.5%;
    font-size:30px;
    border:none;
    box-shadow: 5px 5px grey;
  }

  #newUserButton:hover {
    background-color:#cfdcce;;
  }

  input[type=text], input[type=password] {
    radius:50%;
    border:solid 1px;
    background-image:none;
box-shadow: 5px 5px grey;
margin-bottom:30px;
  }
.inputText {
  background-color:#C4CCC5;
  width:25%;
  text-align: center;
  position: relative;
  left:50%;
  transform:translate(-50%);
  box-shadow: 5px 5px grey;
  margin-bottom:10px;
}

  #header {
    font-size:50px;text-decoration:underline; top:10%; left:50% ;position:absolute; transform:translate(-50%); width:100%;
  }

  #goBack {
    font-size:50px;
    top:20%;
    left:50%
    ;position:absolute;
    transform:translate(-50%);
    cursor: pointer;
    border-style: hidden;
      box-shadow: 5px 5px grey;
  }

  #goBack:hover {
    color:white;
      background-color: #800002;
  }



  </style>
</head>

<body>
  <html>

  <body>
    <link rel="stylesheet" type="text/css" href="UIStyles.css">
    <div id="topBar"> <div id="logo" onclick="linkTo('home.php')"></div></div>


<div style="font-size:50px;text-decoration:underline; top:10%; left:50% ;position:absolute; transform:translate(-50%); width:100%;"> <center> Please Enter Your Username and Password </center> </div>
  <form action='login.php' method='POST' id='LoginForm'>
    <div class='FormInput'>

      <div class="inputText"> Username: </div>
      <input type='text' name='usn'>
    </div>

    <div class='FormInput'>
    <div class="inputText"> Password: </div>
      <input type='password' name='psw'>
    </div>
    <br>

    <div class='FormInput'>
    <input type='submit' value='Login' id="submitButton">
    <input type="button" value='Create Account' id="newUserButton" onclick="linkTo('newAccount.php')">
    </div>
  </form>
  </body>
  </html>

  <script src="basicFunctions.js"></script>
</body>

</html>
