<?php

require_once("db_info.php");
require_once("db_connect.php");

function get_posts_from_authors_id(int $id): Array {
    $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
    $stmt = $mysqli->prepare(
       "SELECT body, posts.code, image_path, username 
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
            "author" => $author,
            "body" => $body, 
            "code" => $code,
            "image_path" => $image_path,
        ));
    endwhile;
    return $result;
}

function get_feed_from_user_id(int $id): Array {
    $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
    $stmt = $mysqli->prepare(
       "SELECT body, posts.code, image_path, username 
        FROM followers JOIN members ON (followers.followee_id == members.id) JOIN posts ON (members.id = posts.author)
        WHERE followers.id = ?"
    );
    $stmt->bind_param('i', $id);
    $stmt->execute(); // esegue la query appena creata.
    $stmt->store_result();
    $stmt->bind_result($body, $code, $image_path, $author); // recupera il risultato della query e lo memorizza nelle relative variabili.
    $result = array();
    while ($stmt->fetch()):
        array_push($result, array(
            "author" => $author,
            "body" => $body, 
            "code" => $code,
            "image_path" => $image_path,
        ));
    endwhile;
    return $result;
}

?>