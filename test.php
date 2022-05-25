<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>

  <div class="conatiner r-side mt-2">
    <div class="col d-flex">
      <div class="row">
      </div class="d-flex flex-row-reverse">
      <img class="image-profile" src="img/user.png" alt="profile image" height="40">
      <div class="post-date-author">
        <p style="margin: 0; font-size: small;font-weight: 600">' . $row['first_name'] . " " . $row['last_name'] . '</p>
        <span style="font-size: xx-small;color: #5a6268">' . date('d M', $date) . '</span>
      </div>
    </div>



    <div class="row">


    </div>


  </div>
</body>

</html>
<?php
setcookie('znje', 1, 30);
?>