<?php
require "dbconnect.php";
session_start();
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $query = "SELECT * FROM user WHERE user_id=$id";
    $user_info = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($user_info);
} else {
    header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>

<body >
    <nav>
    <div >
        
           <h2> Friends Book </h2>
           
        </div>
    
        <style>
            .rv{
                display: flex;
                justify-content: space-around;
                align-items: center;
                width: 40%;
            }

            #name {
                text-decoration: none;
                color: black;
            }

            .countl {
                margin-left: 30px;
            }

            .cm {
                text-align: center;
            }
        </style>
        <div>
                  <a href="logout.php"> <button class="btn primary-btn" style="margin-left: 10px;">Logout</button></a>
<div>
            <a href="profile.php"><span id="name"><?php echo $user['first_name'] . " " . $user['last_name']; ?><span> <img src="img/user1.png" alt="" class="image-profile-nav">
            </a>
        </div>
    </nav>


    <div class="body-container" style="height: fit-content;">

        <div >
            <h4 >Friends Suggestions</h4>
            <div class="all-friends">
                <?php
                require "dbconnect.php";

                $all_users_query = "SELECT * FROM user WHERE user_id!=$id";

                $result = mysqli_query($conn, $all_users_query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div container">
                <img class="friend-img" src="img/user1.png" ">
                <div>
                    <h5>' . $row["first_name"] . " " . $row["last_name"] . '</h5>
                    <div>
                        <a href="add_friend.php?friend_id=' . $row['user_id'] . '&user_id=' . $id . '"><button class="btn btn-secondary btn-sm">Add Friend</button></a>
                        <br>
                    </div>
                    <br>

                </div>
            </div>';
                }
                ?>

            </div>
        </div>

        <div class="post-section">
            <div  class="last-post" >
                <form action="add_post.php" method="POST">
                    <input type="text" hidden name="id" value="<?php echo $id; ?>">
                    <h4>new post</h4>
                    <div class="last-post-text-container">
                        <img class="image-profile" src="img/user1.png" alt="profile image" height="40">
                        <textarea class="last-post-text" name="text" id="" cols="20" rows="3" placeholder="What's on your mind?"></textarea>
                    </div>
                    <div class="post-buttons">
                    <button type="submit" class="post-btn btn btn-primary btn-sm">post</button>

                        <button type="button" style="width: 150px" class="add-img-btn btn btn-primary btn-sm">
                            <img class="add-img-btn-icon" src="img/qqq.png"> Add images
                            <input  name="profile" type="file" class="custom-file-input" id="inputGroupFile02">

                        </button>

                </form>
            </div>
        </div>

        <?php
        $fetch_friends_posts_query = "SELECT * FROM friendship JOIN post ON friendship.friend_id=post.user_id JOIN user ON friendship.friend_id=user.user_id ORDER by post.date_posted desc";
        $fetch_friends_posts_query_result = mysqli_query($conn, $fetch_friends_posts_query);
        $_SESSION['post_id'];

        while ($row = mysqli_fetch_assoc($fetch_friends_posts_query_result)) {
            $input = $row['date_posted'];
            $date = strtotime($input);
            $_SESSION['post_id'] = $row['post_id'];
            echo '<div class="post-container">

            <div class="post-header">
                <img class="image-profile" src="img/user1.png" alt="profile image" height="40">
                <div class="post-date-author">
                    <p style="margin: 0; font-size: small;font-weight: 600">' . $row['first_name'] . " " . $row['last_name'] . '</p>
                    <span style="font-size: xx-small;color: #5a6268">' . date('d M', $date) . '</span>
                </div>

            </div>
            
            <div class="post-content ">
                <p>' . $row['text'] . '</p>
            </div>
    
            <div class="container d-flex ">
            <div class="post-btn-actionsd-flex">
            <h2 class="likes">' . $row['likes'] . '</h2>
            <a href="like.php?post_id=' . $row['post_id'] . '&user_id=' . $id . '"> <button class="btn btn-primary cm">Like</button></a>
            </div>
            <div class="comment post-btn-actionsd-flex">
            <form action="add_comment.php" method="GET">
                <input
                class="form-control"
                type="text"
                placeholder="Comment Here"
                aria-label="default input example"
                name="text"
                 />
                <input type="text" hidden name="post_id" value="' . $row['post_id'] . '">
<br>
<br>
                <button type="submit" class="post-btn btn btn-primary btn-sm">Add comment</button>


                 
            </form>
                

            </div>
            </div>

        </div>';
            $post_id = $row['post_id'];
            $user_id = $row['user_id'];
            $fetch_comments_posts_query = "SELECT * FROM post JOIN comment ON post.post_id=comment.post_id JOIN user ON comment.user_id=user.user_id where post.post_id=$post_id; ";
            $fetch_comments_posts_query_result = mysqli_query($conn, $fetch_comments_posts_query);
            while ($row = mysqli_fetch_assoc($fetch_comments_posts_query_result)) {
                echo '
                <div class="conatiner  r-side mt-2">
                <div class="row ">
                <div class="col-1 ">
                 </div>
                <img class="image-profile" src="img/user1.png"  height="40">
                <div class="post-date-author">
                <p style="margin: 0; font-size: small;font-weight: 600">' . $row['first_name'] . " " . $row['last_name'] . '</p>
                <span style="font-size: xx-small;color: #5a6268">' . date('d M', $date) . '</span>
                </div>
                <div class="cm">
                <p>' . $row['text'] . '</p>
                </div>
                </div>


                
               

               
            </div>
                ';
            }
        }
        ?>
    </div>
    

</body>

</html>