<?php
session_start();
require "includes/db.php";
?>
<?php if (isset($_SESSION["sessionUserType"])) {?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script
      src="https://kit.fontawesome.com/8d98474fa5.js"
      crossorigin="anonymous"
    ></script>
    <style>
      <?php include "css/style.css";?>
    </style>
  </head>
  <body>
    <nav class="navbar">
      <div class="brand-title">EBBS</div>
      <a href="#" class="menu"><i class="fa-solid fa-bars"></i></a>
      <div class="navbar-links">
        <ul>
          <li class="archives"><a href="#">Archives</a></li>
          <li><a href="feedback.php">Feedbacks</a></li>
          <li><a href="index.php">Manage</a></li>
          <li><a href="includes/logout.php">Logout</a></li>
        </ul>
      </div>
    </nav>
    <div class="wrapper">
      <button class="prev">
        <i class="fa-solid fa-angle-left"></i>
      </button>
      <button class="next">
        <i class="fa-solid fa-angle-right"></i>
      </button>
      <div class="giga-container">
        <div class="carousel-container">
          <ul class="slider">
            <!-- Start Card -->
            <?php $sql = "SELECT * FROM tbl_archives";
    if (!$result = mysqli_query($conn2, $sql)) {
        echo "Query Error";
    } else {
        while ($row = mysqli_fetch_assoc($result)) {

            ?>
            <li class="card">
              <div class="dropdown" data-dropdown>
                <button class="dropdown-btn" data-dropdown-button>
                  <i class="fa-solid fa-caret-down"></i>
                </button>
                <div class="dropdown-menu">
                  <ul class="links">
                    <form action="includes/archives.php" method="POST">
                      <input type="hidden" name="archives_id" value=<?php echo $row["archives_id"]; ?> />
                      <li>
                        <button type="submit" name="recover">Recover</button>
                      </li>
                      <li>
                        <button type="submit" name="delete">Delete</button>
                      </li>
                    </form>
                  </ul>
                </div>
              </div>
              <div class="item">
                <img src="uploads/<?php echo $row["images"]; ?>"/>
                <div class="details-container">
                  <div class="details">
                    <h2 class="title">
              <?php echo substr($row["title"], 0, 133); ?>
                    </h2>
                  </div>
                </div>
              </div>
            </li>
            <?php
}
    }
    ;?>
            <!-- End Card -->
          </ul>
        </div>
      </div>
    </div>
    <script src="archives_1.js"></script>
  </body>
</html>
<?php } else {
    header("Location: JS-PHP-Carousel/index.php");
    exit;
}?>
