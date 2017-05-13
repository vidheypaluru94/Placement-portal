<?php
//basic functions go here
function isvalid($result){
	if(!$result){
				die("Database query failed".mysql_error());
			}
			
}

function getsubjects(){
	$query="select * from subjects order by position ASC ";
			global $connection;
			$subject_set=mysql_query($query,$connection);
			isvalid($subject_set);
			return $subject_set;
}

function selectsubject($id){
	$query="select * from subjects where id={$id}";
	global $connection;
	$subject_set=mysql_query($query,$connection);
	isvalid($subject_set);
	$subject=mysql_fetch_array($subject_set);
	return $subject;
}

function getpages($subject_id){
				global $connection;
				$query="select * from pages where subject_id={$subject_id} order by position ASC";
					$page_set=mysql_query($query,$connection);
			isvalid($page_set);
		return $page_set;
}

function getpagestext($page_id){
				global $connection;
				$query="select * from pages where id={$page_id}";
				$page_set=mysql_query($query,$connection);
				isvalid($page_set);
				return $page_set;
}



function selectpages(){
	global $selectpage;
	global $selectsub;
	if(isset($_GET['subj'])){
		$selectsub=$_GET['subj'];
	}
	elseif(isset($_GET['page'])){
		$selectpage=$_GET['page'];
	}
	else{
	}
}

?>