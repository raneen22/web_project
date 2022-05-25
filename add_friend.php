<?php
require "dbconnect.php";
$friend_id = $_GET['friend_id'];
$user_id = $_GET['user_id'];
$user_friend_id = $friend_id . $user_id;
$add_friend_query = "INSERT INTO friendship (user_id, friend_id,user_friend_id) VALUES ($user_id, $friend_id,$user_friend_id);";
$add_friend_query_result = mysqli_query($conn, $add_friend_query);

if (!mysqli_error($conn)) {
    header("location: index.php");
} else {
    echo mysqli_error($conn);
}
