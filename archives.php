<?php

require "includes/db.php";
session_start();

?>
<?php if (isset($_SESSION["sessionUserType"])) {?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Archives</title>
    <link rel="stylesheet" href="css/archives.css" />
    <script
      src="https://kit.fontawesome.com/8d98474fa5.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <!-- START NAVBAR -->
    <div class="navbar">
      <div class="brand-name">EBBS</div>
      <a href="#" class="menu" id="menu">
        <i class="fa-solid fa-bars hamburger"></i>
      </a>
      <div class="navbar-links">
        <ul>
          <li><a href="archives.php">Archives</a></li>
          <li><a href="feedback.php">Feedbacks</a></li>
          <li><a href="index.php">Manage</a></li>
          <li><a href="includes/logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <!-- END NAVBAR -->

    <div class="container">
      <h2 class="title">ARCHIVES</h2>
      <div class="card-container">
        <form action="delete.php" method="POST">
          <div class="form-group">
            <?php
$sql = "SELECT * FROM tbl_archives";
    $result = mysqli_query($conn2, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <!-- Start Image container -->
            <div class="img-container">
            <img src="uploads/<?php echo $row['images'] ?>" />

            <input type="hidden" name="archives_id" value="<?php echo $row["archives_id"]; ?>">
            <button type="submit" class="delete-image" name="delete-archive">
              <i class="fa-solid fa-trash-can"></i>
            </button>
          </div>
          <?php }?>
          <!-- End Image container -->
      </div>
    </div>
    </form>
    </div>
    <script src="archives.js"></script>
  </body>
</html>
<?php } else {
    header("Location: JS-PHP-Carousel/index.php");
    exit;
}?>