<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet" href="login.css" />
  <title>Login</title>
</head>

<body style="background-color:powderblue;">
  <div class="container">
    <form action="authentication.php" method="post">
      <div> <h3> friendsbook</h3></die>
     
      <div class="mb-6">
        <input placeholder="username" type="text" class="form-control" name="userName" />
      </div>
      <div class="mb-2">
        <input placeholder="password" type="password" class="form-control" name="password" />
      </div>
      <button type="submit" class="btn btn-success" style="width: 30%">
        Login 
      </button>
      <hr />
      <div style="text-align: center">
        <h6 class="newacc">You don't have an account?</h6>
        <?php
        if (isset($_GET['error']))
          echo '<h6 style="color: #ffa9a9 ">Invalid username or password</h6>';
        ?>
        <button style="border: none; background-color: #82ee73" type="button" class="btn btn-success" onClick="document.location.href='reg_form.php'">
          Create Account

        </button>

      </div>
    </form>
  </div>
</body>

</html>