<?php
$C = new mysqli("216.51.232.98","a9763_Matthew","Mateo2002$","a9763_Main");
$C2 = new mysqli("216.51.232.98","a9763_Matthew","Mateo2002$","a9763_Main");
$R = $C->query("CALL VALIDATE_USRTOKENS('".$_COOKIE["stoken"]."');");
$pName = $_POST["pName"];
$pName = str_replace(' ', '-', $pName);
$usn = $_COOKIE["usn"];
if($REC = $R->fetch_assoc()) {
  $in = "INSERT INTO PROJECTS VALUES ('";
  $in .= $pName;
  $in .= "','";
  $in .= "/usrs/" . $_COOKIE["usn"] . "/" . $_POST["pName"];
  $in .=  "','";
  $in .= date("Y/m/d") . " " . date("H:i:s");
  $in .=  "','";
  $in .= $_COOKIE["usrID"];
  $in .= "');";
  $C2->query($in);
  mkdir("users/$usn/projects/$pName");
  header("Location: projects.php");
}
else {
  header("Location: login.php");
}
?>
