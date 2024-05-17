<?php
	require_once '../config/config.php';

	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		if (isset($_GET['task_id'])) {
			$task_id = $_GET['task_id'];
			
			if (filter_var($task_id, FILTER_VALIDATE_INT)) {
				try {
					$sql = "DELETE FROM `messages` WHERE `id` = :task_id";
					$stmt = $pdo->prepare($sql);
					$stmt->bindParam(':task_id', $task_id, PDO::PARAM_INT);
					
					if ($stmt->execute()) {
						header("Location: ../public/index.php");
						exit();
					} else {
						echo "Error.";
					}
				} catch (PDOException $e) {
					echo "Error: " . $e->getMessage();
				}
			} else {
				echo "Invalid task ID.";
			}
		} else {
			echo "Task ID not provided.";
		}
	}
?>