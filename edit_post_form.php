<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<?php
session_start();
$post_id = $_GET['post_id'];
$_SESSION['post_id'] = $post_id;
?>


</style>
<body style="background-color:powderblue;" >
    <div class="container">
        <form action="edit_post.php" method="POST">
            <label for="exampleFormControlTextarea1" class="form-label">write your post </label>
            
            <textarea class="form-control" id="exampleFormControlTextarea1" name="text" rows="7" cols="20"></textarea>
            <br>
            <br>
            <div>            <button type="submit" class="post-btn btn btn btn-warning">edit</button>
</div> 


        </form>
    </div>
    <?php
    ?>
</body>

</html>