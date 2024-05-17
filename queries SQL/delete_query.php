<?php
	require_once '../config/config.php';
	
	if($_GET['task_id']){
		$task_id = $_GET['task_id'];
		$pdo->query("DELETE FROM `messages` WHERE `id` = $task_id") or die(mysqli_errno());
		header("location: ../public/index.php");
	}	
?>