<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/reg.css">
  <title>Register</title>
</head>
<style>


body {
    background-image: url("aaaa.png");

    background-color: rgb(233, 203, 203);
}
</style>

<body>
  
  <div class="container">
    <form class="row g-3" action="reg_user.php" method="post" id="f" enctype="multipart/form-data">

      <div style="text-align: center">
      <div> <h2> friendsbook</h2></die>
      </div>

      <div class="col-md-3">
        <label for="inputname" class="form-label">Your First Name</label>
        <input required type="text" class="form-control" id="inputname" name="firstName" />
      </div>

      <div class="col-md-3">
        <label for="inputname2" class="form-label"> Your Last Name</label>
        <input required type="text" class="form-control" id="inputname2" name="lastName" />
      </div>
      <div class="col-md-3">

      <div class="input-group flex-nowrap ">
        <span class="input-group-text" id="addon-wrapping">@</span>
        <input required type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping" name="userName" />
      </div>
      </div>

      <div class="col-md-3">
        <label for="inputEmail4" class="form-label"> Your Email</label>
        <input required type="email" class="form-control" id="inputEmail4" name="email" />
      </div>

      <div class="col-md-3">
        <label for="inputPassword4" class="form-label"> Your Password</label>
        <input required type="password" class="form-control" id="inputPassword4" name="password" />
      </div>

      <div class="col-3">
        <label for="inputAddress" class="form-label">Your Address</label>
        <input required type="text" class="form-control" id="inputAddress"  name="address" />
      </div>

      <div class="col-md-4">
        <label for="inputtelephone" class="form-label"> Your Telephone Number</label>
        <input required type="telephone" class="form-control" id="inputtelephone" name="telephone" />
      </div>

      <div class="col-md-3">
        <label for="inputState" class="form-label">Gender</label>
        <select id="inputState" class="form-select" name="gender">
          <option value="0">Male</option>
          <option value="1">Female</option>
        </select>
      </div>


      <div class="input-group mb-3">
        <div class="custom-file">
          <label class="custom-file-label" for="inputGroupFile02">Choose Your profile image</label>
          <input required name="profile" type="file" class="custom-file-input" id="inputGroupFile02">
        </div>
      </div>

      <div class="col-3">
        <button type="submit" class="btn btn-success" style="width:100%">Sign in</button>
      </div>
      <hr>
      <h6 style="text-align: center;" >Already have an account? <a href="login.php"><span>Login</span></a></h6>

    </form>
  </div>
</body>

</html>