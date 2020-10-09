<?php
ob_start();
$C = new mysqli("216.51.232.98", "a9763_Matthew", "Mateo2002$", "a9763_Main");
$R = $C->query("CALL VALIDATE_USRTOKENS('".$_COOKIE["stoken"]."');");
if ($REC = $R->fetch_assoc()) {
} else {
    header("Location: login.php");
}
?>
<html>
<head>
<title> Work In Progress </title>
<link rel="shortcut icon" type="image/jpg" href="favicon.ico"/>
<link rel="stylesheet" type="text/css" href="UIStyles.css">
<link rel="stylesheet" type="text/css" href="WIPStyles.css">
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
 <div id="accountPopup">

   <table id="accountTable">
     <tr>
       <td class="accountOption" onClick="linkTo('account.php')">
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

<div id="WIPBody">
<div id="header"> Uh Oh! Looks like this page is still under <br> <span style="white-space:nowrap; text-decoration: underline;"> <img src="https://i.pinimg.com/originals/63/8f/fe/638ffe64df03723e33ed6bda9d27636f.png" width="50" height="50"> construction... </span> </div>
<div class="largeBox bodySection" id="info">
  Sorry for the inconvenience but this part of the website is still under development. It will be released very soon!
</div>
</div>
<script src="sidebar.js"></script>
<script src="accountPopup.js"></script>
<script src="basicFunctions.js"></script>





</body>
</html>
