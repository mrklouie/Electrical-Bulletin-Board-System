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
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="css/main.css
    "
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
<style>
  .logout-button{
    width: 100%;
    height: 100%;
    background: url("logout.jpg");
    border-style: none;
    border-radius: 10px;
    background-size: cover;
  }
</style>
    <title>Homepage</title>
  </head>

  <body>
    <div class="container-fluid">
      <!-- START NAVBAR -->
      <div class="navbar">
      <div class="brand-name">
        EBBS
      </div>
      <a href="#" class="menu" id="menu">
        <i class="fa-solid fa-bars hamburger"></i>
      </a>
      <div class="navbar-links">
        <ul>
          <li><a href="archives.php">Archives</a></li>
          <li><a href="#">Feedbacks</a></li>
          <li><a href="index.php">Manage</a></li>
          <li><a href="#">Logout</a></li>
        </ul>
      </div>
      </div>
      <!-- END NAVBAR -->
      <div class="parent-of-section">
        <!-- LEFT SECTION START -->
        <div class="section left-section">
          <div class="left-item-container">
            <div class="left-item user-info">
              <h4 class="name">
                <?php echo $_SESSION["sessionFname"] . " " . $_SESSION["sessionLname"] ?>
              </h4>
              <p class="subtext">Admin</p>
            </div>
            <div class="left-item account-details">
              <h4 class="left-item-title">Account Details:</h4>
              <ul>
                <li class="subtext">Username: <?php echo $_SESSION["sessionUsername"] ?></li>
                <li class="subtext" style="word-break: break-all">
                  Email: <?php if (isset($_SESSION["email"])) {
    echo $_SESSION["email"];
} else {
    echo "[none]";
}?>
                </li>
              </ul>
            </div>
            <div class="left-item ebs-track">
              <h4 class="left-item-title">EBS TRACK</h4>
              <ul>
                <?php $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);
    $userCount = mysqli_num_rows($result);?>
                <li class="subtext">Total of users registered: <?php echo $userCount; ?></li>
                <?php $sql = "SELECT * FROM images";
    $result = mysqli_query($conn2, $sql);
    $rowsCount = mysqli_num_rows($result);?>
                <li class="subtext">Posted Announcements: [<?php echo $rowsCount; ?>/6]</li>
              </ul>
            </div>
          </div>
          <form action="JS-PHP-Carousel/index.php">
          <div class="logout-container">
            <div class="logout">
              <button class="logout-btn">SHOW ANNOUNCEMENTS</button>
            </div>
          </div>
          </form>
        </div>
        <!-- LEFT SECTION END -->
        <div class="section right-section">

          <div class="container-cards">
            <!-- Modal -->

            <div
              class="modal fade"
              id="exampleModal"
              tabindex="-1"
              aria-labelledby="exampleModalLabel"
              aria-hidden="true"
            >
            <!-- form -->

              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                      Upload a photo
                    </h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <form action="upload.php" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">

                    <div class="container-modal">

                        <div class="img-placeholder" onclick="upload()">
                          <img src="images/placeholder.jpg" id="imageDisplay"/>
                          <input
                            type="file"
                            name="file"
                            id="file"
                            style="display: none" onchange="displayImage(this)"
                          />
                        </div>
                        <input
                          type="text"
                          name="title"
                          class="modal-input"
                          placeholder="Title goes here..."
                        />
                        <textarea
                          name="details"
                          class="modal-textarea"
                          placeholder="Tell more about it..."
                        ></textarea>


                    </div>

                    <!-- body -->
                  </div>

                  <div class="modal-footer">
                    <button
                      type="button"
                      class="modal-button"
                      data-bs-dismiss="modal"
                      onclick="resetModal()"
                    >
                      Close
                    </button>
                    <button type="submit" class="modal-button" name="upload">
                      Save changes
                    </button>
                  </div>
                </form>
                </div>
              </div>

              <!-- form -->
            </div>
            <!-- Modal -->
            <div class="cards">
              <div class="card on-upload" onclick="triggerClick()">
                <button
                  type="button"
                  id="show-modal"
                  class="btn btn-primary"
                  data-bs-toggle="modal"
                  data-bs-target="#exampleModal"
                  style="display: none"
                ></button>
                <img src="images/plus.png" id="uploadimg" alt="" />
                <input
                  type="file"
                  name="file"
                  id="file"
                  style="display: none"
                />
              </div>
              <div class="click-to-upload"><p>Click to Upload</p></div>

              <!-- DISPLAY IMAGES -->
              <?php

    $sql = "SELECT * FROM images";
    $result = mysqli_query($conn2, $sql);
    $rowsCount = mysqli_num_rows($result);

    if ($rowsCount > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>

          <!--------- card --------->
              <div class="card card-extra">
                <form action="delete.php" method="POST">
                  <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
                  <button type="submit" class="remove" name="delete"><i class="fa-solid fa-box-archive" id="archive"></i></button>
                </form>
                <img src="uploads/<?php echo $row['images'] ?>" />
                <!-- <img src="/images/kokey.jpg" /> -->


              </div>
           <!--------- card --------->
           <?php }}?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://kit.fontawesome.com/8d98474fa5.js" crossorigin="anonymous"></script>
    <script src="app.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
  </body>
</html>
<?php } else {
    header("Location: JS-PHP-Carousel/index.php");
    exit;
}?>
