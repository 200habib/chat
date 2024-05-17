<?php
require_once '../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

try {
 
    $task = $_POST['task'] ?? '';

    $stmt = $pdo->prepare("INSERT INTO messages (message, create_at) VALUES (?, NOW())");

    if ($stmt) {
        $stmt->bindParam(1, $task);
        if ($stmt->execute()) {
            header("Location: ../public/index.php");
            exit;
        } else {

            echo "Error.";
        }
    } else {
        echo "Error.";
    }
} catch (PDOException $e) {
    echo "Error" . $e->getMessage();
}
}
?>
