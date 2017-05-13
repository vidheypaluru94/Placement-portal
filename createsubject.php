<?php require_once("Includes/connection.php");?>
<?php require_once("Includes/functions.php");?>

<?php
$menu_name=$_POST["menu_name"];
$position=$_POST["position"];
$visible=$_POST["visible"];

?>

<?php
$query="insert into subjects(
	menu_name,position,visible
	) values(
	'{$menu_name}',{$position},{$visible}
	)";
	if(mysql_query($query,$connection)){
			header("Location:content.php");
	}
	else{
		echo "<p>subject couldnt created</p>";
		echo "<p>mysql_error()</p>";
	}
?>


<?php  
mysql_close($connection);
?>
