    <?php

    require "dbconnect.php";
    session_start();
    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
    } else {
        header("location:login.php");
    }

    $user_info_query = "SELECT * FROM user WHERE user_id=$id";
    $user_info_query_result = mysqli_query($conn, $user_info_query);
    $user = mysqli_fetch_assoc($user_info_query_result);
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>my Profile </title>
        <link rel="stylesheet" href="css/bootstrap.css" />
        <link rel="stylesheet" href="css/profile.css" />
    </head>
    <style>
    
        
body {
    background-image: url("aaaa.png");

    background-color: rgb(233, 203, 203);
}
        nav {
            padding: 0 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: rgb(108, 118, 168) ;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .right-nav {
            display: flex;
            justify-content: space-around;
            align-items: center;
            width: 10%;
        }

      

        .right-nav .notification,
        .chat {
            width: 20px;
            height: 20px;
        }

        .image-profile-nav {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
        }
    </style>

    <body>
        <nav>
        <a href="logout.php"> <button class="btn primary-btn" style="margin-left: 10px;">Logout</button></a>


            <div class="left-nav">

            </div>
            <style>
                .right-nav {
                    display: flex;
                    justify-content: space-around;
                    align-items: center;
                    width: 20%;
                }

                #nav-user-name {
                    text-decoration: none;
                    color: black;
                }
            </style>
            <div class="right-nav">

                <a href="profile.php"><span id="nav-user-name"><?php echo $user['first_name'] . " " . $user['last_name']; ?><span> <img src="img/user1.png" class="image-profile-nav">
                </a>
            </div>
        </nav>

        <div class="container-fluid">
            <img class="image-profile" src="img/user1.png" width=40 />
            <h2><?php echo $user['first_name'] . ' ' . $user['last_name'] ?></h2>
        </div>
        <div class="container-fluid">
            <div class="row">
               
                <div class="col">
                    
<div class="container">
  <div class="jumbotron">
    <h1>Recent Posts</h1>   
    <?php
                            $query = "SELECT * FROM post WHERE user_id=$id";
                            $user_post_query_result = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_assoc($user_post_query_result)) {

                                $input = $row['date_posted'];
                                $date = strtotime($input);

                                echo '<div class="container r-side">
                                <p>' . $row['text'] . '</p>
                                <p>' . date('d M', $date) . '</p>
                                <a href="edit_post_form.php?post_id=' . $row['post_id'] . '"><button class="btn btn-primary btn-sm ">Edit post</button></a>
                                <a href="delete_post.php?post_id=' . $row['post_id'] . '"><button class="btn btn-secondary btn-sm">Remove</button></a>
                            </div>
                            <br />';
                            }
                            ?>
                            <br />   
   
</div>
                  
                    <br>

                    <div class="container">
  <div class="jumbotron">
    <h1>My Friends</h1>   
                            <?php
                            $friends_id_query = "SELECT * FROM friendship WHERE user_id=$id AND CONCAT(user_id,friend_id)=user_friend_id OR CONCAT(friend_id,user_id)=user_friend_id";
                            $result = mysqli_query($conn, $friends_id_query);


                            while ($row = mysqli_fetch_assoc($result)) {
                                $user_id = $row['friend_id'];
                                $friend_id = $row['user_id'];
                                $friend_info_query = "SELECT * FROM user WHERE user_id=$friend_id ";
                                $friend_result = mysqli_query($conn, $friend_info_query);

                                while ($friend_row = mysqli_fetch_assoc($friend_result)) {
                                    echo '<div class="card-of-friend">
                                <img class="friend-img" src="img/user1.png" />
                                <h3>' . $friend_row["first_name"] . " " . $friend_row["last_name"] . '</h3>
                                <
                                <a href="delete_friend.php?friend_id=' . $row['friend_id'] . '"><button class="btn btn btn-danger btn-sm">Remove this friend </button></a>
                            </div>';
                                }
                            }


                            ?>

                        </div>   
</div>
            
                    </div>
                </div>
                </div>
            </div>
    </body>

    </html>