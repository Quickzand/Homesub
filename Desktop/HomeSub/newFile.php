<?php
$fp = "users/".$_COOKIE["usn"] ."/projects/". $_POST["pName"]."/".$_POST["directory"]."/".$_POST["fName"];
fopen($fp, "w");
?>
<html>
<form id="goBack" method="get" action="project.php">
  <input type="hidden" name="pName" value=<?php echo "'". $_POST["pName"]."'"; ?> >
  <input type="hidden" name="directory" value=<?php echo "'". $_POST["directory"]."'"; ?> >
</form>
</html>
<script>
document.getElementById('goBack').submit();
</script>
