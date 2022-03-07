<?php
session_start();
require "../JS-PHP-Carousel/db.php";

?>

<?php
if (isset($_SESSION["sessionId"])) {
    ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Change Password</title>
    <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>" />
    <script
      src="https://kit.fontawesome.com/8d98474fa5.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="sidebar">
      <div class="heading-container">
        <div class="heading">
          <h2 class="user-sidebar">User Profile</h2>
        </div>
        <i class="fa-solid fa-bars" id="btn-menu"></i>
      </div>
      <ul class="nav-list">
        <li id="li-user">
          <a href="index.php">
            <i class="fa-solid fa-user-astronaut"></i>
            <span class="links-name">User Info</span>
          </a>
          <span class="tooltip">User Info</span>
        </li>
        <li id="li-home">
          <a href="../JS-PHP-Carousel/index.php">
            <i class="fa-solid fa-house-chimney-window"></i>
            <span class="links-name">Back to Home</span>
          </a>
          <span class="tooltip">Home</span>
        </li>
        <li id="li-change-pass">
          <a href="changePass.php">
            <i class="fa-solid fa-key"></i>
            <span class="links-name">Change Password</span>
          </a>
          <span class="tooltip">Change Password</span>
        </li>
        <li id="li-change-pass">
          <a href="delete.php">
          <i class="fa-solid fa-trash-can"></i>
            <span class="links-name">Delete Account</span>
          </a>
          <span class="tooltip">Delete Account</span>
        </li>
      </ul>

      <div class="logout-container">
        <form action="logout.php" method="POST">
          <div class="form-group">
            <button class="logout-btn" type="submit" name="logout">
              <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </button>
            <span class="logout-link">
              Logout
            </span>
        </div>
        </form>
      </div>

    </div>
    <div class="user-info">
      <h2 class="user">Change Password</h2>
      <div class="grid-container">
        <div class="grid">
          <form action="includes/password.php" class="password-form" method="POST">
            <div class="form-group">
              <p>Old Password</p>
              <input type="password" name="cOldPassword" value="" readonly/>
            </div>
            <div class="form-group">
              <p>New Password</p>
              <input type="password" name="cPassword" value="" readonly/>
            </div>
            <div class="form-group">
              <p>Confirm Password</p>
              <input type="password" name="cConfirmPassword" value="" readonly/>
            </div>
            <div class="btn-container" class="btn-container-pass">
              <button type="button" name="submit" id="btn-edit">Edit</button>
              <button
                type="submit"
                name = "changePass"
                style="display: none"
                id="btn-save-changes"

              >
                Save Changes
              </button>
              <button
                type="button"
                name="submit"
                id="btn-cancel"
                style="display: none"
              >
                Cancel
              </button>
            </div>

          </form>
        </div>
      </div>
    </div>

    <div id="overlay"></div>
    <script src="index.js"></script>
  </body>
</html>
<?php }
?>