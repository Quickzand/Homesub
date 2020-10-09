<?php
ob_start();
$C = new mysqli("216.51.232.98", "a9763_Matthew", "Mateo2002$", "a9763_Main");
$R = $C->query("CALL VALIDATE_USRTOKENS('".$_COOKIE["stoken"]."');");
$C->close();

if ($REC = $R->fetch_assoc()) {
} else {
    header("Location: login.php");
}



?>
<html>
<head>
<title> Projects </title>
<link rel="shortcut icon" type="image/jpg" href="favicon.ico"/>
<link rel="stylesheet" type="text/css" href="UIStyles.css">
<link rel="stylesheet" type="text/css" href="projectsStyles.css">
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
 <div id="bodyDarken" onclick="closePopup()"> </div>
 <div id="newProjectPopup" class="">
   <span style="margin-top:10px; display: block;">Please Enter The File Name</span>
   <form action="addFile.php" method="post">
     <input type="text" name='pName' id="newProjectNameInput">
    <div> <input type='submit' value='Create' id="submitButton"> </div>
   </form>

 </div>
<div id="projectsBody">

  <div id="newProjectButton" class="smallBox projectTopButton" onClick="openPopup()" > <span style="font-size:50px;"> + </span> New Project </div>

  <table id="projectsList" class="bodySection"> <tr id="HeadingRow"> <td class="Heading"> Name </td> <td class="Heading"> Date Last Accessed </td> <td> </td> </tr> </table>

</div>
</div>
<script>
var darken = document.getElementById("bodyDarken");
var popup = document.getElementById("newProjectPopup");
var inputThing = document.getElementById("newProjectNameInput");
darken.style.display = 'none';
popup.style.display = 'none';
function openPopup() {
  darken.style.display = 'block';
  popup.style.display = 'block';
  inputThing.select();
}

function closePopup() {
  darken.style.display = 'none';
  popup.style.display = 'none';
}
</script>
<script src="sidebar.js"></script>
<script src="accountPopup.js"></script>
<script src="basicFunctions.js"></script>
<script src="projectsTable.js"> </script>



<form id="deleteProject" action="deleteProject.php" method="post">
  <input type="hidden" name="projectToDelete" id="projectToDelete">
</form>

<form id="openProject" action="project.php" method="get">
  <input type="hidden" name="pName" id="pName">
</form>

<?php
$C2 = new mysqli("216.51.232.98", "a9763_Matthew", "Mateo2002$", "a9763_Main");
$ProjectList = $C2 -> query("SELECT * FROM PROJECTS WHERE USRID = '" . $_COOKIE["usrID"] . "';");
while ($ProjectRow = $ProjectList->fetch_assoc()) {
    $pName = $ProjectRow["pName"];
    $pDate = $ProjectRow["accessDate"];
    echo("<script> addRow('$pName','$pDate') </script>");
}
 ?>


</body>
</html>
