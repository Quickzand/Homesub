<?php
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
    overflow-x:hidden;

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
    font-size:30px;
    border:none;
    box-shadow: 5px 5px grey;
  }

  #submitButton:hover {
    background-color:#24c149;
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

}

  </style>
</head>

<body>
  <html>
  <body>
    <link rel="stylesheet" type="text/css" href="UIStyles.css">
    <div id="topBar"> <div id="logo" onclick="linkTo('home.php')"></div></div>
<div id="header"> <center> Please Enter Your Desired Username and Password </center> </div>
<button id="goBack" onclick="linkTo('login.php')"> Go Back </button>

  <form action='generateUser.php' method='POST' id='LoginForm'>
    <div class='FormInput'>
      <div class="inputText"> Username: </div>
      <input type='text' name='usn'>
    </div>

    <div class='FormInput'>
      <div class="inputText"> Password: </div>
      <input type='password' name='psw'>
    </div>
    <div class='FormInput'>
      <div class="inputText"> Please type your password again: </div>
      <input type='password' name='pswRpt'>
    </div>

    <div class='FormInput'>
    <input type='submit' value='Create Account' id="submitButton">
    </div>
  </form>
  </body>
  </html>

  <script src="basicFunctions.js"></script>
</body>

</html>
