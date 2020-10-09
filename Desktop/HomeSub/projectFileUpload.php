<?php
$target_dir = "";
//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$info = pathinfo($_FILES["fileToUpload"]["name"]);
$ext = $info['extension']; // get the extension of the file
$newname = $info["filename"].".".$ext;
$target = "users/".$_COOKIE["usn"]."/projects/".$_POST["pName"]."/".$_POST["directory"]."/".$newname;
move_uploaded_file( $_FILES['fileToUpload']['tmp_name'], $target);
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
