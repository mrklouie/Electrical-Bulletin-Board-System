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
    echo "Guest";
}?></p></a>
        <ul>

          <?php if (isset($_SESSION["sessionUsername"])) {
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
          <form action="subscribe.php" method="POST">
          <input type="hidden" name="id" value="<?php echo $_SESSION["sessionId"]; ?>">
          <input type="email" name="email" class="email" placeholder="Enter your email here">

          </div>
          <button type="submit" id="submit-modal" name="subscribe">SUBMIT</button>
          </form>
        </div>
        <div class="section-modal right-modal">

        </div>
      </div>
      <!-- END MODAL -->

      <div class="section left-section">
        <nav>
          <div class="user">
            <a href="../user account/index.php">
            <p><?php

echo $user ?></p></a>
          </div>
          <ul>
            <li><a href="../index.php">
            <?php
if (isset($_SESSION["sessionId"])) {
    echo "Manage";
} else {
    echo "";
}
?>
            </a></li>
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
            target="_blank"><i class="fa fa-globe" style="font-size: 40px"></i
            ></a>
          </div>
          <div class="icon">
            <a href="https://www.facebook.com/plmunofficial/" target="_blank">
              <i class="fa fa-facebook-square" style="font-size: 40px"></i
            ></a>
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
          src="../uploads/<?php echo $row["images"]; ?>" data-open-modal=#my-modal>
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
    <div class="second-container">
    <div class="custom-shape-divider-top-1646392397">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
        <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
        <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
    </svg>
</div>
        <div class="comment-section-container">
          <div class="comment-header">
          <h2 class="comment-section-title">COMMENT SOMETHING</h2>
          </div>
          <?php
$sql = "SELECT * FROM tbl_comments";
$result = mysqli_query($conn3, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    ?>
          <div class="show-comments">

            <div class="form-group-comments">
              <form action="comment.php" method="POST">
                <input type="hidden" name="cid" value="<?php echo $row["cid"] ?>">
                <div class="subtexts">
                <p class="username" style="font-weight: bold;"><?php echo $row["username"] ?></p>
                <small style="font-size: 0.8rem;"><?php
// $originalDate = $row["date"];
//     echo $newDate = date("m/d/Y h:i A", strtotime($originalDate));
    echo date("m/d/Y h:i A", strtotime($row["date"]));
    ?></small>
    </div>
                <textarea readonly class="user-comment" name="user-comment"><?php echo $row["message"] ?></textarea>

                <?php if ($user == $row["username"] || isset($_SESSION["sessionUserType"])) {?>
                <button class="delete-comment" type="delete-comment" name="delete-comment">&times;</button>
                <button class="update-comment" type="button"><i class="fa fa-pencil"></i></i></button>
                <button class="save-changes-comment" type="submit" name="submit-changes"><i class="fa fa-check"></i></button>
              </form>
            </div>
          </div>
          <?php }}?>
          <?php
if (isset($_SESSION["sessionUsername"])) {
    ?>
          <div class="comment-section">
            <div class="form-group">
              <form action="comment.php" method="POST">
                <input type="hidden" name="username" value="<?php echo $user ?>">
                <input type="hidden" name="date" value="<?php echo date("Y-m-d H:i:s") ?>">
                <textarea name="comment" class="comment"></textarea>
                <button type="submit-comment" name="submit-comment" class="submit-comment">Comment</button>
              </form>
            </div>
            <?php
} else if (empty($_SESSION["sessionUsername"])) {
    ?>
  <p style="text-align: center">You must be logged in to comment<a href="http://localhost/Electrical-Bulletin-Board-System/login.php" class="go-to"> here</a></p>
<?php
}?>
          </div>
        </div>
    </div>
    <div id="overlay"></div>

    <script src="app1.js"></script>
  </body>
</html>
