<?php require_once("Includes/connection.php");?>
<?php require_once("Includes/functions.php");?>
<?php	selectpages();
	?>
	<?php
	if(isset($_POST["submit"])){
	$menu_name=$_POST["menu_name"];
	$position=$_POST["position"];
	$visible=$_POST["visible"];
	$id=$_GET["subj"];
	$query="update  subjects set 
		menu_name='{$menu_name}',
		position={$position},
		visible={$visible}
		where id={$id}";
		$result=mysql_query($query,$connection);
		if($result){

		}
		else{
			echo "<p>update failsed</p>";
	
		}
	
	header("Location:editsubject.php/subj=".$id);

	}

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

				echo "<li><a href=\"editsubject.php?subj=" .urlencode($subject["id"])."\">{$subject["menu_name"]}</a></li>";

			//use returned data
			}

			



			?>
		</ul>
</div>

<div id="section">

<h2>Edit subject <?php echo $selectsub['menu_name'] ?></h2>

<form action="editsubject.php/subj= <?php echo $selectsub ?> " method="post">
Subject:
<input type="text" name="menu_name" value="<?php $result=selectsubject($selectsub); echo $result["menu_name"];  ?>" >
<br>
<br>
Position:
<select name="position">
	<?php
	$subject_set=getsubjects();
	$rows=mysql_num_rows($subject_set);
	for($count=1;$count<=$rows+1;$count++){

		  echo "<option value=\"{$count}\"";
		  if($count==$result["position"]){
		  echo "selected";
		}
		  echo ">{$count}</option>";

	}
	?>
</select>

<br>
<br>
<br>
Visible
<br>
<input type="radio" name="visible" value="0"<?php if($result["visible"]==1){echo " checked";}?> >yes
<input type="radio" name="visible" value="1"<?php if($result["visible"]==0){echo " checked";}?> >no


 
<br>
<br>


<br>
<br>

<input type="submit" name="submit" value="Edit Company" >


</form>




<br>

<a href="content.php">cancel</a>

<?php
			
?>

















</div>
<?php include("Includes/footer.php");?>
<?php require("Includes/closeconn.php");?>
