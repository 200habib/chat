<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=chat_app;port=3308;charset=utf8', 'root', 'dwwm_2024', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $query = $pdo->query("SELECT * FROM `messages`");
    $messages = $query->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    echo "Errore: " . $e->getMessage();
}
?>
