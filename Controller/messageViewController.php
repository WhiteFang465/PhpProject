<?php
session_start();
require_once "./../Database/Model/Entities/database.php";
if (isset($_SESSION['id'])) {
    $output = "";
    $query = "select from_user_id,to_user_id,message from message 
            where from_user_id like :from_user1 and to_user_id like :to_user2
            or from_user_id like :from_user2 and to_user_id like :to_user1
            order by sent_time desc";
    $db = new Database();
    $values = ['from_user1' => $_SESSION['id'], 'to_user2' => $_POST['id'], 'from_user2' => $_POST['id'], 'to_user1' => $_SESSION['id']];
    $getMessages = $db->execute($query, $values);
    foreach ($getMessages as $message) {
        $output = $message['from_user_id'] == $_SESSION['id'] ? $output . '<div class="chat outgoing">
                        <div class="details">
                            <p>' . $message["message"] . '</p>
                        </div>
                    </div>' : $output . '<div class="chat incoming">
                        <div class="details">
                            <p>' . $message["message"] . '</p>
                        </div>
                    </div>';
    }
    echo $output;
}
