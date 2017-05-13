<?php require_once("Includes/connection.php");?>
<?php require_once("Includes/functions.php");?>
<?php	selectpages();
	?>
<?php include("Includes/header.php");?>
	
	<div id="nav">
		<p>Companies<p>
			<ul>
			<?php
			//database query

			$subject_set=getsubjects();
			//use returned data
			while ($subject=mysql_fetch_array($subject_set)) {

				echo "<li><a href=\"content.php?subj=" .urlencode($subject["id"])."\">{$subject["menu_name"]}</a></li>";

			//use returned data
			}

			



			?>
		</ul>
</div>

<div id="section">

<h2>Add subject</h2>

<form action="createsubject.php" method="post">
Subject:
<input type="text" name="menu_name" >
<br>
<br>
Position:
<select name="position">
	<?php
	$subject_set=getsubjects();
	$rows=mysql_num_rows($subject_set);
	for($count=1;$count<=$rows+1;$count++){
		  echo "<option value=\"{$count}\">{$count}</option>";

	}
	?>
</select>

<br>
<br>
<br>
Visible
<br>
<input type="radio" name="visible" value="0">yes
<input type="radio" name="visible" value="1">no


 
<br>
<br>


<br>
<br>

<input type="submit" value="Add company" >


</form>




<br>

<a href="content.php">cancel</a>

<?php
			
?>

















</div>
<?php include("Includes/footer.php");?>
<?php require("Includes/closeconn.php");?>
