<?php require_once("Includes/connection.php");?>
<?php require_once("Includes/functions.php");?>
<?php
	selectpages();
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

				echo "<li><a href=\"user.php?subj=" .urlencode($subject["id"])."\">{$subject["menu_name"]}</a></li>";

			//use returned data
			}





			?>
		</ul>
</div>

<div id="section">

<p>
content to be added after 
</p>

<?php
			if(isset($selectsub)){
			$page_set=getpages($selectsub);

			echo "<ul>";
			while ($page=mysql_fetch_array($page_set)) {
				echo "<li><a href=\"user.php?page=" .urlencode($page["id"])."\">{$page["menu_name"]}</a></li>";
				}
			echo "</ul>";
		}

		if(isset($selectpage)){
			$page_set=getpagestext($selectpage);
			while ($page=mysql_fetch_array($page_set)) {
					echo "<h2>".$page["content"]."</h2>";
				}
		
		}


?>

















</div>
<?php include("Includes/footer.php");?>
<?php require("Includes/closeconn.php");?>