<?php session_start();
require "../JS-PHP-Carousel/db.php";
?>
<?php if (isset($_SESSION["sessionId"])) {

    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Account</title>
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
            <span class="links-name">Home</span>
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
      </ul>
      <div class="logout-container">
        <div class="form-group">
          <button class="logout-btn">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
          </button>
          <span class="logout-link">Logout</span>
        </div>
      </div>
    </div>
        <!-- Start of user-info -->
        <?php
$id = $_SESSION["sessionId"];
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn4, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
    <div class="user-info">
      <h2 class="user"><?php echo $_SESSION["sessionFname"] . " " . $_SESSION["sessionLname"]; ?></h2>
      <div class="grid-container">
        <div class="grid">
          <form action="includes/user.php" method="POST" class="user-form" >
            <div class="form-group">
              <p>First Name</p>
              <input type="text" name="fname" value="<?php echo $row["fname"] ?>" readonly />
            </div>
            <div class="form-group">
              <p>Last Name</p>
              <input type="text" name="lname" value="<?php echo $row["lname"]; ?>" readonly />
            </div>
            <div class="form-group">
              <p>Email Address</p>
              <input
                type="email"
                name="email"
                value="<?php echo $row["email"]; ?>"
                placeholder="Optional"
                readonly
              />
            </div>
            <div class="form-group">
              <p>Username</p>
              <input type="text" name="username" value="<?php echo $row["username"]; ?>" readonly />
            </div>
            <div class="btn-container">
              <button type="button" name="submit" id="btn-edit">Edit</button>
              <button
                type="button"
                style="display: none"
                id="btn-save-changes"
                data-open-modal=#my-modal
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
            <!-- START MODAL -->
            <div class="my-modal" id="my-modal">
              <div class="modal-header">
                <h2 class="title-modal">Enter your password to continue</h2>
                <button type="button" class="close-modal" data-close-modal>&times;</button>
              </div>
              <div class="modal-body">
                <div class="form-group-modal">
                    Password:
                    <input type="password" name="password">
                    Confirm Password:
                    <input type="password" name="confirmPassword">
                </div>
                <div class="btn-submit-container">
                <button type="submit" name="save">Enter</button>
                </div>
              </div>
            </div>
            <!-- END MODAL -->
          </form>
        </div>
      </div>
    </div>
    <!-- End of user-info -->
    <?php
}
    ?>
      <div id="overlay"></div>
    <script src="index.js"></script>
  </body>
</html>
<?php } else {
    echo "<script>alert('Whoops! bawal yan')</script>";
}
?>