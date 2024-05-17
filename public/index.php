<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chat</title>
        <link rel="stylesheet" href="/css/styles.css">
    </head>
    <body>
        <?php 
                require_once("../config/config.php");
                // var_dump( $messages ); 
        ?>

        <div class="chat-container">
            <div class="chat-header">
                <h2>Chat Room</h2>
            </div>
            <div class="chat-messages" id="chat-messages">
                <!-- Les messages apparaîtront ici -->
			


          
				<?php

					$query = $pdo->query("SELECT * FROM `messages` ORDER BY `id` ASC");
					$count = 1;
					while($fetch = $query->fetch()){
				?>
                <div>
					<span><?php echo htmlspecialchars($fetch['message'])?></span>
					<td >
                    <button class="delete-button"><a href="../queries SQL/delete_query.php?task_id=<?php echo htmlspecialchars($fetch['id'])?>">delete</a></button>
					</div>
				<?php
					}
				?>
                    </div>
                <!-- End Message -->
                <form id="new-todo-form" method="POST" action="../queries SQL/add_query.php">
            <div class="chat-input">
            <input 
					type="text" 
					placeholder="add new task 🙂"
					id="content"
					class="input_value_task" 
					name="task" required/>
                    <input type="submit" value="Add todo" class="submit_new_todo" name="add"/>
            </div>
        </div>
        </form>
            </div>
            

    </body>
</html>
