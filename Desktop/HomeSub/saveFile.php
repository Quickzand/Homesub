<?php
$usn = $_COOKIE["usn"];
$pName = $_POST["pName"];
$directory = $_POST["directory"];
$filePath = "users/$usn/projects/$pName/$directory";
file_put_contents($filePath,$_POST["data"]);
?>

<form id="takeMeHome" action="editFile.php" method="get">
  <input name="pName" id="pNameForm" type="hidden" value=<?php echo "'".$pName."'"; ?>>
  <input name="fPath" id="fPath" type="hidden" value=<?php echo "'$directory'" ?> >
</form>

<script>
document.getElementById("takeMeHome").submit();
</script>
