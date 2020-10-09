<?php
if (!isset($_GET["pName"])) {
    header("location:projects.php");
}
$pName = $_GET["pName"];
$usn = $_COOKIE["usn"];
ob_start();
$C = new mysqli("216.51.232.98", "a9763_Matthew", "Mateo2002$", "a9763_Main");
$R = $C->query("CALL VALIDATE_USRTOKENS('".$_COOKIE["stoken"]."');");
if ($REC = $R->fetch_assoc()) {
} else {
    header("Location: login.php");
}
$projectsPath = "users/$usn/projects/$pName/";

if (!isset($_GET["directory"])) {
    $pName = str_replace(' ', '', $pName);
    $path = opendir("users/$usn/projects/$pName/");
    $files = scandir("users/$usn/projects/$pName/");
    $directory = "";
} elseif (is_dir("users/$usn/projects/$pName/" . $_GET["directory"])) {
    $directory = $_GET["directory"];
    $path = opendir("users/$usn/projects/$pName/$directory");
    $files = scandir("users/$usn/projects/$pName/$directory");
} else {
    $directory = substr($_GET["directory"], 0, -1);
    header("Location: "."users/$usn/projects/$pName/" . $directory);
}
?>
<html>
<head>
<title> <?php echo $pName;?> Directory </title>
<link rel="shortcut icon" type="image/jpg" href="favicon.ico"/>
<link rel="stylesheet" type="text/css" href="UIStyles.css">
<link rel="stylesheet" type="text/css" href="projectStyles.css">
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
 <div id="filePopup" class="popup">
  <form id="uploadFile" action="projectFileUpload.php" method="post" enctype="multipart/form-data">
    <div class="popupContents">
    <div class="popupInput">
      <input type="file" name="fileToUpload" id="fileToUpload">
    </div>
  <input id="submitButton" type="submit" value="Upload File" name="submit">
  <input type="hidden" name="pName" value=<?php echo "'$pName'"; ?>>
  <input type="hidden" name="directory" value=<?php echo "'$directory'"; ?>>
    </div>
  </form>
</div>

<div id="newFilePopup" class="popup">
  <span style="margin-top:10px; display: block;">Please Enter The File Name</span>
  <form action="newFile.php" method="post">
    <input type="text" name='fName' id="fileName">
   <div> <input type='submit' value='Create' id="submitButton"> </div>
   <input type="hidden" name="pName" value=<?php echo "'$pName'"; ?>>
   <input type="hidden" name="directory" value=<?php echo "'$directory'"; ?>>
  </form>

</div>

<div id="renamePopup" class="popup">
  <span style="margin-top:10px; display: block;">Please Enter The New File Name</span>
  <form action="renameFile.php" method="post" id="renameFile">
    <input type="text" name='newFileName' id="newFileName">
   <div> <input type='submit' value='Create' id="submitButton"> </div>
   <input type="hidden" name="pName" value=<?php echo "'$pName'"; ?>>
   <input type="hidden" name="directory" value=<?php echo "'$directory'"; ?>>
   <input type="hidden" name="oldFileName" id="oldFileName">
  </form>

</div>



<div id="projectBody">

  <div id="head"> <?php echo $pName;?> </div>
  <div class="topButtons">
    <div id="uploadButton" class="UIButton" onClick="openUploadPopup()">↑ Upload</div>
    <div id="newFileButton" class="UIButton" onClick="openNewFilePopup()">+ New File</div>
</div>
  <table id="directoryTable">

    <tr id="HeaderRow"> <td class="heading" colspan="100">File Name</td>  </tr>
    <tr class='entryRow'><td class='entryName' onClick='goUpDirectory()' colspan="100" id="upDirectory"> ^^GO UP^^ </td></tr>
  </table>
</div>


<script src="projectDirectory.js"></script>
<?php
foreach ($files as $fName) {
    if (isset($directory)) {
        if (is_dir("users/$usn/projects/$pName/$directory/".$fName)) {
            echo "<script>addEntry('$fName','folder')</script>";
        } else {
            echo "<script>addEntry('$fName','file')</script>";
        }
    } else {
        if (is_dir("users/$usn/projects/$pName/".$fName)) {
            echo "<script>addEntry('$fName','folder')</script>";
        } else {
            echo "<script>addEntry('$fName','file')</script>";
        }
    }
}
?>

<form id="directoryChange" action="project.php" method="get">
  <input name="pName" id="pNameForm" type="hidden" value=<?php echo "'".$pName."'"; ?>>
<input name="directory" id="directory" type="hidden" value=<?php
if (isset($_GET["directory"])) {
    echo "'" .$_GET["directory"]."'";
}?>>
</form>

<form id="editFile" action="editFile.php" method="get">
  <input name="pName" id="pNameForm" type="hidden" value=<?php echo "'".$pName."'"; ?>>
  <input name="fPath" id="fPath" type="hidden" value=<?php echo "'$directory'" ?> >
</form>
<script>
function openUploadPopup() {
  openPopup(document.getElementById("filePopup"));
}

function openNewFilePopup() {
  openPopup(document.getElementById("newFilePopup"));
  document.getElementById("fileName").focus();
  document.getElementById("fileName").select();
}
</script>
<script src="sidebar.js"></script>
<script src="popups.js"></script>
<script src="accountPopup.js"></script>
<script src="basicFunctions.js"></script>
</body>
</html>
