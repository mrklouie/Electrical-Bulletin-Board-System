<?php
require "includes/db.php";
session_start();
if (isset($_SESSION["token"])) {

    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Recover Password</title>
    <link rel="stylesheet" href="css/recover.css?v=<?php echo time(); ?>" />
  </head>
  <body>
    <div class="container">
      <div class="wrapper">
        <a href="reset-req.php"><button type="button" class="go-back">&#8592;</button></a>
        <div class="header">
          <img src="images/envelope.png"  />
          <h2>Verify Your Account</h2>
          <small
            >A verification code has been sent to your email. This code will be
            valid for 5 minutes only.</small
          >
          <div class="alert">
              <?php if (isset($_SESSION["tokenError"])) {?>
              <small><?php echo $_SESSION["tokenError"]; ?></small>
              <?php unset($_SESSION["tokenError"]);}?>
          </div>
        </div>
        <div class="body">
          <form action="reset.php" method="POST">
            <input type="text" name="code" placeholder="xxxxxx" />
            <button type="submit" name="verify-code">Verify</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
<?php }?>