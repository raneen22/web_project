<?php
require "dbconnect.php";
$friend_id = $_GET['friend_id'];
$delete_friend_query = "DELETE FROM friendship WHERE friend_id=$friend_id ";
$delete_friend_query_result = mysqli_query($conn, $delete_friend_query);

if (!mysqli_error($conn)) {
    header("location: profile.php");
} else {
    echo mysqli_error($conn);
}
