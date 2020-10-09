<?php
$C = new mysqli("216.51.232.98","a9763_Matthew","Mateo2002$","a9763_Main");
$R = $C->query("CALL VALIDATE_USRTOKENS('".$_COOKIE["stoken"]."');");
$REC = $R->fetch_assoc();
if($REC["TOKEN"] != "ERROR") {
  setcookie("stoken",$REC["TOKEN"],time()-6000000);
  header('Location:login.php');
}
else {

}
?>
