<?php
require "db.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Carousel</title>
    <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <div class="container-fluid">
      <!-- START MODAL -->
      <div class="pop-modal" id="pop-modal">
        <div class="section-modal left-modal">
          <h2></h2>
        </div>
        <div class="section-modal right-modal">
          <h2 class="pop-modal-title">SUBSCRIBE</h2>
          <p class="pop-modal-subtext">AND DON'T MISS OUT</p>
          <input type="email" name="email" class="email" placeholder="Enter email here">
        </div>
      </div>
      <!-- END MODAL -->
      <div class="section left-section">
        <nav>
          <div class="user">
            <p><?php

echo $_SESSION["sessionUsername"] ?></p>
          </div>
          <ul>
            <li><a href="../index.php">Manage</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </nav>
        <div class="details-section">
          <?php
$sql = "SELECT * FROM images";
$result = mysqli_query($conn, $sql);
$rowsCount = mysqli_num_rows($result);
if ($rowsCount >
    0) {while ($row = mysqli_fetch_assoc($result)) {?>
          <div class="details add">
            <h1 class="title"><?php echo $row["title"]; ?></h1>
            <p><?php echo $row["details"]; ?></p>
          </div>
          <?php
}
}
?>
        </div>
        <div class="icons">
          <div class="icon">
            <a href="https://www.plmun.edu.ph/"
              ><i class="fa fa-globe" style="font-size: 40px"></i
            ></a>
          </div>
          <div class="icon">
            <a href="https://www.facebook.com/plmunofficial/">
              <i class="fa fa-facebook-square" style="font-size: 40px"></i
            ></a>
          </div>
        </div>
      </div>
      <div class="section right-section">
        <div class="controls">
          <button
            class="btn-control"
            id="prev-slide"
            style="margin-bottom: 0.6rem"
          >
            &#129129;
          </button>
          <div class="active"></div>
          <div class="slides"></div>
          <?php
$sql = "SELECT * FROM images";
$result = mysqli_query($conn, $sql);
$rowsCount = mysqli_num_rows($result);
if ($rowsCount >
    1) {for ($i = 0; $i < $rowsCount; $i++) {echo "
          <p class='slides-number'>0" . ($i + 1) . "</p>
          ";}}?>
          <button class="btn-control" id="next-slide">&#129131;</button>
        </div>
        <div class="slider">
          <?php
$sql = "SELECT * FROM images";
$result = mysqli_query($conn, $sql);
$rowsCount = mysqli_num_rows($result);
if ($rowsCount >
    0) {while ($row = mysqli_fetch_assoc($result)) {?> <img
          src="../uploads/<?php echo $row["images"]; ?>" data-open-modal=#my-modal>
          <?php
}}
?>
        </div>
      </div>
      <div class="modal-container">
        <?php
$sql = "SELECT * FROM images";
$result = mysqli_query($conn, $sql);
$rowsCount = mysqli_num_rows($result);
if ($rowsCount >
    0) {while ($row = mysqli_fetch_assoc($result)) {?>

        <!-- START MODAL -->
        <div class="my-modal" id="my-modal">
          <div class="modal-header">
            <h2 class="title"><?php echo $row["title"]; ?></h2>
            <button class="close-modal" data-close-modal>&times;</button>
          </div>
          <div class="modal-body"><?php echo $row["details"]; ?></div>
        </div>
        <?php }
}
?>
        <!-- END MODAL -->
      </div>
    </div>

    <div id="overlay"></div>
    <script src="app1.js"></script>
  </body>
</html>
