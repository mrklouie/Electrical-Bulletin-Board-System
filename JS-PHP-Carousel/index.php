<?php
require "db.php";
session_start();
date_default_timezone_set("Asia/Manila");
$user = "Guest";
if (isset($_SESSION["sessionUsername"])) {
    $user = $_SESSION["sessionUsername"];
}

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
    <div class="container-fluid" >
      <nav class="mobile-nav">
        <a href="../user account/index.php">
        <p class="user"><?php if (isset($_SESSION["sessionUsername"])) {
    echo $_SESSION["sessionUsername"];
} else {
    echo "<a href='../login.php'>Login</a>";
}?></p></a>
        <ul>

          <?php if (isset($_SESSION["sessionUserType"])) {
    ?>
          <li><a href="../index.php">Manage</a></li>
          <?php }?>
          <li><a href="#">Contact</a> </li>
        </ul>
      </nav>
      <!-- START MODAL -->
      <div class="pop-modal" id="pop-modal">
        <div class="section-modal left-modal">

        <button class="close-popup-modal">&times;</button>
          <div class="subhead">
          <h2 class="pop-modal-title">SUBSCRIBE</h2>
          <p class="pop-modal-subtext">Don't miss out any upcoming news in the futue so you won't be left behind!</p>
          <input type="email" name="email" class="email" placeholder="Enter your email here">
          </div>
          <button id="submit-modal">SUBMIT</button>
        </div>
        <div class="section-modal right-modal">

        </div>
      </div>
      <!-- END MODAL -->
       <!-- Start Contact form -->
       <div class="contact-form" id="contact-form">
      <div class="close-form" data-close-contact>&times;</div>
        <div class="header">
          <div class="title">Get in touch</div>
        </div>
        <div class="body">
           <form action="send-contact.php" method="POST">
              <div class="form-group">
                <input type="hidden" name="date" value="<?php echo date("Y-m-d H:i:s"); ?>">
                <input type="text" name="name" placeholder="Enter your name here">
                <input type="email" name="email" placeholder="Enter your email here">
                <textarea name="message" id="message" placeholder="Enter message here"></textarea>

                <button class="send" type="submit" name="send-contact">Send  <i class="fa fa-envelope"></i></button>
              </div>
           </form>
        </div>
      </div>
      <!-- End Contact form -->

      <div class="section left-section">
        <nav>
          <div class="user">
            <a href="../user account/index.php">
            <p><?php if (isset($_SESSION["sessionUsername"])) {
    echo $user;
} else {
    echo "<a href='../login.php'>Login</a>";
}?></p></a>
          </div>
          <ul>
            <li><a href="../index.php">
            <?php
if (isset($_SESSION["sessionUserType"])) {
    echo "Manage";
} else {
    echo "";
}
?>
            </a></li>
            <li data-open-contact=#contact-form><a href="#">Contact</a></li>
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
            target="_blank"><i class="fa fa-globe" style="font-size: 50px"></i
            ></a>
          </div>
          <div class="icon">
            <a href="https://www.facebook.com/plmunofficial/" target="_blank">
              <i class="fa fa-facebook-square" style="font-size: 50px"></i
            ></a>
          </div>
          <div class="icon">
            <a href="https://www.facebook.com/groups/930530860368618" target="_blank">
              <img src="images/CITCS LOGO.png" alt="" class="plmun-logo">
            </a>
          </div>
        </div>
      </div>
      <div class="section right-section">
      <button class="button-control next" id="next-image"><i class="fa fa-arrow-right"></i></button>
          <button class="button-control prev" id="prev-image"><i class="fa fa-arrow-left"></i></button>
        <div class="controls" id="controls">
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
          src="../uploads/<?php echo $row["images"]; ?>" class="carousel-img" data-open-modal=#my-modal>
          <?php
}}
?>
          <div class="image-controls">
          </div>
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
