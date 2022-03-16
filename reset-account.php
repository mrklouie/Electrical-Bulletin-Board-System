<?php
require "includes/db.php";
session_start();
$email = $_SESSION["email"];
if (isset($_SESSION["token"])) {

    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reset Account</title>
    <link rel="stylesheet" href="css/recover.css?" />
  </head>
  <body>
    <div class="container">
      <div class="wrapper">
        <div class="header">
          <h2>Reset Account</h2>
        </div>
        <div class="body">
          <form action="includes/reset.php" method="POST">
          <div class="form-group">
            <?php
$sql = "SELECT * FROM users WHERE email = '" . $email . "'";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        ?>
            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
            <?php }?>
            <label for="username">New Username: </label>
            <input type="text" name="username" placeholder="Enter username" maxlength="8"/>
            <label for="password">New Password:</label>
            <input
              type="password"
              name="password"
              placeholder="Enter password"
            />
            <label for="confirm-password">Confirm Password:</label>
            <input
              type="password"
              name="confirm-password"
              placeholder="Confirm password"
            />
          </div>
          <button type="submit" name="submit" id="btn-reset">Reset</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>

<?php }?>
