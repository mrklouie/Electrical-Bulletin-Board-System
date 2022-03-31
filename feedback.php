<?php
date_default_timezone_set("Asia/Manila");
require "includes/db.php";
session_start();

$sql = "SELECT * FROM tbl_comments";
$result = mysqli_query($conn3, $sql);
$rowsCount = mysqli_num_rows($result);

?>
<?php if (isset($_SESSION["sessionUserType"])) {?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Feedbacks</title>
    <link
      rel="stylesheet"
      href="feedback.css
    "
    />
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
          <li><a href="archives_1.php">Archives</a></li>
          <li><a href="#" class="feedbacks">Feedbacks</a></li>
          <li><a href="index.php">Manage</a></li>
          <li><a href="includes/logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <!-- END NAVBAR -->
    <div class="container">
      <h2 class="title">Feedbacks <?php echo "(" . $rowsCount . ")"; ?></h2>
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Message</th>
            <th>Email</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          <?php
$sql = "SELECT * FROM tbl_comments";
    $result = mysqli_query($conn3, $sql);
    while ($row = mysqli_fetch_assoc($result)) {

        ?>
          <!-- Start Table Row -->
          <tr>
            <td data-col-title="name"><?php echo $row["name"]; ?></td>
            <td data-col-title="message"><?php echo $row["message"]; ?></td>
            <td data-col-title="email"><?php echo $row["email"]; ?></td>
            <td data-col-title="date"><?php echo date("m/d/Y h:i A", strtotime($row["date"])); ?></td>
          </tr>
          <?php }?>
          <!-- End Start Table Row -->
        </tbody>
      </table>
    </div>
    <script src="archives.js"></script>
  </body>
</html>
<?php } else {
    header("Location: JS-PHP-Carousel/index.php");
    exit;
}?>