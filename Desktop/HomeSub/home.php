<?php
ob_start();
$C = new mysqli("216.51.232.98","a9763_Matthew","Mateo2002$","a9763_Main");
$R = $C->query("CALL VALIDATE_USRTOKENS('".$_COOKIE["stoken"]."');");
if($REC = $R->fetch_assoc()) {
}
else {
  header("Location: login.php");
}
?>
<html>
<head>
<title> Home </title>
<link rel="shortcut icon" type="image/jpg" href="favicon.ico"/>
<link rel="stylesheet" type="text/css" href="UIStyles.css">
<link rel="stylesheet" type="text/css" href="homeStyles.css">
</head>
<body>
<div id="topBar"> <div id="sidebarToggleButton" class="sidebarToggleClosed" onclick="toggleSidebar()"></div> <div id="logo" onclick="linkTo('home.php')"></div> <div id="userIcon" onclick="toggleAccountPopup()"></div> </div>
<div id="sidebar">
  <table id="sidebarContent">
    <tr> <td class="sidebarRow" onClick="linkTo('home.php');"> Home </td> </tr>
    <tr> <td class="sidebarRow" onClick="linkTo('projects.php');"> Projects </td> </tr>
    <tr> <td class="sidebarRow"  onClick="linkTo('wip.php');"> WIP </td> </tr>
    <tr> <td class="sidebarRow"  onClick="linkTo('settings.php');"> Settings </td> </tr>
     </table>
 </div>
 <div id="accountPopup" onClick="linkTo('account.php')">

   <table id="accountTable">
     <tr>
       <td class="accountOption">
         Account
       </td>
     </tr>
       <tr>
       <td id="logout" class="accountOption" onClick="linkTo('signOut.php')">
         Log Out
       </td>
     </tr>

   </table>
 </div>
  <div id="welcomeHead">Welcome to HomeSub - <?php echo $_COOKIE["usn"]; ?></div>
<div id="homeBody">
<div id="Explaination" class="bodySection"> <div class="bodyHeader"> What is HomeSub? </div>
<div class="bodyContent">
Well we're glad you asked! HomeSub is an easy way for you, yes you, to work on, and submit your homework! We know its hard for students to keep their work synced between school and home, and so, we've decided to make a system in which, not only can you view your work as you're working, but you can also access all the same work no matter where you are!
</div>
</div>
<div id="Usage" class="bodySection"> <div class="bodyHeader"> How Do I Use HomeSub? </div>
<div class="bodyContent">
Using HomeSub is super easy! All you have to do is create a free account, and then you can start working on your first project from there! You can create or upload all of the files you like, and everything within your account is completley editable by you! Just as if you were editing from any computer.
</div>
</div>
</div>
<script src="sidebar.js"></script>
<script src="accountPopup.js"></script>
<script src="basicFunctions.js"></script>





</body>
</html>
