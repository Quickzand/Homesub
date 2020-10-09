<?php
ob_start();
if (isset($_POST["usn"]))
{
    if($_POST["psw"] == $_POST["pswRpt"]){
  $C = new mysqli("216.51.232.98","a9763_Matthew","Mateo2002$","a9763_Main");
  $R = $C->query("CALL ADD_USR('".$_POST["usn"]. "','" .$_POST["psw"]."');");
  $processUser = posix_getpwuid(posix_geteuid());
  mkdir("users/".$_POST["usn"]);
  mkdir("users/".$_POST["usn"]."/projects");
  header('Location:login.php');
    }
    else {
       header('Location:newAccount.php');
    }
}
?>
