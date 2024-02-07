<?php

require_once("db_info.php");

function get_user_info(int $user_id): Array {
    $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
    $stmt = $mysqli->prepare(
    "SELECT username, email, birthdate, profile_image, bio
    FROM members
    WHERE id = ?
    ");
    $stmt->bind_param("i", $user_id);
    $stmt->execute(); // esegue la query appena creata.
    $stmt->store_result();
    $stmt->bind_result($username, $email, $birthdate, $profile_image_path, $bio);
    $stmt->fetch();

    return Array(
        "id" => $user_id,
        "username" => $username,
        "email" => $email,
        "birthdate" => $birthdate,
        "profile_image_path" => $profile_image_path,
        "followers" => get_number_of_followers($user_id),
        "followings" => get_number_of_followings($user_id),
        "bio" => $bio
    );
}

function get_number_of_followers(int $user_id): int {
    $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
    $stmt = $mysqli->prepare(
    "SELECT COUNT(*)
    FROM followers
    WHERE followee_id = ?
    ");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($count);
    $stmt->fetch();
    return $count;
}

function get_number_of_followings(int $user_id): int {
    $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
    $stmt = $mysqli->prepare(
    "SELECT COUNT(*)
    FROM followers
    WHERE follower_id = ?
    ");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($count);
    $stmt->fetch();
    return $count;
}

function user_exists(int $user_id): bool {
    $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
    if ($stmt = $mysqli->prepare("SELECT COUNT(*) FROM members WHERE id = ? ")) {
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($count);
        $stmt->fetch();
        $cond = (bool) $count > 0;
        return $count > 0;
    } else {
        return FALSE;
    }
}

function get_following(int $user_id): Array {
    $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
    $stmt = $mysqli->prepare(
        "SELECT members.id, username, profile_image  FROM followers JOIN members on followee_id = members.id WHERE follower_id = ?"
    );
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $username, $profile_image_path);
    $result = array();
    while ($stmt->fetch()):
        array_push($result, array(
            "id" => $id,
            "username" => $username,
            "profile_image_path" => $profile_image_path
        ));
    endwhile;
    return $result;
}

function get_followers(int $user_id): Array {
    $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
    $stmt = $mysqli->prepare(
        "SELECT members.id, username, profile_image  FROM followers JOIN members on follower_id = members.id WHERE followee_id = ?"
    );
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $username, $profile_image_path);
    $result = array();
    while ($stmt->fetch()):
        array_push($result, array(
            "id" => $id,
            "username" => $username,
            "profile_image_path" => $profile_image_path
        ));
    endwhile;
    return $result;
}
?>
