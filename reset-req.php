<?php
require "includes/db.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Request reset password</title>
    <link rel="stylesheet" href="css/recover.css?v=<?php echo time(); ?>" />
  </head>
  <body>
    <div class="container">
      <div class="wrapper">
      <a href="login.php"><button type="button" class="go-back">&#8592;</button></a>
        <div class="header">
          <img src="images/searching.png" class="search"/>
          <h2>Find your account</h2>
          <small
            >If you've lost your password or wish to reset it, enter your email below to get started.</small
          >
        </div>
        <div class="alert">
              <?php if (isset($_SESSION["requestError"])) {?>
              <small><?php echo $_SESSION["requestError"]; ?></small>
              <?php unset($_SESSION["requestError"]);}?>
          </div>
        <div class="body">
          <form action="reset.php" method="POST">
            <input type="email" name="email" placeholder="example@yahoo.com" class="email"/>
            <button type="submit" name="password-reset">Find</button>
          </form>

        </div>
      </div>
    </div>
  </body>
</html>
