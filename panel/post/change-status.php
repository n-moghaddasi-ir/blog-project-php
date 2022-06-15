<?php
    require_once '../../function/pdo_connection.php';
    require_once '../../function/helpers.php';
    require_once '../../function/check-login.php';


    global $pdo;

    if (isset($_GET['post_id']) && $_GET['post_id'] !== '') {
        $query = "SELECT * FROM php_project.posts WHERE id = ?;";
        $statement = $pdo->prepare($query);
        $statement->execute([$_GET['post_id']]);
        $post = $statement->fetch();

        if ($post !== false) {

            $status = ($post->status == 10)? 0 : 10;

            $query = "UPDATE php_project.posts SET status = ?, updated_at = NOW() WHERE id = ?;";
            $statement = $pdo->prepare($query);
            $statement->execute([$status, $_GET['post_id']]);
        }
    }
    redirect('panel/post');
   

?>