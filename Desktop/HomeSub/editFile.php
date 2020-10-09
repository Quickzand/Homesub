<?php
ob_start();
$C = new mysqli("216.51.232.98","a9763_Matthew","Mateo2002$","a9763_Main");
$R = $C->query("CALL VALIDATE_USRTOKENS('".$_COOKIE["stoken"]."');");
if($REC = $R->fetch_assoc()) {
}
else {
  header("Location: login.php");
}
$usn = $_COOKIE["usn"];
$pName = $_GET["pName"];
$directory = $_GET["fPath"];
$filePath = "users/$usn/projects/$pName/$directory";
$folderDirectory = $directory;
while(substr($folderDirectory,-1) != "/" && strlen($folderDirectory) != 0) {
  $folderDirectory = substr_replace($folderDirectory,"",-1);
}
?>
<html>
<head>
<title> Edit Your Project </title>
<link rel="shortcut icon" type="image/jpg" href="favicon.ico"/>
<link rel="stylesheet" type="text/css" href="UIStyles.css">
<script src="codemirror/lib/codemirror.js"></script>
<link href="codemirror/lib/codemirror.css" rel="stylesheet">
<link href="codemirror/theme/3024-day.css" rel="stylesheet">
<link href="codemirror/addon/dialog/dialog.css" rel="stylesheet">
<link href="codemirror/addon/hint/show-hint.css" rel="stylesheet">
<link href="codemirror/addon/fold/foldgutter.css" rel="stylesheet">
<script src="codemirror/mode/xml/xml.js"></script>
<script src="codemirror/mode/javascript/javascript.js"></script>
<script src="codemirror/mode/css/css.js"></script>
<script src="codemirror/mode/php/php.js"></script>
<script src="codemirror/mode/htmlmixed/htmlmixed.js"></script>
<script src="codemirror/addon/edit/closetag.js"></script>
<script src="codemirror/addon/edit/closebrackets.js"></script>
<script src="codemirror/addon/edit/matchTags.js"></script>
<script src="codemirror/addon/edit/matchBrackets.js"></script>
<script src="codemirror/addon/search/jump-to-line.js"></script>
<script src="codemirror/addon/search/search.js"></script>
<script src="codemirror/addon/dialog/dialog.js"></script>
<script src="codemirror/addon/hint/show-hint.js"></script>
<script src="codemirror/addon/hint/html-hint.js"></script>
<script src="codemirror/addon/fold/foldgutter.js"></script>
<script src="codemirror/addon/fold/foldcode.js"></script>
<script src="codemirror/addon/fold/xml-fold.js"></script>
<script src="codemirror/addon/fold/brace-fold.js"></script>
<script src="codemirror/addon/fold/comment-fold.js"></script>
<script src="codemirror/addon/mode/overlay.js"></script>
<link rel="stylesheet" type="text/css" href="editorStyles.css">
<link rel="stylesheet" type="text/css" href="codemirror/theme/material-darker.css">

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



<div id="editorBody">
  <div class="topButtons">
  <div id="backButton" class="smallBox UIButton" onClick="goBack()">⇦Back </div>
  <div id="saveButton" class="smallBox UIButton" onClick="saveFile()">💾Save </div>
</div>
  <div id="editorDiv">
  <textarea id="editor"><?php
  $fPath =  $_GET["fPath"];

$fh = fopen($filePath,'r');
while ($line = fgets($fh)) {
echo($line);
}
fclose($fh);
?></textarea>
</div>
</div>

<form id="goBack" action="project.php" method="get">
  <input name="pName" id="pNameForm" type="hidden" value=<?php echo "'".$_GET["pName"]."'"; ?>>
<input name="directory" id="directory" type="hidden" value=<?php
echo "'" .$folderDirectory."'";
?>>
</form>

<form id="saveFile" action="saveFile.php" method="post">
  <input name="pName" id="pNameForm" type="hidden" value=<?php echo "'".$pName."'"; ?>>
  <input name="directory" id="directory" type="hidden" value=<?php echo "'$directory'";?> >
  <input name="data" id="data" type="hidden" >
</form>

<script src="editingControl.js"></script>
<script src="sidebar.js"></script>
<script src="accountPopup.js"></script>
<script src="basicFunctions.js"></script>
</body>
</html>
