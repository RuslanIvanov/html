<?php
if ($_POST) 
{
  file_put_contents("file.txt",$_POST['text']);
  header ("Location: ".$_SERVER['PHP_SELF']);
  exit;
}

$text = htmlspecialchars(file_get_contents("file.txt"));
?>

<form method="POST">
<textarea name="text"><?=$text?></textarea>
<input type="submit">
</form>


