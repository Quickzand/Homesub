<?php
  $C = new mysqli("216.51.232.98", "a9763_Matthew", "Mateo2002$", "a9763_Main");
  $pName = $_POST["projectToDelete"];
  $pName = str_replace(' ', '', $pName);
  $usrID = $_COOKIE["usrID"];
  $Result = $C -> query("DELETE FROM PROJECTS WHERE pName like '$pName' and USRID = '$usrID';");
  rmdir("users/".$_COOKIE["usn"]."/projects/".$pName);
  header("Location: projects.php");
