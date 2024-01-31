<?php

require_once("db_info.php");
require_once("db_connect.php");
require_once("get_post_info.php");

function get_posts_from_author_id(int $id): Array {
    $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
    $stmt = $mysqli->prepare(
       "SELECT body, posts.code, image_path, posts.author
        FROM members join posts on members.id = posts.author 
        WHERE members.id = ?"
    );
    $stmt->bind_param('i', $id);
    $stmt->execute(); // esegue la query appena creata.
    $stmt->store_result();
    $stmt->bind_result($body, $code, $image_path, $author); // recupera il risultato della query e lo memorizza nelle relative variabili.
    $result = array();
    while ($stmt->fetch()):
        array_push($result, array(
            "id" => $id,
            "author" => $author,
            "body" => $body, 
            "code" => $code,
            "image_path" => $image_path,
            "likes" => get_likes_of_post($id)
        ));
    endwhile;
    return $result;
}

function get_feed_from_user_id(int $id): Array {
    $author = "";
    $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
    $stmt = $mysqli->prepare(
       "SELECT body, posts.code, image_path, username, datetime
        FROM followers JOIN members ON (followers.followee_id = members.id) JOIN posts ON (members.id = posts.author)
        WHERE followers.followee_id = ?"
    );
    $stmt->bind_param('i', $id);
    $stmt->execute(); // esegue la query appena creata.
    $stmt->store_result();
    $stmt->bind_result($body, $code, $image_path, $username, $datetime);
    $result = array();
    while ($stmt->fetch()):
        array_push($result, array(
            "id" => $id,
            "author" => $author,
            "body" => $body, 
            "code" => $code,
            "image_path" => $image_path,
            "likes" => get_likes_of_post($id),
            "datetime" => $datetime
        ));
    endwhile;
    return $result;
}

function get_all_feed(): Array {
    $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
    $stmt = $mysqli->prepare(
       "SELECT body, code, image_path, username, datetime, members.id
        FROM members JOIN posts ON (members.id = posts.author);"
    );
    $stmt->execute(); // esegue la query appena creata.
    $stmt->store_result();
    $stmt->bind_result($body, $code, $image_path, $author, $datetime, $id);
    $result = array();
    while ($stmt->fetch()):
        array_push($result, array(
            "id" => $id,
            "author" => $author,
            "body" => $body, 
            "code" => $code,
            "image_path" => $image_path,
            "likes" => get_likes_of_post($id),
            "datetime" => $datetime
        ));
    endwhile;
    return $result;
}

?>